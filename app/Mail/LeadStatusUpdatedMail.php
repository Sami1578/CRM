<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Lead Status Updated Details')
            ->from('contact_crm@sellkarobar.com')
            ->view('mails.leadstatusupdated');
    }
}
