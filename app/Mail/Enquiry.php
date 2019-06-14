<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Enquiry extends Mailable
{
    use Queueable, SerializesModels;
    public $messages;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messages, $email)
    {
        //
        $this->messages = $messages;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("emails.enquiry");
    }
}
