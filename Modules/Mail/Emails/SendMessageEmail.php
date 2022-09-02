<?php

namespace Modules\Mail\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        //dd(public_path('storage'));
        // Log::info('public path ='.public_path('storage'));
        // Log::info('storage url ='.Storage::path($this->details['attachments']));
        // Log::info($this->details['attachments']);
        // Log::info(url('/').'/storage/'.$this->details['attachments']);
        // Log::info(realpath("storage/".$this->details['attachments']));
        return $this->subject($this->details['title'])
                    ->from($this->details['sender'])
                    //->to($this->details['recipient'])
                    ->view('mail::emails.message')
                    ->with('details', $this->details);
                    //->attach(public_path('storage').$this->details['attachments']);
    }
}
