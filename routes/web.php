<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@home');
Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('pricing', 'App\Http\Controllers\HomeController@pricing');

Route::get('signup', 'App\Http\Controllers\SignupController@signup');
Route::post('signup', 'App\Http\Controllers\SignupController@do_signup')->name('signup');

Route::get('login', 'App\Http\Controllers\LoginController@login');
Route::post('login', 'App\Http\Controllers\LoginController@do_login')->name('login');

Route::get('profile', 'App\Http\Controllers\ProfileController@profile');
Route::post('upload-file', 'App\Http\Controllers\ProfileController@uploadFile');
Route::get('library', 'App\Http\Controllers\ProfileController@library');
Route::get('search-files', 'App\Http\Controllers\ProfileController@searchFiles');
Route::get('open-file/{id}', 'App\Http\Controllers\ProfileController@openFile');
Route::delete('delete-file/{id}', 'App\Http\Controllers\ProfileController@deleteFile');
Route::post('store-review', 'App\Http\Controllers\ProfileController@storeReview')->name('store-review');
Route::post('upload-note', 'App\Http\Controllers\ProfileController@uploadNote')->name('upload-note');
Route::get('delete-note/{id}', 'App\Http\Controllers\ProfileController@deleteNote');
Route::get('favourite/{id}', 'App\Http\Controllers\ProfileController@addToFavourite');
Route::get('is-favourite/{id}', 'App\Http\Controllers\ProfileController@isFavourite');

Route::get('logout', 'App\Http\Controllers\ProfileController@logout')->name('logout');

Route::get('checkout/{plan_name}', 'App\Http\Controllers\PlanController@auth');
Route::post('payment', 'App\Http\Controllers\PlanController@payment')->name('payment');


/*
Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);
Route::get('home', [App\Http\Controllers\HomeController::class, 'home']);
Route::get('pricing', [App\Http\Controllers\HomeController::class, 'pricing']);

Route::group(['prefix' => 'signup'], function () {
    Route::get('/', [App\Http\Controllers\SignupController::class, 'signup']);
    Route::post('/', [App\Http\Controllers\SignupController::class, 'do_signup'])->name('signup');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/', [App\Http\Controllers\LoginController::class, 'do_login'])->name('login');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'profile']);
    Route::post('upload-file', [App\Http\Controllers\ProfileController::class, 'uploadFile']);
    Route::get('library', [App\Http\Controllers\ProfileController::class, 'library']);
    Route::get('search-files', [App\Http\Controllers\ProfileController::class, 'searchFiles']);
    Route::get('open-file/{id}', [App\Http\Controllers\ProfileController::class, 'openFile']);
    Route::delete('delete-file/{id}', [App\Http\Controllers\ProfileController::class, 'deleteFile']);
    Route::post('store-review', [App\Http\Controllers\ProfileController::class, 'storeReview'])->name('store-review');
    Route::post('upload-note', [App\Http\Controllers\ProfileController::class, 'uploadNote'])->name('upload-note');
    Route::get('delete-note/{id}', [App\Http\Controllers\ProfileController::class, 'deleteNote']);
    Route::get('favourite/{id}', [App\Http\Controllers\ProfileController::class, 'addToFavourite']);
    Route::get('is-favourite/{id}', [App\Http\Controllers\ProfileController::class, 'isFavourite']);
    Route::get('logout', [App\Http\Controllers\ProfileController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'checkout'], function () {
    Route::get('{plan_name}', [App\Http\Controllers\PlanController::class, 'auth']);
    Route::post('payment', [App\Http\Controllers\PlanController::class, 'payment'])->name('payment');
});
*/