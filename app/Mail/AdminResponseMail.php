<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $type;
    public $status;
    public $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $type, $status, $message)
    {
        $this->user = $user;
        $this->type = $type;
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status Pengajuan ' . $this->type)
            ->view('emails.emailadminresponse');
    }
}
