<?php

namespace App\Http\Controllers\Admission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
	/**
	* Admission Form
	*
	* @category Admission  Management
	* @package  Admission  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
    public function index() {
    	return view('admission.admission_form');
    }

    /**
	* Create Admission
	*
	* @category Admission  Management
	* @package  Admission  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
    public function createAdmission(Request $request) {
    	$request->validate(
    		[
    			'profile_pic'                   => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
		    	'college_enrollment_number'     => 'required|numeric|digits_between:5,20',
		    	'university_enrollment_number'  => 'required|numeric|digits_between:5,20',
		    	'first_name'                    => 'required|max:100',
		    	'middle_name'                   => 'required|max:100',
		    	'last_name'                     => 'required|max:100',
		    	'dob'                           => 'required|date_format:Y-m-d',
		    	'mobile_number'                 => 'required|numeric|digits:10',
		    	'email'                         => 'required|email',
		    	'gender'                        => 'required',
		    	'category_id'                   => 'required',
		    	'current_address'               => 'required|max:250',
		    	'id_type'                       => 'required',
		    	'id_number'                     => 'required|max:100',
		    	'nationality'                   => 'required|max:100',
		    	'state_id'                      => 'required',
		    	'city_id'                       => 'required',
		    	'pin_code'                      => 'required|numeric|digits:6',
		    	'father_name'                   => 'required|max:100',
		    	'father_mobile_number'          => 'required|numeric|digits:10',
		    	'father_occupation'             => 'required|max:100',
		    	'mother_name'                   => 'required|max:100',
		    	'mother_mobile_number'          => 'nullable|numeric|digits:10',
		    	'mother_occupation'             => 'required|max:100',
		    	'high_school_passing_year'      => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
		    	'high_school_passing_board'     => 'required|max:100',
		    	'high_school_percentage'        => 'required|integer|digits_between:1,3',
		    	'high_school_file'              => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
		    	'sr_secondry_passing_year'      => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
		    	'sr_secondry_passing_board'     => 'required|max:100',
		    	'sr_secondry_percentage'        => 'required|integer|digits_between:1,3',
		    	'sr_secondry_file'              => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
		    	'graduation_passing_year'       => 'nullable|digits:4|integer|min:1900|max:'.(date('Y')+1),
		    	'graduation_passing_board'      => 'nullable|max:100',
		    	'graduation_percentage'         => 'nullable|integer|digits_between:1,3',
		    	'graduation_file'               => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
		    	'post_graduation_passing_year'  => 'nullable|digits:4|integer|min:1900|max:'.(date('Y')+1),
		    	'post_graduation_passing_board' => 'nullable|max:100',
		    	'post_graduation_percentage'    => 'nullable|integer|digits_between:1,3',
		    	'post_graduation_file'          => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
		    	'm_phil_passing_year'           => 'nullable|digits:4|integer|min:1900|max:'.(date('Y')+1), 
		    	'm_phil_passing_board'          => 'nullable|max:100',          
		    	'm_phil_percentage'             => 'nullable|integer|digits_between:1,3',
		    	'm_phil_file'                   => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
		    	'course_id'                     => 'required',
		    	'branch_id'                     => 'required',
		    	'study_mode_id'                 => 'required',
		    	'mode_of_entry_id'              => 'required',
		    	'university_id'                 => 'required',
		    	'session_id'                    => 'required',
		    	'mode_of_study_id'              => 'required',
		    	'consultant_code'               => 'required|max:50',
		    	'consultant_name'               => 'required|max:100',
		    	'consultant_mobile_number'      => 'required|numeric|digits:10',
		    	'consultant_address'            => 'required|max:250'
		    	'admission_fees'                => 'required|integer|digits_between:1,10',
		    	'aadhar_card'                   => 'required|integer|digits:12',
		    	'signature'                     => 'required|mimes:jpeg,jpg,png|max:2048',
		    	'course_completion_id'          => 'required'
    		]
    	);
    }
}
