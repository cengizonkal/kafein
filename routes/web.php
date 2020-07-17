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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/categories', 'Admin\CategoryController@index');
Route::post('admin/categories', 'Admin\CategoryController@store');
Route::delete('admin/categories/{category}', 'Admin\CategoryController@destroy');
Route::get('admin/categories/{category}/edit', 'Admin\CategoryController@edit');
Route::patch('admin/categories/{category}', 'Admin\CategoryController@update');
Route::get('admin/categories/create', 'Admin\CategoryController@create');

Route::get('admin/{imageable}/{id}/images', 'Admin\ImageController@index');
Route::post('admin/{imageable}/{id}/images', 'Admin\ImageController@store');
Route::delete('admin/images/{image}', 'Admin\ImageController@destroy');

