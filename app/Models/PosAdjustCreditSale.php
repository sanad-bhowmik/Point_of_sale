<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosAdjustCreditSale extends Model
{
    protected $table = 'adjust_creditsale';

    protected $fillable = [
        'invoice',
        'customer_name',
        'mobile',
        'total_amount',
        'paid_amount',
        'due',
        'pay',
        'invoice_date',
    ];
    
}
