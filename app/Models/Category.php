<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Category extends Model
{
    protected $table='categories';
    protected $fillable=['name','image','rank', 'slug', 'meta_keyword', 'meta_description', 'status', 'created_by', 'updated_by'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
