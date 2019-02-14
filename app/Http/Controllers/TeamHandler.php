<?php

namespace App\Http\Controllers;

use App\Team;
use App\TeamInvitation;
use App\TeamMember;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamHandler extends Controller
{
    public function createTeamForm(Request $request){

        return view('create-team') ;
        
    }

    public function registerTeam(Request $request){


        try {
            $request['user_id'] = Auth::user()->getAuthIdentifier();

            $image_file = $request->file('img');

            $request['img_url'] = Storage::disk('local')->put(time() . $image_file->getClientOriginalName(), $image_file);

            $create_event = Team::create($request->all());

            session()->put('success', 'Team has been created successfully !');
        }catch (\Exception $exception){
            session()->put('error', 'Failed to create the team !'. $exception->getMessage());

        }

            return redirect()->back()  ;


    }

    public function myTeams(Request $request){

        $my_teams = Team::where('user_id','=', Auth::user()->getAuthIdentifier())->orderBy('id','desc')->paginate() ;

        return view('my-teams')->with(['teams' => $my_teams]) ;

    }


    public function getTeamDetails($team_id){

        return Team::where('id',$team_id)
            ->with(['members','invitationSent','creator','invitationReceived'])->first() ;

    }

    public function viewTeamDetails(Request $request){

        return view('team-details')->with('team', $this->getTeamDetails($request->get('team_id'))) ;

    }


    public function manageTeam(Request $request){
         //return  $this->getTeamDetails($request->get('team_id')) ;
         $data = $request->get('search') ;
         $search = User::where('first_name','LIKE','%'.$data)->orWhere('first_name','LIKE',$data.'%')->orWhere('first_name','LIKE','%'.$data.'%')->orWhere('last_name','LIKE','%'.$data)->orWhere('last_name','LIKE',$data.'%')->orWhere('last_name','LIKE','%'.$data.'%')->orWhere('email','LIKE',$data.'%')->orWhere('email','LIKE','%'.$data.'%')->paginate(15) ;


         return view('manage-team')->with([
             'team' => $this->getTeamDetails($request->get('team_id'))   ,
             'search' => $search
         ])  ;

    }

    public function myInvitations(Request $request){
        
        return view('team-invitations')->with([
            'invitations' => User::find(Auth::user()->getAuthIdentifier())->teamInvitations()->paginate()
        ]) ;
    }

    public function teams($name , $accessibility){

        return Team::where('user_id','<>', Auth::user()->getAuthIdentifier())->where('name','LIKE' ,'%'.$name.'%')->where('access_type','=', $accessibility) ->with(['creator'])->paginate(15) ;

    }

    public function getJoinable(Request $request) {
        return view('join-teams')->with([
            'teams' => $this->teams($request->get('name') , 'Public')
        ])  ;
    }

    public function sendInvitation(Request $request){

        if($request->get('receiver_id') == Auth::user()->getAuthIdentifier()) {
            session()->put('error','You can not send invitation to yourself !') ;

            return redirect()->back() ;
        }

        $check_if_invited = TeamInvitation::where('receiver_id','=', $request->get('receiver_id'))->where('team_id','=', $request->get('team_id')) ->first() ;

        if($check_if_invited != null) {

            session()->put('error','You have already sent an invitation to this user !') ;

            return redirect()->back() ;

        }

        $check_if_member = TeamMember::where('team_id',$request->get('team_id'))->where('member_id', $request->get('receiver_id'))->first() ;

        if($check_if_member != null) {

            session()->put('error','This user is already a member of this team !') ;

            return redirect()->back()  ;

        }

        $create_invitation = TeamInvitation::create([
            'team_id' => $request->get('team_id'),
            'receiver_id' => $request->get('receiver_id'),
            'status' => 'Invited',

        ]) ;

        session()->put('success','Your invitation has been sent successfully to this user !') ;

        return redirect()->back() ;

    }

    public function deleteInvitation(Request $request){

        $invitation = TeamInvitation::find($request->get('invitation_id')) ;

        if($invitation != null) {
            $invitation->delete() ;

            session()->put('success','The invitation has been deleted successfully !') ;

        }

        return redirect()->back()  ;

    }

    public function acceptInvitation(Request $request){

        $invitation = TeamInvitation::find($request->get('invitation_id')) ;

        if($invitation == null) {
            session()->put('error','The invitation does not exist anymore !') ;

            return redirect()->back()  ;
        }

        $become_member = TeamMember::create([
            'team_id' => $invitation->team_id,
            'member_id' => $invitation->receiver_id,
            'invited_by' => $invitation->team->user_id
        ])  ;

        $invitation->delete() ;

        session()->put('success','Well done ! you have successfully joined the team !')  ;

        return redirect()->back()  ;

    }


    public function deleteMember(Request $request){

        $team_member = TeamMember::find($request->member_id) ;

        if($team_member != null) {
            $team_member->delete() ;

            session()->put('success','The member has been removed from this team !') ;
        }

        return redirect()->back()  ;

    }


    public function joinTeam(Request $request){
        
        $check_if_member = TeamMember::where('team_id','=', $request->get('team_id'))->where('member_id','=', Auth::user()->getAuthIdentifier()) ->first() ;

        if($check_if_member != null) {

            session()->put('error','You are already a member of this team !') ;

            return redirect()->back();

        }

        $become_member = TeamMember::create([
            'team_id' => $request->get('team_id'),
            'member_id' => Auth::user()->getAuthIdentifier(),
        ]);

        session()->put('success','Well done ! you have successfully joined the team !')  ;

        $check_if_invited = TeamInvitation::where('team_id', $request->get('team_id') )->where('receiver_id', Auth::user()->getAuthIdentifier()) ->first() ;

        if($check_if_invited != null) {
            $check_if_invited->delete() ;
        }

        echo json_encode("success");        
    }

    public function joinedTeams(Request $request){

        $joined_teams = User::find(Auth::user()->getAuthIdentifier())->joinedTeams()->paginate() ;

        return view('joined-teams')->with(['teams' => $joined_teams]) ;

    }

    public function teamChat(Request $request) {
        $teams = Team::get();
        $team_member = TeamMember::get();
        $users = User::get();
        return view('team-chat')->with(['teams'=> $teams, 'teams_members' => $team_member, 'users'=>$users]);
    }
}
