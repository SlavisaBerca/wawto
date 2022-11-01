<?php

namespace App\Mail\Platform;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WawtoContact extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$message)
    {
        $title = $this->title;
        $message=$this->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('platform/Notifications/contact_form');
    }
}
