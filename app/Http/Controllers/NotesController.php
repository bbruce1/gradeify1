<?php

namespace App\Http\Controllers;

use App\Models\Set;
use App\Models\timeline;
use App\Models\notes;
use Illuminate\Http\Request;
use Auth;

class NotesController extends Controller
{
    public function index($setid){

        $ndata = notes::where('setid', $setid)->get();
        return view('noteorganizer',compact("ndata","setid"));
    }

    public function createnote(Request $request,notes $note){
        $note->setid = $request->setid;
        $note->title = $request->title;
        $note->description = $request->description;
        $note->createdby = Auth::user()->id;
        if($note->save()){
            return response()->json(['success'=>"1","response"=>"Note saved successfully."]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There is something wrong please try again later."]);
        }
    }

    public function savenote(Request $request,$setid){
        $noteid = $request->noteid;
         $note = notes::where('id', $noteid)->update([
            'description' => $request->notedesc,
            ]);

        if($note){
            return redirect("/noteorganizer/".$setid);
            // return response()->json(['success'=>"1","response"=>"Note saved successfully."]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There is something wrong please try again later."]);
        }


    }

    public function notedetails($setid,$noteid){
        $ndata = notes::where("id",$noteid)->first();
        return view("notedetails",compact("setid","noteid","ndata"));
    }

    public function deleteNote(Request $request){
        $delNoteId = $request->delNoteId;
        $noteData = notes::where("id",$delNoteId)->first();
        if($noteData->delete()){
           return response()->json(["success"=>"1","response"=>"Note deleted succesfully!"]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There is something wrong please try again later."]);
        }
    }
}
