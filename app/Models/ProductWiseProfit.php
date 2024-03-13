<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWiseProfit extends Model
{
    use HasFactory;

    protected $table = 'product_wise_profit';

    protected $fillable = [
        'user_id',
        'category_id',
        'category',
        'brand_id',
        'brand',
        'description_id',
        'description',
        'sale_qty',
        'sale_return_qty',
        'profit_loss',
        'status',
    ];
}
