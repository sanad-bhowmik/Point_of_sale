<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderInfo extends Model
{
    use HasFactory;

    protected $table = 'purchase_order_info';

    protected $fillable = [
        'user_id',
        'supplier_id',
        'purchase_code',
        'invoice_no',
        'chalan_no',
        'total_amount',
        'status',
    ];
}
