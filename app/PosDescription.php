<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosDescription extends Model
{
    protected $table = 'description';

    protected $fillable = [
        'user_id',
        'category',
        'category_id',
        'brand',
        'brand_id',
        'unit_id',
        'vat_percent',
        'description_code',
        'description',
        'sale_price',
        'mrp',
        'status',
        'created_at',
        'updated_at',
    ];
}
