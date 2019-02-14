<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes ;

    protected $table = 'users' ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'first_name','last_name','email','password','date_birth','country','state','city','zip','street','interest','role','fb_id','google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teamInvitations(){
        return $this->hasMany(TeamInvitation::class,'receiver_id','id') ;
    }

    public function eventInvitations(){
        return $this->hasMany(EventInvitation::class,'member_id','id') ;
    }


    public function joinedTeams(){

        return $this->hasMany(TeamMember::class,'member_id','id')  ;

    }

    public function joinedEvents(){
        return $this->hasMany(EventMember::class,'member_id','id') ;
    }

    public function myTeams(){
        return $this->hasMany(Team::class , 'user_id','id') ;
    }

    public function myEvents(){
        return $this->hasMany(Event::class,'user_id','id');
    }

    


}
