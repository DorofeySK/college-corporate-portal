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

class StatementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getStatementTable($login)
    {
        $res = array();
        $statements = Statement::where('owner_login', $login)->orderBy('update_day', 'desc')->get();
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
            'owner' => $login,
            'table' => $this->getStatementTable($login),
            'is_owner' => $login == Auth::user()->login
        ];
        return view('statements\statement_index', array_merge($user_params, $context));
    }

    public function edit($id) {
        $user = $this->authInfo();
        $payments = Payment::whereIn('job_id', array_column($this->authInfo()['current_jobs'], 'id'))->get();
        $details = PaymentDetail::whereIn('payment_id', array_column($payments->toArray(), 'id'))->get();
        $is_owner = Statement::where('id', $id)->first()->owner_login == Auth::user()->login;
        $context = [
            'is_owner' => $is_owner,
            'statement' => Statement::where('id', $id)->first(),
            'payments' => $is_owner ? $payments : Payment::get(),
            'payments_details'=> $is_owner ? $details : PaymentDetail::get(),
            'docs' => Document::where('owner_login', $user['current_user']->login)->get()
        ];
        return view('statements\statement_edit', array_merge($user, $context));
    }

    public function create()
    {
        $user = $this->authInfo();
        $payments = Payment::whereIn('job_id', array_column($this->authInfo()['current_jobs'], 'id'))->get();
        $details = PaymentDetail::whereIn('payment_id', array_column($payments->toArray(), 'id'))->get();
        $context = [
            'payments' => $payments,
            'payments_details'=> $details,
            'docs' => Document::where('owner_login', $user['current_user']->login)->get()
        ];
        return view('statements\statement_create', array_merge($user, $context));
    }

    public function update(Request $request, $id) {
        $currentDay = Carbon::now();
        $msg_params = [
            'sendtime' => $currentDay,
            'type' => 'unchecke',
            'login_from' => $this->authInfo()['current_user']->login
        ];
        if ($request->input('state') != null) {
            $params = [
                'state' => $request->input('state'),
                'main_amount' => $request->input('main_amount'),
                'update_day' => $currentDay,
            ];
            $msg_params['login_to'] = Statement::where('id', $id)->first()->owner_login;
            $msg_params['message_text'] = 'Системное сообщение: пользователь проверил вашу запись, выставлен статус: ' . config('statementstates.' . $request->input('state'));
        } else {
            $params = [
                'amount' => $request->input('amount'),
                'description' => $request->input('description'),
                'checker_login' => $request->input('checker_login'),
                'payment_id' => intval($request->input('payment_id')),
                'paymentdetail_id' => intval($request->input('paymentdetail_id')),
                'update_day' => $currentDay,
                'doc_ids' => json_encode(['docs' => array_map('intval', $request->input('doc_ids'))]),
                'state' => 'corrected'
            ];
            $msg_params['login_to'] = $params['checker_login'];
            $msg_params['message_text'] = 'Системное сообщение: пользователь обновил запись, требуется проверка.';
        }
        Message::create($msg_params);
        Statement::where('id', $id)->update($params);
        return redirect()->route('statements.index', Statement::where('id', $id)->first()->owner_login);
    }

    public function store(Request $request)
    {
        $currentDay = Carbon::now();
        $params = [
            'owner_login' => Auth::user()->login,
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'checker_login' => $request->input('checker_login'),
            'payment_id' => intval($request->input('payment_id')),
            'paymentdetail_id' => intval($request->input('paymentdetail_id')),
            'publication_day' => $currentDay,
            'update_day' => $currentDay,
            'doc_ids' => json_encode(['docs' => array_map('intval', $request->input('doc_ids'))]),
            'state' => 'open'
        ];
        Statement::create($params);
        $msg_params = [
            'sendtime' => $params['publication_day'],
            'login_from' => $params['owner_login'],
            'login_to' => $params['checker_login'],
            'type' => 'unchecke',
            'message_text' => 'Системное сообщение: пользователь указал вас проверяющим для новой записи.'
        ];
        Message::create($msg_params);
        return redirect()->route('statements.index', $params['owner_login']);
    }
}
