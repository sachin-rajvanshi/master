<?php

namespace App\Http\Controllers\Coupon;

use App\Models\Course;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
	*  Coupon Discount Management
	*
	* @category Coupon Discount Management
	* @package  Coupon Discount Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function index() {
		$datas = Course::where('status', 'Yes')->get();
		$coupons = Coupon::with('getCouponRelatedCourse')->get();
		return view('admin.manage_coupon', compact('datas', 'coupons'));
	}

	/**
	* Create Coupon
	*
	* @category Coupon Discount Management
	* @package  Coupon Discount Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function createCoupon(Request $request) {
		$request->validate(
			[
				'course'        => 'required',
				'coupon_code'   => 'required|max:50',
				'std_mobile_no' => 'required|numeric|digits:10',
				'email'         => 'required|max:100|email',
				'discount'      => 'required|digits_between:1,3'
			],
			[
			
			],
			[
				'std_mobile_no' => 'Student mobile number'
			]
		);
		$send_sms = $request->send_sms ? $request->send_sms : 'No';
		Coupon::create(
			[
				'course_id'         => $request->course,
				'coupon_code'       => $request->coupon_code,
				'student_mobile_no' => $request->std_mobile_no,
				'email'             => $request->email,
				'discount'          => $request->discount,
				'send_sms'          => $send_sms,
 			]
		);
		return redirect('admin/manage/coupons')->with('success', 'Coupon Added Successfully.');
	}

	/**
	* Delete Coupon
	*
	* @category Coupon Discount Management
	* @package  Coupon Discount Management
	* @author   Sachiln Kumar Rajvanshi <sachin.rajvanshi@webmingo.in>
	* @license  PHP License 7.4.0
	* @link
	*/
	public function deleteCoupon(Request $request) {
		$picked = Coupon::find($request->id);
		$picked->delete();
		return 'Deleted Successfully.';
	}
}
