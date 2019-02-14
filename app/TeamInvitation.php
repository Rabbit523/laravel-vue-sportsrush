<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamInvitation extends Model
{
    use SoftDeletes ;

    protected $table = 'team_invitations' ;

    protected $fillable = [
        'team_id','receiver_id','status','message'
    ] ;

    public function team(){
        return $this->hasOne(Team::class,'id','team_id') ;
    }

    public function receiver(){
        return $this->hasOne(User::class,'id','receiver_id') ;
    }

}
