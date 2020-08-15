<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportTuSummary extends Model
{
    protected $table = 'client_report_tu_summaries';

    protected $fillable = [
        "client_report_id",
        "open_accounts",
        "total_balances",
        "close_accounts",
        "total_monthly_payment",
        "delinquent_account",
        "derogatory_account",
        "public_records",
        "inquiry_summary",
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}
