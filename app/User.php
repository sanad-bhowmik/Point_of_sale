<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'token',
        'username',
        'shop',
        'shop_code',
        'photo',
        'state',
        'zip',
        'residency',
        'city',
        'country',
        'reset_token',
        'address',
        'phone',
        'fax',
        'affilate_code',
        'verification_link',
        'shop_name',
        'owner_name',
        'shop_number',
        'shop_address',
        'reg_number',
        'shop_message',
        'is_vendor',
        'shop_details',
        'shop_image',
        'f_url',
        'g_url',
        't_url',
        'l_url',
        'f_check',
        'g_check',
        't_check',
        'l_check',
        'shipping_cost',
        'date',
        'mail_sent',
        'balance',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
