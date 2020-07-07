<?php

namespace App\Http\Controllers\CourseLevel;

use App\Models\CourseLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseLevelController extends Controller
{
    /**
	*  Course Level Management
	*
	* @category Course Level  Management
	* @package  Course Level  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$datas = CourseLevel::get();
		return view('admin.manage_course_level', compact('datas'));
	}

	/**
	* Create Course Type 
	*
	* @category Course Level  Management
	* @package  Course Level  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function createCourseLevel(Request $request) {
		$request->validate(
			[
				'course_level' => 'required|max:150',
				'level_remark' => 'nullable|max:150'
			]
		);
		CourseLevel::create(
			[
				'course_level' => $request->course_level,
				'level_remark' => $request->level_remark
 			]
		);
		return redirect('admin/manage/course-level')->with('success', 'Course Level Added Successfully.');
	}

	/**
	* Update Course Level
	*
	* @category Course Level  Management
	* @package  Course Level  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateCourseLevel(Request $request) {
		$request->validate(
			[
				'up_course_level' => 'required|max:150',
				'up_level_remark' => 'nullable|max:150'
			]
		);
		$picked = CourseLevel::find($request->course_level_id);
		$picked->update(
			[
				'course_level' => $request->up_course_level,
				'level_remark' => $request->up_level_remark
			]
		);
		return redirect('admin/manage/course-level')->with('success', 'Course Type Updated Successfully.');
	}

	/**
	* Change Status of Course Level
	*
	* @category Course Level  Management
	* @package  Course Level  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function changeStatus(Request $request) {
		$picked = CourseLevel::find($request->id);
		$status = $picked->status == 'Yes' ? 'No' : 'Yes';
		$picked->update(
			[
				'status' => $status
			]
		);
		return $status;
	}


	/**
	* Delete Course Level
	*
	* @category Course Level  Management
	* @package  Course Level  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteCourseLevel(Request $request) {
		$picked = CourseLevel::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}
}
