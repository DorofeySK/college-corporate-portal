<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.user_index', $this->authInfo());
    }

    public function edit($login) {
        $context = [
            'user' => User::where('login', $login)->first(),
            'departs' => Department::get(),
            'jobs' => Job::get(),
            'users' => User::get()
        ];
        return view('users.user_edit', array_merge($this->authInfo(), $context));
    }

    public function update(Request $request, $login) {
        $params = [
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'job_id' => json_encode(['jobs' => array_map('intval', $request->input('job_id'))]),
            'department_id' => intval($request->input('department_id')),
            'patronymic' => $request->input('patronymic')
        ];
        if ($request->input('header') != 'null') {
            $params['header'] = $request->input('header');
        }
        if ($request->input('password') != '') {
            $params['password'] = Hash::make($request->input('password'));
        }
        User::where('login', $login)->update($params);
        return redirect()->route('users.index');
    }
}
