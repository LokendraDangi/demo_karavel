<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Product extends Model
{
    protected $table='products';
    protected $fillable=['category_id','subcategory_id','productline_id','name','slug','price','discount','quantity','stock','feature_key','discount_key','short_description','description','meta_keyword','meta_description','status','created_by','updated_by'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function productline()
    {
        return $this->belongsTo(ProductLine::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
