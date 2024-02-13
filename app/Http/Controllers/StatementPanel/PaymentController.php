<?php

namespace App\Http\Controllers\StatementPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $context = [
            'payments' => Payment::get(),
            'jobs' => Job::get()
        ];
        return view('payments.payment_index', array_merge($this->authInfo(), $context));
    }

    public function create()
    {
        $jobs = [
            'jobs' => Job::get()
        ];
        return view('payments.payment_create', array_merge($this->authInfo(), $jobs));
    }

    public function edit($id) {
        $context = [
            'jobs' => Job::get(),
            'payment' => Payment::where('id', $id)->first()
        ];
        return view('payments.payment_edit', array_merge($this->authInfo(), $context));
    }

    public function store(Request $request)
    {
        $params = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'job_id' => intval($request->input('job_id'))
        ];
        Payment::create($params);
        return redirect()->route('payments.index');
    }

    public function update(Request $request, $id)
    {
        $params = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'job_id' => intval($request->input('job_id'))
        ];
        Payment::where('id', $id)->update($params);
        return redirect()->route('payments.index');
    }
}
