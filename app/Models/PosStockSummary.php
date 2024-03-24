<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosStockSummary extends Model
{

    protected $table = 'stock_Summary';

    protected $fillable = [
        'user_id',
        'description',
        'category',
        'brand',
        'opening_stock_qty',
        'purchase_qty',
        'purchase_return_qty',
        'sale_qty',
        'sale_return_qty',
        'missing_qty',
        'closing_stock_qty',
        'opening_stock_value',
        'purchase_value',
        'purchase_return_value',
        'sale_value',
        'sale_return_value',
        'missing_value',
        'price_protection_value',
        'closing_stock_value',
        'average',
    ];

}
