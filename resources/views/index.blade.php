@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<style>
    #coutDownCircle > canvas {
        width: 150px !important;
        height: 150px !important;
    }

    .countDiv{
        display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
}
.countDiv input{
      width: 70%;
    }
    .countMainDiv{
        height: 24.65em;
    }
    .countMainDiv .dash-widget{
        display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 85%;
    }
    .countMainDiv .circle-bar.circle-bar1.countdown{
        margin-top: 2em;
    }

    .countMainDiv .card-header{
        padding: 22px;
    }

</style>
<div class="page-wrapper">
    <div id="particles-js"></div>

            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Student Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Overview Section -->
                <div class="row">
                    <div class="col-xl-6 col-sm-6 col-12 d-flex">
                        <div class="card bg-five w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-chalkboard"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>{{ $total_class }}</h3>
                                        <h6>Total Classes</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 col-12 d-flex">
                        <div class="card bg-six w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>{{ $setscount }}</h3>
                                        <h6>Total Sets</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!--  <div class="col-xl-4 col-sm-6 col-12 d-flex">
                        <div class="card bg-ten w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3></h3>
                                        <h6>Total Projects</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- /Overview Section -->

                <!-- Student Dashboard -->
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="row">
                            @if(@$sets)
                                <div class="col-12 col-lg-12 col-xl-12">
                                    <div class="card flex-fill">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <h5 class="card-title">Recently Studied Sets</h5>
                                                </div>
                                                <div class="col-6">
                                                    <span class="float-right view-link"><a href="/sets">View All Sets</a></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="dash-circle">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-xl-6 dash-widget3">
                                                    <div class="card-body dash-widget1">
                                                        <div class="circle-bar circle-bar2">
                                                            @if ($set1totaltodos != 0)
                                                                <div class="circle-graph2" data-percent="{{ $set0completedtodos / $set0totaltodos * 100 }}">
                                                                    <b>{{ round($set0completedtodos / $set0totaltodos * 100) }}%</b>
                                                                </div>
                                                            @else
                                                                <div class="circle-graph2" data-percent="0">
                                                                    <b>0%</b>
                                                                </div>
                                                            @endif
                                                            <h6>Progress</h6>
                                                            <h4><span>{{ $set0completedtodos }} / {{$set0totaltodos}}</span></h4>
                                                        </div>
                                                        <div class="dash-details">
                                                            <h4>{{$sets[0]->sets_name}}</h4>
                                                            <ul>
                                                                <li><i class="fas fa-clock"></i> {{$sets[0]->updated_at}}</li>
                                                                <li><i class="fas fa-book-open"></i> {{$set0deckdata}}</li>
                                                            </ul>
                                                            <div class="dash-btn">
                                                                <a href="/website/{{ $sets[0]->id }}" class="btn btn-info">Continue</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-6 col-xl-6 dash-widget4">
                                                    <div class="card-body dash-widget1 dash-widget2">
                                                        <div class="circle-bar circle-bar3">
                                                            @if ($set1totaltodos != 0)
                                                                <div class="circle-graph3" data-percent="{{ $set1completedtodos / $set1totaltodos * 100 }}">
                                                                    <b>{{ round($set1completedtodos / $set1totaltodos * 100) }}%</b>
                                                                </div>
                                                            @else
                                                                <div class="circle-graph3" data-percent="0">
                                                                    <b>0%</b>
                                                                </div>
                                                            @endif
                                                            <h6>Progress</h6>
                                                            <h4>{{ $set1completedtodos }} <span>/ {{ $set1totaltodos }}</span></h4>
                                                        </div>
                                                        <div class="dash-details">
                                                            <h4>{{$sets[1]->sets_name}}</h4>
                                                            <ul>
                                                                 <li><i class="fas fa-clock"></i>  {{$sets[1]->updated_at}}</li>
                                                                <li><i class="fas fa-book-open"></i> {{$set1deckdata}}</li>
                                                            </ul>
                                                            <div class="dash-btn">
                                                                <a href="/website/{{ $sets[1]->id }}" class="btn btn-info">Continue</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 col-lg-12 col-xl-12" style="opacity: 85%">
                                    <div class="card flex-fill">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <h5 class="card-title">Recently Studied Sets</h5>
                                                </div>
                                                <div class="col-6">
                                                    <span class="float-right view-link">
                                                        <a href="/sets" class="btn btn-info float-right view-link">Create Set</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <h1 style="text-align: center; font-size: 20px;">Looks like you have no sets, consider making one!</h1>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            @endif

                            <!-- To Do List -->
                            <div class="col-4 col-lg-4 col-xl-4">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <h5 class="card-title mb-0">To Do List</h5>
                                            </div>
                                            <div class="col-6">
                                                <a href="/todos/clearalltodo" id="clearalltodo" class="btn btn-info float-right view-link">Clear All</a>
                                                <!-- <span class="float-right view-link"><a href="/#">Clear All</a></span> -->
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
                                                    <h4>{{ $completedtodos }} <span>/ {{$totaltodos}}</span><br> @if ($totaltodos != 0)  @if (round($completedtodos / $totaltodos * 100) == 100) You're done! 🎉 @endif @endif</h4>
                                                <br>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            @foreach($todos as $todo)
                                                <li class="list-group-item font-weight-bold">{{$todo->name}} <a href="completetodo/{{$todo->id}}"><i class=" float-right far fa-trash-alt"></a></i></li>
                                            @endforeach

                                            @foreach($trashedtodos as $todo)
                                                <li class="list-group-item text-secondary">{{$todo->name}}<a href="deletetodo/{{$todo->id}}"><i class=" float-right far fa-trash-alt"></a></i></li>
                                            @endforeach
                                        {{-- <li class="list-group-item">Lorem ipsum dolor sit amet</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
                                        <li class="list-group-item">Vestibulum at eros</li> --}}
                                                <li class="list-group-item"><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addtodomodal"><i class="fas fa-plus"></i></button> </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-4 col-xl-4">
                                    <div class="card flex-fill countMainDiv">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h5 class="card-title mb-0">Count Down</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dash-widget">
                                            <div class="circle-bar circle-bar1 countdown">
                                                <div class="circle-graph1" id="coutDownCircle" data-percent="0">
                                                    <b class="leftMinute">00:00</b>
                                                </div>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item countDiv"><input type="text" placeholder="Enter Minutes" id="countMinutes" name="countMinutes" class="form-control" ><button type="submit" class="btn btn-primary startCountButton">Start</button> </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-4 col-xl-4">
                                    <div class="card flex-fill">
                                        <div class="card-header">
                                            <h5 class="card-title">Lesson Plans for Today</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="teaching-card">
                                                <ul class="activity-feed">

                                                    @foreach($subjects as $subject)
                                                        <li class="feed-item">
                                                            <div class="feed-date1">Sep 05, 9 am - 10 am (60min)</div>
                                                            <span class="feed-text1"><a>{{$subject->name}}</a></span>
                                                            @if($subject->status == 'finish')
                                                                <a type="submit" href="lessonplans/{{$subject->id}}" style="margin-left: 10px;" class="btn btn-info float-right">View</a>
                                                                <p>Completed</p>
                                                            @else
                                                                <a type="submit" href="lessonplans/{{$subject->id}}" style="margin-left: 10px;" class="btn btn-info float-right">Finish</a>
                                                                <p><span>In Progress</span></p>
                                                            @endif
                                                        <!-- <a type="submit" href="lessonplans" style="margin-left: 10px;" class="btn btn-info">Finish</a>  -->
                                                        <!-- <p><span>In Progress</span></p>  -->
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         

                            <div id="container">
                        



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
                    <!-- /To Do List -->
                        <div class="modal fade Create_new_set_popup" id="addmeetingmodal" role="dialog">
                            <div class="modal-dialog modal-md modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create a meeting</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <form autocomplete="off" id="addmeetingform" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label">Name:</label>
                                                <input type="hidden" id="meetingid" name="meetid" val="">
                                                <input type="text" id="meetingname" placeholder="English Class, Meeting with Teacher, etc..." name="name" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label">Description:</label>
                                                <input type="text"  id="meetingdesc" placeholder="Period 1, Tutor, etc..." name="description" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label">Time:</label>
                                                <input type="time"  id="meetingtime" name="time" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label">Link:</label>
                                                <input type="text"  id="meetinglink" placeholder="Zoom or Google Meet link..." name="link" class="form-control" >
                                            </div>
                                    </div>
                                    <div class="modal-footer border-0 mb-2">
                                            <button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto submitmeeting">Add Meeting</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Meeting List -->
                        <div class="row">
                            <div class="col-15 col-lg-12 col-xl-12 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <h5 class="card-title">Upcoming Meetings</h5>
                                            </div>
                                            <div class="col-6">
                                            <button type="submit" class="btn btn-primary float-right addmeeting" data-toggle="modal" data-target="#addmeetingmodal"><i class="fas fa-plus"></i></button>                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3 pb-3">
                                        <div class="table-responsive lesson">
                                            <table class="table table-center">
                                                <tbody>
                                                @foreach($meetings as $meeting)
                                                        {{-- <tr>
                                                            <td>
                                                                <div class="date">
                                                                    <b>{{$meeting->name}}</b>
                                                                    <p>{{$meeting->time}}</p>
                                                                </div>
                                                            </td>
                                                            <td><a href="#">Confirmed</a></td>
                                                            <td><a href="#" class="btn bg-danger-light"><i class="fas fa-trash"></i></a></td>
                                                            <td><a href="#" class="btn btn-info"><i class="fas fa-pen"></i></a></td>
                                                            <td><a href="meetingsedit/{{$meeting->id}}" class="btn btn-info">Go to Meeting</a></td>
                                                        </tr> --}}
                                                        <tr>
                                                            <td>
                                                                <div class="date">
                                                                    <b>{{$meeting->name}}</b>
                                                                    <p>{{$meeting->description}}, {{$meeting->time}}</p>
                                                                </div>
                                                            </td>
                                                            <td><a class="text-info">Confirmed</a></td>
                                                            <td class="editmeeting"  data-id="{{$meeting->id}}"><a href="#" class="btn btn-info text-white " data-toggle="modal" data-target="#addmeetingmodal"  data-id="{{$meeting->id}}"><i class="fas fa-pen"></i></a></td>
                                                            <td><a href="deletemeeting/{{$meeting->id}}" class="btn bg-danger text-white"><i class="fas fa-trash"></i></a></td>
                                                            <td><a href="{{$meeting->link}}" class="btn btn-info text-white">Go to Meeting</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                   {{--  <tr>
                                                     <tr>
                                                        <td>
                                                            <div class="date">
                                                                <b>English</b>
                                                                <p>9:00am</p>
                                                            </div>
                                                        </td>
                                                        <td><a href="#">Confirmed</a></td>
                                                        <td><a href="#"><button class="btn btn-primary"><i class="fas fa-pen"></i></button></a></td>
                                                        <td><a href="#"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                                                        <td><a href="https://stalbansschool.zoom.us/j/86201693207?pwd=UjRtWCtXRXpseG9hZGEyN2x6Q3Zodz09" class="btn btn-info text-white">Go to Meeting</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="date">
                                                                <b>Computer Science</b>
                                                                <p>9:55am</p>
                                                            </div>
                                                        </td>
                                                        <td><a href="#">Confirmed</a></td>
                                                        <td><a href="#"><button class="btn btn-primary"><i class="fas fa-pen"></i></button></a></td>
                                                        <td><a href="#"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                                                        <td><a href="https://stalbansschool.zoom.us/j/875113535?pwd=U0NhUU56WnF1NVNkeFZHVFpRbi9JQT09" class="btn btn-info text-white">Go to Meeting</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="date">
                                                                <b>Math</b>
                                                                <p>11:15am</p>
                                                            </div>
                                                        </td>
                                                        <td><a href="#">Confirmed</a></td>
                                                        <td><a href="#"><button class="btn btn-primary"><i class="fas fa-pen"></i></button></a></td>
                                                        <td><a href="#"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                                                        <td><a href="https://stalbansschool.zoom.us/j/84367153607?pwd=VFZXTFpHNW8ydlJMb1pEeEFPL3JUdz09" class="btn btn-info text-white">Go to Meeting</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="date">
                                                                <b>Chem</b>
                                                                <p>1:00pm</p>
                                                            </div>
                                                        </td>
                                                        <td><a href="#">Confirmed</a></td>
                                                        <td><a href="#"><button class="btn btn-primary"><i class="fas fa-pen"></i></button></a></td>
                                                        <td><a href="#"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                                                        <td><a href="https://stalbansschool.zoom.us/j/84560759821" class="btn btn-info text-white">Go to Meeting</a></td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Assignment List -->
                    </div>


                    <div class="col-12 col-lg-12">
                        <div class="cominsoon" style="width: 50%;"><h2>Coming Soon...</h2></div>
                        <div class="card flex-fill" style="opacity: 0.5;border: 1px solid black;background-color: black;">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="card-title">Calendar</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="calendar-doctor" class="calendar-container"></div>
                                <div class="calendar-info calendar-info1">
                                    <div class="calendar-details">
                                        <p>09 am</p>
                                        <h6 class="calendar-blue d-flex justify-content-between align-items-center">Period 1 <span>09am - 10pm</span></h6>
                                    </div>
                                    <div class="calendar-details">
                                        <p>10 am</p>
                                        <h6 class="calendar-violet d-flex justify-content-between align-items-center">Period 2<span>10am - 11am</span></h6>
                                    </div>
                                    <div class="calendar-details">
                                        <p>11 am</p>
                                        <h6 class="calendar-red d-flex justify-content-between align-items-center">Flex<span>11am - 11.30am</span></h6>
                                    </div>
                                    <div class="calendar-details">
                                        <p>12 pm</p>
                                        <h6 class="calendar-orange d-flex justify-content-between align-items-center">Period 3 <span>12pm - 1pm</span></h6>
                                    </div>
                                    <div class="calendar-details">
                                        <p>09 am</p>
                                        <h6 class="calendar-blue d-flex justify-content-between align-items-center">Period 4<span>09am - 10pm</span></h6>
                                    </div>
                                    <br>
                                    <h6></h6>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Teacher Dashboard -->
            </div>
            <style>
			body,
html {
    height: 100%
}

#particles-js canvas {
    display: block;
    vertical-align: bottom;
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    -webkit-transition: opacity .8s ease, -webkit-transform 1.4s ease;
    transition: opacity .8s ease, transform 1.4s ease
}

#particles-js {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: -10;
    top: 0;
    left: 0
}

html {
    zoom: 100%;
}
		</style>

            @endsection
@section('script')
<script type="text/javascript">

var secondsRemaining;
var intervalHandle;


function tick(){
	// turn the seconds into mm:ss
	var min = Math.floor(secondsRemaining / 60);
	var sec = secondsRemaining - (min * 60);

	//add a leading zero (as a string value) if seconds less than 10.
	if (sec < 10) {
		sec = "0" + sec;
	}

	// concatenate with colon
	var message = min.toString() + ":" + sec;

	// now change the display
    $(".leftMinute").html(message);
    perBar = (secondsRemaining*100)/totalSecond;

    $("#coutDownCircle").attr("data-percent",perBar);

    if(secondsRemaining > 30){
        var elementPos = $('#coutDownCircle').offset().top;
        var topOfWindow = $(window).scrollTop();
        var percent = $('#coutDownCircle').attr('data-percent');
        var animate = $('#coutDownCircle').data('animate');
        if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
            $(this).data('animate', true);
            $('#coutDownCircle').circleProgress({
                value: percent / 100,
                animation: false,
                size : 400,
                thickness: 40,
                fill: {
                    color: '#28A745'
                }
            });
        }
    }
    else if(secondsRemaining > 15){
        var elementPos = $('#coutDownCircle').offset().top;
        var topOfWindow = $(window).scrollTop();
        var percent = $('#coutDownCircle').attr('data-percent');
        var animate = $('#coutDownCircle').data('animate');
        if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
            $(this).data('animate', true);
            $('#coutDownCircle').circleProgress({
                value: percent / 100,
                animation: false,
                size : 400,
                thickness: 40,
                fill: {
                    color: '#FFBC53'
                }
            });
        }
    }

    else {
        var elementPos = $('#coutDownCircle').offset().top;
        var topOfWindow = $(window).scrollTop();
        var percent = $('#coutDownCircle').attr('data-percent');
        var animate = $('#coutDownCircle').data('animate');
        if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
            $(this).data('animate', true);
            $('#coutDownCircle').circleProgress({
                value: percent / 100,
                animation: false,
                size : 400,
                thickness: 40,
                fill: {
                    color: '#DC3545'
                }
            });
        }
    }
    
	// stop is down to zero
	if (secondsRemaining === 0){
		alert("Done!");
		clearInterval(intervalHandle);
	}

	//subtract from seconds remaining
	secondsRemaining--;

}


window.onload = function(){

	// create input text box and give it an id of "min"
	var inputMinutes = document.createElement("input");
	inputMinutes.setAttribute("id", "minutes");
	inputMinutes.setAttribute("type", "text");

	//create a button
	var startButton = document.createElement("input");
	startButton.setAttribute("type","button");
	startButton.setAttribute("value","Start Countdown");
	startButton.onclick = function(){
		startCountdown();
	};


}

    $(document).ready(function(){

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


        $(".startCountButton").on("click",function(){
            var leftMinute = $("#countMinutes").val();
            $("#countMinutes").val('');

           // how many seconds
           secondsRemaining = leftMinute * 60;
           totalSecond = leftMinute * 60;

            //every second, call the "tick" function
            // have to make it into a variable so that you can stop the interval later!!!
           intervalHandle = setInterval(tick, 1000);
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#addmeetingform").validate({
            rules: {
                "name": {required: true},
                "description": {required: true},
                "time": {required: true},
                "link": {required: true},
            },
            messages: {
                "name": {required: "Please enter description"},
                "description": {required: "please enter discription"},
                "time": {required:"Please enter time."},
                "link": {required:"Please enter link."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addmeetingform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/meetings/createmeetings",
                    success: function(data)
                    {
                        // console.log(data);
                        if(data.success == "0"){
                            alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addmeetingmodal").modal("hide");
                            $('#addmeetingform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

    $('.editmeeting').click(function(){
        //  console.log($(this).data('id'));
        $('.submitmeeting').html('Update meeting');
         var id =  $(this).data('id');
         $.ajax({
            url: "/meetingsedit/"+id,
            success: function(result)
            {
                result = result[0];
                $('#meetingid').val(result.id);
                $('#meetingname').val(result.name);
                $('#meetingdesc').val(result.description);
                $('#meetingtime').val(result.time);
                $('#meetinglink').val(result.link);
            }
        });
    })

    $('.addmeeting').click(function(){
        $('.submitmeeting').html('Add meeting');
        $('#meetingid').val('');
        $("#addmeetingform")[0].reset();
    });
var color = '#75A5B7';
var maxParticles = 120;
function hexToRgb(e){var a=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;e=e.replace(a,function(e,a,t,i){return a+a+t+t+i+i});var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?{r:parseInt(t[1],16),g:parseInt(t[2],16),b:parseInt(t[3],16)}:null}function clamp(e,a,t){return Math.min(Math.max(e,a),t)}function isInArray(e,a){return a.indexOf(e)>-1}var pJS=function(e,a){var t=document.querySelector("#"+e+" > .particles-js-canvas-el");this.pJS={canvas:{el:t,w:t.offsetWidth,h:t.offsetHeight},particles:{number:{value:400,density:{enable:!0,value_area:800}},color:{value:"#fff"},shape:{type:"circle",stroke:{width:0,color:"#ff0000"},polygon:{nb_sides:5},image:{src:"",width:100,height:100}},opacity:{value:1,random:!1,anim:{enable:!1,speed:2,opacity_min:0,sync:!1}},size:{value:20,random:!1,anim:{enable:!1,speed:20,size_min:0,sync:!1}},line_linked:{enable:!0,distance:100,color:"#fff",opacity:1,width:1},move:{enable:!0,speed:2,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:3e3,rotateY:3e3}},array:[]},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"grab"},onclick:{enable:!0,mode:"push"},resize:!0},modes:{grab:{distance:100,line_linked:{opacity:1}},bubble:{distance:200,size:80,duration:.4},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}},mouse:{}},retina_detect:!1,fn:{interact:{},modes:{},vendors:{}},tmp:{}};var i=this.pJS;a&&Object.deepExtend(i,a),i.tmp.obj={size_value:i.particles.size.value,size_anim_speed:i.particles.size.anim.speed,move_speed:i.particles.move.speed,line_linked_distance:i.particles.line_linked.distance,line_linked_width:i.particles.line_linked.width,mode_grab_distance:i.interactivity.modes.grab.distance,mode_bubble_distance:i.interactivity.modes.bubble.distance,mode_bubble_size:i.interactivity.modes.bubble.size,mode_repulse_distance:i.interactivity.modes.repulse.distance},i.fn.retinaInit=function(){i.retina_detect&&window.devicePixelRatio>1?(i.canvas.pxratio=window.devicePixelRatio,i.tmp.retina=!0):(i.canvas.pxratio=1,i.tmp.retina=!1),i.canvas.w=i.canvas.el.offsetWidth*i.canvas.pxratio,i.canvas.h=i.canvas.el.offsetHeight*i.canvas.pxratio,i.particles.size.value=i.tmp.obj.size_value*i.canvas.pxratio,i.particles.size.anim.speed=i.tmp.obj.size_anim_speed*i.canvas.pxratio,i.particles.move.speed=i.tmp.obj.move_speed*i.canvas.pxratio,i.particles.line_linked.distance=i.tmp.obj.line_linked_distance*i.canvas.pxratio,i.interactivity.modes.grab.distance=i.tmp.obj.mode_grab_distance*i.canvas.pxratio,i.interactivity.modes.bubble.distance=i.tmp.obj.mode_bubble_distance*i.canvas.pxratio,i.particles.line_linked.width=i.tmp.obj.line_linked_width*i.canvas.pxratio,i.interactivity.modes.bubble.size=i.tmp.obj.mode_bubble_size*i.canvas.pxratio,i.interactivity.modes.repulse.distance=i.tmp.obj.mode_repulse_distance*i.canvas.pxratio},i.fn.canvasInit=function(){i.canvas.ctx=i.canvas.el.getContext("2d")},i.fn.canvasSize=function(){i.canvas.el.width=i.canvas.w,i.canvas.el.height=i.canvas.h,i&&i.interactivity.events.resize&&window.addEventListener("resize",function(){i.canvas.w=i.canvas.el.offsetWidth,i.canvas.h=i.canvas.el.offsetHeight,i.tmp.retina&&(i.canvas.w*=i.canvas.pxratio,i.canvas.h*=i.canvas.pxratio),i.canvas.el.width=i.canvas.w,i.canvas.el.height=i.canvas.h,i.particles.move.enable||(i.fn.particlesEmpty(),i.fn.particlesCreate(),i.fn.particlesDraw(),i.fn.vendors.densityAutoParticles()),i.fn.vendors.densityAutoParticles()})},i.fn.canvasPaint=function(){i.canvas.ctx.fillRect(0,0,i.canvas.w,i.canvas.h)},i.fn.canvasClear=function(){i.canvas.ctx.clearRect(0,0,i.canvas.w,i.canvas.h)},i.fn.particle=function(e,a,t){if(this.radius=(i.particles.size.random?Math.random():1)*i.particles.size.value,i.particles.size.anim.enable&&(this.size_status=!1,this.vs=i.particles.size.anim.speed/100,i.particles.size.anim.sync||(this.vs=this.vs*Math.random())),this.x=t?t.x:Math.random()*i.canvas.w,this.y=t?t.y:Math.random()*i.canvas.h,this.x>i.canvas.w-2*this.radius?this.x=this.x-this.radius:this.x<2*this.radius&&(this.x=this.x+this.radius),this.y>i.canvas.h-2*this.radius?this.y=this.y-this.radius:this.y<2*this.radius&&(this.y=this.y+this.radius),i.particles.move.bounce&&i.fn.vendors.checkOverlap(this,t),this.color={},"object"==typeof e.value)if(e.value instanceof Array){var s=e.value[Math.floor(Math.random()*i.particles.color.value.length)];this.color.rgb=hexToRgb(s)}else void 0!=e.value.r&&void 0!=e.value.g&&void 0!=e.value.b&&(this.color.rgb={r:e.value.r,g:e.value.g,b:e.value.b}),void 0!=e.value.h&&void 0!=e.value.s&&void 0!=e.value.l&&(this.color.hsl={h:e.value.h,s:e.value.s,l:e.value.l});else"random"==e.value?this.color.rgb={r:Math.floor(256*Math.random())+0,g:Math.floor(256*Math.random())+0,b:Math.floor(256*Math.random())+0}:"string"==typeof e.value&&(this.color=e,this.color.rgb=hexToRgb(this.color.value));this.opacity=(i.particles.opacity.random?Math.random():1)*i.particles.opacity.value,i.particles.opacity.anim.enable&&(this.opacity_status=!1,this.vo=i.particles.opacity.anim.speed/100,i.particles.opacity.anim.sync||(this.vo=this.vo*Math.random()));var n={};switch(i.particles.move.direction){case"top":n={x:0,y:-1};break;case"top-right":n={x:.5,y:-.5};break;case"right":n={x:1,y:-0};break;case"bottom-right":n={x:.5,y:.5};break;case"bottom":n={x:0,y:1};break;case"bottom-left":n={x:-.5,y:1};break;case"left":n={x:-1,y:0};break;case"top-left":n={x:-.5,y:-.5};break;default:n={x:0,y:0}}i.particles.move.straight?(this.vx=n.x,this.vy=n.y,i.particles.move.random&&(this.vx=this.vx*Math.random(),this.vy=this.vy*Math.random())):(this.vx=n.x+Math.random()-.5,this.vy=n.y+Math.random()-.5),this.vx_i=this.vx,this.vy_i=this.vy;var r=i.particles.shape.type;if("object"==typeof r){if(r instanceof Array){var c=r[Math.floor(Math.random()*r.length)];this.shape=c}}else this.shape=r;if("image"==this.shape){var o=i.particles.shape;this.img={src:o.image.src,ratio:o.image.width/o.image.height},this.img.ratio||(this.img.ratio=1),"svg"==i.tmp.img_type&&void 0!=i.tmp.source_svg&&(i.fn.vendors.createSvgImg(this),i.tmp.pushing&&(this.img.loaded=!1))}},i.fn.particle.prototype.draw=function(){function e(){i.canvas.ctx.drawImage(r,a.x-t,a.y-t,2*t,2*t/a.img.ratio)}var a=this;if(void 0!=a.radius_bubble)var t=a.radius_bubble;else var t=a.radius;if(void 0!=a.opacity_bubble)var s=a.opacity_bubble;else var s=a.opacity;if(a.color.rgb)var n="rgba("+a.color.rgb.r+","+a.color.rgb.g+","+a.color.rgb.b+","+s+")";else var n="hsla("+a.color.hsl.h+","+a.color.hsl.s+"%,"+a.color.hsl.l+"%,"+s+")";switch(i.canvas.ctx.fillStyle=n,i.canvas.ctx.beginPath(),a.shape){case"circle":i.canvas.ctx.arc(a.x,a.y,t,0,2*Math.PI,!1);break;case"edge":i.canvas.ctx.rect(a.x-t,a.y-t,2*t,2*t);break;case"triangle":i.fn.vendors.drawShape(i.canvas.ctx,a.x-t,a.y+t/1.66,2*t,3,2);break;case"polygon":i.fn.vendors.drawShape(i.canvas.ctx,a.x-t/(i.particles.shape.polygon.nb_sides/3.5),a.y-t/.76,2.66*t/(i.particles.shape.polygon.nb_sides/3),i.particles.shape.polygon.nb_sides,1);break;case"star":i.fn.vendors.drawShape(i.canvas.ctx,a.x-2*t/(i.particles.shape.polygon.nb_sides/4),a.y-t/1.52,2*t*2.66/(i.particles.shape.polygon.nb_sides/3),i.particles.shape.polygon.nb_sides,2);break;case"image":if("svg"==i.tmp.img_type)var r=a.img.obj;else var r=i.tmp.img_obj;r&&e()}i.canvas.ctx.closePath(),i.particles.shape.stroke.width>0&&(i.canvas.ctx.strokeStyle=i.particles.shape.stroke.color,i.canvas.ctx.lineWidth=i.particles.shape.stroke.width,i.canvas.ctx.stroke()),i.canvas.ctx.fill()},i.fn.particlesCreate=function(){for(var e=0;e<i.particles.number.value;e++)i.particles.array.push(new i.fn.particle(i.particles.color,i.particles.opacity.value))},i.fn.particlesUpdate=function(){for(var e=0;e<i.particles.array.length;e++){var a=i.particles.array[e];if(i.particles.move.enable){var t=i.particles.move.speed/2;a.x+=a.vx*t,a.y+=a.vy*t}if(i.particles.opacity.anim.enable&&(1==a.opacity_status?(a.opacity>=i.particles.opacity.value&&(a.opacity_status=!1),a.opacity+=a.vo):(a.opacity<=i.particles.opacity.anim.opacity_min&&(a.opacity_status=!0),a.opacity-=a.vo),a.opacity<0&&(a.opacity=0)),i.particles.size.anim.enable&&(1==a.size_status?(a.radius>=i.particles.size.value&&(a.size_status=!1),a.radius+=a.vs):(a.radius<=i.particles.size.anim.size_min&&(a.size_status=!0),a.radius-=a.vs),a.radius<0&&(a.radius=0)),"bounce"==i.particles.move.out_mode)var s={x_left:a.radius,x_right:i.canvas.w,y_top:a.radius,y_bottom:i.canvas.h};else var s={x_left:-a.radius,x_right:i.canvas.w+a.radius,y_top:-a.radius,y_bottom:i.canvas.h+a.radius};switch(a.x-a.radius>i.canvas.w?(a.x=s.x_left,a.y=Math.random()*i.canvas.h):a.x+a.radius<0&&(a.x=s.x_right,a.y=Math.random()*i.canvas.h),a.y-a.radius>i.canvas.h?(a.y=s.y_top,a.x=Math.random()*i.canvas.w):a.y+a.radius<0&&(a.y=s.y_bottom,a.x=Math.random()*i.canvas.w),i.particles.move.out_mode){case"bounce":a.x+a.radius>i.canvas.w?a.vx=-a.vx:a.x-a.radius<0&&(a.vx=-a.vx),a.y+a.radius>i.canvas.h?a.vy=-a.vy:a.y-a.radius<0&&(a.vy=-a.vy)}if(isInArray("grab",i.interactivity.events.onhover.mode)&&i.fn.modes.grabParticle(a),(isInArray("bubble",i.interactivity.events.onhover.mode)||isInArray("bubble",i.interactivity.events.onclick.mode))&&i.fn.modes.bubbleParticle(a),(isInArray("repulse",i.interactivity.events.onhover.mode)||isInArray("repulse",i.interactivity.events.onclick.mode))&&i.fn.modes.repulseParticle(a),i.particles.line_linked.enable||i.particles.move.attract.enable)for(var n=e+1;n<i.particles.array.length;n++){var r=i.particles.array[n];i.particles.line_linked.enable&&i.fn.interact.linkParticles(a,r),i.particles.move.attract.enable&&i.fn.interact.attractParticles(a,r),i.particles.move.bounce&&i.fn.interact.bounceParticles(a,r)}}},i.fn.particlesDraw=function(){i.canvas.ctx.clearRect(0,0,i.canvas.w,i.canvas.h),i.fn.particlesUpdate();for(var e=0;e<i.particles.array.length;e++){var a=i.particles.array[e];a.draw()}},i.fn.particlesEmpty=function(){i.particles.array=[]},i.fn.particlesRefresh=function(){cancelRequestAnimFrame(i.fn.checkAnimFrame),cancelRequestAnimFrame(i.fn.drawAnimFrame),i.tmp.source_svg=void 0,i.tmp.img_obj=void 0,i.tmp.count_svg=0,i.fn.particlesEmpty(),i.fn.canvasClear(),i.fn.vendors.start()},i.fn.interact.linkParticles=function(e,a){var t=e.x-a.x,s=e.y-a.y,n=Math.sqrt(t*t+s*s);if(n<=i.particles.line_linked.distance){var r=i.particles.line_linked.opacity-n/(1/i.particles.line_linked.opacity)/i.particles.line_linked.distance;if(r>0){var c=i.particles.line_linked.color_rgb_line;i.canvas.ctx.strokeStyle="rgba("+c.r+","+c.g+","+c.b+","+r+")",i.canvas.ctx.lineWidth=i.particles.line_linked.width,i.canvas.ctx.beginPath(),i.canvas.ctx.moveTo(e.x,e.y),i.canvas.ctx.lineTo(a.x,a.y),i.canvas.ctx.stroke(),i.canvas.ctx.closePath()}}},i.fn.interact.attractParticles=function(e,a){var t=e.x-a.x,s=e.y-a.y,n=Math.sqrt(t*t+s*s);if(n<=i.particles.line_linked.distance){var r=t/(1e3*i.particles.move.attract.rotateX),c=s/(1e3*i.particles.move.attract.rotateY);e.vx-=r,e.vy-=c,a.vx+=r,a.vy+=c}},i.fn.interact.bounceParticles=function(e,a){var t=e.x-a.x,i=e.y-a.y,s=Math.sqrt(t*t+i*i),n=e.radius+a.radius;n>=s&&(e.vx=-e.vx,e.vy=-e.vy,a.vx=-a.vx,a.vy=-a.vy)},i.fn.modes.pushParticles=function(e,a){i.tmp.pushing=!0;for(var t=0;e>t;t++)i.particles.array.push(new i.fn.particle(i.particles.color,i.particles.opacity.value,{x:a?a.pos_x:Math.random()*i.canvas.w,y:a?a.pos_y:Math.random()*i.canvas.h})),t==e-1&&(i.particles.move.enable||i.fn.particlesDraw(),i.tmp.pushing=!1)},i.fn.modes.removeParticles=function(e){i.particles.array.splice(0,e),i.particles.move.enable||i.fn.particlesDraw()},i.fn.modes.bubbleParticle=function(e){function a(){e.opacity_bubble=e.opacity,e.radius_bubble=e.radius}function t(a,t,s,n,c){if(a!=t)if(i.tmp.bubble_duration_end){if(void 0!=s){var o=n-p*(n-a)/i.interactivity.modes.bubble.duration,l=a-o;d=a+l,"size"==c&&(e.radius_bubble=d),"opacity"==c&&(e.opacity_bubble=d)}}else if(r<=i.interactivity.modes.bubble.distance){if(void 0!=s)var v=s;else var v=n;if(v!=a){var d=n-p*(n-a)/i.interactivity.modes.bubble.duration;"size"==c&&(e.radius_bubble=d),"opacity"==c&&(e.opacity_bubble=d)}}else"size"==c&&(e.radius_bubble=void 0),"opacity"==c&&(e.opacity_bubble=void 0)}if(i.interactivity.events.onhover.enable&&isInArray("bubble",i.interactivity.events.onhover.mode)){var s=e.x-i.interactivity.mouse.pos_x,n=e.y-i.interactivity.mouse.pos_y,r=Math.sqrt(s*s+n*n),c=1-r/i.interactivity.modes.bubble.distance;if(r<=i.interactivity.modes.bubble.distance){if(c>=0&&"mousemove"==i.interactivity.status){if(i.interactivity.modes.bubble.size!=i.particles.size.value)if(i.interactivity.modes.bubble.size>i.particles.size.value){var o=e.radius+i.interactivity.modes.bubble.size*c;o>=0&&(e.radius_bubble=o)}else{var l=e.radius-i.interactivity.modes.bubble.size,o=e.radius-l*c;o>0?e.radius_bubble=o:e.radius_bubble=0}if(i.interactivity.modes.bubble.opacity!=i.particles.opacity.value)if(i.interactivity.modes.bubble.opacity>i.particles.opacity.value){var v=i.interactivity.modes.bubble.opacity*c;v>e.opacity&&v<=i.interactivity.modes.bubble.opacity&&(e.opacity_bubble=v)}else{var v=e.opacity-(i.particles.opacity.value-i.interactivity.modes.bubble.opacity)*c;v<e.opacity&&v>=i.interactivity.modes.bubble.opacity&&(e.opacity_bubble=v)}}}else a();"mouseleave"==i.interactivity.status&&a()}else if(i.interactivity.events.onclick.enable&&isInArray("bubble",i.interactivity.events.onclick.mode)){if(i.tmp.bubble_clicking){var s=e.x-i.interactivity.mouse.click_pos_x,n=e.y-i.interactivity.mouse.click_pos_y,r=Math.sqrt(s*s+n*n),p=((new Date).getTime()-i.interactivity.mouse.click_time)/1e3;p>i.interactivity.modes.bubble.duration&&(i.tmp.bubble_duration_end=!0),p>2*i.interactivity.modes.bubble.duration&&(i.tmp.bubble_clicking=!1,i.tmp.bubble_duration_end=!1)}i.tmp.bubble_clicking&&(t(i.interactivity.modes.bubble.size,i.particles.size.value,e.radius_bubble,e.radius,"size"),t(i.interactivity.modes.bubble.opacity,i.particles.opacity.value,e.opacity_bubble,e.opacity,"opacity"))}},i.fn.modes.repulseParticle=function(e){function a(){var a=Math.atan2(d,p);if(e.vx=u*Math.cos(a),e.vy=u*Math.sin(a),"bounce"==i.particles.move.out_mode){var t={x:e.x+e.vx,y:e.y+e.vy};t.x+e.radius>i.canvas.w?e.vx=-e.vx:t.x-e.radius<0&&(e.vx=-e.vx),t.y+e.radius>i.canvas.h?e.vy=-e.vy:t.y-e.radius<0&&(e.vy=-e.vy)}}if(i.interactivity.events.onhover.enable&&isInArray("repulse",i.interactivity.events.onhover.mode)&&"mousemove"==i.interactivity.status){var t=e.x-i.interactivity.mouse.pos_x,s=e.y-i.interactivity.mouse.pos_y,n=Math.sqrt(t*t+s*s),r={x:t/n,y:s/n},c=i.interactivity.modes.repulse.distance,o=100,l=clamp(1/c*(-1*Math.pow(n/c,2)+1)*c*o,0,50),v={x:e.x+r.x*l,y:e.y+r.y*l};"bounce"==i.particles.move.out_mode?(v.x-e.radius>0&&v.x+e.radius<i.canvas.w&&(e.x=v.x),v.y-e.radius>0&&v.y+e.radius<i.canvas.h&&(e.y=v.y)):(e.x=v.x,e.y=v.y)}else if(i.interactivity.events.onclick.enable&&isInArray("repulse",i.interactivity.events.onclick.mode))if(i.tmp.repulse_finish||(i.tmp.repulse_count++,i.tmp.repulse_count==i.particles.array.length&&(i.tmp.repulse_finish=!0)),i.tmp.repulse_clicking){var c=Math.pow(i.interactivity.modes.repulse.distance/6,3),p=i.interactivity.mouse.click_pos_x-e.x,d=i.interactivity.mouse.click_pos_y-e.y,m=p*p+d*d,u=-c/m*1;c>=m&&a()}else 0==i.tmp.repulse_clicking&&(e.vx=e.vx_i,e.vy=e.vy_i)},i.fn.modes.grabParticle=function(e){if(i.interactivity.events.onhover.enable&&"mousemove"==i.interactivity.status){var a=e.x-i.interactivity.mouse.pos_x,t=e.y-i.interactivity.mouse.pos_y,s=Math.sqrt(a*a+t*t);if(s<=i.interactivity.modes.grab.distance){var n=i.interactivity.modes.grab.line_linked.opacity-s/(1/i.interactivity.modes.grab.line_linked.opacity)/i.interactivity.modes.grab.distance;if(n>0){var r=i.particles.line_linked.color_rgb_line;i.canvas.ctx.strokeStyle="rgba("+r.r+","+r.g+","+r.b+","+n+")",i.canvas.ctx.lineWidth=i.particles.line_linked.width,i.canvas.ctx.beginPath(),i.canvas.ctx.moveTo(e.x,e.y),i.canvas.ctx.lineTo(i.interactivity.mouse.pos_x,i.interactivity.mouse.pos_y),i.canvas.ctx.stroke(),i.canvas.ctx.closePath()}}}},i.fn.vendors.eventsListeners=function(){"window"==i.interactivity.detect_on?i.interactivity.el=window:i.interactivity.el=i.canvas.el,(i.interactivity.events.onhover.enable||i.interactivity.events.onclick.enable)&&(i.interactivity.el.addEventListener("mousemove",function(e){if(i.interactivity.el==window)var a=e.clientX,t=e.clientY;else var a=e.offsetX||e.clientX,t=e.offsetY||e.clientY;i.interactivity.mouse.pos_x=a,i.interactivity.mouse.pos_y=t,i.tmp.retina&&(i.interactivity.mouse.pos_x*=i.canvas.pxratio,i.interactivity.mouse.pos_y*=i.canvas.pxratio),i.interactivity.status="mousemove"}),i.interactivity.el.addEventListener("mouseleave",function(e){i.interactivity.mouse.pos_x=null,i.interactivity.mouse.pos_y=null,i.interactivity.status="mouseleave"})),i.interactivity.events.onclick.enable&&i.interactivity.el.addEventListener("click",function(){if(i.interactivity.mouse.click_pos_x=i.interactivity.mouse.pos_x,i.interactivity.mouse.click_pos_y=i.interactivity.mouse.pos_y,i.interactivity.mouse.click_time=(new Date).getTime(),i.interactivity.events.onclick.enable)switch(i.interactivity.events.onclick.mode){case"push":i.particles.move.enable?i.fn.modes.pushParticles(i.interactivity.modes.push.particles_nb,i.interactivity.mouse):1==i.interactivity.modes.push.particles_nb?i.fn.modes.pushParticles(i.interactivity.modes.push.particles_nb,i.interactivity.mouse):i.interactivity.modes.push.particles_nb>1&&i.fn.modes.pushParticles(i.interactivity.modes.push.particles_nb);break;case"remove":i.fn.modes.removeParticles(i.interactivity.modes.remove.particles_nb);break;case"bubble":i.tmp.bubble_clicking=!0;break;case"repulse":i.tmp.repulse_clicking=!0,i.tmp.repulse_count=0,i.tmp.repulse_finish=!1,setTimeout(function(){i.tmp.repulse_clicking=!1},1e3*i.interactivity.modes.repulse.duration)}})},i.fn.vendors.densityAutoParticles=function(){if(i.particles.number.density.enable){var e=i.canvas.el.width*i.canvas.el.height/1e3;i.tmp.retina&&(e/=2*i.canvas.pxratio);var a=e*i.particles.number.value/i.particles.number.density.value_area,t=i.particles.array.length-a;0>t?i.fn.modes.pushParticles(Math.abs(t)):i.fn.modes.removeParticles(t)}},i.fn.vendors.checkOverlap=function(e,a){for(var t=0;t<i.particles.array.length;t++){var s=i.particles.array[t],n=e.x-s.x,r=e.y-s.y,c=Math.sqrt(n*n+r*r);c<=e.radius+s.radius&&(e.x=a?a.x:Math.random()*i.canvas.w,e.y=a?a.y:Math.random()*i.canvas.h,i.fn.vendors.checkOverlap(e))}},i.fn.vendors.createSvgImg=function(e){var a=i.tmp.source_svg,t=/#([0-9A-F]{3,6})/gi,s=a.replace(t,function(a,t,i,s){if(e.color.rgb)var n="rgba("+e.color.rgb.r+","+e.color.rgb.g+","+e.color.rgb.b+","+e.opacity+")";else var n="hsla("+e.color.hsl.h+","+e.color.hsl.s+"%,"+e.color.hsl.l+"%,"+e.opacity+")";return n}),n=new Blob([s],{type:"image/svg+xml;charset=utf-8"}),r=window.URL||window.webkitURL||window,c=r.createObjectURL(n),o=new Image;o.addEventListener("load",function(){e.img.obj=o,e.img.loaded=!0,r.revokeObjectURL(c),i.tmp.count_svg++}),o.src=c},i.fn.vendors.destroypJS=function(){cancelAnimationFrame(i.fn.drawAnimFrame),t.remove(),pJSDom=null},i.fn.vendors.drawShape=function(e,a,t,i,s,n){var r=s*n,c=s/n,o=180*(c-2)/c,l=Math.PI-Math.PI*o/180;e.save(),e.beginPath(),e.translate(a,t),e.moveTo(0,0);for(var v=0;r>v;v++)e.lineTo(i,0),e.translate(i,0),e.rotate(l);e.fill(),e.restore()},i.fn.vendors.exportImg=function(){window.open(i.canvas.el.toDataURL("image/png"),"_blank")},i.fn.vendors.loadImg=function(e){if(i.tmp.img_error=void 0,""!=i.particles.shape.image.src)if("svg"==e){var a=new XMLHttpRequest;a.open("GET",i.particles.shape.image.src),a.onreadystatechange=function(e){4==a.readyState&&(200==a.status?(i.tmp.source_svg=e.currentTarget.response,i.fn.vendors.checkBeforeDraw()):(console.log("Error pJS - Image not found"),i.tmp.img_error=!0))},a.send()}else{var t=new Image;t.addEventListener("load",function(){i.tmp.img_obj=t,i.fn.vendors.checkBeforeDraw()}),t.src=i.particles.shape.image.src}else console.log("Error pJS - No image.src"),i.tmp.img_error=!0},i.fn.vendors.draw=function(){"image"==i.particles.shape.type?"svg"==i.tmp.img_type?i.tmp.count_svg>=i.particles.number.value?(i.fn.particlesDraw(),i.particles.move.enable?i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw):cancelRequestAnimFrame(i.fn.drawAnimFrame)):i.tmp.img_error||(i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw)):void 0!=i.tmp.img_obj?(i.fn.particlesDraw(),i.particles.move.enable?i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw):cancelRequestAnimFrame(i.fn.drawAnimFrame)):i.tmp.img_error||(i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw)):(i.fn.particlesDraw(),i.particles.move.enable?i.fn.drawAnimFrame=requestAnimFrame(i.fn.vendors.draw):cancelRequestAnimFrame(i.fn.drawAnimFrame))},i.fn.vendors.checkBeforeDraw=function(){"image"==i.particles.shape.type?"svg"==i.tmp.img_type&&void 0==i.tmp.source_svg?i.tmp.checkAnimFrame=requestAnimFrame(check):(cancelRequestAnimFrame(i.tmp.checkAnimFrame),i.tmp.img_error||(i.fn.vendors.init(),i.fn.vendors.draw())):(i.fn.vendors.init(),i.fn.vendors.draw())},i.fn.vendors.init=function(){i.fn.retinaInit(),i.fn.canvasInit(),i.fn.canvasSize(),i.fn.canvasPaint(),i.fn.particlesCreate(),i.fn.vendors.densityAutoParticles(),i.particles.line_linked.color_rgb_line=hexToRgb(i.particles.line_linked.color)},i.fn.vendors.start=function(){isInArray("image",i.particles.shape.type)?(i.tmp.img_type=i.particles.shape.image.src.substr(i.particles.shape.image.src.length-3),i.fn.vendors.loadImg(i.tmp.img_type)):i.fn.vendors.checkBeforeDraw()},i.fn.vendors.eventsListeners(),i.fn.vendors.start()};Object.deepExtend=function(e,a){for(var t in a)a[t]&&a[t].constructor&&a[t].constructor===Object?(e[t]=e[t]||{},arguments.callee(e[t],a[t])):e[t]=a[t];return e},window.requestAnimFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}(),window.cancelRequestAnimFrame=function(){return window.cancelAnimationFrame||window.webkitCancelRequestAnimationFrame||window.mozCancelRequestAnimationFrame||window.oCancelRequestAnimationFrame||window.msCancelRequestAnimationFrame||clearTimeout}(),window.pJSDom=[],window.particlesJS=function(e,a){"string"!=typeof e&&(a=e,e="particles-js"),e||(e="particles-js");var t=document.getElementById(e),i="particles-js-canvas-el",s=t.getElementsByClassName(i);if(s.length)for(;s.length>0;)t.removeChild(s[0]);var n=document.createElement("canvas");n.className=i,n.style.width="100%",n.style.height="100%";var r=document.getElementById(e).appendChild(n);null!=r&&pJSDom.push(new pJS(e,a))},window.particlesJS.load=function(e,a,t){var i=new XMLHttpRequest;i.open("GET",a),i.onreadystatechange=function(a){if(4==i.readyState)if(200==i.status){var s=JSON.parse(a.currentTarget.response);window.particlesJS(e,s),t&&t()}else console.log("Error pJS - XMLHttpRequest status: "+i.status),console.log("Error pJS - File config not found")},i.send()};

// ParticlesJS Config.
particlesJS('particles-js', {
  'particles': {
    'number': {
      'value': maxParticles,
      'density': {
        'enable': true,
        'value_area': (maxParticles * 7) * 2
      }
    },
    'color': {
      'value': color
    },
    'shape': {
      'type': 'circle',
      'stroke': {
        'width': 0,
        'color': '#000000'
      },
      'polygon': {
        'nb_sides': 5
      },
    },
    'opacity': {
      'value': 3,
      'random': false,
      'anim': {
        'enable': false,
        'speed': 1,
        'opacity_min': 2,
        'sync': false
      }
    },
    'size': {
      'value': 3,
      'random': true,
      'anim': {
        'enable': false,
        'speed': 40,
        'size_min': 0.1,
        'sync': false
      }
    },
    'line_linked': {
      'enable': true,
      'distance': 150,
      'color': color,
      'opacity': 1,
      'width': 1
    },
    'move': {
      'enable': true,
      'speed': 2,
      'direction': 'none',
      'random': false,
      'straight': false,
      'out_mode': 'out',
      'bounce': false,
      'attract': {
        'enable': false,
        'rotateX': 600,
        'rotateY': 1200
      }
    }
  },
  'interactivity': {
    'detect_on': 'canvas',
    'events': {
      'onhover': {
        'enable': true,
        'mode': 'grab'
      },
      'onclick': {
        'enable': true,
        'mode': 'push'
      },
      'resize': true
    },
    'modes': {
      'grab': {
        'distance': 140,
        'line_linked': {
          'opacity': 1
        }
      },
      'bubble': {
        'distance': 400,
        'size': 40,
        'duration': 2,
        'opacity': 8,
        'speed': 3
      },
      'repulse': {
        'distance': 200,
        'duration': 0.4
      },
      'push': {
        'particles_nb': 4
      },
      'remove': {
        'particles_nb': 2
      }
    }
  },
  'retina_detect': true
});

    </script>

@endsection
