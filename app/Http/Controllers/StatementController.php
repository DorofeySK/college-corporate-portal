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

    public function index()
    {
        $user = $this->authInfo();
        $context = [
            'payments' => Payment::get(),
            'payments_details'=> PaymentDetail::get(),
            'docs' => Document::where('owner_login', $user['current_user']->login)->get()
        ];
        return view('statement', array_merge($user, $context));
    }

    public function add_statement(Request $request)
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
            'state' => config('statementstates.open')
        ];
        Statement::create($params);
        return redirect()->route('home');
    }
}
