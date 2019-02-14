<?php

namespace App\Http\Controllers;
use App\Event;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesHandler extends Controller
{
    public function index(Request $request){
        return view('welcome') ;
    }

    public function about(Request $request){
        return view('about') ;
    }

    public function contact(Request $request){
        return view('contact') ;
    }

    public function whoAreWe(Request $request){
        return view('who-are-we') ;
    }

    public function login(Request $request){

        session()->put('login_error','Please login to continue !') ;

        return redirect(route('home.main')) ;

    }

    public static function notification(){

        if(session()->get('success') != null) {
            ?>

            <div class="col-md-12">

                <div class="alert alert-success">

                    <?php echo session()->pull('success') ; ?>
                </div>

            </div>

            <?php
        }

        if(session()->get('error') != null) {
            ?>

            <div class="col-md-12">

                <div class="alert alert-danger">

                    <?php echo session()->pull('error') ; ?>
                </div>

            </div>

            <?php
        }





    }

    public function dashboard(Request $request){

         $latest_events = Event::where('access_type','=','Public')->limit(4)->orderBy('id','desc')->get() ;

         $latest_teams = Team::where('access_type','=','Public')->limit(4)->orderBy('id','desc')->get();

         return view('dashboard')->with([
                 'teams' => $latest_teams ,
                 'events' => $latest_events
         ])     ;

    }




}
