<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
    	'name',
    	'status'
    ];

    // Get All Related Course Of University

    public function getRelatedCourse() {
    	return $this->hasMany(UniversityCourse::class, 'university_id', 'id');
    }
}
