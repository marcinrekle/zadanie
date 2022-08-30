<?php

namespace Modules\Mail\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    //public $details;
    protected $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->subject($this->details['title'])
                    ->from($this->details['sender'])
                    //->to($this->details['recipient'])
                    ->view('mail::emails.message')
                    ->with('details', $this->details);
    }
}
