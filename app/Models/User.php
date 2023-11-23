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

    public function getJobs()
    {
        $jobs_json = json_decode($this->job_id, true);
        $jobs = array();
        foreach($jobs_json['jobs'] as $job_id) {
            array_push($jobs, Job::where('id', $job_id)->first());
        }
        return $jobs;
    }

    public function getInfo()
    {
        $context = [
            'current_user' => $this,
            'current_department' => Department::where('id', $this->department_id)->first(),
            'current_jobs' => $this->getJobs(),
            'current_roles' => $this->getRoles()
        ];
        return $context;
    }

    public function getRoles()
    {
        $roles = array();
        $jobs = $this->getJobs();
        foreach ($jobs as $job) {
            if ($job->roles != null) {
                $roles_in_job = json_decode($job->roles, true);
                foreach ($roles_in_job['roles'] as $role) {
                    if (in_array($role, $roles) == false) {
                        array_push($roles, $role);
                    }
                }
            }
        }
        return $roles;
    }
}
