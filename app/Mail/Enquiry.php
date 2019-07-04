<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class Enquiry extends Mailable
{
    use Queueable, SerializesModels;
    public $messages;
    public $email;
    public $phone;
    public $type;
    public $name;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messages, $email, $type='landing', $name, $phone=null)
    {
        //
        $this->messages = $messages;
        $this->email = $email;
        $this->type = $type;
        $this->name = $name;
        $this->phone = $phone;
        $this->date = Carbon::today()->toDateString();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('{$this->name} left an enquiry on samihajjaj.com - {$this->type}')->view("emails.enquiry");
    }
}
