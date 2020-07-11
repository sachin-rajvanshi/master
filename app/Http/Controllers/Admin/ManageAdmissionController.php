<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\City;
use App\Models\State;
use App\Models\IdType;
use App\Models\Course;
use App\Models\Session;
use App\Models\Category;
use App\Models\Admission;
use App\Models\FeeHistory;
use App\Models\CourseWise;
use App\Models\University;
use App\Models\ModeOfEntry;
use App\Models\ModeOfStudy;
use App\Models\PaymentMode;
use Illuminate\Http\Request;
use App\Models\CourseCompletion;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Concern\GlobalTrait;

class ManageAdmissionController extends Controller
{
	use GlobalTrait;

    /**
	* Manage Admissions
	*
	* @category Admission  Management
	* @package  Admission  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$datas = Admission::with(
			[
				'getFees'
			]
		)->orderBy('created_at', 'DESC')->get();
		return view('admission.manage_admissions', compact('datas'));
	}

	/**
	* View Student Profile
	*
	* @category Admission  Management
	* @package  Admission  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function studentProfile($id) {
		$payment_modes     = PaymentMode::get();
    	$data              = Admission::with(['getCategory', 'getTdType', 'getState', 'getCity', 'getCourse', 'getCollege', 'getStudyMode', 'getModeOfEntry', 'getUniversity', 'getSession', 'getStudyOfMode'])->find($id);
    	return view('admission.view_student_info', compact(['data', 'payment_modes']));
	}

	public function editStudentProfile($id) {
		$data['categories']         = Category::get();
    	$data['id_types']           = IdType::get();
    	$data['states']             = State::get();
    	$data['cities']             = City::get();
    	$data['courses']            = Course::get();
    	$data['colleges']           = User::where('user_type', 'college')->get();
    	$data['study_modes']        = CourseWise::get();
    	$data['modes_of_entries']   = ModeOfEntry::get();
    	$data['universities']       = University::get();
    	$data['sessions']           = Session::get();
    	$data['mode_of_studies']    = ModeOfStudy::get();
    	$data['completion']         = CourseCompletion::get();
    	$data['admission']          = Admission::with(['getCategory', 'getTdType', 'getState', 'getCity', 'getCourse', 'getCollege', 'getStudyMode', 'getModeOfEntry', 'getUniversity', 'getSession', 'getStudyOfMode'])->find($id);
		return view('admission.edit_student', compact('data'));
	}

	public function updateStudentProfile(Request $request) {
		$request->validate(
    		[
    			'profile_pic'                   => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
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
		    	'high_school_file'              => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
		    	'sr_secondry_passing_year'      => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
		    	'sr_secondry_passing_board'     => 'required|max:100',
		    	'sr_secondry_percentage'        => 'required|integer|digits_between:1,3',
		    	'sr_secondry_file'              => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
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
		    	'consultant_address'            => 'required|max:250',
		    	'admission_fees'                => 'required|integer|digits_between:1,10',
		    	'aadhar_card'                   => 'nullable|mimes:jpeg,jpg,png|max:2048',
		    	'signature'                     => 'nullable|mimes:jpeg,jpg,png|max:2048',
		    	'course_completion_id'          => 'required'
    		],
    		[
    		],
    		[
    			'category_id' => 'category',
    			'state_id'    => 'state',
    			'city_id'     => 'city',
    			'course_id'   => 'course',
    			'branch_id'   => 'branch',
    			'study_mode_id'      => 'study mode',
    			'mode_of_entry_id'   => 'mode of entry',
    			'university_id'      => 'university',
    			'session_id'         => 'session',
    			'mode_of_study_id'   => 'mode of study',
    			'course_completion_id'=> 'course completion'
    		]
    	);
		$picked = Admission::find($request->admission_id);

		$profile_pic_url           = $this->userDocumentUpload($request, 'profile_pic', $picked->profile_pic);
		$high_school_file_url      = $this->userDocumentUpload($request, 'high_school_file', $picked->high_school_file);
		$sr_secondry_file_url      = $this->userDocumentUpload($request, 'sr_secondry_file', $picked->sr_secondry_file);
		$graduation_file_url       = $this->userDocumentUpload($request, 'graduation_file', $picked->graduation_file);
		$post_graduation_file_url  = $this->userDocumentUpload($request, 'post_graduation_file', $picked->post_graduation_file);
		$m_phil_file_url           = $this->userDocumentUpload($request, 'm_phil_file', $picked->m_phil_file);
		$aadhar_card_url           = $this->userDocumentUpload($request, 'aadhar_card', $picked->aadhar_card);
		$signature_url             = $this->userDocumentUpload($request, 'signature', $picked->signature);

		$picked->update(
			[
				'profile_pic'                   => $profile_pic_url,
		    	'college_enrollment_number'     => $request->college_enrollment_number,
		    	'university_enrollment_number'  => $request->university_enrollment_number,
		    	'first_name'                    => $request->first_name,
		    	'middle_name'                   => $request->middle_name,
		    	'last_name'                     => $request->last_name,
		    	'dob'                           => $request->dob,
		    	'mobile_number'                 => $request->mobile_number,
		    	'email'                         => $request->email,
		    	'gender'                        => $request->gender,
		    	'category_id'                   => $request->category_id,
		    	'current_address'               => $request->current_address,
		    	'id_type'                       => $request->id_type,
		    	'id_number'                     => $request->id_number,
		    	'nationality'                   => $request->nationality,
		    	'state_id'                      => $request->state_id,
		    	'city_id'                       => $request->city_id,
		    	'pin_code'                      => $request->pin_code,
		    	'father_name'                   => $request->father_name,
		    	'father_mobile_number'          => $request->father_mobile_number,
		    	'father_occupation'             => $request->father_occupation,
		    	'mother_name'                   => $request->mother_name,
		    	'mother_mobile_number'          => $request->mother_mobile_number,
		    	'mother_occupation'             => $request->mother_occupation,
		    	'high_school_passing_year'      => $request->high_school_passing_year,
		    	'high_school_passing_board'     => $request->high_school_passing_board,
		    	'high_school_percentage'        => $request->high_school_percentage,
		    	'high_school_file'              => $high_school_file_url,
		    	'sr_secondry_passing_year'      => $request->sr_secondry_passing_year,
		    	'sr_secondry_passing_board'     => $request->sr_secondry_passing_board,
		    	'sr_secondry_percentage'        => $request->sr_secondry_percentage,
		    	'sr_secondry_file'              => $sr_secondry_file_url,
		    	'graduation_passing_year'       => $request->graduation_passing_year,
		    	'graduation_passing_board'      => $request->graduation_passing_board,
		    	'graduation_percentage'         => $request->graduation_percentage,
		    	'graduation_file'               => $graduation_file_url,
		    	'post_graduation_passing_year'  => $request->post_graduation_passing_year,
		    	'post_graduation_passing_board' => $request->post_graduation_passing_board,
		    	'post_graduation_percentage'    => $request->post_graduation_percentage,
		    	'post_graduation_file'          => $post_graduation_file_url,
		    	'm_phil_passing_year'           => $request->m_phil_passing_year,
		    	'm_phil_passing_board'          => $request->m_phil_passing_board,
		    	'm_phil_percentage'             => $request->m_phil_percentage,
		    	'm_phil_file'                   => $m_phil_file_url,
		    	'course_id'                     => $request->course_id,
		    	'branch_id'                     => $request->branch_id,
		    	'study_mode_id'                 => $request->study_mode_id,
		    	'mode_of_entry_id'              => $request->mode_of_entry_id,
		    	'university_id'                 => $request->university_id,
		    	'session_id'                    => $request->session_id,
		    	'mode_of_study_id'              => $request->mode_of_study_id,
		    	'consultant_code'               => $request->consultant_code,
		    	'consultant_name'               => $request->consultant_name,
		    	'consultant_mobile_number'      => $request->consultant_mobile_number,
		    	'consultant_address'            => $request->consultant_address,
		    	'admission_fees'                => $request->admission_fees,
		    	'aadhar_card'                   => $aadhar_card_url,
		    	'signature'                     => $signature_url,
		    	'course_completion_id'          => $request->course_completion_id,
		    	'accept_terms'                  => 'Yes',
		    	'admission_mark_as'             => 'online'
			]
		);
		return redirect('admin/manage/admissions')->with('success','Record Updated Successfully.');
	}

	public function paymentHistory($id) {
		$datas = FeeHistory::where('admission_id', $id)->orderBy('created_at', 'DESC')->get();
		return view('admission.student_payment_history', compact('datas'));
	}

	public function paymentApproved(Request $request) {
		$picked = FeeHistory::find($request->id);
		$picked->update(
			[
				'action_by_admin' => 'Approved'
			]
		);
		return 'Payment Approved Successfully';
	}

	public function deletePayment(Request $request) {
		$picked = FeeHistory::find($request->id);
		$picked->delete();
		return 'History Deleted Successfully';
	}

	public function deleteAdmission(Request $request) {
		$picked = Admission::find($request->id);
		$picked->delete();
		return 'Admission Deleted Successfully';
	}

	public function offlineAdmission() {
    	$data['categories']         = Category::get();
    	$data['id_types']           = IdType::get();
    	$data['states']             = State::get();
    	$data['cities']             = City::get();
    	$data['courses']            = Course::get();
    	$data['colleges']           = User::where('user_type', 'college')->get();
    	$data['study_modes']        = CourseWise::get();
    	$data['modes_of_entries']   = ModeOfEntry::get();
    	$data['universities']       = University::get();
    	$data['sessions']           = Session::get();
    	$data['mode_of_studies']    = ModeOfStudy::get();
    	$data['completion']         = CourseCompletion::get();
    	return view('admin.offline_admission', compact('data'));
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
		    	'consultant_address'            => 'required|max:250',
		    	'admission_fees'                => 'required|integer|digits_between:1,10',
		    	'aadhar_card'                   => 'required|mimes:jpeg,jpg,png|max:2048',
		    	'signature'                     => 'required|mimes:jpeg,jpg,png|max:2048',
		    	'course_completion_id'          => 'required'
    		],
    		[
    		],
    		[
    			'category_id' => 'category',
    			'state_id'    => 'state',
    			'city_id'     => 'city',
    			'course_id'   => 'course',
    			'branch_id'   => 'branch',
    			'study_mode_id'      => 'study mode',
    			'mode_of_entry_id'   => 'mode of entry',
    			'university_id'      => 'university',
    			'session_id'         => 'session',
    			'mode_of_study_id'   => 'mode of study',
    			'course_completion_id'=> 'course completion'
    		]
    	);
		
		$profile_pic_url           = $this->userDocumentUpload($request, 'profile_pic');
		$high_school_file_url      = $this->userDocumentUpload($request, 'high_school_file');
		$sr_secondry_file_url      = $this->userDocumentUpload($request, 'sr_secondry_file');
		$graduation_file_url       = $this->userDocumentUpload($request, 'graduation_file');
		$post_graduation_file_url  = $this->userDocumentUpload($request, 'post_graduation_file');
		$m_phil_file_url           = $this->userDocumentUpload($request, 'm_phil_file');
		$aadhar_card_url           = $this->userDocumentUpload($request, 'aadhar_card');
		$signature_url             = $this->userDocumentUpload($request, 'signature');

		$createAdmission = Admission::create(
			[
				'profile_pic'                   => $profile_pic_url,
		    	'college_enrollment_number'     => $request->college_enrollment_number,
		    	'university_enrollment_number'  => $request->university_enrollment_number,
		    	'first_name'                    => $request->first_name,
		    	'middle_name'                   => $request->middle_name,
		    	'last_name'                     => $request->last_name,
		    	'dob'                           => $request->dob,
		    	'mobile_number'                 => $request->mobile_number,
		    	'email'                         => $request->email,
		    	'gender'                        => $request->gender,
		    	'category_id'                   => $request->category_id,
		    	'current_address'               => $request->current_address,
		    	'id_type'                       => $request->id_type,
		    	'id_number'                     => $request->id_number,
		    	'nationality'                   => $request->nationality,
		    	'state_id'                      => $request->state_id,
		    	'city_id'                       => $request->city_id,
		    	'pin_code'                      => $request->pin_code,
		    	'father_name'                   => $request->father_name,
		    	'father_mobile_number'          => $request->father_mobile_number,
		    	'father_occupation'             => $request->father_occupation,
		    	'mother_name'                   => $request->mother_name,
		    	'mother_mobile_number'          => $request->mother_mobile_number,
		    	'mother_occupation'             => $request->mother_occupation,
		    	'high_school_passing_year'      => $request->high_school_passing_year,
		    	'high_school_passing_board'     => $request->high_school_passing_board,
		    	'high_school_percentage'        => $request->high_school_percentage,
		    	'high_school_file'              => $high_school_file_url,
		    	'sr_secondry_passing_year'      => $request->sr_secondry_passing_year,
		    	'sr_secondry_passing_board'     => $request->sr_secondry_passing_board,
		    	'sr_secondry_percentage'        => $request->sr_secondry_percentage,
		    	'sr_secondry_file'              => $sr_secondry_file_url,
		    	'graduation_passing_year'       => $request->graduation_passing_year,
		    	'graduation_passing_board'      => $request->graduation_passing_board,
		    	'graduation_percentage'         => $request->graduation_percentage,
		    	'graduation_file'               => $graduation_file_url,
		    	'post_graduation_passing_year'  => $request->post_graduation_passing_year,
		    	'post_graduation_passing_board' => $request->post_graduation_passing_board,
		    	'post_graduation_percentage'    => $request->post_graduation_percentage,
		    	'post_graduation_file'          => $post_graduation_file_url,
		    	'm_phil_passing_year'           => $request->m_phil_passing_year,
		    	'm_phil_passing_board'          => $request->m_phil_passing_board,
		    	'm_phil_percentage'             => $request->m_phil_percentage,
		    	'm_phil_file'                   => $m_phil_file_url,
		    	'course_id'                     => $request->course_id,
		    	'branch_id'                     => $request->branch_id,
		    	'study_mode_id'                 => $request->study_mode_id,
		    	'mode_of_entry_id'              => $request->mode_of_entry_id,
		    	'university_id'                 => $request->university_id,
		    	'session_id'                    => $request->session_id,
		    	'mode_of_study_id'              => $request->mode_of_study_id,
		    	'consultant_code'               => $request->consultant_code,
		    	'consultant_name'               => $request->consultant_name,
		    	'consultant_mobile_number'      => $request->consultant_mobile_number,
		    	'consultant_address'            => $request->consultant_address,
		    	'admission_fees'                => $request->admission_fees,
		    	'aadhar_card'                   => $aadhar_card_url,
		    	'signature'                     => $signature_url,
		    	'course_completion_id'          => $request->course_completion_id,
		    	'accept_terms'                  => 'Yes',
		    	'admission_mark_as'             => 'offline',
		    	'admission_created_by'          => \Auth::id()
			]
		);
		return redirect('admin/manage/admissions')->with('success', 'Admission Created Successfully.');

	}
}
