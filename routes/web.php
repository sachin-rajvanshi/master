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

Route::get('admin/login', 'Admin\AdminController@loginView')->name('admin.loginView');
Route::post('admin/login', 'Admin\AdminController@login')->name('admin.login');

Route::group(['middleware' => ['auth']], function () {
	Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	Route::get('admin/profile', 'Admin\AdminController@profile')->name('admin.profile');
	Route::post('admin/profile/update', 'Admin\AdminController@updateProfile')->name('admin.updateProfile');
	Route::post('admin/update/password', 'Admin\AdminController@updatePassword')->name('admin.updatePassword');

	// Manage Sessions
	Route::get('admin/manage/sessions', 'Session\SessionController@index')->name('admin.manageSession');
	Route::post('admin/create/session', 'Session\SessionController@createSession')->name('admin.createSession');
	Route::post('admin/update/session', 'Session\SessionController@updateSession')->name('admin.updateSession');
	Route::post('admin/change-session/status', 'Session\SessionController@changeStatus')->name('admin.changeStatus');
	Route::post('admin/delete/session', 'Session\SessionController@deleteSession')->name('admin.deleteSession');

	// Manage Course Types
	Route::get('admin/manage/course-type', 'CourseType\CourseTypeController@index')->name('admin.manage.courseTypes');
	Route::post('admin/create/course-type', 'CourseType\CourseTypeController@createCourseType')->name('admin.manage.createCourseType');
	Route::post('admin/update/course-type', 'CourseType\CourseTypeController@updateCourseType')->name('admin.manage.updateCourseType');
	Route::post('
		admin/change-status/course-type', 
		'CourseType\CourseTypeController@changeStatus'
	)->name('admin.manage.changeStatus');
	Route::post('admin/delete/course-type','CourseType\CourseTypeController@deleteCourseType')->name('admin.manage.deleteCourseType');

	// Manage Course Level
	Route::get('admin/manage/course-level', 'CourseLevel\CourseLevelController@index')->name('admin.manageSession');
	Route::post('admin/create/course-level', 'CourseLevel\CourseLevelController@createCourseLevel')->name('admin.createCourseLevel');
	Route::post('admin/update/course-level', 'CourseLevel\CourseLevelController@updateCourseLevel')->name('admin.updateCourseLevel');
	Route::post('admin/change-status/course-level', 'CourseLevel\CourseLevelController@changeStatus')->name('admin.changeStatus');
	Route::post('admin/change-status/course-level', 'CourseLevel\CourseLevelController@deleteCourseLevel')->name('admin.deleteCourseLevel');

	// Course Management 
	Route::get('admin/manage/course', 'Course\CourseController@index')->name('admin.manageCourse');
	Route::post('admin/create/course', 'Course\CourseController@createCourse')->name('admin.createCourse');
	Route::post('admin/update/course', 'Course\CourseController@updateCourse')->name('admin.updateCourse');
});

Route::get('logout', 'HomeController@logout')->name('logout');
