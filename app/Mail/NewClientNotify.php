<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewClientNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $addressat;

    /**
     * NewClientNotify constructor.
     * @param \App\User $admin
     */
    public function __construct(\App\User $admin)
    {
        $this->addressat = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new')->with('user', $this->addressat);
    }
}
