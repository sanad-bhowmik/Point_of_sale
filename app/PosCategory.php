<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosCategory extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'user_id',
        'name',
        'vat',
        'created_at',
        'updated_at',
		'status',
    ];
}
