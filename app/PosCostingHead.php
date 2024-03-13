<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosCostingHead extends Model
{

    protected $table = 'costing_Head';

    protected $fillable = [
        'user_id',
        'costing_head',
        'status',
        'created_at',
        'updated_at',
        'expense_type',
    ];
}
