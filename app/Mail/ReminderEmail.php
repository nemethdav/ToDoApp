<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    private $reminders;

    /**
     * Create a new message instance.
     * @param $reminders
     */
    public function __construct($reminders)
    {
        $this->reminders = $reminders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.reminder')->with('reminders', $this->reminders)->subject('ToDo esedékesség emlékeztető');
    }
}
