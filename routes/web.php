<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::namespace('Frontend')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('/', 'HomeController@Home');
    Route::get('events-details', 'HomeController@EventsDetails');
    Route::get('privacy-policy', 'HomeController@PrivacyPolicy');
    Route::get('refund-policy', 'HomeController@RefundPolicy');
    Route::get('terms-use', 'HomeController@TermsOfUse');
    Route::get('legal-trademark', 'HomeController@LegalTrademarkAndCopyright');
    Route::get('about-us', 'HomeController@AboutUs');
    Route::get('free-lessons', 'HomeController@FreeLessons');
    Route::get('our-courses', 'HomeController@ourCourses');
    Route::get('our-courses/{id}', 'HomeController@Course');
    Route::get('register', 'HomeController@CourseRegister');
    Route::post('register', 'HomeController@Registered');
    Route::get('our-clients', 'HomeController@ourClients');
    Route::get('experts-in', 'HomeController@expertsIn');
    Route::get('product', 'HomeController@ProductPage');
    Route::get('product-list', 'HomeController@ProductList');
    Route::get('product/{id}', 'HomeController@ProductView');
    Route::post('events-check/{id}', 'HomeController@EventCheck')->name('event.check');
    Route::post('add-cart/{id}', 'HomeController@AddCart')->name('add.cart');
    Route::post('delete-cart/{id}', 'HomeController@deleteCart')->name('delete.cart');
    Route::post('get-in-touch', 'HomeController@getInTouch')->name('getInTouch');
    Route::get('cart', 'HomeController@cart');
    Route::get('free-lessons-list/{id}', 'HomeController@FreeLessonsList');
    Route::post('search', 'HomeController@Search');
    Route::get('storage-link', function () {
        Artisan::call("storage:link");

        return 'Hello World';
    });
    
    Route::get('migrate-fersh', function () {
        Artisan::call("migrate:fresh");
        Artisan::call("db:seed");
        return 'Hello World';
    });


    
    
});

