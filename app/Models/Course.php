<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    	'course_name',
    	'course_code',
    	'course_wise_id',
    	'course_duration_id',
    	'course_type_id',
    	'course_level_id',
    	'admission_fees',
    	'course_fees',
    	'exam_fees',
    	'itp_fees',
    	'late_fees',
    	'total_deposite_fees',
    	'hostel_facility',
    	'hostel_fees',
    	'other_fees',
    	'other_fees_remark',
    	'status'
    ];

    // Get Course Wise data
    public function getCourseWise()
    {
        return $this->belongsTo(CourseWise::class, 'course_wise_id', 'id');
    }

    // Get Course Duration data
    public function getCourseDuration()
    {
        return $this->belongsTo(CourseDuration::class, 'course_duration_id', 'id');
    }

    // Get Course Type data
    public function getCourseType()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id', 'id');
    }

    // Get Course Level data
    public function getCourseLevel()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id', 'id');
    }
}
