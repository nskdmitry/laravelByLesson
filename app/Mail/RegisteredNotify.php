<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $addressat;

    /**
     * Create a new message instance.
     *
     * @param \App\User $client - user-for-address of mail
     * @return void
     */
    public function __construct(\App\User $client)
    {
        $this->addressat = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.signup')->with('user', $this->addressat);
    }
}
