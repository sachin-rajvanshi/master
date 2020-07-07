<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    protected $fillable = [
    	'course_level',
    	'level_remark',
    	'status'
    ];
}
