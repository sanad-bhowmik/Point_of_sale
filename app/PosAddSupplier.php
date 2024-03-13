<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosAddSupplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'number',
        'supplier_TR_license',
        'status',
        'created_at',
        'updated_at',
    ];
}
