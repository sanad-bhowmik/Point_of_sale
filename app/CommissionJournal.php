<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionJournal extends Model
{

    protected $table = 'commissionJournal';

    protected $fillable = [
        'date',
        'supplier',
        'supplier_id',
        'remarks',
        'amount',
    ];
}
