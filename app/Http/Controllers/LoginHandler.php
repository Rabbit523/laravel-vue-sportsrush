<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginHandler extends Controller
{
    public function login(Request $request){

        if(Auth::attempt([
            'email' => $request->get('email') ,
            'password' => $request->password
        ])) {



            session()->put('success','You have logged in successfully !') ;

            if(Auth::user()->role == 'admin') {
                 return redirect()->route('admin.dashboard') ;
            }

            return redirect()->route('account.dashboard') ;

        }

        session()->put('login_error','Unable to login for invalid credentials !') ;

        return redirect()->back() ;

    }

    public function logout(Request $request){

        Auth::logout() ;

        session()->put('login_error','You have been logged out successfully !') ;

        return redirect(route('home.main')) ;

    }

    public function redirectToProvider($method)
    {
        return Socialite::driver($method)->redirect();
    }

    public function handleProviderCallback($method) {

        try {

            $user = Socialite::driver($method)->user();

            if ($method == 'facebook') {
                $field = 'fb_id';
            } elseif ($method == 'google') {
                $field = 'google_id';
            } else {
                session()->put('login_error', 'Unauthorized login method tried !');

                return redirect(route('home.main'));
            }

            $id = $user->getId();

            $email = $user->getEmail();

            $check_existence = User::where($field, '=', $id)->orWhere('email', '=', $email)->first();

            if ($check_existence == null) {

                $create_new_user = User::create([
                    $field => $id,
                    'email' => $email,
                    'first_name' => $user->getName()
                ]);

                Auth::loginUsingId($create_new_user->id);

                session()->put('success', 'You have logged in successfully !');

                return redirect(route('account.dashboard'));

            }

            $check_existence->update([
                $field => $id,
                'email' => $email
            ]);

            session()->put('success', 'You have logged in successfully !');

            return redirect(route('account.dashboard'));

        } catch (\Exception $exception){
            session()->put('login_error', 'Something went wrong while processing your request !'.$exception->getMessage());

            return redirect()->back() ;

        }


    }




}
