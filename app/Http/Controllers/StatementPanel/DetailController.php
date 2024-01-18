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

    public function index() {
        $context = [
            'details' => PaymentDetail::get()
        ];
        return view('details\detail_index', array_merge($this->authInfo(), $context));
    }

    public function create()
    {
        $payment = [
            'payments' => Payment::get(),
            'period_types' => config('period'),
            'amount_types' => config('amounttype')
        ];
        return view('details\detail_create', array_merge($this->authInfo(), $payment));
    }

    public function edit($id) {
        $context = [
            'detail' => PaymentDetail::where('id', $id)->first(),
            'payments' => Payment::get(),
            'period_types' => config('period'),
            'amount_types' => config('amounttype')
        ];
        return view('details\detail_edit', array_merge($this->authInfo(), $context));
    }

    public function update(Request $request, $id) {
        $params = [
            'payment_id' => intval($request->input('payment_id')),
            'name' => $request->input('name'),
            'period' => $request->input('period'),
            'amount' => intval($request->input('amount')),
            'amount_type' => $request->input('amount_type')
        ];
        PaymentDetail::where('id', $id)->update($params);
        return redirect()->route('details.index');
    }

    public function store(Request $request)
    {
        $params = [
            'payment_id' => intval($request->input('payment_id')),
            'name' => $request->input('name'),
            'period' => $request->input('period'),
            'amount' => intval($request->input('amount')),
            'amount_type' => $request->input('amount_type')
        ];
        PaymentDetail::create($params);

        return redirect()->route('details.index');
    }
}
