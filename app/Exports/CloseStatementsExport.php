<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Collection;

class CloseStatementsExport implements FromView
{
    protected $exportingStatements;

    public function __construct(Collection $statements) {
        $this->exportingStatements = $statements;
    }

    public function view(): View
    {
        return view('exports.close_statements', ['statements' => $this->exportingStatements]);
    }
}
