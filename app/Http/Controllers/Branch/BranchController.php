<?php

namespace App\Http\Controllers\Branch;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
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
		return view('admin.branch.manage_branch');
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
                'branch_name'     => 'required|max:100',
                'email'           => 'required|email|max:100|email',
                'contact_number'  => 'required|number|digits:10',
                'contact_address' => 'required|max:250',
                'file'            => 'mimes:jpeg,jpg,png|max:2048',
                'branch_state'    => 'required',
                'branch_city'     => 'required',
                'contact_person_name'   => 'nullable|max:100',
                'contact_person_mobile' => 'nullable|number|digits:10',
                'branch_code'           => 'required|max:50'
            ]
        );
        $image_url = $this->filesUpload($request, \Auth::user()->profile_pic);
        \Auth::user()->update(
        	[
        		'name'          => $request->name,
        		'company_name'  => $request->company_name,
        		'email'         => $request->email,
        		'mobile_number' => $request->mobile_number,
        		'profile_pic'   => $image_url
        	]
        );
        return redirect('admin/profile')->with('success', 'Record Updated Successfully.');
	}
}
