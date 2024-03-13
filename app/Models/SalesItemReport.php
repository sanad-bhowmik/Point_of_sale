<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItemReport extends Model
{

    protected $table = 'sales_item_report';

    protected $fillable = [
        'user_id',
        'category_id',
        'category',
        'brand_id',
        'brand',
        'invoice_num',
        'invoice_date',
        'description_id',
        'description',
        'qty',
        'unit_price',
        'discount',
        'vat',
        'remarks',
        'net_amount',
        'status',
    ];
}
