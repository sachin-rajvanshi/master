<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'user_type', 
        'email', 
        'mobile_number',
        'profile_pic',
        'company_name',
        'password',
        'branch_address',
        'state_id',
        'city_id',
        'college_parent_id',
        'contact_person_name',
        'contact_person_mobile',
        'branch_code',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // get States
    public function getState() {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    // get States
    public function getCity() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
