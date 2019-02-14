<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use SoftDeletes ;

    protected $table = 'events' ;

    protected $fillable = [
        'user_id','name','type','recurring','starting_time','ending_time','access_type','country','state','city','area','zip','details','img_url','no_members'

] ;

    public function creator(){
        return $this->hasOne(User::class,'id','user_id') ;
    }

    public function members(){
        return $this->hasMany(EventMember::class,'event_id','id') ;
    }

    public function invitations(){
        return $this->hasMany(EventInvitation::class,'event_id','id') ;
    }

    public function hasMembership(){
        return $this->members()->where('member_id','=', Auth::user()->getAuthIdentifier())->first() ;
    }
    
}
