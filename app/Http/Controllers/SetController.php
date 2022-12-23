<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\set;
use App\Models\sharedset;
use App\Models\Deck;
use App\Models\User;
use App\Models\todos;
use App\Models\notes;
use App\Models\flashcard;
use App\Models\timeline;
use App\Models\timeLineDes;
use Illuminate\Http\Request;

class SetController extends Controller
{
    public function index(){
        $sets = Set::where("userid",Auth::user()->id)->orderBy('id', 'DESC')->get();
        $decks = Deck::where([['setid', 0],['userid',Auth::user()->id]])->orderBy('id', 'DESC')->get();
        $user = User::where("id",Auth::user()->id)->first();
        return view("createset",compact('sets','decks','user'));
    }

    public function createset(Request $request,set $set){
        $set->userid = Auth::user()->id;
        $set->sets_name = $request->setname;
        $set->sets_description = $request->setdesc;
        if($set->save()){
            return response()->json(['success'=>"1","response"=>"Set created successfully."]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
        }
    }

    public function website($setid){

        $set = set::where('id',$setid)->first();
        $userlist = User::where('id','!=',Auth::user()->id)->where('usertype','!=','2')->where('role','Premium')->get();

        $copyset = set::where([['userid','!=',Auth::user()->id],['id',$setid]])->first();
        if($copyset){
            $is_copied = "0";
        }else{
            $is_copied = "1";
        }

        if($set->is_shared == "1"){

            //$set = set::where('id',$setid)->first();

            if($set){
                $totaltodos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->withTrashed()->count();
                $completedtodos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->onlyTrashed()->count();
                $todos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->get();
                $trashedtodos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->onlyTrashed()->get();
                $decks = Deck::where('userid',Auth::user()->id)->where('setid',$setid)->get();
                $timelines = timeline::where('setid',$setid)->get();
                foreach($timelines as $timeline){
                    $singleData = timeLineDes::where('timeLineId',$timeline->id)->get();
                    $timeline->allData = $singleData;
                }
                $notes = notes::where('setid',$setid)->get();
                return view("website",compact('setid','totaltodos','completedtodos','todos','trashedtodos','is_copied','userlist','decks','timelines','notes'));
            }
            else{
                return redirect("/sets");
            }
        }else{

            $set = set::where([['userid',Auth::user()->id],['id',$setid]])->first();

            if($set){
                $totaltodos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->withTrashed()->count();
                $completedtodos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->onlyTrashed()->count();
                $todos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->get();
                $trashedtodos = todos::where([['user_id',Auth::user()->id],["setid",$setid]])->onlyTrashed()->get();
                $decks = Deck::where('userid',Auth::user()->id)->where('setid',$setid)->get();
                $timelines = timeline::where('setid',$setid)->get();
                foreach($timelines as $timeline){
                    $singleData = timeLineDes::where('timeLineId',$timeline->id)->get();
                    $timeline->allData = $singleData;
                }
                $notes = notes::where('setid',$setid)->get();
                return view("website",compact('setid','totaltodos','completedtodos','todos','trashedtodos','is_copied','userlist','decks','timelines','notes'));
            }
            else{
                return redirect("/sets");
            }
        }
        
    }

    public function shareset(Request $request){

        //dd($request->all());
        $setid = $request->setid;

        $setdata = set::where('id',$setid)->first();

        if($setdata->is_shared == "1"){
            return response()->json(['success'=>"1","response"=>"Set Already sharabled."]);  
        }
        else{
            $setdata->is_shared = "1";

            if($setdata->update()){
                foreach ($request->userlist as $user) {
                    $sharedset = new sharedset;
                    $sharedset->setid = $setid;
                    $sharedset->set_owner = Auth::user()->id;
                    $sharedset->shared_to = $user;
                    $sharedset->is_copied = 0;

                    $sharedset->save();
                }
                return response()->json(['success'=>"1","response"=>"Set shared successfully."]);
            }else{
                return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
            }
        }
    }

    public function copyset(Request $request){

        $setid = $request->setid;

        $check = sharedset::where([['shared_to',Auth::user()->id],["setid",$setid],["is_copied",'1']])->first();

        if($check){
            return response()->json(['success'=>"1","response"=>"You Already Copied This Set."]);
        }
        else{
            $setdata = set::where('id',$setid)->first();

            $set = new set;
            $set->userid = Auth::user()->id;
            $set->copied_setid = $setid;
            $set->sets_name = $setdata->sets_name;
            $set->sets_description = $setdata->sets_description;
            if($set->save()){

                $deckdata = Deck::where('setid', $setid)->get();

                foreach($deckdata as $ddata){
                    $deck = new Deck;
                    $deck->setid = $set->id;
                    $deck->userid = Auth::user()->id;
                    $deck->deck_name = $ddata->deck_name;
                    $deck->description = $ddata->description;
                    if($deck->save()){

                        $flashdata = flashcard::where('deck_id', $ddata->id)->get();

                        foreach($flashdata as $fdata){
                            $flashcard = new flashcard;
                            $flashcard->deck_id = $deck->id;
                            $flashcard->userid = Auth::user()->id;
                            $flashcard->flashcard_terms = $fdata->flashcard_terms;
                            $flashcard->flashcard_defination = $fdata->flashcard_defination;
                            $flashcard->save();
                        }
                    }
                }
                $sharedset = sharedset::where([['shared_to',Auth::user()->id],["setid",$setid]])->first();

                $sharedset->is_copied = '1';
                if($sharedset->update()){
                    return response()->json(['success'=>"1","response"=>"Set Copied successfully."]);
                }else{
                    return response()->json(['success'=>"0","error"=>"There are something wrong please try again later."]);
                }
                
            }
            else{
                return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
            }
        }
    }

    public function deleteset(Request $request){
        $id = $request->delId;
        $setdata = set::where('id',$id)->first();
        if($setdata->delete()){
            return response()->json(['success'=>"1"]);
        }
        else{
            return response()->json(['success'=>"0"]);
        }
    }
}
