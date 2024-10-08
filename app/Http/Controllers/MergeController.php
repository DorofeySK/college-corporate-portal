<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statement;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MergeStatementsExport;

class MergeController extends Controller
{
    public function index() {
        return view('merge_statements_export.merge_index', $this->authInfo());
    }

    public function get_merged(Request $request) {
        $result = [];
        $current_user = User::where('login', $request->input('login'))->where('password', $request->input('hash'))->first();
        if ($current_user == NULL) {
            return $result;
        }
        $result['months'] = [];
        $result['infos'] = [];
        $from_date = Carbon::createFromFormat('Y-m-d', $request->input('from_date'));
        $to_date = Carbon::createFromFormat('Y-m-d', $request->input('to_date'));
        $from_date->locale('ru');
        $to_date->locale('ru');
        $buffered_day = $from_date->copy();
        while ($buffered_day->lte($to_date) == true || in_array($to_date->getTranslatedMonthName('MMMM'), $result['months']) == false) {
            array_push($result['months'], $buffered_day->getTranslatedMonthName('MMMM'));
            $buffered_day = $buffered_day->addMonthsNoOverflow(1);
        }

        $users = User::get();
        foreach ($users as $user) {
            $user_result = [
                'name' => $user->getFullName(),
                'job' => $user->getJobs()[0]->name,
                'total_value' => 0
            ];
            $statements = Statement::where('owner_login', $user->login)->where('state', 'close')
                ->whereDate('publication_day', '>=', $from_date)
                ->whereDate('publication_day', '<=', $to_date)
                ->get();
            foreach ($result['months'] as $month) {
                $user_result[$month] = [
                    'month_value' => 0,
                    'statements' => []
                ];
            }
            foreach ($statements as $statement) {
                $statement_day = Carbon::createFromFormat('Y-m-d', $statement->publication_day);
                $statement_day->locale('ru');
                $month = $statement_day->getTranslatedMonthName('MMMM');
                $user_result[$month]['month_value'] += $statement->main_amount;
                $user_result['total_value'] += $statement->main_amount;
                array_push($user_result[$month]['statements'], $statement->getString());
            }
            array_push($result['infos'], $user_result);
        }
        $result['from'] = $request->input('from_date');
        $result['to'] = $request->input('to_date');
        return $result;
    }

    public function download(Request $request) {
        $merge_result = $this->get_merged($request);
        $day = Carbon::now();
        $file_name = "Сводный_график_c_" . $request->input('from_date') . "_по_" . $request->input('to_date') . "_" . $day;
        $result = new MergeStatementsExport($merge_result);
        Excel::store($result, 'public/' . $request->input('login') . '/' . $file_name . '.xlsx');
        return Excel::download($result, $file_name . '.xlsx');
    }
}