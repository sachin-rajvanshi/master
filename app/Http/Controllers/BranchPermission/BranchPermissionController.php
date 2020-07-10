<?php

namespace App\Http\Controllers\BranchPermission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchPermissionController extends Controller
{
    /**
	* Branch Permission Management
	*
	* @category Branch Permission Management
	* @package  Branch Permission Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		// $colleges = User::with(['getState', 'getCity'])
		// 	->where('user_type', 'college')
		// 	->where('college_parent_id', \Auth::id())
		// 	->get();
		return view('admin.branch.branch_permission');
	}
}
