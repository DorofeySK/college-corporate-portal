<?php

namespace App\Http\Controllers\StatementPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentDetail;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payment = [
            'payments' => Payment::get(),
            'period_types' => config('period'),
            'amount_types' => config('amounttype')
        ];
        return view('statement_panel\detail', array_merge($this->authInfo(), $payment));
    }

    public function add_detail(Request $request)
    {
        $params = [
            'payment_id' => intval($request->input('payment_id')),
            'name' => $request->input('name'),
            'period' => $request->input('period'),
            'amount' => intval($request->input('amount')),
            'amount_type' => $request->input('amount_type')
        ];
        PaymentDetail::create($params);

        return redirect()->route('home');
    }
}
