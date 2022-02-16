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


/****************************  Dashboard Routs  **************************************/


Route::namespace('BackEnd')->prefix('admin')->group(function () {
    Route::get('home', 'Home@index')->name('admin');
    Route::resource('users', 'Users')->except(['show', 'delete']);
    Route::resource('categories', 'Categories')->except(['show', 'delete']);
    Route::resource('skills', 'Skills')->except(['show', 'delete']);
    Route::resource('tags', 'Tags')->except(['show', 'delete']);
    Route::resource('pages', 'Pages')->except(['show', 'delete']);
    Route::resource('videos', 'Videos')->except(['show', 'delete']);
    Route::post('comments', 'Videos@commentsStore')->name('comments.store');
    Route::get('/delete/{id}', 'Videos@commentDelete')->name('comment.delete');
    Route::post('/update/{id}', 'Videos@commentUpdate')->name('comment.update');

    Route::resource('messages', 'Messages')->only(['index', 'destroy', 'edit']);
    Route::post('messages/replay/{id}', 'Messages@replay')->name('message.replay');


});


/****************************  FrontEnd Routs  **************************************/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('welcome','HomeController@youWelcome')->name('welcome');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tags')->name('front.tags');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('contact-us', 'HomeController@messageStore')->name('contact.store');
Route::get('/', 'HomeController@welcome')->name('frontend.landing');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');


Route::middleware('auth')->group(function () {
    Route::post('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');
});


Route::get('/', function () {
    return redirect()->route('login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
