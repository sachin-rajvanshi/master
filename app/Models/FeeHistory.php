<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeHistory extends Model
{
    protected $fillable = [
    	'user_id',
    	'admission_id',
    	'payment_mode_id',
    	'payable_amount',
    	'paid_amount',
    	'cash_collected_by',
    	'cheque_number',
    	'cheque_date',
    	'due_amount',
    	'bank_name',
    	'bank_branch',
    	'reference_id',
    	'payment_remark',
    	'payment_status',
    	'payment_screenshot'
    ];
}
