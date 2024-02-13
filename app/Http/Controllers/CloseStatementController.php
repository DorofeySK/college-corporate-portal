<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statement;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CloseStatementsExport;

class CloseStatementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($login) {
        $context = [
            'owner' => $login,
            'statements' => Statement::where('owner_login', $login)->where('state', 'used')->get()
        ];
        return view('exports.close_statements_index', array_merge($context, $this->authInfo()));
    }

    public function store($login) {
        $day = Carbon::now();
        $statements = Statement::where('owner_login', $login)->where('state', 'used')->get();
        $user = User::where('login', $login)->first();
        $file_name = $user->second_name . '_' . $user->first_name . '_' . $day;
        Excel::store(new CloseStatementsExport($statements), 'public/' . $user->login . '/' . $file_name . '.xlsx');
        Statement::where('owner_login', $login)->where('state', 'used')->update(['state' => 'close']);
        return Excel::download(new CloseStatementsExport($statements), $file_name . '.xlsx');
    }
}
