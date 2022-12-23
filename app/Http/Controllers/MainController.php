<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Models\todos;
use App\Models\meeting;
use App\Models\subject;
use App\Models\set;
use App\Models\deck;

class MainController extends Controller
{
    public function index(){

        $data['totaltodos'] = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->withTrashed()->count();
        //$data['asdfsdfsdfsdf'] = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->withTrashed()->count();
        $data['completedtodos'] = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->onlyTrashed()->count();
        $data['todos'] = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->get();
        $data['trashedtodos'] = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->onlyTrashed()->get();
        $data['meetings'] = meeting::where('user_id',Auth::user()->id)->get();
        $data['subjects'] = subject::where('user_id',Auth::user()->id)->get();

        $data['setscount'] = set::where('userid',Auth::user()->id)->count();
        if($data['setscount'] > 2){
            $data['sets'] = set::where('userid',Auth::user()->id)->orderBy('updated_at', 'desc')->take(2)->get();

            if(count($data['sets']) > 0){
                
                $data['set0totaltodos'] = todos::where([['user_id',Auth::user()->id],["setid",$data['sets'][0]->id]])->withTrashed()->count();
                $data['set0completedtodos'] = todos::where([['user_id',Auth::user()->id],["setid",$data['sets'][0]->id]])->onlyTrashed()->count();

                $data['set1totaltodos'] = todos::where([['user_id',Auth::user()->id],["setid",$data['sets'][1]->id]])->withTrashed()->count();
                $data['set1completedtodos'] = todos::where([['user_id',Auth::user()->id],["setid",$data['sets'][1]->id]])->onlyTrashed()->count();

            }

            $data["set0deckdata"] = deck::where('setid',$data['sets'][0]->id)->count();
            $data['set1deckdata'] = deck::where('setid',$data['sets'][1]->id)->count();
        } 
        $data['total_class'] = subject::where('user_id',Auth::id())->count();

        return view('index',$data);
    }

    public function login(Request $request){
        return view('login');
    }

    public function register(Request $request){
        return view('register');
    }

    public function check(Request $request){
        $request->validate([
            'username'=>' required',
            'password'=>'required'
        ]);

        $input = $request->all();
        if(auth()->attempt(array("username" => $input['username'], 'password' => $input['password']))){
            if(Auth::user()->usertype == '2'){
                return redirect('/admin');
            }else if(Auth::user()->usertype == '0'){
                return redirect('/teacher');    
            }
            else{
                return redirect('/home');
            }
        }
        else{
            return back()->with('error','Please enter Correct Password');
        }
    }

    public function registerUser(Request $request){

        $request->validate([
            'name'=> 'required',
            'email'=>' required | email ',
            'username' => "required|unique:users",
            'password'=>'required | min:8 | max:15',
            'cpassword'=> 'required | same:password',
        ]);


        $existUser = User::where('email',$request->email)->first();

        if($existUser){
            $user = User::where('email',$request->email)->first(); 
        }
        else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
        }

        $user->username = $request->username;
        $user->usertype = $request->usertype;
        $user->password = Hash::make($request->password);

        if($user->save()){

            if($user->usertype == '1'){
                return redirect('/home');
            }
            if($user->usertype == '0'){
                return redirect('/teacher');
            }
        }
        else{
            return back()->with('error','There is something wrong please try again later.');

        }
    }

    public function timelinecreator(){
        return view('TimelineCreator');
    }
    
    public function logout(Request $request){
        Auth::logout();
        return view('homepage');
    }
    public function teachersdashboard(){
        return view('teachers-dashboard');
    }

    public function editprofile(Request $request){
        $user = Auth::User();
        $user->name = $request->name;
        $user->email = $request->email;

        if($user->update())
        {
            Session::flash('success', 'Profile Updated Successful!');
            return back();
        }
        else
        {
            Session::flash('error', 'There is something wrong please try again later.');
            return back();   
        }
    }

    public function changepassword(Request $request){
        //dd($request->all());

        $user = Auth::User();
        $oldpassword = $request->oldpass;
        $newpassword = $request->newpass;

        if(Hash::check($oldpassword, $user->password))
        {
            $data=array(
                'password' => Hash::make($newpassword)
            );
            $query = User::where('id',$user->id)->update($data);
            if($query)
            {
                return response()->json(['success'=> 1 ,'message'=>'Passwords Updated.']);
            }
            else
            {
                return response()->json(['success'=> 0 ,'message'=>'Passwords not Updated.']); 
            }
        }
        else
        {
            return response()->json(['success'=> 2 ,'message'=>'Incorrect Old Password.']); 
        }
    }

    public function changeprofileimage(Request $request){

        $user = Auth::user();

        if(!empty($request->profile_image))
        {
            ($user->profile_image != "")?@unlink(public_path('assets/img/userprofiles/'.$user->profile_image)):"";
            $path = public_path().'/assets/img/userprofiles/';
            $image = $request->profile_image;
            $filename = strtolower(time().$image->getClientOriginalName());
            $image->move($path, $filename);
            $user->profile_image = $filename;
        }

        if($user->update())
        {
            return response()->json(['success'=> 1 ,'message'=>'Profile Image Updated.']);
        }
        else
        {
            return response()->json(['success'=> 0 ,'message'=>'There is something wrong please try again later.']); 
        }
    }
}
