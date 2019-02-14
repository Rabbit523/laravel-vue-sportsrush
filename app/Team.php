<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes ;


    protected $table = 'teams' ;

    protected $fillable = [
       'user_id','name','details','type','country','state','city','zip','area','access_type','img_url'
    ] ;

    public function creator(){
        return $this->hasOne(User::class , 'id','user_id') ;
    }

    public function members(){

        return $this->hasMany(TeamMember::class ,'team_id','id') ;

    }

    public function invitationSent(){
        return $this->hasMany(TeamInvitation::class , 'team_id','id') ;
    }

    public function invitationReceived(){

         return $this->hasMany(EventInvitation::class,'team_id','id') ;

    }

    public function joinedEvents(){
        return $this->hasMany(EventMember::class , 'team_id','id') ;
    }

    public function joinedTeams(){
        return $this->hasMany(TeamMember::class,'member_id','id') ;
    }

    
}
