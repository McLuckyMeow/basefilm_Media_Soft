<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    public $timestamps = false;

    public function films(){
        return $this->belongsToMany('App/Films', 'actor_film', 'actor_id', 'film_id');
    }
}
