<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventInvitation extends Model
{
    use SoftDeletes ;

    protected $table = 'event_invitations' ;
    
    protected $fillable = [
        'event_id','team_id','member_id','status','message'
    ] ;

    public function event(){
        return $this->hasOne(Event::class , 'id','event_id') ;
    }

    public function team(){
        return $this->hasOne(Team::class ,'id','team_id') ;
    }

    public function member(){
        return $this->hasOne(User::class ,'id','member_id') ;
    }

    
}
