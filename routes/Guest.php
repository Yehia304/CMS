<?php

use Illuminate\Support\Facades\Route;

Route::get('/guest/general','App\Http\Controllers\GuestController@general')->name('general');
Route::get('/guest/topic/{topic_name}','App\Http\Controllers\GuestController@topics')->name('topic');
