<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosPurchaseReturn extends Model
{
    protected $table = 'purchase_Return';
    protected $fillable = [
        'user_id',
        'category',
        'brand',
        'description',
        'vendor',
        'return_unit_cost',
        'return_qty',
        'created_at',
        'updated_at',
    ];
}
