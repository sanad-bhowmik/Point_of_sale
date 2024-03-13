<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    use HasFactory;

    protected $table = 'shop_infos';

    protected $fillable = [
        'user_id',
        'shop_name',
        'shop_address',
        'shop_img',
        'status',
    ];
}
