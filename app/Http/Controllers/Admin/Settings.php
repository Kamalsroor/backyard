<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;

class Settings extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$rules = [
			// 'sitename_ar'    => 'required',
			'sitename_en'    => 'required',
			// 'sitename_fr'    => 'required',
			'email'          => 'required',
			'logo'           => 'sometimes|nullable|' . it()->image(),
			'icon'           => 'sometimes|nullable|' . it()->image(),
			'system_status'  => '',
			'system_message' => '',
			'address' => '',
			'phone' => '',
			'whats_number' => '',
			'discover_me_titel' => '',
			'discover_me_video' => '',
			'discover_me_photo' => '',
			'discover_me_des' => 'sometimes|nullable',
			'home_title' => 'sometimes|nullable|max:150',
			'our_service_des' => 'sometimes|nullable',
			'properties_des' => 'sometimes|nullable',
			'home_des' => 'sometimes|nullable',
			'blog_des' => 'sometimes|nullable',
			'team_des' => 'sometimes|nullable',
			'footer_des' => 'sometimes|nullable',
			'map' => 'sometimes|nullable|max:600',
			'trainees' => '',
			'lectures' => '',
			'events' => '',
			'company' => '',
			'personal_information' => '',
			'facebook' => '',
			'twitter' => '',
			'instagram' => '',
			'about_me_facebook' => '',
			'about_me_twitter' => '',
			'about_me_instagram' => '',
			'about_me_youtube' => '',
			'linkedin' => '',
			'youtube' => '',
			'privacy_policy' => '',
			'refund_policy' => '',
			'legal_trademark_and_copyright' => '',
			'terms_of_use' => '',
			'home_photo' => 'sometimes|nullable|' . it()->image(),
			'event_photo' => 'sometimes|nullable|' . it()->image(),
			'about_video' => 'sometimes|nullable|' . it()->video(),
			'our_courses_photo' => 'sometimes|nullable|' . it()->image(),
			'about_me_photo' => 'sometimes|nullable|' . it()->image(),
			'about_company_photo' => 'sometimes|nullable|' . it()->image(),
			'about_info' => '',
			'opening_hours' => '',
			'about_company' => '',
			'register_img' => 'sometimes|nullable|' . it()->image(),
			'experts_in_img' => 'sometimes|nullable|' . it()->image(),
			'free_lessons_img' => 'sometimes|nullable|' . it()->image(),
			'our_clients_img' => 'sometimes|nullable|' . it()->image(),
			'courses_img' => 'sometimes|nullable|' . it()->image(),
			'cart_img' => 'sometimes|nullable|' . it()->image(),
			'mail_img' => 'sometimes|nullable|' . it()->image(),
		];


		$data = $this->validate(request(), $rules, [], [
			// 'sitename_ar'    => trans('admin.sitename_ar'),
			'sitename_en'    => trans('admin.sitename_en'),
			// 'sitename_fr'    => trans('admin.sitename_fr'),
			'email'          => trans('admin.email'),
			'logo'           => trans('admin.logo'),
			'icon'           => trans('admin.icon'),
			'system_status'  => trans('admin.system_status'),
			'system_message' => trans('admin.system_message'),
		]);
		if (request()->hasFile('logo')) {
			$data['logo'] = it()->upload('logo', 'setting');
		}
		if (request()->hasFile('icon')) {
			$data['icon'] = it()->upload('icon', 'setting');
		}
		if (request()->hasFile('home_photo')) {
			$data['home_photo'] = it()->upload('home_photo', 'setting');
		}
		if (request()->hasFile('event_photo')) {
			$data['event_photo'] = it()->upload('event_photo', 'setting');
		}
		if (request()->hasFile('our_courses_photo')) {
			$data['our_courses_photo'] = it()->upload('our_courses_photo', 'setting');
		}
		if (request()->hasFile('discover_me_photo')) {
			$data['discover_me_photo'] = it()->upload('discover_me_photo', 'setting');
		}

		if (request()->hasFile('about_video')) {
			$data['about_video'] = it()->upload('about_video', 'setting');
		}

		if (request()->hasFile('about_me_photo')) {
			$data['about_me_photo'] = it()->upload('about_me_photo', 'setting');
		}
		if (request()->hasFile('about_company_photo')) {
			$data['about_company_photo'] = it()->upload('about_company_photo', 'setting');
		}
		if (request()->hasFile('register_img')) {
			$data['register_img'] = it()->upload('register_img', 'setting');
		}
		if (request()->hasFile('cart_img')) {
			$data['cart_img'] = it()->upload('cart_img', 'setting');
		}
		if (request()->hasFile('mail_img')) {
			$data['mail_img'] = it()->upload('mail_img', 'setting');
		}

		if (request()->hasFile('experts_in_img')) {
			$data['experts_in_img'] = it()->upload('experts_in_img', 'setting');
		}
		if (request()->hasFile('free_lessons_img')) {
			$data['free_lessons_img'] = it()->upload('free_lessons_img', 'setting');
		}
		if (request()->hasFile('our_clients_img')) {
			$data['our_clients_img'] = it()->upload('our_clients_img', 'setting');
		}
		if (request()->hasFile('courses_img')) {
			$data['courses_img'] = it()->upload('courses_img', 'setting');
		}
		if (request()->hasFile('opening_hours')) {
			$data['opening_hours'] = json_encode($data['opening_hours']);
		}

		

		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated'));
		return redirect(aurl('settings'));
	}
}
