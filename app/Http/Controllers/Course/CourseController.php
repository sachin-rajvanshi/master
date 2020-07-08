<?php

namespace App\Http\Controllers\Course;

use App\Models\Stream;
use App\Models\Course;
use App\Models\CourseWise;
use App\Models\CourseLevel;
use App\Models\CourseType;
use Illuminate\Http\Request;
use App\Models\CourseDuration;
use App\Http\Controllers\Controller;

class CourseController extends Controller
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
		$data['course_wises']     = CourseWise::get();
		$data['course_durations'] = CourseDuration::get();
		$data['course_levels']    = CourseLevel::where('status', 'Yes')->get();
		$data['course_types']     = CourseType::where('status', 'Yes')->get();
		$data['streams']          = Stream::where('status', 'Yes')->get();
		$data['courses']          = Course::with(['getCourseWise','getCourseDuration', 'getCourseType', 'getCourseLevel'])->get();
		return view('admin.manage_course', compact('data'));
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
	public function createCourse(Request $request) {
		$request->validate(
			[
				'course_name'     => 'required|max:150',
				'course_code'     => 'required|max:150',
				'course_wise'     => 'required',
				'course_duration' => 'required',
				'course_type'     => 'required',
				'course_level'    => 'required',
				'stream'          => 'required',
				'admission_fees'  => 'required|digits_between:1,15',
				'course_fees'     => 'required|digits_between:1,15',
				'exam_fees'       => 'required|digits_between:1,15',
				'itp_fees'        => 'required|digits_between:1,15',
				'late_fees'       => 'required|digits_between:1,15',
				'deposit_fees'    => 'required|digits_between:1,15',
				'hostel_facility' => 'required',
				'hostel_fees'     => 'required|digits_between:1,15',
				'other_fees'      => 'required|digits_between:1,15',
				'other_fees_remark' => 'required|max:150'
			]
		);
		Course::create(
			[
				'course_name'        => $request->course_name,
				'course_code'        => $request->course_code,
				'course_wise_id'     => $request->course_wise,
				'course_duration_id' => $request->course_duration,
				'course_type_id'     => $request->course_type,
				'course_level_id'    => $request->course_level,
				'stream_id'          => $request->stream,
				'admission_fees'     => $request->admission_fees,
				'course_fees'        => $request->course_fees,
				'exam_fees'          => $request->exam_fees,
				'itp_fees'           => $request->itp_fees,
				'late_fees'          => $request->late_fees,
				'total_deposite_fees' => $request->deposit_fees,
				'hostel_facility'     => $request->hostel_facility,
				'hostel_fees'         => $request->hostel_fees,
				'other_fees'          => $request->other_fees,
				'other_fees_remark'   => $request->other_fees_remark,
				'status'              => 'No'
 			]
		);
		return redirect('admin/manage/course')->with('success', 'Course Added Successfully.');
	}

	/**
	* Update Course
	*
	* @category Couser Type  Management
	* @package  Couser Type  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateCourse(Request $request) {
		$request->validate(
			[
				'up_course_name'        => 'required|max:150',
				'up_course_code'        => 'required|max:150',
				'up_course_wise_id'     => 'required',
				'up_course_duration_id' => 'required',
				'up_course_type_id'     => 'required',
				'up_course_level_id'    => 'required',
				'up_stream'             => 'required',
				'up_admission_fees'     => 'required|digits_between:1,15',
				'up_course_fees'        => 'required|digits_between:1,15',
				'up_exam_fees'          => 'required|digits_between:1,15',
				'up_itp_fees'           => 'required|digits_between:1,15',
				'up_late_fees'          => 'required|digits_between:1,15',
				'up_total_deposite_fees'=> 'required|digits_between:1,15',
				'up_hostel_facility'    => 'required',
				'up_hostel_fees'        => 'required|digits_between:1,15',
				'up_other_fees'         => 'required|digits_between:1,15',
				'up_other_fees_remark'  => 'required|max:150'
			]
		);
		$picked = Course::find($request->id);
		$picked->update(
			[
				'course_name'        => $request->up_course_name,
				'course_code'        => $request->up_course_code,
				'course_wise_id'     => $request->up_course_wise_id,
				'course_duration_id' => $request->up_course_duration_id,
				'course_type_id'     => $request->up_course_type_id,
				'course_level_id'    => $request->up_course_level_id,
				'stream_id'          => $request->up_stream,
				'admission_fees'     => $request->up_admission_fees,
				'course_fees'        => $request->up_course_fees,
				'exam_fees'          => $request->up_exam_fees,
				'itp_fees'           => $request->up_itp_fees,
				'late_fees'          => $request->up_late_fees,
				'total_deposite_fees' => $request->up_total_deposite_fees,
				'hostel_facility'     => $request->up_hostel_facility,
				'hostel_fees'         => $request->up_hostel_fees,
				'other_fees'          => $request->up_other_fees,
				'other_fees_remark'   => $request->up_other_fees_remark,
				'status'              => 'No'
 			]
		);
		return redirect('admin/manage/course')->with('success', 'Course Updated Successfully.');
	}

	/**
	* Change Status of Course 
	*
	* @category Couser  Management
	* @package  Couser  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function changeStatus(Request $request) {
		$picked = Course::find($request->id);
		$status = $picked->status == 'Yes' ? 'No' : 'Yes';
		$picked->update(
			[
				'status' => $status
			]
		);
		return $status;
	}

	/**
	* Delete Course
	*
	* @category Couser  Management
	* @package  Couser  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteCourse(Request $request) {
		$picked = Course::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}

}
