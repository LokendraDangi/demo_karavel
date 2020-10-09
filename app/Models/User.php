<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class User extends Model
{
    protected $table='users';
    protected $fillable=['name','email','password','role_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
