<?php

namespace App\Mail;

use App\AppointmentBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentBooked extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    /**
     * Create a new message instance.
     *
     * @param AppointmentBooking $appointmentBooking
     */
    public function __construct(AppointmentBooking $appointmentBooking)
    {
        $this->appointment = $appointmentBooking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.appointmentBooked', [$this->appointment]);
    }
}
