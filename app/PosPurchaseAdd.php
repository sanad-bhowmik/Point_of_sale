<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosPurchaseAdd extends Model
{
    protected $table = 'purchase_Add';
    protected $fillable = [
        'user_id',
        'category',
        'brand',
        'description',
        'sell_price',
        'mrp',
        'vendor',
        'entry_model',
        'barcode',
        'quantity',
        'date',
    ];
}
