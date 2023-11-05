<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = 'login';
    protected $fillable = ['login', 'password', 'first_name', 'second_name', 'job_id', 'department_id', 'open_for', 'header'];
}
