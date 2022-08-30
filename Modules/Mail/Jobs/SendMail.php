<?php

namespace Modules\Mail\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail as FMail;

use Modules\Mail\Entities\Mail;
use Modules\Mail\Services\MailService;
use Modules\Mail\Emails\SendMessageEmail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The mail instance.
     *
     * @var \App\Entities\Mail
     */
    protected $mail;

    /**
     * Create a new job instance.
     *
     * @param  \App\Entities\Mail  $mail
     * @return void
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        FMail::to("db8ebfd068e69c@mailtrap.io")->send(new SendMessageEmail($this->mail));
    }
}