<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@home');
Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('pricing', 'App\Http\Controllers\HomeController@pricing');

Route::get('signup', 'App\Http\Controllers\SignupController@signup');
Route::post('signup', 'App\Http\Controllers\SignupController@do_signup')->name('signup');
Route::get('signup/checkUsername/{username}', 'App\Http\Controllers\SignupController@checkUsername');
Route::get('signup/checkEmail/{email}', 'App\Http\Controllers\SignupController@checkEmail');

Route::get('login', 'App\Http\Controllers\LoginController@login');
Route::post('login', 'App\Http\Controllers\LoginController@do_login')->name('login');

Route::get('profile', 'App\Http\Controllers\ProfileController@profile');
Route::post('upload-file', 'App\Http\Controllers\ProfileController@uploadFile');
Route::get('library', 'App\Http\Controllers\ProfileController@library');
Route::get('favourites-library', 'App\Http\Controllers\ProfileController@favouritesLibrary');
Route::get('search-files/{search}', 'App\Http\Controllers\ProfileController@searchFiles');
Route::get('open-file/{id}', 'App\Http\Controllers\ProfileController@openFile');
Route::delete('delete-file/{id}', 'App\Http\Controllers\ProfileController@deleteFile');
Route::post('store-review', 'App\Http\Controllers\ProfileController@storeReview')->name('store-review');
Route::post('upload-note', 'App\Http\Controllers\ProfileController@uploadNote')->name('upload-note');
Route::get('delete-note/{id}', 'App\Http\Controllers\ProfileController@deleteNote');
Route::get('favourite/{id}', 'App\Http\Controllers\ProfileController@addToFavourite');
Route::get('is-favourite/{id}', 'App\Http\Controllers\ProfileController@isFavourite');
Route::delete('delete-favourite/{id}', 'App\Http\Controllers\ProfileController@deleteFavourite');

Route::get('logout', 'App\Http\Controllers\ProfileController@logout')->name('logout');

Route::get('checkout/{plan_name}', 'App\Http\Controllers\PlanController@auth');
Route::post('payment', 'App\Http\Controllers\PlanController@payment')->name('payment');

Route::get('delete-account', 'App\Http\Controllers\AccountController@deleteAccount');
Route::get('modify-account/{par}', 'App\Http\Controllers\AccountController@modifyAccount');
Route::post('change-username', 'App\Http\Controllers\AccountController@changeUsername')->name('change-username');
Route::post('change-password', 'App\Http\Controllers\AccountController@changePassword')->name('change-password');