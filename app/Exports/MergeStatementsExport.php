<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Collection;

class MergeStatementsExport implements FromView
{
    protected $infos;

    public function __construct($infos) {
        $this->infos = $infos;
    }

    public function view(): View
    {
        return view('merge_statements_export.merge_table', ['infos' => $this->infos['infos'], 'months' => $this->infos['months']]);
    }
}
