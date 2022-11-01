<?php

namespace App\Mail\Platform;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReteleSociale extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $password)
    {
        $this->message=$message;
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('platform/Notifications/facebook_login');
    }
}
