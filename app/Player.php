<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function team(){
        // return $this->belongsTo('User');
        return $this->belongsTo(Team::class,'team_id');
    }

}
