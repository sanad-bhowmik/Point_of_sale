<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPaymentHistory extends Model
{
    use HasFactory;

    protected $table = 'supplier_payment_history';

    protected $fillable = [
        'user_id',
        'supplier',
        'reference_no',
        'amount',
        'remarks',
        'status',
    ];
}
