<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Job;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $context = [
            'current_table' => true
        ];
        return view('home', array_merge($this->authInfo(), $context));
    }

    public function checkUser($user)
    {
        $auth_params = $this->authInfo();
        $checked_user = User::where('login', $user)->first();
        $is_header = false;
        if ($checked_user != null) {
            $header = User::where('login', $checked_user->header)->first();
            while ($is_header == false || $header != null) {
                if ($header->login == $auth_params['user_auth']->login) {
                    $is_header = true;
                } else {
                    $header = User::where('login', $header->header)->first();
                }
            }
        }
        $context = [
            'current_table' => false,
            'is_header' => $is_header
        ];
        if ($is_header) {
            $context['checked_user'] = $checked_user->getInfo();
        }
        return view('home', array_merge($context, $auth_params));
    }
}
