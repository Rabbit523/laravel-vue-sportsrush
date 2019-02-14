<?php

namespace App\Http\Controllers;

use App\CMS;
use App\Event;
use App\Slide;
use App\Team;
use App\User;
use Cloudinary;
use Cloudinary\Uploader ;

use Illuminate\Http\Request;

class AdminHandler extends Controller
{
    public function manageUsers(Request $request) {

        $users = User::orderBy('id','desc')->paginate() ;

        return view('admin.manage-users')->with([
            'users' => $users
        ])  ;

    }

    public function userProfile(Request $request){
          return view('admin.profile') ;
    }

    public function manageEvents(Request $request) {

        $events = Event::orderBy('id','desc')->paginate() ;

        return view('admin.manage-events') ->with([
            'events' => $events
        ])  ;

    }

    public function manageTeams(Request $request) {

        $teams = Team::orderBy('id','desc')->paginate() ;

        return view('admin.manage-teams')->with('teams', $teams) ;

    }

    public function createEvent(Request $request){
        return view('admin.create-event') ;
    }


    public function createTeam(Request $request){
        return view('admin.create-team') ;
    }

    public function createUser(Request $request){

        return view('admin.create-user')  ;

    }

    public function manageCMS(Request $request){

        return view('admin.cms') ;

    }

    public function updateCMS(Request $request){

        $cms = CMS::find(1) ;

        $cms->update($request->all()) ;

        session()->put('success','Updated successfully !') ;

        return redirect()->back()  ;

    }


    public function manageSlides(Request $request){
        return view('admin.slides') ;
    }


    public function saveSlides(Request $request){

        Cloudinary::config(array(
            "cloud_name" => "dhopziqwo",
            "api_key" => "674121244375956",
            "api_secret" => "8HEBKpWNcNVgDOqoW3kfsOr0G9c"
        ));

        if($request->slide != null) {

            foreach ($request->slide as $value) {
                    $handleUploadAction = Uploader::upload($value, array(
                        "crop" => "scale", "width" => 1600, "height" => 750
                    ));

                    $create_slide = Slide::create([
                        'img_url' => $handleUploadAction['secure_url']
                    ]);
                

            }

            session()->put('success','Saved successfully !') ;

        }

        return redirect() ->back() ;


    }

    public function deleteSlide(Request $request){

        $slide_count = Slide::count() ;

        if($slide_count < 2) {
            session()->put('error','You must need to keep at least 1 slide !') ;

            return redirect()->back() ;
        }

        $slide = Slide::find($request->get('slide_id')) ;

        $slide->delete() ;

        session()->put('success','The slide has been deleted successfully !');

        return redirect()->back()  ;

    }

    public function deleteUser(Request $request){

        $user = User::find($request->get('user_id')) ;

        if($user->role == 'admin') {
            session()->put('error','Admin can not be deleted !') ;

            return redirect()->back()  ;
        }

        $user->myTeams()->delete() ;

        $user->myEvents()->delete() ;

        $user->joinedTeams()->delete() ;

        $user->joinedEvents()->delete() ;

        $user->teamInvitations()->delete() ;

        $user->eventInvitations()->delete() ;

        $user->delete() ;

        session()->put('success','All the records of selected user has been deleted from system .')  ;

        return redirect()->back()  ;

    }




    



}
