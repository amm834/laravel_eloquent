<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    function posts(){
     return $this->hasManyThrough('App\Post','App\User','city_id','user_id');
    }
}
