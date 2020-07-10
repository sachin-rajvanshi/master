<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
    	'profile_pic',
    	'college_enrollment_number',
    	'university_enrollment_number',
    	'first_name',
    	'middle_name',
    	'last_name',
    	'dob',
    	'mobile_number',
    	'email',
    	'gender',
    	'category_id',
    	'current_address',
    	'id_type',
    	'id_number',
    	'nationality',
    	'state_id',
    	'city_id',
    	'pin_code',
    	'father_name',
    	'father_mobile_number',
    	'father_occupation',
    	'mother_name',
    	'mother_mobile_number',
    	'mother_occupation',
    	'high_school_passing_year',
    	'high_school_passing_board',
    	'high_school_percentage',
    	'high_school_file',
    	'sr_secondry_passing_year',
    	'sr_secondry_passing_board',
    	'sr_secondry_percentage',
    	'sr_secondry_file',
    	'graduation_passing_year',
    	'graduation_passing_board',
    	'graduation_percentage',
    	'graduation_file',
    	'post_graduation_passing_year',
    	'post_graduation_passing_board',
    	'post_graduation_percentage',
    	'post_graduation_file',
    	'm_phil_passing_year',
    	'm_phil_passing_board',
    	'm_phil_percentage',
    	'm_phil_file',
    	'course_id',
    	'branch_id',
    	'study_mode_id',
    	'mode_of_entry_id',
    	'university_id',
    	'session_id',
    	'mode_of_study_id',
    	'consultant_code',
    	'consultant_name',
    	'consultant_mobile_number',
    	'consultant_address',
    	'admission_fees',
    	'aadhar_card',
    	'signature',
    	'course_completion_id',
    	'admission_mark_as',
    	'admission_created_by',
    	'accept_terms',
    	'status'
    ];

    // get category
    public function getCategory() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // get Id Types
    public function getTdType() {
        return $this->belongsTo(IdType::class, 'id_type', 'id');
    }

    // get States
    public function getState() {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    // get States
    public function getCity() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    // get Course
    public function getCourse() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    // get Course
    public function getCollege() {
        return $this->belongsTo(User::class, 'branch_id', 'id');
    }

    // get Study Mode
    public function getStudyMode() {
        return $this->belongsTo(CourseWise::class, 'study_mode_id', 'id');
    }

    // get Mode of entry
    public function getModeOfEntry() {
        return $this->belongsTo(ModeOfEntry::class, 'mode_of_entry_id', 'id');
    }

    // get University
    public function getUniversity() {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }

    // get University
    public function getSession() {
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    // get Study Mode
    public function getStudyOfMode() {
        return $this->belongsTo(ModeOfStudy::class, 'mode_of_study_id', 'id');
    }
}
