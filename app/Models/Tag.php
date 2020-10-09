<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name','rank','slug','meta_keyword','meta_description','status','created_by','updated_by'];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}