<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $fillable = [
    	'course_type',
    	'type_remark',
    	'status'
    ];
}
