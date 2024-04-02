<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DroppedInvoice extends Model
{
    protected $table = 'dropped_invoice';
    protected $fillable = [
        'user_id',
        'invoice_no',
        'branch',
        'drop_status',
        'drop_reason',
        'invoice_date',
        'request_date',
        'approved_date',
    ];
}
