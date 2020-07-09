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
// Auth::routes();

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
	Route::post('admin/change-session/status', 'Session\SessionController@changeStatus')->name('admin.changeStatus.session');
	Route::post('admin/delete/session', 'Session\SessionController@deleteSession')->name('admin.deleteSession');

	// Manage Course Types
	Route::get('admin/manage/course-type', 'CourseType\CourseTypeController@index')->name('admin.manage.courseTypes');
	Route::post('admin/create/course-type', 'CourseType\CourseTypeController@createCourseType')->name('admin.manage.createCourseType');
	Route::post('admin/update/course-type', 'CourseType\CourseTypeController@updateCourseType')->name('admin.manage.updateCourseType');
	Route::post('
		admin/change-status/course-type', 
		'CourseType\CourseTypeController@changeStatus'
	)->name('admin.manage.changeStatus.courseType');
	Route::post('admin/delete/course-type','CourseType\CourseTypeController@deleteCourseType')->name('admin.manage.deleteCourseType');

	// Manage Course Level
	Route::get('admin/manage/course-level', 'CourseLevel\CourseLevelController@index')->name('admin.manageSession');
	Route::post('admin/create/course-level', 'CourseLevel\CourseLevelController@createCourseLevel')->name('admin.createCourseLevel');
	Route::post('admin/update/course-level', 'CourseLevel\CourseLevelController@updateCourseLevel')->name('admin.updateCourseLevel');
	Route::post('admin/change-status/course-level', 'CourseLevel\CourseLevelController@changeStatus')->name('admin.changeStatus.courseLevel');
	Route::post('admin/change-status/course-level', 'CourseLevel\CourseLevelController@deleteCourseLevel')->name('admin.deleteCourseLevel');

	// Course Management 
	Route::get('admin/manage/course', 'Course\CourseController@index')->name('admin.manageCourse');
	Route::post('admin/create/course', 'Course\CourseController@createCourse')->name('admin.createCourse');
	Route::post('admin/update/course', 'Course\CourseController@updateCourse')->name('admin.updateCourse');
	Route::post('admin/change-status/course', 'Course\CourseController@changeStatus')->name('admin.changeStatus.course');
	Route::post('admin/delete/course', 'Course\CourseController@deleteCourse')->name('admin.deleteCourse');

	// Manage University
	Route::get('admin/manage/university', 'University\UniversityController@index')->name('admin.manageUniversity');
	Route::post('admin/create/university', 'University\UniversityController@createUniversity')->name('admin.createUniversity');
	Route::post('admin/update/university', 'University\UniversityController@updateUniversity')->name('admin.updateUniversity');
	Route::post('admin/change-status/university', 'University\UniversityController@changeStatus')->name('admin.changeStatus.university');
	Route::post('admin/delete/university', 'University\UniversityController@deleteUniversity')->name('admin.deleteUniversity');

	// Coupon Management
	Route::get('admin/manage/coupons', 'Coupon\CouponController@index')->name('admin.manageCoupon');
	Route::post('admin/create/coupons', 'Coupon\CouponController@createCoupon')->name('admin.createCoupon');
	Route::post('admin/delete/coupons', 'Coupon\CouponController@deleteCoupon')->name('admin.deleteCoupon');

	// Stream Management
	Route::get('admin/manage/stream', 'Stream\StreamController@index')->name('admin.manageStream');
	Route::post('admin/create/stream', 'Stream\StreamController@createStream')->name('admin.createStream');
	Route::post('admin/update/stream', 'Stream\StreamController@updateStream')->name('admin.updateStream');
	Route::post('admin/change-status/stream', 'Stream\StreamController@changeStatus')->name('admin.changeStatus.stream');
	Route::post('admin/delete/stream', 'Stream\StreamController@deleteStream')->name('admin.deleteStream');

	// Branch Management
	Route::get('admin/manage/branch', 'Branch\BranchController@index')->name('admin.manageBranch');
	Route::get('admin/add/branch', 'Branch\BranchController@addBranchView')->name('admin.addBranchView');
	Route::post('admin/create/branch', 'Branch\BranchController@createBranch')->name('admin.createBranch');
});

Route::get('logout', 'HomeController@logout')->name('logout');
