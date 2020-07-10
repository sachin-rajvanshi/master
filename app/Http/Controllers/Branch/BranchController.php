<?php

namespace App\Http\Controllers\Branch;

use App\Models\User;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Concern\GlobalTrait;

class BranchController extends Controller
{
	use GlobalTrait;

    /**
	* Branch Management
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$colleges = User::with(['getState', 'getCity'])
			->where('user_type', 'college')
			->where('college_parent_id', \Auth::id())
			->get();
		return view('admin.branch.manage_branch', compact('colleges'));
	}

	/**
	* Add Branch 
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function addBranchView() {
		$data['states'] = State::orderBy('name', 'ASC')->get();
		$data['cities'] = City::orderBy('name', 'ASC')->get();
		return view('admin.branch.add_branch', compact('data'));
	}

	/**
	* Create New Branch 
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function createBranch(Request $request) {
		$request->validate(
            [
                'branch_name'           => 'required|max:150',
                'email'                 => 'required|email|max:100|unique:users',
                'mobile_number'         => 'required|digits:10,|unique:users',
                'file'                  => 'mimes:jpeg,jpg,png|max:2048',
                'branch_address'        => 'required|max:250',
                'state_id'              => 'required',
                'city_id'               => 'required',
                'contact_person_name'   => 'nullable|max:150',
                'contact_person_mobile' => 'nullable|digits:10',
                'branch_code'           => 'required|max:50'
            ]
        );
        $image_url = $this->filesUpload($request, \Auth::user()->profile_pic);
        $create = User::create(
        	[
        		'name'                  => $request->branch_name,
        		'user_type'             => 'college',
        		'email'                 => $request->email,
        		'mobile_number'         => $request->mobile_number,
        		'profile_pic'           => $image_url,
        		'branch_address'        => $request->branch_address,
        		'state_id'              => $request->state_id,
        		'city_id'               => $request->city_id,
        		'college_parent_id'     => \Auth::id(),
        		'contact_person_name'   => $request->contact_person_name,
        		'contact_person_mobile' => $request->contact_person_mobile,
        		'branch_code'           => $request->branch_code,
        		'password'              => \Hash::make(1234567)
        	]
        );
        return redirect('admin/manage/branch')->with('success', 'College Added Successfully.');
	}

	/**
	* Edit View Branch 
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function editView($id) {
		$data['states'] = State::orderBy('name', 'ASC')->get();
		$data['cities'] = City::orderBy('name', 'ASC')->get();
		$data['college'] = User::find($id);
		return view('admin.branch.edit_branch', compact('data'));
	}

	/**
	* Update Branch 
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateBranch(Request $request) {
		$request->validate(
            [
                'branch_name'           => 'required|max:150',
                'email'                 => 'required|email|max:150|unique:users,email,'.$request->id.',id',
                'mobile_number'         => 'required|digits:10,|unique:users,mobile_number,'.$request->id,
                'file'                  => 'mimes:jpeg,jpg,png|max:2048',
                'branch_address'        => 'required|max:250',
                'state_id'              => 'required',
                'city_id'               => 'required',
                'contact_person_name'   => 'nullable|max:150',
                'contact_person_mobile' => 'nullable|digits:10',
                'branch_code'           => 'required|max:50'
            ]
        );
        $picked = User::find($request->id);
        $image_url = $this->filesUpload($request, $picked->profile_pic);
        $picked->update(
        	[
        		'name'                  => $request->branch_name,
        		'email'                 => $request->email,
        		'mobile_number'         => $request->mobile_number,
        		'profile_pic'           => $image_url,
        		'branch_address'        => $request->branch_address,
        		'state_id'              => $request->state_id,
        		'city_id'               => $request->city_id,
        		'college_parent_id'     => \Auth::id(),
        		'contact_person_name'   => $request->contact_person_name,
        		'contact_person_mobile' => $request->contact_person_mobile,
        		'branch_code'           => $request->branch_code
        	]
        );
        return redirect('admin/manage/branch')->with('success', 'College Data Updated Successfully.');
	}

	/**
	* Change Status of College
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function changeStatus(Request $request) {
		$picked = User::find($request->id);
		$status = $picked->status == 'Yes' ? 'No' : 'Yes';
		$picked->update(
			[
				'status' => $status
			]
		);
		return $status;
	}

	/**
	* Delete of College
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteBranch(Request $request) {
		$picked = User::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}

	/**
	* Update Password
	*
	* @category Branch Management
	* @package  Branch Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updatePassword(Request $request) {
		$request->validate(
            [ 
                'password'         => 'required',
                'confirm_password' => 'required|same:password',
            ],
            [
               'confirm_password.same' => 'Password does not matched.'
            ]
        );
        $picked = User::find($request->user_id);
        $picked->update(
            [
                'password' => \Hash::make($request->confirm_password)
            ]
        );
        return redirect('admin/manage/branch')->with('success', 'Password Updated Successfully');
	}
}
