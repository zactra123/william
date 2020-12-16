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
        'cc_accnt_bloking' => 'required',
        'auto_blocking' => 'required',
        'mortgage_blocking' => 'required',
        'p_loan_blocking' => 'required',
        'student_loan_blocking' => 'required',
        'cc_late' => 'required',
        'auto_late' => 'required',
        'mortgage_late' => 'required',
        'student_loan_late' => 'required',
        'student_loan_charged_off' => 'required',
        'cc_charged_off' => 'required',
        'auto_charged_off' => 'required',
        'auto_repo' => 'required',
        'auto_early_termination' => 'required',
        'settled' => 'required',
        'redeemed_repo' => 'required',
        'truck_trailer_neg' => 'required',
        'mortgage_foreclosure' => 'required',
        'mortgage_short_sale' => 'required',
        'loan_modified' => 'required',
        'time_share_neg' => 'required',
        'bankruptcies' => 'required',
        'child_support' => 'required',
        'med_ca' => 'required',
        'cc_ca' => 'required',
        'auto_ca' => 'required',
        'utility_ca' => 'required',
        'cellphone_ca' => 'required',
        'mca_ca' => 'required',
        'misc_ca' => 'required',
        'auto_ins_ca' => 'required',
        'jewelery_ca' => 'required',
        'lease_agreement' => 'required',
        'pest_ca' => 'required',
        'deposit_accnt_ca' => 'required',
        'check_cashing_ca' => 'required',
        'law_firm_ca' => 'required',
        'truck_load_ca' => 'required'
    ];
    protected $fillable = [
        'user_id',
        'inquiries',
        'personal_info',
        'fraud_alerts',
        'cc_accnt_bloking',
        'auto_blocking',
        'mortgage_blocking',
        'p_loan_blocking',
        'student_loan_blocking',
        'cc_late',
        'auto_late',
        'mortgage_late',
        'student_loan_late',
        'student_loan_charged_off',
        'cc_charged_off',
        'auto_charged_off',
        'auto_repo',
        'auto_early_termination',
        'settled',
        'redeemed_repo',
        'truck_trailer_neg',
        'mortgage_foreclosure',
        'mortgage_short_sale',
        'loan_modified',
        'time_share_neg',
        'bankruptcies',
        'child_support',
        'med_ca',
        'cc_ca',
        'auto_ca',
        'utility_ca',
        'cellphone_ca',
        'mca_ca',
        'misc_ca',
        'auto_ins_ca',
        'jewelery_ca',
        'lease_agreement',
        'pest_ca',
        'deposit_accnt_ca',
        'check_cashing_ca',
        'law_firm_ca',
        'truck_load_ca'
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
