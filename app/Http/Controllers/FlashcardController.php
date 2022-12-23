<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\flashcard;
use Illuminate\Http\Request;
use App\Models\deck;
use App\Models\FlashCardResult;

class FlashcardController extends Controller
{
    public function index(Request $request){
        $deckid = $request->route('deckid');
        $flashcards = flashcard::where('deck_id', $deckid)->get();
        $deck = deck::where('id', $deckid)->first();
        return view("createflashcard",compact("flashcards","deckid","deck"));
    }

    public function createflashcard(Request $request,flashcard $flashcard){
        $flashcard->userid = Auth::user()->id;
        $flashcard->deck_id = $request->deckid;
        $flashcard->flashcard_terms = $request->flashcardname;
        $flashcard->flashcard_defination = $request->flashcarddesc;
        if($flashcard->save()){
            return response()->json(['success'=>"1","response"=>"Flashcard created successfully."]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
        }
    }

    public function flashLearn(Request $request){
        $id = $request->id;
        $flashcards = flashcard::where('deck_id',$id)->get();


        $flashcardFamiliarResult = FlashCardResult::where('userId',Auth::id())->where('deckId',$id)->where('type','familiar')->first();
        $familiarFlash = [];
        $familiarFlashCards = [];
        if($flashcardFamiliarResult && $flashcardFamiliarResult->flashCardId){
            $familiarFlash = explode(',',$flashcardFamiliarResult->flashCardId);
            foreach($flashcards as $key => $flashcard){
                foreach($familiarFlash as $familiar){
                    if($flashcard->id == $familiar){
                       array_push($familiarFlashCards,$flashcard);
                    }
                }
            }
        }


        $flashcards = flashcard::where('deck_id',$id)->get();
        $flashcardMasteredResult = FlashCardResult::where('userId',Auth::id())->where('deckId',$id)->where('type','mastered')->first();
        $flashcardFamiliarResult = FlashCardResult::where('userId',Auth::id())->where('deckId',$id)->where('type','familiar')->first();
        $familiarFlash = [];
        $masterFlash = [];
        $newCards = [];
        if($flashcardMasteredResult && $flashcardMasteredResult->flashCardId){
            $masterFlash = explode(',',$flashcardMasteredResult->flashCardId);
            foreach($flashcards as $key => $flashcard){
                $count = 0;
                foreach($masterFlash as $master){
                    if($flashcard->id != $master){
                        $count++;
                    }
                }
                if($count == count($masterFlash)){
                    array_push($newCards,$flashcard);
                }
            }
        }
        else{
            foreach($flashcards as $key => $flashcard){
                array_push($newCards,$flashcard);
            }
        }

        $finalNewCards = [];

        if($flashcardFamiliarResult && $flashcardFamiliarResult->flashCardId){
            $familiarFlash = explode(',',$flashcardFamiliarResult->flashCardId);
            foreach($newCards as $key => $flashcard){
                $count = 0;
                foreach($familiarFlash as $familiar){
                    if($flashcard->id == $familiar){
                        $count++;
                    }
                }
                if($count == 0){
                    array_push($finalNewCards,$flashcard);
                }
            }
        }
        else{
            $finalNewCards = $newCards;
        }

        $allFlashCards = flashcard::where('deck_id',$id)->get();
        return view('displayLearnPage',compact('familiarFlashCards','finalNewCards','allFlashCards','id'));
    }

    public function saveFlashcardResult(Request $request){
        $flashId = $request->id;
        $type = $request->type;
        $deckId = $request->deckId;
        $getData = FlashCardResult::where('userId',Auth::id())->where('type',$type)->where('deckId',$deckId)->first();

        if($type == 'mastered'){
            $delData = FlashCardResult::where('userId',Auth::id())->where('type','familiar')->where('deckId',$deckId)->first();
            if($delData){
                $famArray = explode(',',$delData->flashCardId);
                if (($key = array_search($flashId, $famArray)) !== false) {
                    unset($famArray[$key]);
                    $famData = implode(',',$famArray);
                    $delData->flashCardId = $famData;
                    $delData->save();
                }
            }
        }

        if($getData){
            $allFlashId = explode(',',$getData->flashCardId);
            array_push($allFlashId,$flashId);
            $allFlashId = array_unique($allFlashId);
            $getData->flashCardId = implode(',',$allFlashId);
            if($getData->save()){
                return response()->json(['success'=>"1"]);
            }
        }
        $saveResult = new FlashCardResult;
        $saveResult->type = $type;
        $saveResult->flashCardId = $flashId;
        $saveResult->deckId = $deckId;
        $saveResult->userId = Auth::id();
        if($saveResult->save()){
            return response()->json(['success'=>"1"]);
        }
        else{
            return response()->json(["success"=>"0"]);
        }
    }
}
