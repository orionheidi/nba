<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
 
    protected $fillable = [
        'team_id','user_id','content'
    ];
    
    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
