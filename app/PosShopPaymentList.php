<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PosShopPaymentList extends Model
{
    protected $table = 'shop_Payment_List';
    protected $fillable = [
        'user_id',
        'sl_no',
        'status_payment',
        'date',
        'month',
        'monthly_fee',
        'total',
        'transaction_id',
        'remarks',
    ];
    protected $casts = [
        'date' => 'date',
        'monthly_fee' => 'decimal:2',
        'total' => 'decimal:2',
    ];
}
