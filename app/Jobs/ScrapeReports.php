<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Screaper;
use Ratchet\Wamp\Exception;

class ScrapeReports implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $client = null;
    private $method = null;
    private $arguments = [];

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 3600;// one hour

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $manual_arguments = [], $method = 'experian_login')
    {
        $this->client = $user;
        $this->method = $method;
        $this->arguments = $manual_arguments;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $scraper = new Screaper($this->client->id);

        switch ($this->method) {
            case 'experian_login':
                echo "<br />";
                echo "experian_login";
                echo "<br />";
                $scraper->experian_login($this->arguments);
                break;
            case 'experian_view_report':
                echo "<br />";
                echo "experian_view_report";
                echo "<br />";
                $scraper->experian_view_report($this->arguments);
                break;
            case 'transunion_dispute':
                echo "<br />";
                echo "transunion_dispute";
                echo "<br />";
                $scraper->transunion_dispute($this->arguments);
                break;
            case 'transunion_membership':
                echo "<br />";
                echo "transunion_membership";
                echo "<br />";
                $scraper->transunion_membership($this->arguments);
                break;
            case 'equifax_via_credit_karma':
                echo "<br />";
                echo "equifax_via_credit_karma";
                echo "<br />";
                $scraper->equifax_via_credit_karma($this->arguments);
                break;
            default:
                dd("Undefined method $this->method");
                break;
        }
    }
}
