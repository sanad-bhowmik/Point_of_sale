<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosInvoice extends Model
{
    protected $table = 'invoice';
    protected $fillable = [
        'invoice',
        'customer_name',
        'mobile',
        'invoice_date',
        'remarks',
        'drop_status',
    ];
    use HasFactory;
}
