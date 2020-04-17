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
* Administration 
*
*/

Route::get('admin/', 'admin@index')->middleware('onlyAdmin'); // Index
Route::get('admin/perm/', 'admin@permission')->middleware('onlyAdmin');
Route::post('admin/activate', 'admin@activate')->middleware('onlyAdmin');
Route::post('admin/deactivate', 'admin@deactivate')->middleware('onlyAdmin');






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
Route::get('student/', 'student@index')->middleware('onlyStudent'); // Get Detail
Route::get('student/syllabus/', 'student@syllabus')->middleware('onlyStudent'); // Get syllabus PDF
Route::get('student/notification', 'student@notification')->middleware('onlyStudent'); // Notification Board
Route::get('student/material', 'student@material')->middleware('onlyStudent'); // Video, PDF and Other Stuff To Share

/*
* Teacher Side
*/
Route::get('teacher/', 'teacher@index')->middleware('onlyTeacher');
Route::get('teacher/syllabus', 'teacher@syllabus')->middleware('onlyTeacher');
Route::get('teacher/notification', 'teacher@notification')->middleware('onlyTeacher');
Route::get('teacher/material', 'teacher@material')->middleware('onlyTeacher');


/**
*
*/




