<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $invoicePath;

    /**
     * Create a new message instance.
     *
     * @param Appointment $appointment The appointment information
     * @param string $invoicePath Path to the invoice PDF file
     */
    public function __construct(Appointment $appointment, $invoicePath)
    {
        $this->appointment = $appointment;
        $this->invoicePath = $invoicePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Appointment Confirmation for ' . $this->appointment->pet->pet_name)
            ->view('emails.appointmentConfirmation')
            ->attach($this->invoicePath, [
                'as' => 'AppointmentInvoice.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
