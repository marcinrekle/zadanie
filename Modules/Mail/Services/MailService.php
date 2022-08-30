<?php

namespace Modules\Mail\Services;

use InvalidArgumentException;
use Validator;

use Modules\Mail\Entities\Mail;

class MailService
{
	public function saveMailData(array $data)
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
		$mail->save();

		return $mail->fresh();
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