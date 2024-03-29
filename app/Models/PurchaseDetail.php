<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{

    protected $table = 'purchase_details';

    protected $fillable = [
        'user_id',
        'shop_id',
        'purchase_info_id',
        'description_id',
        'cost_price',
        'sale_price',
        'qty',
        'barcode_lable',
        'status',
    ];
}
