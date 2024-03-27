<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierTransaction extends Model
{

    protected $table = 'supplier_transaction';

    protected $fillable = [
        'user_id',
        'supplier_id',
        'supplier_name',
        'particular',
        'total_qty',
        'total_amount',
        'transaction_date',
        'status',
    ];
}
