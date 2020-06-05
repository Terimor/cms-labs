<?php

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

Route::get('/blogs/{blog?}', '\App\Http\Controllers\Blogs@show');

Route::get('admin/blogs/{blog?}', '\App\Http\Controllers\Blogs@adminShow');
Route::get('admin/blogs/delete/{blog}', '\App\Http\Controllers\Blogs@delete');
Route::get('admin/blogs/edit/{blog?}', '\App\Http\Controllers\Blogs@edit');

Route::post('admin/blogs/edit/{blog?}', '\App\Http\Controllers\Blogs@save');
