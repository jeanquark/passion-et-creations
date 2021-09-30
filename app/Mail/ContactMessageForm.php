<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;

class ContactMessageForm extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactMessage $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // return $this->from('example@example.com', 'Example')
                // ->view('emails.contact-message');

        $from = 'info@passionetcreations.ch';
        $subject = "passionetcreations.ch - Formulaire de contact";

        return $this->from($from)->subject($subject)->view('emails.contact-message');
    }
}
