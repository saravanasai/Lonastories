<?php

namespace App\Mail;

use App\Models\Cutomer\DirectReferal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DirectRefferalLinkResend extends Mailable
{
    use Queueable, SerializesModels;


    public $reffered_link;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $user_info=DirectReferal::join('table_customer','direct_referals.direct_ref_of_user','=','table_customer.id')
        ->select('table_customer.*','direct_referals.*')->where('direct_referals.id',$id)->first();
        $this->reffered_link=$user_info->refered_url;
        $this->name=$user_info->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sai@test.com','sai')->subject('Loanstories')->markdown('Emails.ResendrefferalLink',["link"=>$this->reffered_link,"name"=>$this->name]);
    }
}
