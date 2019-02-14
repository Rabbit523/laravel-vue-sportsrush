<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHandler extends Controller
{
    public function profile(Request $request){
        return view('profile') ;
    }

    public function updateProfile(Request $request){
        if($request->get('user_id') == null) {
            $user_id = Auth::user()->getAuthIdentifier() ;
        }    else {
            $user_id = $request->get('user_id') ;
        }

        $user = User::find($user_id) ;

        if($user != null) {

            if($request->get('password') != null) {

                if($request->get('password') != $request->get('password_confirmation')) {
                    $request['password'] = $user->password ;

                    session()->put('error','Passwords do not match !') ;

                } else {
                    $request['password'] = bcrypt($request->password) ;
                }

            }  else {
                $request['password'] = $user->password ;

            }

            $user->update($request->all()) ;

            session()->put('success','Profile info updated successfully !');


        }

        return redirect()->back()  ;


    }
}
