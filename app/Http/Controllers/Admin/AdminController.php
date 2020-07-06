<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\LoginSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ThankYouNotification;
use App\Http\Controllers\Concern\GlobalTrait;

class AdminController extends Controller
{
	use GlobalTrait;

	/**
	* Admin Login View
	*
	* @category Admin  Management
	* @package  Admin  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/

	public function loginView() {
		return view('admin.login');
	}

	/**
	* Admin Login Success and got to Dashboard
	*
	* @category Admin  Management
	* @package  Admin  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/

	public function login(Request $request) {
		$request->validate(
            [
                'email'    => 'required|email',
                'password' => 'required'
            ]
        );
        $credentials = [
            'email'    => $request['email'],
            'password' => $request['password'],
        ];
        if(\Auth::attempt($credentials)) {
        	$clientIP = \Request::ip();
        	LoginSession::create(
        		[
        			'user_id'  => \Auth::id(),
        			'login_at' => \Carbon\Carbon::now()->toDateTimeString(),
        			'device_ip'=> $clientIP
        		]
        	);
            return redirect('admin/dashboard');       
        }
        return redirect('admin/login')->with('error', 'Invalid login credentials.'); 
	}

	/**
	* Admin after login go to dashboard
	*
	* @category Admin  Management
	* @package  Admin  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/

	public function dashboard() {
		return view('admin.dashboard');
	}

	/**
	* Admin Profile
	*
	* @category Admin  Management
	* @package  Admin  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/

	public function profile() {
		return view('admin.profile');
	}

	/**
	* Update Profile
	*
	* @category Admin  Management
	* @package  Admin  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updateProfile(Request $request) {
		$request->validate(
            [
                'name'          => 'max:150',
                'company_name'  => 'max:150',
                'email'         => 'required|email|max:255|unique:users,email,'.\Auth::user()->id.',id',
                'mobile_number' => 'required|digits:10,|unique:users,mobile_number,'.\Auth::user()->id,
                'file'          => 'mimes:jpeg,jpg,png|max:2048'
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

	/**
	* Update Password 
	*
	* @category Admin  Management
	* @package  Admin  Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function updatePassword(Request $request) {
		$request->validate(
            [ 
            	'login_id'         => 'required',
                'password'         => 'required',
                'confirm_password' => 'required|same:password',
            ],
            [
               'confirm_password.same' => 'Password does not matched.'
            ]
        );
        $picked = User::where('email', $request->login_id)->first();
        if($picked) {
        	\Auth::user()->update(
	            [
	                'password' => \Hash::make($request->confirm_password)
	            ]
	        );
        } else {
        	return redirect('admin/profile')->with('error', 'Invalid Login Id.');
        }
        $picked->notify(New ThankYouNotification());
        return redirect('admin/profile')->with('success', 'Password Updated Successfully!');
	}
}
