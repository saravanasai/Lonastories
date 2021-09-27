<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TelecallerLinkmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url=$url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('Emails.TeleCallerLink');
        return $this->from('sai@test.com','sai')->subject('Subject: Sign-up with Loanstories.com - A New way Of Financial Planning!')->markdown('Emails.TeleCallerLink',["link"=>$this->url]);
    }
}
