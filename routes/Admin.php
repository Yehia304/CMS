<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function (){
    Route::get('/admin','App\Http\Controllers\AdminController@index');
    Route::get('/admin/adduser','App\Http\Controllers\AdminController@adduser')->name('admin.add.blogger');
    Route::get('/admin/userposts/{user_id}','App\Http\Controllers\AdminController@showuserposts')->name('user.posts');
    Route::post('/admin/createblogger','App\Http\Controllers\AdminController@createuser')->name('admin.create.blogger');
});
