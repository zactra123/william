<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->user = $data['user'];
        $this->subject = $data['subject'];
        $this->description = $data['description'];
        $this->path = $data['path'];
        $this->as = $data['as'];
        $this->mime = $data['mime'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->path != null){
            return $this->from('info@prudentscores.com')
                ->to($this->user->email)
                ->subject($this->subject)
                ->view('mailer.send_email')
                ->with([
                    'description' => $this->description,
                ])
                ->attach($this->path, [
                    'as' => $this->as,
                    'mime' => $this->mime,
                ]);
        }else{
            return $this->from('info@prudentscores.com')
                ->to($this->user->email)
                ->subject($this->subject)
                ->view('mailer.send_email')
                ->with([
                    'description' => $this->description,
                ]);
        }


    }
}
