<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = 'login';
    protected $fillable = ['login', 'password', 'first_name', 'second_name', 'job_id', 'department_id', 'open_for', 'header'];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
