<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDeleteHistory extends Model
{

    protected $table = 'payment_delete_history';

    protected $fillable = [
        'user_id',
        'supplier',
        'reference_no',
        'amount',
        'remarks',
        'status',
    ];
}
