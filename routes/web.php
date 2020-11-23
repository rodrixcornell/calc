<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
	return view('welcome');
	// return redirect()->route('home');
});

Auth::routes([
	'register' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');

// Route::group([
// 	'prefix' => 'users',
// 	'as' => 'users.',
// 	// 'namespace' => 'Admin',
// 	// 'middleware' => 'auth',
// ], function () {
// 	Route::get('profile', 'UserController@profile')->name('profile');
// 	Route::post('profile', 'UserController@update_avatar')->name('profile');
// });

Route::resources([
	'users' => UserController::class,
]);
