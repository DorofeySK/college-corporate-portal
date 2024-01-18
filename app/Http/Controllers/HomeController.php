<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Job;
use App\Models\User;
use App\Models\Statement;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Document;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts\home', $this->authInfo());
    }

    public function checkUser($user)
    {
        $auth_params = $this->authInfo();
        $checked_user = User::where('login', $user)->first();
        $context = [
            'current_table' => false
        ];
        if ($auth_params['current_subordinates']->contains($checked_user) == true) {
            $context['checked_user'] = $checked_user->getInfo();
        } else {
            $context['checked_user'] = null;
        }
        return view('home', array_merge($context, $auth_params));
    }
}
