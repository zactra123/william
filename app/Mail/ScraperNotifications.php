<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScraperNotifications extends Mailable
{
    use Queueable, SerializesModels;

    public $error_message = '';
    public $source = '';
    public $client;
    public $admin_emails = [];

    private $script = [
        'transunion_membership' => "Error while fetching data from TransUnion Membership.",
        'transunion_dispute' => "Error while fetching data from TransUnion Dispute.",
        'experian_login' => "Error while fetching data from Experian.",
        'experian_view_report' => "Error while fetching data from Experian View Report.",
        'equifax_from_credit_karma' => "Error while fetching data from Credit Karma for the EQUIFAX report.",
    ];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $message, $script_name)
    {
        $this->client = $client;
        $this->error_message = $message;
        $this->source = $this->script[$script_name];

        //@ToDo: email hima uxarkum enq miayn reseptionistin petqa haskanal um petqa uxarkenq vor aveli ardyunavet lini
        $this->admin_emails = User::receptionists()->pluck('email')->toArray();

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@prudentscores.com')
            ->to($this->admin_emails)
            ->subject($this->source)
            ->view('mailer.admins.reports_error')
            ->with([
                'error_message' => $this->error_message,
                'source' => $this->source,
                'client' => $this->client
            ]);
    }
}
