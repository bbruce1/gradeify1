<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Set;
use App\Models\Deck;
use App\Models\flashcard;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function index(Request $request){
        $setid = $request->route('setid');
        $decks = Deck::where('setid', $setid)->get();
        return view("createdeck",compact("decks","setid"));
    }

    public function createdeck(Request $request,deck $deck){
        $deck->userid = Auth::user()->id;
        $deck->setid = $request->setid;
        $deck->deck_name = $request->deckname;
        $deck->description = $request->deckdesc;
        if($deck->save()){
            return response()->json(['success'=>"1","response"=>"Deck created successfully."]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
        }
    }

    public function deleteDeck(Request $request){
        $deckId = $request->id;
        $delDeck = Deck::where('id',$deckId)->first();
        if($delDeck->delete()){
             return redirect()->back();
        }
    }

    public function clearalldecks(Request $request){
        $setId = $request->setid;
        $userId = Auth::id();
        $delDeck = Deck::where('setid',$setId)->where('userid',$userId)->get();
        foreach($delDeck as $deck){
            $deck->delete();
        }
        return redirect()->back();
    }


    public function newDeckFlashPage(Request $request){
        $setId = $request->id;
        return view("newDeckFlashPage",compact('setId'));
    }


    public function createFlashDeckSave(Request $request){
        $array = $request->all();
        $title = $request->title;
        $description = $request->description;
        $setid = $request->setId;
        unset($array['title']);
        unset($array['description']);
        unset($array['_token']);
        unset($array['setId']);
        $newDeck = new Deck;
        $newDeck->userid = Auth::id();
        $newDeck->setid = $setid;
        $newDeck->deck_name = $title;
        $newDeck->description = $description;
        $newDeck->save();
        $deckId = $newDeck->id;
        $i = 1;
        foreach($array as $key=>$value){
            if($key == 'flashTerm'.$i){
                if($value != '' && $value != NULL){
                    $newFlash = new flashcard;
                    $newFlash->userid = Auth::id();
                    $newFlash->deck_id = $deckId;
                    $newFlash->flashcard_terms = $value;
                    $desVar = 'flashDes'.$i;
                    $newFlash->flashcard_defination = $array[$desVar];
                    $newFlash->save();
                }
                $i++;
            }
        }
        return response()->json(['success'=>"1","response"=>"Deck created successfully."]);
    }
}
