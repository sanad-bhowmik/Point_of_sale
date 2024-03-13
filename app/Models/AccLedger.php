<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccLedger extends Model
{
    use HasFactory;

    protected $table = 'acc_ledger';

    protected $fillable = [
        'user_id',
        'date',
        'particular',
        'reference_no',
        'debit',
        'credit',
        'balance',
        'narration',
        'status',
    ];
}
