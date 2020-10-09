<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected  $table = 'attributes';

    protected $fillable = ['product_id','name','value','status'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
