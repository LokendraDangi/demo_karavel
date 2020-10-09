<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Customer extends Model
{
    protected $fillable=['name', 'email', 'password','phone','address','shipping_address','username','verification_key','status','last_login'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected  $nullable = ['last_login'];

}
