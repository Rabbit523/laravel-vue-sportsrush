<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventMember extends Model
{
    use SoftDeletes ;

    protected $table = 'event_members' ;

    protected $fillable = [
       'event_id','team_id','member_id'
    ] ;

    public function team(){
        return $this->hasOne(Team::class,'id','team_id') ;
    }


    public function member(){
        return $this->hasOne(User::class,'id','member_id') ;
    }

    public function event(){
        return $this->hasOne(Event::class,'id','event_id')  ;
    }


    
}
