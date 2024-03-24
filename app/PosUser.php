<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosUser extends Model
{
    protected $table = 'pos_users';

    protected $fillable = [
        'id',
        'shop_name',
        'full_name',
        'user_name',
        'password',
        'number',
        'email',
        'NID_no',
        'address',
    ];
}
