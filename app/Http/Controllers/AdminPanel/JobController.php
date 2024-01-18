<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $context = [
            'jobs' => Job::get()
        ];
        return view('jobs\job_index', array_merge($this->authInfo(), $context));
    }

    public function create()
    {
        $context = [
            'roles' => config('roles')
        ];
        return view('jobs\job_create', array_merge($this->authInfo(), $context));
    }


    public function edit($id)
    {
        $context = [
            'job' => Job::where('id', $id)->first(),
            'roles' => config('roles')
        ];
        return view('jobs\job_edit', array_merge($this->authInfo(), $context));
    }

    public function store(Request $request)
    {
        $params = [
            'name' => $request->input('name'),
            'rang' => intval($request->input('rang'))
        ];
        if ($request->input('roles') != 'null') {
            $params['roles'] = json_encode(['roles' => $request->input('roles')], JSON_UNESCAPED_UNICODE);
        }
        Job::create($params);
        return redirect()->route('jobs.index');
    }

    public function update(Request $request, $id)
    {
        $params = [
            'name' => $request->input('name'),
        ];
        if ($request->input('roles') != 'null') {
            $params['roles'] = json_encode(['roles' => $request->input('roles')], JSON_UNESCAPED_UNICODE);
        }
        Job::where('id', $id)->update($params);
        return redirect()->route('jobs.index');
    }
}
