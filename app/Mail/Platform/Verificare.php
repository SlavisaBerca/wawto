<?php

namespace App\Mail\Platform;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Verificare extends Mailable
{
    use Queueable, SerializesModels;
	public $message;
	public $url;
	public $del;
	
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$url,$del)
    {
        $this->message=$message;
		$this->url=$url;
		$this->del=$del;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('platform/Notifications/verify_email');
    }
}
