<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisputesPricing extends Model
{
    protected $table = 'disputes_pricings';


    public $rules = [
        'inquiries' => 'required',
        'personal_info' => 'required',
        'fraud_alerts' => 'required',
        'cc_blocking' => 'required',
        'auto_blocking' => 'required',
        'mortgage_blocking' => 'required',
        'p_loan_blocking' => 'required',
        'student_loan_blocking' => 'required',
        'cc_late' => 'required',
        'auto_late' => 'required',
        'mortgage_late' => 'required',
        'student_loan_late' => 'required',
        'p_loan_late' => 'required',
        'public_record' => 'required',
        'collection' => 'required',
        'utility_blocking' => 'required',
        'cell_blocking'=>'required',
        'unknown'=>'required'
    ];
    protected $fillable = [
        'user_id',
        'inquiries',
        'personal_info',
        'fraud_alerts',
        'cc_blocking',
        'auto_blocking',
        'mortgage_blocking',
        'p_loan_blocking',
        'student_loan_blocking',
        'cc_late',
        'auto_late',
        'mortgage_late',
        'student_loan_late',
        'p_loan_late',
        'public_record',
        'collection',
        'utility_blocking',
        'cell_blocking',
        'unknown'
    ];
    protected $casts = [
        'collection' => 'array'
    ];

    /**
     * Scope a query to get Default Price list
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDefault($query)
    {
        return $query->where('user_id',  NULL)->get()->first();
    }
}
