<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $event;


    public function __construct($event)
    {
          $this->event = $event;//
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $return $this
        ->from('jeffersonramirez31@gmail.com', 'prueba')
        ->subject('Event Reminder: ' . $this->event->name)
        ->view('mail.mensaje');

    }
}
