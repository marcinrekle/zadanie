<?php

namespace Modules\Mail\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = ["sender","recipient","title","content","attachment"];
    
    protected static function newFactory()
    {
        return \Modules\Mail\Database\factories\MailFactory::new();
    }
}
