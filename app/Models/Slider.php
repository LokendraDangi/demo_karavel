<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Slider extends Model
{
    protected $table='sliders';
    protected $fillable=['title','slug','description','image','link','status','created_by','updated_by'];
}
