<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniversityCourse extends Model
{
    protected $fillable = [
    	'university_id',
    	'course_id'
    ];

    // Get reated Course

    public function getCourse() {
    	return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
