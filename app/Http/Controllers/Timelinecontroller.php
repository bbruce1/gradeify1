<?php

namespace App\Http\Controllers;

use App\Models\Set;
use App\Models\timeline;
use App\Models\timeLineDes;
use App\Models\TimeLineResult;
use Illuminate\Http\Request;
use Auth;
use DB;

class Timelinecontroller extends Controller
{
    public function index(Request $request,$setid){

        $tdata = timeline::where('setid', $setid)->get();
        return view("timeline",compact("tdata","setid"));
    }

    public function newTimelineCreator(Request $request){
        $setid = $request->setid;
        return view("newTimeLineCreator",compact("setid"));
    }

    public function createTimeLineSave(Request $request){
       $array = $request->all();
       $title = $request->title;
       $description = $request->description;
       $setid = $request->setId;
       unset($array['title']);
       unset($array['description']);
       unset($array['_token']);
       unset($array['setId']);
       $newTimeLine = new timeline;
       $newTimeLine->setid = $setid;
       $newTimeLine->user_id = Auth::id();
       $newTimeLine->title = $title;
       $newTimeLine->description = $description;
       $newTimeLine->save();
       $timeLineId = $newTimeLine->id;
       $i = 1;
       foreach($array as $key=>$value){
            if($key == 'timelineDate'.$i){
                if($value != '' && $value != NULL){
                    $newtimeDateDes = new timeLineDes;
                    $newtimeDateDes->timeLineId = $timeLineId;
                    $newtimeDateDes->dateTime = $value;
                    $desVar = 'timelineDes'.$i;
                    $newtimeDateDes->description = $array[$desVar];
                    $newtimeDateDes->save();
                }
                $i++;
            }
        }
        return response()->json(['success'=>"1","response"=>"TimeLine created successfully."]);
    }

    public function createtimeline(Request $request,timeline $timeline){
        $timeline->setid = $request->setid;
        $timeline->start_date = $request->start_date;
        $timeline->end_date = $request->end_date;
        $timeline->description = $request->description;
        $timeline->createdby = Auth::user()->id;
        if($timeline->save()){
            return response()->json(['success'=>"1","response"=>"Timeline created successfully."]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There is something wrong please try again later."]);
        }
    }

    public function deleteTime(Request $request){
        $id = $request->id;
        $delTime = timeline::where('id',$id)->first();
        $delTimeDes = timeLineDes::where('timeLineId',$id)->delete();
        if($delTime->delete()){
            return redirect()->back();
        }
    }

    public function clearalltimeline(Request $request){
        $setId = $request->setid;
        $delTime = timeline::where('setid',$setId)->get();
        foreach($delTime as $time){
            $time->delete();
        }
        return redirect()->back();
    }

    public function timeLineDetail(Request $request){
        $timeLineId = $request->timeLineId;
        $timeLine = timeline::where('id',$timeLineId)->first();
        $timeLineDetails = timeLineDes::where('timeLineId',$timeLineId)->orderBy('dateTime', 'ASC')->get();

        $date_arr = [];

        foreach($timeLineDetails as $singleDetail){
            array_push($date_arr, $singleDetail->dateTime);
        }

        usort($date_arr, function($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
        });
        $startDate = $date_arr[0];
        $endDate = $date_arr[count($date_arr) - 1];

        return view("timeLineDetail",compact("timeLine","timeLineId","timeLineDetails","startDate","endDate"));
    }

    public function getDataTimeLine(Request $request){
        $input = $request->startDate;
        $startDate = strtotime($input);
        $startDate = date('Y-m-d', $startDate);
        $input = $request->endDate;
        $endDate = strtotime($input);
        $endDate = date('Y-m-d', $endDate);
        $timeLineId = $request->timeLineId;
        $timeLineDetails = timeLineDes::where('timeLineId',$timeLineId)->whereBetween( DB::raw('DATE(dateTime)'),[$startDate, $endDate])->orderBy('dateTime', 'ASC')->get();
        return response()->json(["success"=>"1","data"=> $timeLineDetails]);
    }

    public function timelineTest(Request $request){
        $timeLineId = $request->timeLineId;
        $timeLine = timeline::where('id',$timeLineId)->first();
        $timeLineDetails = timeLineDes::where('timeLineId',$timeLineId)->get();
        return view('timelineTest',compact('timeLineId','timeLine','timeLineDetails'));
    }

    public function checkTestDesResult(Request $request){
        $desAnswerArray = $request->desAnswerArray;
        $wrongAnswer = [];
        foreach($desAnswerArray as $value){
            $id = array_key_first($value);
            $answer = $value[$id];
            $checkAnswer = timeLineDes::where('id',$id)->first();
            if($answer != $checkAnswer->description){
                $wrongAnswer[$id] = $checkAnswer->description;
            }
        }
        return response()->json(["success"=>"1","data"=> $wrongAnswer]);
    }

    public function checkTestDateResult(Request $request){
        $dateAnswerArray = $request->dateAnswerArray;
        $wrongAnswer = [];
        foreach($dateAnswerArray as $value){
            $id = array_key_first($value);
            $answer = $value[$id];
            $checkAnswer = timeLineDes::where('id',$id)->first();
            if($answer != $checkAnswer->dateTime){
                $wrongAnswer[$id] = $checkAnswer->dateTime;
            }
        }
        return response()->json(["success"=>"1","data"=> $wrongAnswer]);
    }

    public function timeLineLearn(Request $request){
        $id = $request->timeLineId;

        $timeLineCards = timeLineDes::where('timeLineId',$id)->get();


        $timeLineFamiliarResult = TimeLineResult::where('userId',Auth::id())->where('timeLineId',$id)->where('type','familiar')->first();
        $familiarTimeLine = [];
        $familiarTimeLineCards = [];
        if($timeLineFamiliarResult && $timeLineFamiliarResult->timeLineFlashId){
            $familiarTimeLine = explode(',',$timeLineFamiliarResult->timeLineFlashId);
            foreach($timeLineCards as $key => $timeLineCard){
                foreach($familiarTimeLine as $familiar){
                    if($timeLineCard->id == $familiar){
                        array_push($familiarTimeLineCards,$timeLineCard);
                    }
                }
            }
        }


        $timeLineCards = timeLineDes::where('timeLineId',$id)->get();
        $timeLineMasteredResult = TimeLineResult::where('userId',Auth::id())->where('timeLineId',$id)->where('type','mastered')->first();
        $timeLineFamiliarResult = TimeLineResult::where('userId',Auth::id())->where('timeLineId',$id)->where('type','familiar')->first();
        $familiarTimeLine = [];
        $masterTimeLine = [];
        $newCards = [];
        if($timeLineMasteredResult && $timeLineMasteredResult->timeLineFlashId){
            $masterTimeLine = explode(',',$timeLineMasteredResult->timeLineFlashId);
            foreach($timeLineCards as $key => $timeLineCard){
                $count = 0;
                foreach($masterTimeLine as $master){
                    if($timeLineCard->id != $master){
                        $count++;
                    }
                }
                if($count == count($masterTimeLine)){
                    array_push($newCards,$timeLineCard);
                }
            }
        }
        else{
            foreach($timeLineCards as $key => $timeLineCard){
                array_push($newCards,$timeLineCard);
            }
        }

        $finalNewCards = [];

        if($timeLineFamiliarResult && $timeLineFamiliarResult->timeLineFlashId){
            $familiarTimeLine = explode(',',$timeLineFamiliarResult->timeLineFlashId);
            foreach($newCards as $key => $timeLineCard){
                $count = 0;
                foreach($familiarTimeLine as $familiar){
                    if($timeLineCard->id == $familiar){
                        $count++;
                    }
                }
                if($count == 0){
                    array_push($finalNewCards,$timeLineCard);
                }
            }
        }
        else{
            $finalNewCards = $newCards;
        }

        $allTimeLineCards = timeLineDes::where('timeLineId',$id)->get();
        return view('displayTimeLineLearnPage',compact('familiarTimeLineCards','finalNewCards','allTimeLineCards','id'));

    }

    public function saveTimeLineResult(Request $request){
        $timeLineDesId = $request->id;
        $type = $request->type;
        $timeLineId = $request->deckId;
        $getData = TimeLineResult::where('userId',Auth::id())->where('type',$type)->where('timeLineId',$timeLineId)->first();

        if($type == 'mastered'){
            $delData = TimeLineResult::where('userId',Auth::id())->where('type','familiar')->where('timeLineId',$timeLineId)->first();
            if($delData){
                $famArray = explode(',',$delData->timeLineFlashId);
                if (($key = array_search($timeLineDesId, $famArray)) !== false) {
                    unset($famArray[$key]);
                    $famData = implode(',',$famArray);
                    $delData->timeLineFlashId = $famData;
                    $delData->save();
                }
            }
        }

        if($getData){
            $allFlashId = explode(',',$getData->timeLineFlashId);
            array_push($allFlashId,$timeLineDesId);
            $allFlashId = array_unique($allFlashId);
            $getData->timeLineFlashId = implode(',',$allFlashId);
            if($getData->save()){
                return response()->json(['success'=>"1"]);
            }
        }
        $saveResult = new TimeLineResult;
        $saveResult->type = $type;
        $saveResult->timeLineFlashId = $timeLineDesId;
        $saveResult->timeLineId = $timeLineId;
        $saveResult->userId = Auth::id();
        if($saveResult->save()){
            return response()->json(['success'=>"1"]);
        }
        else{
            return response()->json(["success"=>"0"]);
        }
    }

}
