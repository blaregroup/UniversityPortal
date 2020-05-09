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
Auth::routes(['reset' => false]);

// Home Controller
Route::get('/home', 'HomeController@Index')->name('home');


/*
* Administration Url Section 
*/
Route::get( 'admin/', 			'AdminHandler@Index')->middleware('onlyAdmin'); // Index
Route::get( 'admin/perm/', 		'AdminHandler@permission')->middleware('onlyAdmin');
Route::get( 'admin/add/{id?}', 	'AdminHandler@AllUser')->middleware('onlyAdmin');
Route::get('admin/account', function(){
		return redirect('admin/add/1');
});
Route::match(['get','post'], 'admin/course', 	'AdminHandler@Course')->middleware('onlyAdmin');
Route::post('admin/add', 		'AdminHandler@AddUser')->middleware('onlyAdmin');
Route::post('admin/edit', 		'AdminHandler@Edit')->middleware('onlyAdmin');
Route::post('admin/activate', 	'AdminHandler@Grant')->middleware('onlyAdmin');
Route::post('admin/deactivate', 'AdminHandler@rGrant')->middleware('onlyAdmin');


/*
Notice
*/

Route::get('/notice',	'HomeController@Notice');
Route::post('/notice/create',	'HomeController@NoticeCreate');
Route::get('/notice/delete',	'HomeController@NoticeDelete');

/*
Document Uploads
*/
Route::match(['get', 'post'],'/upload','DocumentController@UploadFile')->middleware('onlyStudent');




/* 
 *  Profile management link
 */ 
Route::get('profile/', 'ProfileHandler@MineProfile'); // redirect to profile/{user_id} 
Route::get('profile/personal', 'ProfileHandler@Personal'); // personal info 
Route::get('profile/personal/edit', 'ProfileHandler@PersonalUpdate'); // personal info
Route::post('profile/personal/edit', 'ProfileHandler@SaveChange'); // Saved
Route::get('profile/{user}', 'ProfileHandler@Index'); // Get details
Route::match(['get','post'], '/message','Message@Index')->middleware('onlyStudent');

// *  Student Side
Route::get('student/', 'StudentHandler@Index')->middleware('onlyStudent'); // Get Detail
Route::get('student/course/', 'StudentHandler@course')->middleware('onlyStudent'); // Get syllabus PDF
Route::match(['get','post'],'student/account', 'StudentHandler@AccountUpdate')->middleware('onlyStudent'); // Notification Board
Route::get('student/material', 'StudentHandler@Material')->middleware('onlyStudent'); // Video, PDF and Other Stuff To Share


// Teacher Side
Route::get('teacher/', 'TeacherHandler@Index')->middleware('onlyTeacher');
Route::get('teacher/syllabus', 'TeacherHandler@syllabus')->middleware('onlyTeacher');
Route::match(['get','post'],'teacher/account', 'TeacherHandler@AccountUpdate')->middleware('onlyTeacher');



