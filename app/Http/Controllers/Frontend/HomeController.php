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




        return view('frontend.home', ['title' => trans('frontend.Home'), 'Abouts' => $Abouts, 'Service' => $Service, 'Brand' => $Brand, 'Place' => $Place, 'Team' => $Team]);
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



    public function ProductView($id)
    {
        $Product = Product::find($id);
        // $RelatedProduct = Product::whereNot('id' , $id)->get(3);

        $RelatedProducts =  Product::where('id', '!=', $id)->inRandomOrder()->limit(5)->get(); // The amount of items you wish to receive
        return view('frontend.product', ['title' => trans('frontend.product'), 'Product' => $Product, 'RelatedProducts' => $RelatedProducts]);
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
