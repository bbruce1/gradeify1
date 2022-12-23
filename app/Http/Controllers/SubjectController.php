<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\subject;
use Illuminate\Http\Request;
use DataTables;
use delete;

class SubjectController extends Controller
{
    public function index(){
        $subjects = subject::where('user_id',Auth::user()->id)->orderBy('class_no', 'ASC')->get();
        return view('subject',compact('subjects'));
    }

    public function createsubject(Request $request,subject $subject){
        $validated = $request->validate([
            'classno' => 'required|max:8',
            'subjectname' => 'required',
            'subject_id' => 'required',
        ]);

        $subject->user_id = Auth::user()->id;
        $subject->name = $request->subjectname;
        $subject->subject_id = $request->subject_id;
        $subject->class_no	 = $request->classno;
        $subject->status = 'draft';
        if($subject->save()){
            return redirect()->route('subjectlist');
        }
        else{
            return response()->json(["success"=>"0","error"=>"There are something wrong please try again later."]);
        }
    }
    public function subjectadd(){
        return view('subjectadd');
    }
    public function subjectedit($id){
        $subject = subject::where('id',$id)->get();
        return view('subjectedit',compact('subject'));
    }

    public function subjectedited(request $request,$id){

        $validated = $request->validate([
            //'class_no' => "required|max:8|unique:subjects,class_no,$id",
            'class_no' => "required|max:8",
            'subjectname' => 'required',
            'subject_id' => 'required',
        ]);

        $subject = subject::where('id', $id)->update([
            'subject_id' => $request->subject_id,
            'name' => $request->subjectname,
            'class_no' => $request->class_no,
            ]);
        return redirect()->route('subjectlist');
    }
    
    public function subjectlist(Request $request){

        if ($request->ajax()) {
            $data = subject::where('user_id',Auth::user()->id)->orderBy('CLASS_NO', 'ASC')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        //    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                           $btn = '<a href="/subjectedit/'.$row->id.'" class="btn btn-sm bg-success-light mr-2">
                                    <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="/subjectdelete/'.$row->id.'" class="btn btn-sm bg-danger-light">
                                    <i class="fas fa-trash"></i>
                                    </a>';
                           return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('subjectlist');
    }

    public function subjectdelete($subid){
        $subject = subject::withTrashed()->where('id',$subid)->first();
        if($subject->delete()){
            return redirect()->back();
        }
    }

}
