<?php

namespace App\Http\Controllers\CourseType;

use App\Models\CourseType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseTypeController extends Controller
{
    /**
	*  Course Type Management 
	*
	* @category Couser Type  Management
	* @package  Couser Type  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$datas = CourseType::get();
		return view('admin.manage_course_type', compact('datas'));
	}

	/**
	* Create Course Type 
	*
	* @category Couser Type  Management
	* @package  Couser Type  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function createCourseType(Request $request) {
		$request->validate(
			[
				'course_type' => 'required|max:150',
				'type_remark' => 'nullable|max:150'
			]
		);
		CourseType::create(
			[
				'course_type' => $request->course_type,
				'type_remark' => $request->type_remark
 			]
		);
		return redirect('admin/manage/course-type')->with('success', 'Course Type Added Successfully.');
	}

	/**
	* Update Course Type
	*
	* @category Couser Type  Management
	* @package  Couser Type  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateCourseType(Request $request) {
		$request->validate(
			[
				'course_type_new' => 'required|max:150',
				'type_remark_new' => 'nullable|max:150'
			]
		);
		$picked = CourseType::find($request->course_type_id);
		$picked->update(
			[
				'course_type' => $request->course_type_new,
				'type_remark' => $request->type_remark_new
			]
		);
		return redirect('admin/manage/course-type')->with('success', 'Course Type Updated Successfully.');
	}

	/**
	* Change Status of Course Type
	*
	* @category Couser Type  Management
	* @package  Couser Type  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function changeStatus(Request $request) {
		$picked = CourseType::find($request->id);
		$status = $picked->status == 'Yes' ? 'No' : 'Yes';
		$picked->update(
			[
				'status' => $status
			]
		);
		return $status;
	}


	/**
	* Delete Course Type
	*
	* @category Couser Type  Management
	* @package  Couser Type  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteCourseType(Request $request) {
		$picked = CourseType::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}


}
