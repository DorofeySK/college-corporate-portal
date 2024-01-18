<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    protected $table = 'job';
    protected $fillable = ['name', 'rang', 'roles'];

    public function getRoles()
    {
        $res = array();
        if ($this->roles != null) {
            $roles_in_job = json_decode($this->roles, true);
            foreach ($roles_in_job['roles'] as $role) {
                array_push($res, $role);
            }
        }
        return $res;
    }
}
