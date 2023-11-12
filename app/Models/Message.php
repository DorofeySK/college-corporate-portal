<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    public $timestamps = false;
    protected $fillable = ['sendtime', 'login_from', 'login_to', 'type', 'messgae_text'];
}
