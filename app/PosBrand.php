<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosBrand extends Model
{
    protected $table = 'brand';

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'created_at',
        'updated_at',
        'status',
    ];
}
