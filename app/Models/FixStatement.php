<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FixStatement extends Model
{
    public $timestamps = false;
    protected $table = 'fix_statements';
    protected $fillable = ['creator_login', 'assigner_login', 'type', 'description', 'create_at', 'state'];

    static public function getUserStatements($login) {
        if ($login != null) {
            return FixStatement::where('creator_login', $login)->get();
        } else {
            return FixStatement::get();
        }
    }

    static public function getAllStatements() {
        return FixStatement::getUserStatements(null);
    }
}
