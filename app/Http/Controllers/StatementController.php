<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Document;
use App\Models\User;
use App\Models\Statement;
use Carbon\Carbon;

class StatementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getStatementTable($login)
    {
        $res = array();
        $statements = Statement::where('owner_login', $login)->get();
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

    public function index($login)
    {
        $user_params = $this->authInfo();
        $context = [
            'current_table' => $login == $user_params['current_user'],
            'table' => $this->getStatementTable($login)
        ];
        return view('statements\statement_index', array_merge($user_params, $context));
    }

    public function create()
    {
        $user = $this->authInfo();
        $context = [
            'payments' => Payment::get(),
            'payments_details'=> PaymentDetail::get(),
            'docs' => Document::where('owner_login', $user['current_user']->login)->get()
        ];
        return view('statements\statement_create', array_merge($user, $context));
    }

    public function store(Request $request)
    {
        $currentDay = Carbon::now();
        $params = [
            'owner_login' => Auth::user()->login,
            'checker_login' => $request->input('checker_login'),
            'payment_id' => intval($request->input('payment_id')),
            'paymentdetail_id' => intval($request->input('paymentdetail_id')),
            'publication_day' => $currentDay,
            'update_day' => $currentDay,
            'doc_ids' => json_encode(['docs' => array_map('intval', $request->input('doc_ids'))]),
            'state' => 'open'
        ];
        Statement::create($params);
        return redirect()->route('statements.index');
    }
}
