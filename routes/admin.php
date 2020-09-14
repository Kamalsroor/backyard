<?php

/*
|--------------------------------------------------------------------------
| Web Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

app()->singleton('admin', function () {
	return 'admin';
});

\L::Panel(app('admin')); /// Set Lang redirect to admin
\L::LangNonymous(); // Run Route Lang 'namespace' => 'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {

	Route::get('theme/{id}', 'Admin\Dashboard@theme');
	Route::group(['middleware' => 'admin_guest'], function () {

		Route::get('login', 'Admin\AdminAuthenticated@login_page');
		Route::post('login', 'Admin\AdminAuthenticated@login_post');

		Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
		Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
		Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
	});
	/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		| Do not delete any written comments in this file
		| These comments are related to the application (it)
		| If you want to delete it, do this after you have finished using the application
		| For any errors you may encounter, please go to this link and put your problem
		| phpanonymous.com/it/issues
		 */

	Route::group(['middleware' => 'admin:admin'], function () {
		//////// Admin Routes /* Start */ //////////////
		Route::get('/', 'Admin\Dashboard@home');
		Route::any('logout', 'Admin\AdminAuthenticated@logout');

		Route::get('account', 'Admin\AdminAuthenticated@account');
		Route::get('translate', 'Admin\LabelsController@index');
		Route::post('translate', 'Admin\LabelsController@store')->name('labels.store');
		Route::get('translate/edit/{key}', 'Admin\LabelsController@edit')->name('labels.edit');


		Route::post('account', 'Admin\AdminAuthenticated@account_post');
		Route::resource('settings', 'Admin\Settings');


		Route::resource('about', 'Admin\AboutController');
		Route::post('about/multi_delete', 'Admin\AboutController@multi_delete');
		Route::resource('properties','Admin\PropertiesController'); 
Route::post('properties/multi_delete','Admin\PropertiesController@multi_delete'); 
				Route::resource('places','Admin\PlacesController'); 
Route::post('places/multi_delete','Admin\PlacesController@multi_delete'); 
				Route::resource('blog','Admin\BlogController'); 
Route::post('blog/multi_delete','Admin\BlogController@multi_delete'); 
				Route::resource('team','Admin\TeamController'); 
Route::post('team/multi_delete','Admin\TeamController@multi_delete'); 
				Route::resource('brands','Admin\BrandsController'); 
Route::post('brands/multi_delete','Admin\BrandsController@multi_delete'); 
				Route::resource('services','Admin\ServicesController'); 
Route::post('services/multi_delete','Admin\ServicesController@multi_delete'); 
				//////// Admin Routes /* End */ //////////////



	});
});
