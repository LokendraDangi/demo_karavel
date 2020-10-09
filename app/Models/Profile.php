<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table='profiles';
    protected $fillable=['name', 'phone', 'address', 'email', 'logo', 'map_link','facebook_link',
        'twitter_link','instagram_link','youtube_link', 'created_by', 'updated_by'];

}

