<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosStockReport extends Model
{
    protected $table = 'stock_Report';
    protected $fillable = [
        'user_id',
        'category',
        'model',
        'description',
        'qty',
    ];
}
