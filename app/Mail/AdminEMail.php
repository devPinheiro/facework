<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        //
        $this->userData = $userData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'admin@facework.com.ng';
        $subject = 'New Lead';

        return $this->view('emails.admin')
                    ->subject($subject)
                    ->with('message', $this->userData);
    }
}
