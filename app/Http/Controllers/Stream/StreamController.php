<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StreamController extends Controller
{
    /**
	*  Manage Stream
	*
	* @category Stream  Management
	* @package  Stream  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$datas = Stream::get();
		return view('admin.manage_stream', compact('datas'));
	}

	/**
	*  Create Stream
	*
	* @category Stream  Management
	* @package  Stream  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function createStream(Request $request) {
		$request->validate(
			[
				'stream' => 'required|max:100'
			]
		);
		Stream::create(
			[
				'stream' => $request->stream
			]
		);
		return redirect('admin/manage/stream')->with('success', 'Stream created successfully.');
	}

	/**
	*  Update Stream
	*
	* @category Stream  Management
	* @package  Stream  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateStream(Request $request) {
		$request->validate(
			[
				'edit_stream' => 'required|max:100'
			]
		);
		$picked = Stream::find($request->id);
		$picked->update(
			[
				'stream' => $request->edit_stream
			]
		);
		return redirect('admin/manage/stream')->with('success', 'Stream updated successfully.');
	}

	/**
	*  Change Status of Stream
	*
	* @category Stream  Management
	* @package  Stream  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function changeStatus(Request $request) {
		$picked = Stream::find($request->id);
		$status = $picked->status == 'Yes' ? 'No' : 'Yes';
		$picked->update(
			[
				'status' => $status
			]
		);
		return $status;
	}

	/**
	*  Delete Stream
	*
	* @category Stream  Management
	* @package  Stream  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteStream(Request $request) {
		$picked = Stream::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}
}
