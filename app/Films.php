<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    public $timestamps = false;

    public function actors(){
        return $this->belongsToMany('App/Actors', 'actor_film', 'film_id', 'actor_id');
    }
}
