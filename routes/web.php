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
    Route::get('/GetProperties', 'HomeController@PropertiesView');
    Route::get('/GetBlogs', 'HomeController@JsonBlogs');

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
