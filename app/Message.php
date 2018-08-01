<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Message extends Model
{
	use Notifiable;
    protected $fillable = [
        'name', 'phone', 'text',
        
    ];
}
