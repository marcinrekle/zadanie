<?php

namespace Modules\Mail\Services;

use InvalidArgumentException;
use Validator;

use Illuminate\Support\Facades\Storage;

use Modules\Mail\Entities\Mail;  
use Modules\Mail\Jobs\SendMail;

class MailService
{
	public function sendMail(array $data)
	{
		$validator = $this->validator($data);

		if($validator->fails()){
			throw new InvalidArgumentException($validator->errors()->first());
		}
		
		$mail = new Mail;
		$mail->sender = $data['sender'];
		$mail->recipient = $data['recipient'];
		$mail->title = $data['title'];
		$mail->content = $data['content'];
		$mail->attachments = Storage::disk('public')->put('attachments',$data['attachment']);
		//$mail->attachments = basename( $data['attachment']->store('public/attachments'));
		$mail->save();
        $this->addToQueue($mail);
		return $mail->fresh();
	}

    protected function addToQueue(Mail $mail){
        for ($i=0; $i < 50; $i++) { 
            SendMail::dispatch($mail)->delay(now()->addSeconds(10));
        }
    }

	protected function validator(array $data)
    {
        return Validator::make($data, [
            'sender' => 'required|email',
			'recipient' => 'required|email',
			'title' => 'required|min:3|max:255',
			'content' => 'required',
        ]);
    }
}