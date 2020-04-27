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
    return view('welcome');
 });

// about page
Route::get('/about', function () {
    return view('about');
 });

// contact page
Route::get('/contact', function () {
    return view('contact');
 });

// Login route
Auth::routes();

// Home Controller
Route::get('/home', 'HomeController@index')->name('home');


/**
*
* Administration Url Section 
*
*/
Route::get( 'admin/', 			'AdminHandler@index')->middleware('onlyAdmin'); // Index
Route::get( 'admin/perm/', 		'AdminHandler@permission')->middleware('onlyAdmin');
Route::get( 'admin/add/{id?}', 	'AdminHandler@AllUser')->middleware('onlyAdmin');
//Route::post('admin/add', 		'AdminHandler@AddUser')->middleware('onlyAdmin');
//Route::post('admin/edit', 		'AdminHandler@edit')->middleware('onlyAdmin');
Route::post('admin/activate', 	'AdminHandler@Grant')->middleware('onlyAdmin');
Route::post('admin/deactivate', 'AdminHandler@rGrant')->middleware('onlyAdmin');






/* 
 * 
 *  Profile management link
 * 
 *  
Route::get('profile/', 'profile@mine_profile'); // Check Auth and Transfer User to its User Id
Route::get('profile/{user}', 'profile@index'); // Get details
Route::get('profile/{user}/personal', 'profile@personal'); // personal info 
Route::get('profile/{user}/personal/edit', 'profile@personal_update'); // personal info
Route::post('profile/{user}/personal/edit', 'profile@save_changes'); // Saved


 *  Student Side
Route::get('student/', 'student@index')->middleware('onlyStudent'); // Get Detail
Route::get('student/syllabus/', 'student@syllabus')->middleware('onlyStudent'); // Get syllabus PDF
Route::get('student/notification', 'student@notification')->middleware('onlyStudent'); // Notification Board
Route::get('student/material', 'student@material')->middleware('onlyStudent'); // Video, PDF and Other Stuff To Share


* Teacher Side
Route::get('teacher/', 'teacher@index')->middleware('onlyTeacher');
Route::get('teacher/syllabus', 'teacher@syllabus')->middleware('onlyTeacher');
Route::get('teacher/notification', 'teacher@notification')->middleware('onlyTeacher');
Route::get('teacher/material', 'teacher@material')->middleware('onlyTeacher');


*
*/




