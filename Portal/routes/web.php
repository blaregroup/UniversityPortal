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
    return view('WelcomePage');
 });

// about page
Route::get('/about', function () {
    return view('AboutPage');
 });

// contact page
Route::get('/contact', function () {
    return view('ContactPage');
 });

// Login route
Auth::routes();

// Home Controller
Route::get('/home', 'HomeController@Index')->name('home');


/*
* Administration Url Section 
*/
Route::get( 'admin/', 			'AdminHandler@Index')->middleware('onlyAdmin'); // Index
Route::get( 'admin/perm/', 		'AdminHandler@permission')->middleware('onlyAdmin');
Route::get( 'admin/add/{id?}', 	'AdminHandler@AllUser')->middleware('onlyAdmin');
Route::post('admin/add', 		'AdminHandler@AddUser')->middleware('onlyAdmin');
Route::post('admin/edit', 		'AdminHandler@Edit')->middleware('onlyAdmin');
Route::post('admin/activate', 	'AdminHandler@Grant')->middleware('onlyAdmin');
Route::post('admin/deactivate', 'AdminHandler@rGrant')->middleware('onlyAdmin');


Route::match(['get', 'post'],'/upload','DocumentController@UploadFile');




/* 
 *  Profile management link
 */ 
Route::get('profile/', 'ProfileHandler@MineProfile'); // redirect to profile/{user_id} 
Route::get('profile/personal', 'ProfileHandler@Personal'); // personal info 
Route::get('profile/personal/edit', 'ProfileHandler@PersonalUpdate'); // personal info
Route::post('profile/personal/edit', 'ProfileHandler@SaveChange'); // Saved
Route::get('profile/{user}', 'ProfileHandler@Index'); // Get details

/*
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

