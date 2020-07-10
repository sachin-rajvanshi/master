<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageAdmissionController extends Controller
{
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
		return view('admission.manage_admissions');
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
	public function studentProfile() {
		return view('admission.view_student_info');
	}
}
