<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function (){
    return redirect('/guest/general');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/addnewpost','App\Http\Controllers\UserController@showNewPostForm')->name('user.newpost');
    Route::post('/user/createpost','App\Http\Controllers\UserController@create')->name('user.createpost');
    Route::get('/user/editpost/{post_id}','App\Http\Controllers\UserController@edit')->name('user.post.edit');
    Route::get('/user/deletepost/{post_id}','App\Http\Controllers\UserController@destroy')->name('user.post.delete');
    Route::post('/user/editpost','App\Http\Controllers\UserController@update')->name('user.editpost');
    Route::get('/user/home','App\Http\Controllers\UserController@index');
});


