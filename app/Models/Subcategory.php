<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Subcategory extends Model
{
   protected $table='subcategories';
   protected $fillable=['category_id','name', 'rank', 'slug', 'meta_keyword', 'meta_description', 'status', 'created_by', 'updated_by'];
   public function products(){
       return $this->hasMany(Product::class);
   }
    public function productlines()
    {
        return $this->hasMany(ProductLine::class,'subcategory_id');
    }
    public  function  category(){
        return $this->belongsTo(Category::class);
    }
}
