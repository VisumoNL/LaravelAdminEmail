<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userdata)
    {
        $this->user = $userdata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userdata = array(
          'name' => $this->user['name'],
          'email' => $this->user['email'],
          'verify_token' => $this->user['token']
        );

        return $this->from("contact@mail.ramonbers.nl")->subject("Visumo | Verify email")->view('mails.verify')->with('userdata', $userdata);
    }
}
