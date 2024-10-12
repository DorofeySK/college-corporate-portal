<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    public $timestamps = false;
    protected $table = 'statement';
    protected $fillable = ['owner_login', 'checker_login', 'payment_id', 'paymentdetail_id', 'doc_ids', 'state', 'publication_day', 'update_day', 'amount', 'description', 'main_amount', 'middle_amount'];

    public function getString() {
        $payment = Payment::where('id', $this->payment_id)->first();
        $detail = PaymentDetail::where('id', $this->paymentdetail_id)->first();
        return $payment->name . "; " . $payment->type . "; " .$detail->name;
    }
}
