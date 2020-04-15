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


// homepage
Route::get('/', function () {
    return view('whoareyou');
 });

// route
Auth::routes();

// Home Controller
Route::get('/home', 'HomeController@index')->name('home');


/** 
 * 
 *  Profile management link
 * 
 * */ 
Route::get('profile/{user}', 'profile@index'); // Get details
Route::get('profile/{user}/personal', 'profile@personal'); // personal info 
Route::get('profile/{user}/personal/edit', 'profile@personal_update'); // personal info


/**
 *  Student Side
 */
Route::get('student/', 'student@index'); // Get Detail
Route::get('student/syllabus/', 'student@syllabus'); // Get syllabus PDF
Route::get('student/notification', 'student@notification'); // Notification Board
Route::get('student/material', 'student@material'); // Video, PDF and Other Stuff To Share

/*
* Teacher Side
*/
Route::get('teacher/', 'teacher@index');
Route::get('teacher/syllabus', 'teacher@syllabus');
Route::get('teacher/notification', 'teacher@notification');
Route::get('teacher/material', 'teacher@material');


/**
*
*/




