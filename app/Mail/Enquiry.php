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
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messages, $email, $type='landing')
    {
        //
        $this->messages = $messages;
        $this->email = $email;
        $this->type = $type;
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
