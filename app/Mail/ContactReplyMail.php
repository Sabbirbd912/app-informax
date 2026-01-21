<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactReplyMail extends Mailable
{
    public $replyMessage;

    public function __construct($replyMessage)
    {
        $this->replyMessage = $replyMessage;
    }

    public function build()
    {
        return $this
            ->subject('Reply from Informax Technology')
            ->view('adminpanel.emails.contact-reply');
    }
}
