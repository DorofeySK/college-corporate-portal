<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\FixStatement;
use Carbon\Carbon;

class FixStatementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $current_user = $this->authInfo();
        $is_admin = in_array('admin', $current_user['current_roles']);
        $context = [
            'fix_statements' => $is_admin ? FixStatement::getAllStatements() : FixStatement::getUserStatements($current_user['current_user']->login)
        ];
        return view('fix_statements.fix_index', array_merge($current_user, $context));
    }

    public function create() {
        $current_user = $this->authInfo();
        $context = [
            'types' => config('fixstatementtypes')
        ];
        return view('fix_statements.fix_create', array_merge($current_user, $context));
    }

    public function store(Request $request) {
        $current_day = Carbon::now();
        $current_user = $this->authInfo();
        $params = [
            'creator_login' => $current_user['current_user']->login,
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'create_at' => $current_day,
            'state' => 'open'
        ];
        FixStatement::create($params);
        return redirect()->route('fix.index');
    }

    public function edit($id) {
        $current_user = $this->authInfo();
        $context = [
            'fix' => FixStatement::where('id', $id)->first()
        ];
        return view('fix_statements.fix_edit', array_merge($current_user, $context));
    }

    public function update(Request $request, $id) {
        $current_user = $this->authInfo();
        $params = [
            'state' => $request->input('state'),
            'assigner_login' => $current_user['current_user']->login,
            'assigner_comment' => $request->input('assigner_comment')
        ];
        FixStatement::where('id', $id)->update($params);
        return redirect()->route('fix.index');
    }
}
