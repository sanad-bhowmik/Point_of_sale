<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosPurchaseHistory extends Model
{
    protected $table = 'purchase_History';

    protected $fillable = [
        'user_id',
        'si_no',
        'productId',
        'vendor',
        'category',
        'brand',
        'description',
        'cost_price',
        'qty',
        'particular',
        'date',
        'return_date',
    ];

    protected $casts = [
        'date' => 'date',
        'return_date' => 'date',
    ];
}
