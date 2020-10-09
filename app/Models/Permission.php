<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Permission extends Model
{
    protected  $table='permissions';
    protected $fillable=['module_id','name','route','status','created_by','updated_by'];

    function module(){
        return $this->belongsTo(Module::class);
    }
    function roles(){
        return $this->belongsToMany(Role::class);
    }
}
