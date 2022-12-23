@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Events</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Events</li>
								</ul>
							</div>
							<div class="col-auto text-right float-right ml-auto">
								<a href="add-events.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">						
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
									<div id="calendar1"></div>
								</div>
							</div>
						</div>
					</div>
				
					<!-- Add Event Modal -->
					<div class="modal fade none-border" id="my_event">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Add Event</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body"><form id="addeventform"><div class="event-inputs"><div class="form-group"> <input type="hidden" name="eventdate"> <label class="control-label">Event Name</label><input class="form-control" placeholder="Insert Event Name" type="text" name="eventtitle"></div><div class="form-group"><label">Time:<input type="time" id="eventtime" name="eventtime" class="form-control"></label"></div><div class="form-group mb-0"><label class="control-label">Category</label><select class="form-control" name="category"><option value="bg-danger">Danger</option><option value="bg-success">Success</option><option value="bg-purple">Purple</option><option value="bg-primary">Primary</option><option value="bg-info">Info</option><option value="bg-warning">Warning</option></select></div></div></form></div>
								<div class="modal-footer justify-content-center">
									<button type="button" class="btn btn-success save-event submit-btn">Create event</button>
									<button type="button" class="btn btn-danger delete-event submit-btn" data-dismiss="modal">Delete</button>
								</div>
							</div>
						</div>
					</div>
@endsection
@section("script")
<script type="text/javascript">

  $(document).ready(function() {
  		var calendar = $('#calendar1').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                // $.ajax({
                //     url: 'add-event.php',
                //     data: 'title=' + title + '&start=' + start + '&end=' + end,
                //     type: "POST",
                //     success: function (data) {
                //         displayMessage("Added Successfully");
                //     }
                // });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });

  });

</script>
@endsection