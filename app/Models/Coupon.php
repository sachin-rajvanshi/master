<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
    	'course_id',
    	'coupon_code',
    	'student_mobile_no',
    	'email',
    	'discount',
    	'send_sms',
    	'status'
    ];

    public function getCouponRelatedCourse() {
    	return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
