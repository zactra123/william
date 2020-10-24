<?php

namespace App\Jobs;

use App\Mail\ReportsSuccess;
use App\Services\Screaper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class FetchReports implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $client;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $scraper = new Screaper($this->client->id);
        if ($this->client->credentials->ex_present()) {
            $scraper->experian_login();
        }

        if ($this->client->credentials->tu_present()) {

            $scraper->transunion_dispute();
        } elseif($this->client->credentials->tu_dis_present()) {
            $scraper->transunion_membership();
        }
        if ($this->client->credentials->ck_present()){
            $scraper->equifax_via_credit_karma();
        }

        if ($this->client->reports->first()){
            Mail::send(new ReportsSuccess($this->client));
        }
    }
}
