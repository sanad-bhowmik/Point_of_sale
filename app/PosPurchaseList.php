<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosPurchaseList extends Model
{
    protected $table = 'purchase_List';

    protected $fillable = [
        'user_id',
        'vendor',
        'category',
        'brand',
        'description',
        'barcode',
        'cost_price',
        'qty',
        'total',
        'date',
    ];

    protected $casts = [
        'cost_price' => 'decimal:2',
        'total' => 'decimal:2',
        'date' => 'date',
    ];

    // You can define relationships and additional methods here
}
