<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUser extends Model
{
    use HasFactory;

    protected $table = 'sub_users';

    protected $fillable = [
        'user_phone',
        'user_id',
        'shop_id',
        'password',
    ];
}
