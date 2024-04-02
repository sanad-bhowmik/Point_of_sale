<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashFlowReport extends Model
{

    protected $table = 'cash_flow_report';

    protected $fillable = [
        'user_id',
        'total_cash_in',
        'total_cash_out',
        'date',
        'status',
    ];
}
