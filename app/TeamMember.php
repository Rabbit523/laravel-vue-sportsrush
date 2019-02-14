<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use SoftDeletes ;

    protected $table = 'team_members' ;

    protected $fillable = [
         'team_id','member_id','invited_by'
    ] ;

    public function team(){
        return $this->hasOne(Team::class ,'id','team_id') ;
    }

    public function member(){

        return $this->hasOne(User::class ,'id','member_id') ;

    }

    public function invitedBy(){
        return $this->hasOne(User::class,'id','invited_by') ;
    }

}
