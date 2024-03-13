<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosSalesReturn extends Model
{

    protected $table = 'sales_Return';
    protected $fillable = [
        'user_id',
        'invoice_num',
        'customer_name',
        'payment_mode',
        'reason',
        'created_at',
        'updated_at',
    ];
}
