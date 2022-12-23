@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<style type="text/css">
    .multiselect {
        width: 200px;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
        max-height: 100px;
        overflow-y: scroll;
    }

    #checkboxes label {
        display: block;
    }

    #checkboxes label:hover {
        background-color: #009efb;
    }
    .custom_boxes > div:first-child{
        margin-right: 20px !important;
        width: 20% !important;
    }

    .custom_boxes > div:last-child .dash-widget ul li{
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
    }
    .custom_boxes > div:last-child .dash-widget ul li:first-child {
        display: flex;
        align-items: flex-start;
        justify-content: unset;
        
    }
    .custom_boxes > div:last-child .dash-widget ul li:first-child span:first-child {
        margin-right: 57px;
    }
    .custom_boxes > div:last-child .dash-widget ul li:first-child span:last-child {
      justify-content: flex-start;
      margin-left: 2.1em;
    }
   .custom_boxes > div:last-child .dash-widget ul li a  {
        width: 20%;
        display: flex;
        justify-content: flex-start;
        
    }
    .custom_boxes > div:last-child .dash-widget ul li a span  { 
          justify-content: flex-start !important;
    }

    .custom_boxes > div:last-child .dash-widget ul li span:last-child {
            display: flex;
                width: 13%;
        justify-content: flex-end;
    }
     .custom_boxes > div:last-child .dash-widget ul li span:nth-child(2) {
         display: flex;
    align-items: flex-start;
    width: 75%;
    margin-left: 4em;
    /* margin-right: 2em; */
    word-break: break-all;
    text-align: left;
     }
     .custom_boxes .dash-widget ul li a{
          width: 20%!important;

     }
     .excellent_timeline_mn .dash-widget ul li:first-child
     {
        display: flex;
     }
     .excellent_timeline_mn .dash-widget ul li:first-child span{
        margin-right: 5em;
     }

     .excellent_timeline_mn .dash-widget ul li
     {
        display: flex;
     }
     .excellent_timeline_mn .dash-widget ul li span{
        margin-right: 4.1em;
     }

     .timeDivWidth{
        width: 100%;
    display: flex;

     }
     .timeline_mn{
        padding-bottom: 0;
     }

     .lastSpan{
        width: 55%;
       text-align: left;
     }
</style>
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
                <div class="col-6">
                    <h3 class="page-title">Your Personal Toolbox</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/sets">Study Sets</a></li>
                        <li class="breadcrumb-item active">Toolbox</li>
                    </ul>
                </div>
                @if (Auth::user()->role == 'Premium' && $is_copied == "1")
                    <div class="col-6">
                        <a href="javascript:void(0)" class="btn btn-info float-right share-link" data-toggle="modal" data-target="#sharedsetForm">Share</a>
                        
                    </div>
                @elseif(Auth::user()->role == 'Premium' && $is_copied == "0")
                    <div class="col-6">
                        <a href="javascript:void(0)" id="{{ $setid }}" onclick="Copyset(this.id)" class="btn btn-info float-right share-link">Copy</a>
                    </div>
                @endif
            </div>
		</div>
		<!-- /Page Header -->
        <div class="row custom_boxes">
        <div class="card flex-fill col-6 mr-auto ml-auto text-center">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0" style="font-weight:900">To Do List</h5>
                    </div>
                    <div class="col-6">
                        <a href="/todos/clearalltodo/{{ $setid }}" id="clearalltodo" class="btn btn-info float-right view-link">Clear All</a>
                    </div>
                </div>
            </div>
            <div class="dash-widget">
                <div class="circle-bar circle-bar1">
                    @if ($totaltodos != 0)
                    <div class="circle-graph1" data-percent="{{ $completedtodos / $totaltodos * 100 }}">
                        <b>{{ round($completedtodos / $totaltodos * 100) }}%</b>
                        @else
                        <div class="circle-graph1" data-percent="0">
                            <b>0%</b>
                            @endif
                        </div>
                    </div>
                    <div class="dash-info">
                        <h5>Tasks Done</h5>
                        <h4>{{ $completedtodos }} <span>/ {{$totaltodos}}</span><br> 
                            @if ($totaltodos != 0)
                                @if (round($completedtodos / $totaltodos * 100) == 100) You're done! 🎉 
                                @endif
                            @endif
                        </h4>

                        <br>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                        @foreach($todos as $todo)
                            <li class="list-group-item">{{$todo->name}} <a href="../completetodo/{{$todo->id}}"><i class=" float-right fa fa-trash" style="color:#DC3545;"></a></i></li>
                        @endforeach

                        @foreach($trashedtodos as $todo)
                            <li class="list-group-item text-secondary">{{$todo->name}}<a href="../deletetodo/{{$todo->id}}"><i class=" float-right fa fa-trash" style="color:#DC3545;"></a></i></li>
                        @endforeach
                    {{-- <li class="list-group-item">Lorem ipsum dolor sit amet</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    <li class="list-group-item">Vestibulum at eros</li> --}}
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addtodomodal"><i class="fas fa-plus"></i></button>
                    </li>

                </ul>
            </div>
        
        <div class="modal fade Create_new_set_popup " id="addtodomodal" role="dialog">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create a Task</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body pb-0">
                        <form autocomplete="off" id="addtodoform" method="post">
                            @csrf
                            <div class="form-group">
                                <label">Description:</label>
                                <input type="hidden" name="setid" value="{{ $setid }}">
                                <input type="text" placeholder="Do Homework, Workout, etc..." name="todoname" class="form-control" >
                            </div>
                    </div>
                    <div class="modal-footer border-0 mb-2">
                            <button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Add Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade Create_new_set_popup " id="sharedsetForm" role="dialog">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Share Set</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body pb-0">
                        <form autocomplete="off" id="sharesetform" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Select Users who See your Sharable Set:</label>
                                <div>
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        <select class="form-control">
                                            <option>Select</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                        @foreach($userlist as $user)
                                            <label for="{{ $user->id }}" class="mb-0">
                                                <input type="checkbox" name="userlist[]" id="{{ $user->id }}" value="{{ $user->id }}" /> {{ $user->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- <label>Select Users who See your Sharable Set:</label>
                                <select class="form-control">
                                    <option selected disabled value="">select</option>
                                    @foreach($userlist as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select> -->
                                <input type="hidden" name="setid" value="{{ $setid }}">
                                
                            </div>
                    </div>
                    <div class="modal-footer border-0 mb-2">
                            <button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Share Set</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card flex-fill col-6 mr-auto ml-auto text-center">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="card-body timeline_mn">
                        <h5 style="font-weight: 900 !important;"><a href="/decks/{{$setid}}">Deck Cards</a></h5> &emsp;
                        <a href="/newDeckFlashPage/{{$setid}}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=""><i class="fas fa-plus"></i></button></a>
                    </div>
                    
                    <div class="modal fade Create_new_set_popup " id="adddeckmodal" role="dialog">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Deck</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body pb-0">
                                    <form autocomplete="off" id="adddeckform" method="post">
                                        @csrf
                                    <div class="form-group">
                                        <label>Deck Name</label>
                                        <input type="hidden" name="setid" value="{{$setid}}">
                                        <input type="text" name="deckname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Deck Description</label>
                                        <input type="text" name="deckdesc" class="form-control" >
                                    </div>
                                </div>
                                <div class="modal-footer border-0 mb-2">
                                    <button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Create Deck</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @if(count($decks) > 6)
                <div class="dash-widget">
                    <div class="deck_main">
                        @for($i = 0; $i < 6; $i++)
                            <a href="/flashcard/{{ $decks[$i]->id }}"><span>{{ $decks[$i]->deck_name }}</span><span>{{ $decks[$i]->description }}</span></a><span><a href="../deleteDeck/{{$decks[$i]->id}}"><i class="float-right fa fa-trash"></i></a></span>
                        @endfor
                    </div>
                </div>
            @else
                <div class="dash-widget">
                    <div class="deck_main">
                        @for($i = 0; $i < count($decks); $i++)
                            <a href="/flashcard/{{ $decks[$i]->id }}"><span>{{ $decks[$i]->deck_name }}</span><span>{{ $decks[$i]->description }}</span></a><span><a href="../deleteDeck/{{$decks[$i]->id}}"><i class="float-right fa fa-trash"></i></a></span>
                        @endfor
                    </div>
                </div>
            @endif
        </div>

        @if(count($decks) > 6)
            <div class="flex-fill col-12 mr-auto ml-auto text-center">
                <div class="deck_main_new">
                    @for($i = 6; $i < count($decks); $i++)
                        <a href="/flashcard/{{ $decks[$i]->id }}"><span>{{ $decks[$i]->deck_name }}</span><span>{{ $decks[$i]->description }}</span></a><span style="width:7px;"><a href="../deleteDeck/{{$decks[$i]->id}}"><i class="float-right fa fa-trash"></i></a></span>
                    @endfor
                </div>
            </div>
        @endif

        </div>

		<div class="row">
			<div class="col-sm-12 mr-auto ml-auto text-center">
				<div class="excellent_timeline_mn mb-5">
					<!-- <div class="card w-75 ml-auto mr-auto">
						<div class="card-body excellent_mn">
							<h4>Excellent Online Flashcards</h4>
							<p>Learn things faster and more efficiently.</p>
							<a href="/decks/{{ $setid }}" class="btn btn-primary">Go to Flashcard Creator</a>
						</div>
					</div> -->
					<div class="card w-100 timelinecard">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="card-body timeline_mn">
                                    <h5 style="font-weight: 900 !important;"><a href="/timeline/{{$setid}}">Timeline Creator</a></h5> &emsp;
                                    <button type="button" class="btn btn-primary"><a href="/newTimelineCreator/{{$setid}}" style="color: white;" ><i class="fas fa-plus"></i></a></button>
                                </div>
                                <div class="modal fade Create_new_set_popup " id="addtimelinemodal" role="dialog">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Create Timeline</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body pb-0">
                                                <form autocomplete="off" id="addtimelineform" method="post">
                                                    @csrf
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <input type="hidden" name="setid" value="{{$setid}}">
                                                    <input type="date" name="start_date" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>End Date</label>
                                                    <input type="date" name="end_date" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="description" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 mb-2">
                                                <button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Create Timeline</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dash-widget">
                            <div class="timeline_main">
                                    @foreach($timelines as $timeline)
                                    <?php $last = count($timeline->allData); ?>
                                        <a href="/timeLineDetail/{{ $timeline->id }}"><div class="row"><div class="col-6"><span>Start Date</span><span>{{ $timeline->allData[0]->dateTime }}</span></div><div class="col-6"><span>End Date</span><span>{{ $timeline->allData[$last-1]->dateTime }}</span></div></div><span>{{ $timeline->title }}</span></a><span><a  href="../deleteTime/{{$timeline->id}}"><i class="float-right fa fa-trash"></i></a></span>
                                    @endforeach
                                </div>
                            <div class="timeline_main">

                            </div>
                        </div>
                    </div>
				</div>
				<hr>
				<div class="organizer_mn mt-5">
                    <div class="card w-100">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="card-body timeline_mn">
                                    <h5 class="note_heading">Note</h5>
                                </div>
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addnotesmodal"><i class="fas fa-plus"></i></button>
                                <div class="modal fade Create_new_set_popup " id="addnotesmodal" role="dialog">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Create Notes</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body pb-0">
                                                <form autocomplete="off" id="addnotesform" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" class="form-control" >
                                                    </div>  
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="hidden" name="setid" value="{{$setid}}">
                                                  
                                                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0 mb-2">
                                                    <button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body timeline_mn">
                        </div>
                        <div class="dash-widget">
                            <div class="set_main">
                                @foreach($notes as $note)
                                    <a href=""><span>{{ $note->title }}</span><span>{{ $note->description }}</span></a><i class="fa fa-trash deleteNote" style="color:#DC3545; cursor: pointer;" id="{{ $note->id }}" ></i>
                                @endforeach
                            </div>
                        </div>
                    </div>

					<h4>Math Problem Generator</h4>
					<p>This math problem generator will help you study for math by changing the numbers in the problems you enter. It will even solve the problem for you!</p>
					<div class="card w-75 ml-auto mr-auto mb-5">
						<div class="card-body">
							<h5>Math Problem Generator</h5>
							<p>Use this to help study for math tests and quizes as well as study any rules you might not know.</p>
							<a href="MathGenerator.php" class="btn btn-primary">Go to Math Problem Generator</a>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@endsection
@section('script')

<script type="text/javascript">
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }    
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).ready(function(){


            $(".deleteNote").on("click",function(){
                var delNoteId = $(this).attr('id');
                 $.ajax({
                    dataType:"json",
                    type:"get",
                    data:{delNoteId:delNoteId},
                    url:"/deleteNote",
                    success: function(data)
                    {

                        if(data.success == "0"){
                            alert(data.error);
                        }
                        else if(data.success == "1")
                        {
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            })


            $("#addnotesform").validate({
            rules: {
                "title": {required: true},
            },
            messages: {
                "title": {required: "Please enter the title for note."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addnotesform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/noteorganizer/createnote",
                    success: function(data)
                    {
                        if(data.success == "0"){
                            alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addnotesmodal").modal("hide");
                            $('#addnotesform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });


            $("#addtimelineform").validate({
            rules: {
                "start_date": {required: true, date:true},
                "end_date": {required: true, date:true},
                "description": {required: true},
            },
            messages: {
                "start_date": {required: "Please enter the startdate for timeline."},
                "end_date": {required: "Please enter the enddate for timeline."},
                "description": {required: "Please enter the description for timeline."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addtimelineform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/timeline/createtimeline",
                    success: function(data)
                    {
                        if(data.success == "0"){
                            alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addtimelinemodal").modal("hide");
                            $('#addtimelineform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });
            
        $("#adddeckform").validate({
            rules: {
                "deckname": {required: true},
                "deckdesc": {required: true},
            },
            messages: {
                "deckname": {required: "Please enter name for the set."},
                "deckdesc": {required: "Please enter description for the set."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#adddeckform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/decks/createdeck",
                    success: function(data)
                    {
                        if(data.success == "0"){
                            alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#adddeckmodal").modal("hide");
                            $('#adddeckform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });


        // $(".deleteDecks").on("click",function(){
        //     // $(".loader").show();
        //     var id = $(this).attr('id');
        //     $.ajax({
        //         dataType:"json",
        //         type:"get",
        //         contentType: false,
        //         processData: false,
        //         data:{
        //             "_token": "{{ csrf_token() }}",
        //             id:id,    
        //         },
        //         url:"/decks/deleteDeck",
        //         success: function(data)
        //         {
        //             // if(data.success == "0"){
        //             //     alert(data.error);
        //             //     $(".loader").hide();
        //             // }
        //             // else if(data.success == "1")
        //             // {
        //             //     $(".loader").hide();
        //             //     alert(data.response);
        //             //     // window.location.reload();
        //             // }
        //         }
        //     });
        // })

    });

        $("#addtodoform").validate({
            rules: {
                "todo": {required: true},
            },
            messages: {
                "todo": {required: "Please enter todo name."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addtodoform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/todos/createtodo",
                    success: function(data)
                    {
                        if(data.success == "0"){
                            alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addtodomodal").modal("hide");
                            $('#addtodoform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });

        $("#sharesetform").validate({
            rules: {
                "userlist[]": {required: true},
            },
            messages: {
                "userlist[]": {required: "Please select one user."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#sharesetform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/sets/shareset",
                    success: function(data)
                    {
                        if(data.success == "0"){
                            alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#sharedsetForm").modal("hide");
                            $('#sharesetform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    function Shareset(setid){
        if(confirm("Are You Sure You Want to Share This Set?")){
            $(".loader").show();
            $.ajax({
                dataType:"json",
                type:"post",
                data:{
                    "_token": "{{ csrf_token() }}",
                    setid:setid,    
                },
                url:"/sets/shareset",
                success: function(data)
                {
                    if(data.success == "0"){
                        alert(data.error);
                        $(".loader").hide();
                    }
                    else if(data.success == "1")
                    {
                        $(".loader").hide();
                        alert(data.response);
                        window.location.reload();
                    }
                }
            });
        } 
    }

    function Copyset(setid){
        if(confirm("Are You Sure You Want to Copy This Set?")){
            $(".loader").show();
            $.ajax({
                dataType:"json",
                type:"post",
                data:{
                    "_token": "{{ csrf_token() }}",
                    setid:setid,    
                },
                url:"/sets/copyset",
                success: function(data)
                {
                    if(data.success == "0"){
                        alert(data.error);
                        $(".loader").hide();
                    }
                    else if(data.success == "1")
                    {
                        $(".loader").hide();
                        alert(data.response);
                        window.location.reload();
                    }
                }
            });
        }
    }
</script>
@endsection

