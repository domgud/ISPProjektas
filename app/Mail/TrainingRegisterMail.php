<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrainingRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $trainingName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trainingName)
    {
        $this->trainingName = $trainingName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registermail');
    }
}
