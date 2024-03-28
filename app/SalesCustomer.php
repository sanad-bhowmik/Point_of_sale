<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesCustomer extends Model
{
    protected $table = 'sales_customer';

    protected $fillable = [
        'name',
        'number',
    ];
}
