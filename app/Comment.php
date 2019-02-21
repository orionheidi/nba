<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $garded = ['id'];
 
    // const STORE_RULES = [
    //     'content' => 'required | min:10',
    // ];

    protected $fillable = [
        'team_id','user_id','content'
    ];
    
    public function team(){
        // return $this->belongsTo('User');
        return $this->belongsTo(Team::class,'team_id');
    }

    public function user(){
        // return $this->belongsTo('User');
        return $this->belongsTo(User::class,'user_id');
    }
}
