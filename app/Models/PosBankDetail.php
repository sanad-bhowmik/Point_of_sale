<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosBankDetail extends Model
{

    protected $table = 'bank_details';

    protected $fillable = [
        'name',
        'account_no',
        'status',
    ];

}
