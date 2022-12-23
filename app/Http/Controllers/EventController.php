<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classes;
use App\Models\Event;
use App\Models\todos;
use App\Models\meeting;
use App\models\subject;
use DataTables;
use Auth;
use delete;


class EventController extends Controller
{
    public function createevent(Request $request,Event $event){
        $event->event_name = $request->eventtitle;
        $event->event_date = $request->eventdate;
        $event->event_time = $request->eventtime;
        $event->event_category  = $request->category;
        $event->createdby = Auth::user()->id;
        if($event->save()){
            return response()->json(["success"=>"1","response"=>"Event created successfully."]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There is something wrong please try again later."]);
        }
    }

    public function getallevents(Request $request){
        $events = Event::all();
        return json_encode($events);
    }
}
