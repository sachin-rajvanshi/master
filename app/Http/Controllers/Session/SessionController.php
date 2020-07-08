<?php

namespace App\Http\Controllers\Session;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
	* Admin Session Management 
	*
	* @category Session  Management
	* @package  Session  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$datas = Session::get();
		return view('admin.manage_sessions', compact('datas'));
	}

	/**
	* Create Session Management
	*
	* @category Session  Management
	* @package  Session  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function createSession(Request $request) {
		$request->validate(
			[
				'session' => 'required|max:150'
			]
		);
		Session::create(
			[
				'session' => $request->session
			]
		);
		return redirect('admin/manage/sessions')->with('success', 'Session created successfully.');
	}

	/**
	* Update Session
	*
	* @category Session  Management
	* @package  Session  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateSession(Request $request) {
		$request->validate(
			[
				'edit_session' => 'required|max:150'
			]
		);
		$picked = Session::find($request->session_id);
		$picked->update(
			[
				'session' => $request->edit_session
			]
		);
		return redirect('admin/manage/sessions')->with('success', 'Session updated successfully.');
	}

	/**
	* Change Status of Session
	*
	* @category Session  Management
	* @package  Session  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in> 
	* @license  PHP License 7.4.0
	* @link
	*/
	public function changeStatus(Request $request) {
		$picked = Session::find($request->id);
		$status = $picked->status == 'Yes' ? 'No' : 'Yes';
		$picked->update(
			[
				'status' => $status
			]
		);
		return $status;
	}

	/**
	* Delete Session
	*
	* @category Session  Management
	* @package  Session  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteSession(Request $request) {
		$picked = Session::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}
}
