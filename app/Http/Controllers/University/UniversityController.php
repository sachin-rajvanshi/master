<?php

namespace App\Http\Controllers\University;

use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\UniversityCourse;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    /**
	*  University Management 
	*
	* @category University Management
	* @package  University Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$datas = Course::get();
		$universities = University::with(
			[
				'getRelatedCourse' => function($q) {
					$q->with('getCourse');
				}
			]
		)->get();
		return view('admin.manage_university', compact(['datas', 'universities']));
	}

	/**
	* Create University
	*
	* @category University Management
	* @package  University Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function createUniversity(Request $request) {
		$request->validate(
			[
				'university_name' => 'required|max:150',
				'course'          => 'required_without_all'
			]
		);
		$insert = University::create(
			[
				'name' => $request->university_name,
 			]
		);
		for ($i=0; $i < count($request->course); $i++) { 
			UniversityCourse::create(
				[
					'university_id'=> $insert->id,
					'course_id'    => $request->course[$i]
				]
			);
		}
		return redirect('admin/manage/university')->with('success', 'University Added Successfully.');
	}

	/**
	* Update University Data
	*
	* @category University Management
	* @package  University Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateUniversity(Request $request) {
		$request->validate(
			[
				'up_university_name' => 'required|max:150',
				'up_course'          => 'required_without_all'
			]
		);
		$picked = University::find($request->id);
		$get_for_delete = UniversityCourse::where('university_id', $picked->id)->delete();
		$picked->update(
			[
				'name' => $request->up_university_name,
 			]
		);
		for ($i=0; $i < count($request->up_course); $i++) { 
			UniversityCourse::create(
				[
					'university_id'=> $picked->id,
					'course_id'    => $request->up_course[$i]
				]
			);
		}
		return redirect('admin/manage/university')->with('success', 'University Updated Successfully.');
	}

	/**
	* Change Status of University
	*
	* @category University Management
	* @package  University Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function changeStatus(Request $request) {
		$picked = University::find($request->id);
		$status = $picked->status == 'Yes' ? 'No' : 'Yes';
		$picked->update(
			[
				'status' => $status
			]
		);
		return $status;
	}

	/**
	* Delete University
	*
	* @category University Management
	* @package  University Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteUniversity(Request $request) {
		$picked = University::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}

}
