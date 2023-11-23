<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $context = [
            'roles' => config('roles')
        ];
        return view('admin_panel\job', array_merge($this->authInfo(), $context));
    }
    public function add_job(Request $request)
    {
        $params = [
            'name' => $request->input('name'),
            'rang' => intval($request->input('rang'))
        ];
        if ($request->input('roles') != 'null') {
            $params['roles'] = json_encode(['roles' => $request->input('roles')], JSON_UNESCAPED_UNICODE);
        }
        Job::create($params);
        return redirect()->route('home');
    }
}
