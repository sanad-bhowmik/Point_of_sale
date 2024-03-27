<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{

    protected $table = 'investment';

    protected $fillable = [
        'user_id',
        'action',
        'account_no',
        'remarks',
        'amount',
        'status',
    ];
}
