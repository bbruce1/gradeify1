<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classes;
use App\Models\todos;
use App\Models\meeting;
use App\models\subject;
use App\models\notes;
use DataTables;
use Auth;
use delete;


class ClassesController extends Controller
{
    public function index(){

        $subjects = subject::where('user_id',Auth::user()->id)->get();
        $total_classes = subject::where('user_id',Auth::user()->id)->count();
        $todos = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->get();
        $trashedtodos = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->onlyTrashed()->get();
        $totaltodos = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->withTrashed()->count();
        $completedtodos = todos::where([['user_id',Auth::user()->id],['setid',"=",null]])->onlyTrashed()->count();
        $meetings = meeting::where('user_id',Auth::user()->id)->get();
        
        // return $totaltodos;
        return view('teacher',compact('subjects','todos','meetings','total_classes','trashedtodos','totaltodos','completedtodos'));

    }
    public function lessonplans($id){
        $subject = subject::where('id',$id)->first();
        return view('viewlessonplans',compact('subject','id'));
    }
    public function lessonplansave(request $request,$id){

        //dd($request->all());

        $subject = subject::where('id',$id)->get();

        $validated = $request->validate([
            'lesson_plan' => 'required',
        ]);

        if($request->has('finish')) {
            $subject = subject::where('id', $id)->update([
                'lesson_plan' => $request->lesson_plan,
                'status'      => 'finish'
            ]);
          } else if($request->has('draft')) {
            $class = subject::where('id', $id)->update([
                'lesson_plan' => $request->lesson_plan,
                'status'      => 'draft',

            ]);
          }else if($request->has('reset')) {
            $class = subject::where('id', $id)->update([
                'lesson_plan' => '',
                'status'      => 'draft',

            ]);
          }
          return Redirect('/teacher');
    }

    public function createtodo(Request $request,todos $todos){
        $todos->user_id = Auth::user()->id;
        $todos->setid = $request->setid;
        $todos->name = $request->todoname;

        if($todos->save()){
            return response()->json(["success"=>"1","response"=>"Task is Added Successfully"]);
        }
        else{
            return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
        }
    }

    public function completetodo($id){
        $todo = todos::where('id',$id)->first();
        if($todo->delete()){
            return redirect()->back();
        }
    }

    public function deletetodo($id){
        $todo = todos::withTrashed()->where('id',$id)->first();
        if($todo->forceDelete()){
            return redirect()->back();
        }
    }

    public function clearalltodo($setid = null){
        $todos = todos::withTrashed()->where([['user_id',Auth::user()->id],['setid',$setid]])->get();
        $todos->each(function ($todo) {
           $todo->forcedelete();
        });
        
        return redirect()->back();
    }

    public function meetings(Request $request){
        if ($request->ajax()) {
            $data = meeting::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        //    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                           $btn = '<a href="/meetingsedit/'.$row->id.'" class="btn btn-sm bg-success-light mr-2">
                                    <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="/meetingsedit/'.$row->id.'" class="btn btn-sm bg-danger-light">
                                    <i class="fas fa-trash"></i>
                                    </a>';
                           return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('meetings');
    }

    public function createmeetings(Request $request,meeting $meetings){
        $validated = $request->validate([
            'description' => 'required',
            'name' => 'required',
            'time' => 'required',
            'link' => 'required',
        ]);

        if($request->meetid == ''){
            $meetings->user_id = Auth::user()->id;
            $meetings->name = $request->name;
            $meetings->description = $request->description;
            $meetings->time	 = $request->time;
            $meetings->link = $request->link;
            if($meetings->save()){
                return response()->json(["success"=>"1","response"=>"Meetings is completely added."]);
            }
            else{
                return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
            }
        }else{
            $meeting = meeting::find($request->meetid);
            $meeting->user_id = Auth::user()->id;
            $meeting->description = $request->description;
            $meeting->name = $request->name;
            $meeting->time = $request->time;
            $meeting->link = $request->link;

            if($meeting->save()){
                return response()->json(["success"=>"1","response"=>"Meeting is completely updated."]);
            }
            else{
                return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
            }
        }
    }

    public function meetingsedit($id){
        $meeting = meeting::where('id',$id)->get();
        return $meeting;
        // return view('meetingsedit',compact('meeting'));
    }

    public function meetingsdelete($id){
            $meeting = meeting::where('id',$id)->first();
            $meeting->delete();

            return redirect()->back();
    }

    public function noteorganizer($setid){

        return view('noteorganizer');
    }
}
