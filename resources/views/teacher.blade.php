@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Teacher Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Overview Section -->
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-6 d-flex">
                        <div class="card bg-five w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-chalkboard"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>{{$total_classes}}</h3>
                                        <h6>Total Classes</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-12 col-xl-6 d-flex">
                        <div class="card bg-six w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>67</h3>
                                        <h6>Total Students</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Overview Section -->

                <!-- Teacher Dashboard -->
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-9">
                        <div class="row">
                            <!-- Lesson plans -->
                            <div class="col-12 col-lg-7 col-xl-7">
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
                                                     <a type="submit" href="lessonplans" style="margin-left: 10px;" class="btn btn-info">Finish</a> 
                                                     <p><span>In Progress</span></p> 
                                                    </li>
                                                @endforeach
{{--
                                                <li class="feed-item">
                                                    <div class="feed-date1">Sep 05, 9 am - 10 am (60min)</div>
                                                    <span class="feed-text1"><a>Period 1 Modern World History</a></span>
                                                    <a type="submit" href="lessonplans" style="margin-left: 10px;" class="btn btn-info">Finish</a>
                                                    <p><span>In Progress</span></p>
                                                </li>
                                                <li class="feed-item">
                                                    <div class="feed-date1">Sep 04, 2 pm - 3 pm (70min)</div>
                                                    <span class="feed-text1"><a>Period 3 Modern World History</a></span>
                                                    <a type="submit" href="lessonplans" style="margin-left: 10px;" class="btn btn-info">View</a>
                                                    <p>Completed</p>
                                                </li>
                                                <li class="feed-item">
                                                    <div class="feed-date1">Sep 02, 1 pm - 2 am (80min)</div>
                                                    <span class="feed-text1"><a>Period 5 Modern World History</a></span>
                                                    <a type="submit" href="lessonplans" style="margin-left: 10px;" class="btn btn-info">View</a>
                                                    <p>Completed</p>
                                                </li>
                                                <li class="feed-item">
                                                    <div class="feed-date1">Aug 30, 10 am - 12 pm (90min)</div>
                                                    <span class="feed-text1"><a>Period 6 English</a></span>
                                                    <a type="submit" href="lessonplans" style="margin-left: 112px;" class="btn btn-info">View</a>
                                                    <p>Completed</p>
                                                </li> --}}
                                                <br>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!--/Lesson plans -->
                                <!-- To Do List -->
                                <div class="col-12 col-lg-7 col-xl-5">
                                    <div class="card flex-fill">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                            <div class="col-6">
                                                <h5 class="card-title mb-0">To Do List</h5>
                                            </div>
                                            <div class="col-6">
                                                <a href="/todos/clearalltodo" id="clearalltodo" class="btn btn-info float-right view-link">Clear All</a>
                                            </div>
                                        </div>
                                            <!-- <h5 class="card-title mb-0">To Do List</h5> -->
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
                                            <li class="list-group-item"><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addtodomodal"><i class="fas fa-plus"></i></button></li>

                                        </ul>

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


                    <div class="col-12 col-lg-12 col-xl-3 ">
                        <div class="card flex-fill">
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
            @endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $("#calendar-doctor").simpleCalendar({
            fixedStartDay: 0, // begin weeks by sunday
            disableEmptyDetails: true,
            events: [
                // generate new event after tomorrow for one hour
                {
                    startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toDateString(),
                    endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
                    summary: 'Conference with teachers'
                },
                // generate new event for yesterday at noon
                {
                    startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
                    endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
                    summary: 'Old classes'
                },
                // generate new event for the last two days
                {
                    startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
                    endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
                    summary: 'Old Lessons'
                }
            ],

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
</script>

@endsection
