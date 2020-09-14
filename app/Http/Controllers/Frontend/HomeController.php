<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


use App\Model\About;
use App\Model\Service;
use App\Model\Brand;
use App\Model\Place;
use App\Model\Team;
use App\Model\Property;
use App\Model\Blog;

use Mail;

class HomeController extends Controller
{

    public function Home()
    {
        $Abouts = About::all();
        $Service = Service::all();
        $Brand = Brand::all();
        $Place = Place::all();
        $Team = Team::all();
        $Property = Property::orderBy('id', 'desc')->take(3)->get();
        return view('frontend.home', ['title' => trans('frontend.Home'),'Property' => $Property , 'Abouts' => $Abouts, 'Service' => $Service, 'Brand' => $Brand, 'Place' => $Place, 'Team' => $Team]);
    }


    public function PropertiesView(Request $request)
    {


        $Property = Property::where('type', $request->status)->where('place_id', $request->place_id)->paginate(6);
        return view('frontend.include.properties__carousel', ['title' => trans('frontend.product-list'), 'Property' => $Property]);
    }


    public function JsonBlogs(Request $request)
    {
        $Blogs = Blog::get();
        foreach ($Blogs as $Blog) {
            $Blog->photo = it()->url($Blog->photo);
        }
        return $Blogs;
    }


    public function Search()
    {
        $rules = [
            'trem' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'trem' => trans('admin.trem'),
        ]);

        $Courses = Course::where('titel', 'like', '%' . request()->trem . '%')->orWhere('des', 'like', '%' . request()->trem . '%')->orWhere('mini_des', 'like', '%' . request()->trem . '%')->get();
        $Products = Product::where('title', 'like', '%' . request()->trem . '%')->orWhere('des', 'like', '%' . request()->trem . '%')->orWhere('min_des', 'like', '%' . request()->trem . '%')->orWhere('features_workplace_des', 'like', '%' . request()->trem . '%')->orWhere('examine_memorable_des', 'like', '%' . request()->trem . '%')->get();

        if ($Courses->count() == 0 &&  $Products->count() == 0) {
            return redirect(url('/'))->with('error', 'No Search Found');
        }
        return view('frontend.search-page', ['title' => trans('frontend.search'), 'Courses' => $Courses, 'Products' => $Products]);
    }

    public function getInTouch()
    {
        $rules = [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|min:10|numeric',
            'subject' => 'required',
            'message' => 'required',
        ];


        $data = $this->validate(request(), $rules, [], [
            'name' => trans('admin.name'),
            'email' => trans('admin.email'),
            'phone' => trans('admin.phone'),
            'subject' => trans('admin.subject'),
            'message' => trans('admin.message'),
        ]);

        Mail::to(setting()->email)->send(new getInTouch($data));

        session()->flash('success', trans('admin.sended'));
        return redirect(url('/'));
    }



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

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }
}
