<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierDueReport extends Model
{
    use HasFactory;

    protected $table = 'supplier_due_report';

    protected $fillable = [
        'user_id',
        'supplier',
        'total_purchase',
        'total_purchase_return',
        'total_purchase_amendment',
        'total_payment',
        'due',
        'status',
    ];
}
