<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterHandler extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all() , [
            'email' => 'required|unique:users' ,
            'password' => 'required|confirmed|min:5|max:20'
        ])->validate() ;

        $request['password'] = bcrypt($request->get('password')) ;

        $create_user = User::create($request->all()) ;

        if(Auth::check() && Auth::user()->role == 'admin') {

            session()->put('success','The user has been created successfully !');

            return redirect()->back() ;

        }

        session()->put('success','Congratulations ! You have registered successfully !') ;


        return redirect()->route('profile.settings') ;


    }
}
