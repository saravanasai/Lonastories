<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendOtp extends Mailable
{
    use Queueable, SerializesModels;

     protected $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otp)
    {
        $this->otp=$otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('BookMyLoan@Loanstories.com','Loanstories')->subject(' Login OTP from Loanstories.com')->markdown('Emails.Sendotp',["otp"=>$this->otp]);
    }
}
