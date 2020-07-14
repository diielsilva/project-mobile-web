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

Route::get('/','UserController@showIndexPage')->name('index');
Route::get('/login','UserController@showLoginPage')->name('login_page');
Route::post('/login/confirm','UserController@loginUser')->name('login_user');
Route::get('/home','UserController@showHomePage')->name('home_page');
Route::get('/logout','UserController@logoutUser')->name('logout_user');
Route::get('/sign_up','UserController@showSignUpPage')->name('sign_up');
Route::post('/store_user','UserController@saveUserDatabase')->name('store_user');
Route::get('/form/store/post','UserController@showStorePostPage')->name('page_store');
Route::post('store/post','UserController@storePostDatabase')->name('store_post');
Route::get('/show/my_posts','UserController@showMyPosts')->name('show_myPosts');
Route::delete('/delete/{id}/{file}','UserController@deleteMyPost')->name('delete_post');
Route::get('/edit/post/{id}','UserController@showEditPage')->name('edit_page');
Route::put('/update/post/{id}','UserController@updatePostDatabase')->name('update_post');
Route::get('/home/order','UserController@orderByState')->name('order_byState');
Route::get('/details/post/{id}','UserController@detailsPost')->name('details_post');
Route::get('/details/user','UserController@detailsUser')->name('details_user');
Route::get('/edit/user','UserController@showEditUserPage')->name('edit_page');
Route::put('/update/user','UserController@updateUser')->name('update_user');