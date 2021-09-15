<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyCompanyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailArray=array();

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailArray)
    {
        $this->mailArray = $mailArray;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->mailArray['name'];
        return $this->subject('Welcome '.$name.', please verify your email address')->view('verify_company')->with('mailArray', $this->mailArray);
        // return $this->view('view.name');
    }
}
