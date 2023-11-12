<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    public $timestamps = false;
    protected $table = 'statement';
    protected $fillable = ['owner_login', 'checker_login', 'payment_id', 'doc_ids', 'state', 'publication_day', 'update_day'];
}
