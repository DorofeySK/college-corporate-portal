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

    private function getStatementTable($user)
    {
        $res = array();
        $statements = Statement::where('owner_login', $user->login)->get();
        foreach ($statements as $statement) {
            array_push($res, [
                'statement' => $statement,
                'payment' => Payment::where('id', $statement->payment_id)->first(),
                'payment_detail' => PaymentDetail::where('id', $statement->paymentdetail_id)->first(),
                'docs' => Document::getDocsFromIds(json_decode($statement->doc_ids, true)['docs']),
                'checker' => User::where('login', $statement->checker_login)->first()
            ]);
        }
        return $res;
    }

    public function index()
    {
        $user_params = $this->authInfo();
        $context = [
            'current_table' => true,
            'table' => $this->getStatementTable($user_params['current_user'])
        ];
        return view('home', array_merge($user_params, $context));
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
