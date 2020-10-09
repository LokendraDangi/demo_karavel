<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Role extends Model
{
    protected $table='roles';
    protected $fillable=['name','status','created_by','updated_by'];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
