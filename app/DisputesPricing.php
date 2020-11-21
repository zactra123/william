<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisputesPricing extends Model
{
    protected $table = 'disputes_pricings';

    protected $fillable = [
        'user_id',
        'inquiries',
        'personal_info',
        'fraud_alerts',
        'cc_accnt_bloking',
        'auto_blocking',
        'mortgage_blocking',
        'p_loan_clocking',
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
