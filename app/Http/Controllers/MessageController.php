<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Document;
use App\Models\User;
use App\Models\Statement;
use App\Models\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($type) {
        $user_params = $this->authInfo();
        $context = [
            'users' => User::get()
        ];
        if ($type == 'out') {
            $context['messages'] = Message::where('login_from', $user_params['current_user']->login)->get();
        } else {
            $context['messages'] = Message::where('login_to', $user_params['current_user']->login)->get();
        }
        return view('messages\message_index', array_merge($user_params, $context));
    }
}
