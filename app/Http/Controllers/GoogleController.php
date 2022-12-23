<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
  

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        // try {
            
            $user = Socialite::driver('google')->stateless()->user();
         
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
       
                Auth::login($finduser);

                if($finduser->usertype == '1'){
                    return redirect('/home');
                }
                if($finduser->usertype == '0'){
                    return redirect('/teacher');
                }
      
            }else{

                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->google_id = $user->id;

                $newUser->save();
      
                // Auth::login($newUser);
      
                return view('register',compact('newUser'));
            }
    }
}