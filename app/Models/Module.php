<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Module extends Model
{
    protected $table='modules';
    protected $fillable=['name','route','status','created_by','updated_by'];

    function permissions(){
        return  $this->hasMany(Permission::class);
    }
}
