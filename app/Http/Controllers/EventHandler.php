<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventInvitation;
use App\EventMember;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventHandler extends Controller
{
    public function createEventForm(Request $request){
        return view('create-event')  ;
    }

    public function registerEvent(Request $request){

        try {

            $request['user_id'] = Auth::user()->getAuthIdentifier();

            $image_file = $request->file('img');

            $request['img_url'] = Storage::disk('local')->put(time() . $image_file->getClientOriginalName(), $image_file);



            $create_event = Event::create($request->all());

            session()->put('success', 'Event has been created successfully !');
        } catch (\Exception $exception){
            session()->put('error', 'Failed to create the event !'. $exception->getMessage());

        }

        return redirect()->back()  ;


    }

    public function myEvents(Request $request){

        $my_events = Event::where('user_id','=', Auth::user()->getAuthIdentifier())->orderBy('id','desc')->paginate() ;

        return view('my-events')->with(['events' => $my_events]) ;

    }

    public function editEvent(Request $request){

        return view('edit-event') ;

    }

    public function updateEvent(Request $request) {


        $event = Event::find($request->get('event_id')) ;

        if($event != null) {

            if($request->file('img') != null) {
                $file = $request->file('img') ;
                $request['img_url'] = Storage::disk('local')->put(time().$file->getClientOriginalName() , $file) ;


            }  else {
                $request['img_url'] = $event->img_url ;
            }

            $event->update($request->all()) ;

            session()->put('success','Event updated successfully !') ;

        }

        return redirect()->back() ;
    }

    public function deleteEvent(Request $request) {

        $event = Event::find($request->get('event_id')) ;

        if($event != null) {

            $event->members()->delete() ;
            $event->invitations()->delete() ;

            $event->delete() ;

            session()->put('success','The event has been deleted successfully !');

        }

        return redirect() ->back() ;

    }

    public function myInvitations(Request $request){

        $my_teams = User::find(Auth::user()->getAuthIdentifier())->myTeams()->with(['invitationReceived'])->paginate();


        return view('event-invitations')->with(['team_invitations' => $my_teams])  ;

    }

    public function getJoinable(Request $request) {

        $events = Event::where('access_type','=','Public')->orderBy('id','desc')->paginate() ;

        foreach ($events as $event) {
           $event->hasMembership = $event->hasMembership() ;
        }


        return view('join-events')->with([
            'events' => $events ]);
    }

    public function getEventDetails($event_id){

         $event = Event::where('id', $event_id)->with(['creator','invitations','members'])->first() ;
         return $event ;
    }

    public function viewEventDetails(Request $request){
        return view('event-details')->with('event', $this->getEventDetails($request->get('event_id'))) ;
    }

    public function manageEvent(Request $request){



            $data = $request->get('search') ;
            $search_user = User::where('first_name','LIKE','%'.$data)->orWhere('first_name','LIKE',$data.'%')->orWhere('first_name','LIKE','%'.$data.'%')->orWhere('last_name','LIKE','%'.$data)->orWhere('last_name','LIKE',$data.'%')->orWhere('last_name','LIKE','%'.$data.'%')->orWhere('email','LIKE',$data.'%')->orWhere('email','LIKE','%'.$data.'%')->paginate(15) ;

           $search_team = Team::where('name','LIKE','%'.$data)->orWhere('name','LIKE',$data.'%')->orWhere('name','LIKE','%'.$data.'%')->paginate(15) ;



        return view('manage-event')->with([
            'event' => $this->getEventDetails($request->get('event_id'))  ,
            'search_team' => $search_team ,
            'search_user' => $search_user
        ])  ;
    }

    public function sendInvitation(Request $request){

        $check_invitation = EventInvitation::where('event_id', $request->get('event_id'))->where('team_id',$request->get('team_id'))->where('member_id',$request->get('member_id'))->first() ;

        if($check_invitation != null) {
            session()->put('error','Invitation already sent !')  ;

            return redirect() ->back()  ;
        }

        $check_if_member = EventMember::where('event_id',$request->get('event_id'))->where('team_id',$request->get('team_id')) ->where('member_id', $request->get('member_id')) ->first() ;

        if($check_if_member != null) {
            session()->put('error','This team / user already joined the event !') ;

            return redirect()->back() ;
        }

        $join_event = EventInvitation::create([
            'event_id' => $request->get('event_id'),
            'team_id' => $request->get('team_id'),
            'member_id' => $request->get('member_id'),
            'status' => 'Invited',

        ])   ;

        session()->put('success','Invitation has been sent successfully !') ;

        return redirect() ->back()  ;

    }

    public function joinEvent(Request $request){

        $check_if_joined = EventMember::where('event_id','=',$request->get('event_id'))->where('team_id','=', $request->get('team_id'))->where('member_id','=', Auth::user()->getAuthIdentifier())->first() ;

        if($check_if_joined != null) {
            session()->put('error','You already joined this event !') ;

            return redirect()->back() ;
        }

        $create_member = EventMember::create([
             'event_id' => $request->get('event_id') ,
            'team_id' => $request->get('team_id') ,
            'member_id' => Auth::user()->getAuthIdentifier()
        ])  ;

        session()->put('success','You have successfully joined the event !') ;

        return redirect()->back() ;

    }

    public function acceptInvitation(Request $request) {

        $invitation = EventInvitation::find($request->get('invitation_id')) ;

        if($invitation == null) {

            session()->put('error','Invitation does not exist !') ;

            return redirect()->back() ;

        }
        $invitation->team = Team::find($invitation->team_id) ;
        if($invitation->team != null) {

            $invitation->member_id = $invitation->team->creator->id ;

        }

        $check_if_already_member = EventMember::where('event_id','=', $invitation->event_id)->where('team_id',$invitation->team_id)->where('member_id', $invitation->member_id)->first() ;

        if($check_if_already_member != null) {

            session()->put('error','You have already joined the event !') ;

            return redirect()->back() ;

        }

        $join_event = EventMember::create([
            'team_id' => $invitation->team_id ,
            'event_id' => $invitation->event_id ,
            'member_id' => $invitation->member_id
        ]) ;

        session()->put('success','Successfully joined the event !') ;

        $invitation->delete() ;

        return redirect()->back() ;

    }

    public function joinedEvents(Request $request){

        $joinedEvents = User::find(Auth::user()->getAuthIdentifier()) ->joinedEvents()->with(['team','event'])->paginate() ;

        return view('joined-events')->with([
            'events' => $joinedEvents
        ])    ;

    }



    public static function calendarData(){

        $events = Event::where('access_type','=','Public')->orderBy('id','desc')->get() ;

        foreach ($events as $event){
            $event->start = $event->starting_time ;

            $event->end = $event->ending_time ;

            $event->url = route('event.details',['event_id' => $event->id]) ;
        }

        return $events ;

    }

}
