<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosShopListStatus extends Model
{
    protected $table = 'shoplist_Status';

    protected $fillable = [
        'sl_no',
        'code',
        'name',
        'mobile',
        'address',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
