<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    public $timestamps = false;
    protected $table = 'paymentdetail';
    protected $fillable = ['payment_id', 'name', 'period', 'amount', 'amount_type'];
}
