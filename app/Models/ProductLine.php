<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class ProductLine extends Model
{
    protected $table='productlines';
    protected $fillable=['category_id','subcategory_id','name','slug','rank','status','created_by','updated_by'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
