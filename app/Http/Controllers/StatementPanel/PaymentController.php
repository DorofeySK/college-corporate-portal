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

    public function index()
    {
        $jobs = [
            'jobs' => Job::get()
        ];
        return view('statement_panel\payment', array_merge($this->authInfo(), $jobs));
    }

    public function add_payment(Request $request)
    {
        $params = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'job_id' => intval($request->input('job_id'))
        ];
        Payment::create($params);
        return redirect()->route('home');
    }
}
