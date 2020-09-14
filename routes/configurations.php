<?php
use App\Model\Cart;

\Config::set('filesystems.disks.public.url', url('storage'));
//return dd(config('filesystems.disks.public.url'));
////// direction Function /////////////////////
app()->singleton('direction', function () {
		if (app('l') == 'ar') {
			return '-rtl';
		}
	});
////// direction Function /////////////////////

//////  upload Function /////////////////////
if (!function_exists('it')) {
	function it() {
		return new \App\Http\Controllers\FileUploader;
	}
}
//////  upload Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('aurl')) {
	function aurl($link) {
		if (substr($link, 0, 1) == '/') {
			return url(app('admin').$link);
		} else {
			return url(app('admin').'/'.$link);
		}
	}
}
////// Admin Url Function /////////////////////
////// Get Settings Function /////////////////////
if (!function_exists('setting')) {
	function setting() {
		$setting = \App\Model\Setting::orderBy('id', 'desc')->first();
		if (empty($setting)) {
			return \App\Model\Setting::create(['sitename_ar' => '', 'sitename_en' => '', 'sitename_fr' => '']);
		} else {
			return $setting;
		}
	}
}
////// Get Settings Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('admin')) {
	function admin() {
		return auth()->guard('admin');
	}
}
////// Admin Url Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('active_link')) {
	function active_link($segment, $class = null) {
		if ($segment == null and request()->segment(2) == null) {
			return $class;
		} elseif (preg_match('/'.$segment.'/i', request()->segment(2))) {
			if ($class != null || $class != 'block') {
				if ($segment != null) {
					return $class;
				}
			} else {
				if ($class == 'block') {
					return 'display:block';
				} else {
					return 'display:none';
				}
			}
		}
	}
}



////// Admin Url Function /////////////////////
if (!function_exists('check_link')) {
	function check_link($segment) {
		if ($segment == null and request()->segment(2) == null) {
			return false;
		} elseif (preg_match('/'.$segment.'/i', request()->segment(2))) {
				if ($segment != null) {
					return true;
				}
		}
}
}
if (!function_exists('getUserIP')) {
	function getUserIP()
	{
			// Get real visitor IP behind CloudFlare network
			if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
							$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
							$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			}
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];

			if(filter_var($client, FILTER_VALIDATE_IP))
			{
					$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
					$ip = $forward;
			}
			else
			{
					$ip = $remote;
			}

			return $ip;
	}
}


if (!function_exists('CartCount')) {
	function CartCount(){

		$Cart = Cart::where('ip' , getUserIP() )->with('Product')->get();

		return $Cart->count();
	}
}


if (!function_exists('getYoutubeEmbedUrl')) {
	function getYoutubeEmbedUrl($url){
		if($url != null){
			$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
			$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
			$youtube_id = '';
			if (preg_match($longUrlRegex, $url, $matches)) {
					$youtube_id = $matches[count($matches) - 1];
			}
			if (preg_match($shortUrlRegex, $url, $matches)) {
					$youtube_id = $matches[count($matches) - 1];
			}
			if($youtube_id != null){
				return 'https://www.youtube.com/embed/' . $youtube_id ;
			}
		}
		return '';
	}
}

if (!function_exists('getYoutubeIdUrl')) {
	function getYoutubeIdUrl($url){
		$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
		$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

		if (preg_match($longUrlRegex, $url, $matches)) {
				$youtube_id = $matches[count($matches) - 1];
		}

		if (preg_match($shortUrlRegex, $url, $matches)) {
				$youtube_id = $matches[count($matches) - 1];
		}
		return  $youtube_id ;
	}
}



////// Admin Url Function /////////////////////

if (!function_exists('l')) {
	function l($obj) {
		if (app('l') == 'ar') {
			return $obj.'_ar';
		} elseif (app('l') == 'en') {
			return $obj.'_en';
		}
	}
}




////// Front Url Function /////////////////////
if (!function_exists('active_link_f')) {
	function active_link_f($segment, $class = null) {
		if ($segment == null and request()->segment(1) == null) {
			return $class;
		} elseif (preg_match('/'.$segment.'/i', request()->segment(1))) {
			if ($class != null || $class != 'block') {
				if ($segment != null) {
					return $class;
				}
			} else {
				if ($class == 'block') {
					return 'display:block';
				} else {
					return 'display:none';
				}
			}
		}
	}
}