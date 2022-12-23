<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        @if(!Route::is(['students','studentdetails','addstudent','editstudent','teachers','teacherdetails','addteacher','editteacher','departments','editdepartment','adddepartment','subjects','addsubject','editsubject','feescollections','expenses','salary','addfeescollection','addexpenses','addsalary','holiday','fees','exam','event','timetable','library','login','register','forgotpassword','error404','blankpage','sports','hostel','transport','components','formbasicinputs','forminputgroups','formhorizontal','formvertical','formmask','formvalidation','tablesbasic','datatables','addbooks','addevents','addexam','addfees','addholiday','addroom','addsports','addtimetable','addtransport','compose','editevents','editexam','editfees','editroom','editsports','edittimetable','edittransport','inbox','profile']))
		<title>Experior - Dashboard</title>
		@endif
		@if(Route::is(['students','addstudent','editstudent']))
		<title>Experior - Students</title>
		@endif
		@if(Route::is(['studentdetails']))
		<title>Experior - Student Details</title>
		@endif
		@if(Route::is(['teachers','addteacher','editteacher']))
		<title>Experior - Teachers</title>
		@endif
		@if(Route::is(['teacherdetails']))
		<title>Experior - Teacher Details</title>
		@endif
		@if(Route::is(['departments','editdepartment','adddepartment']))
		<title>Experior - Departments</title>
		@endif
		@if(Route::is(['subjects','addsubject','editsubject']))
		<title>Experior - Subjects</title>
		@endif
		@if(Route::is(['feescollections']))
		<title>Experior - Fees Collections</title>
		@endif
		@if(Route::is(['expenses','addexpenses']))
		<title>Experior - Expenses</title>
		@endif
		@if(Route::is(['salary','addsalary']))
		<title>Experior - Salary</title>
		@endif
		@if(Route::is(['addfeescollection','fees']))
		<title>Experior - Fees</title>
		@endif
		@if(Route::is(['holiday','event']))
		<title>Experior - Holiday</title>
		@endif
		@if(Route::is(['exam']))
		<title>Experior - Exam</title>
		@endif
		@if(Route::is(['timetable']))
		<title>Experior - Time Table</title>
		@endif
		@if(Route::is(['library']))
		<title>Experior - Library</title>
		@endif
		@if(Route::is(['login']))
		<title>Experior - Login</title>
		@endif
		@if(Route::is(['register']))
		<title>Experior - Register</title>
		@endif
		@if(Route::is(['forgotpassword']))
		<title>Experior - Forgot Password</title>
	        @endif
		@if(Route::is(['error404']))
		<title>Experior - Error 404</title>
		@endif
		@if(Route::is(['blankpage']))
		<title>Experior - Blank Page</title>
		@endif
		@if(Route::is(['sports']))
		<title>Experior - Sports</title>
		@endif
		@if(Route::is(['hostel']))
		<title>Experior - Hostel</title>
		@endif
		@if(Route::is(['transport']))
		<title>Experior - Transport</title>
		@endif
		@if(Route::is(['components']))
		<title>Experior - Components</title>
		@endif
		@if(Route::is(['formbasicinputs']))
		<title>Experior - Basic Inputs</title>
		@endif
		@if(Route::is(['forminputgroups']))
		<title>Experior - Form Input Groups</title>
		@endif
		@if(Route::is(['formhorizontal']))
		<title>Experior - Horizontal Form</title>
		@endif
		@if(Route::is(['formvertical']))
		<title>Experior - Vertical Form</title>
		@endif
		@if(Route::is(['formmask']))
		<title>Experior - Form Mask</title>
		@endif
		@if(Route::is(['formvalidation']))
		<title>Experior - Form Validation</title>
		@endif
		@if(Route::is(['tablesbasic']))
		<title>Experior - Tables Basic</title>
		@endif
		@if(Route::is(['datatables']))
		<title>Experior - Data Tables</title>
		@endif
		@if(Route::is(['addbooks']))
		<title>Experior - Books</title>
		@endif
		@if(Route::is(['addevents']))
		<title>Experior - Events</title>
		@endif
		@if(Route::is(['addexam']))
		<title>Experior - Exam</title>
		@endif
		@if(Route::is(['addfees']))
		<title>Experior - Fees</title>
		@endif
		@if(Route::is(['addholiday']))
		<title>Experior - Holiday</title>
		@endif
		@if(Route::is(['addroom']))
		<title>Experior - Hostel</title>
		@endif
		@if(Route::is(['addsports']))
		<title>Experior - Sports</title>
		@endif
		@if(Route::is(['addtimetable']))
		<title>Experior - Time Table</title>
		@endif
		@if(Route::is(['addtransport']))
		<title>Experior - Transport</title>
		@endif
		@if(Route::is(['compose']))
		<title>Experior - Compose</title>
		@endif
		@if(Route::is(['editevents']))
		<title>Experior - Events</title>
		@endif
		@if(Route::is(['editexam']))
		<title>Experior - Exam</title>
		@endif
		@if(Route::is(['editfees']))
		<title>Experior - Fees</title>
		@endif
		@if(Route::is(['editroom']))
		<title>Experior - Hostel</title>
		@endif
		@if(Route::is(['editsports']))
		<title>Experior - Sports</title>
		@endif
		@if(Route::is(['edittimetable']))
		<title>Experior - Time Table</title>
		@endif
		@if(Route::is(['edittransport']))
		<title>Experior - Transport</title>
		@endif
		@if(Route::is(['inbox']))
		<title>Experior - Inbox</title>
		@endif
		@if(Route::is(['profile']))
		<title>Experior - Profile</title>
		@endif
		<!-- Favicon -->
                <link rel="shortcut icon" href="/assets/img/favicon.png">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">

		<!-- Bootstrap CSS -->
                <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">
		<!-- Calendar CSS -->

		<link rel="stylesheet" href="/assets/plugins/simple-calendar/simple-calendar.css">

		<!-- Summernote CSS -->
		<link rel="stylesheet" href="/assets/plugins/summernote/dist/summernote-bs4.css">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">
		<!-- Full Calander CSS -->
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="/assets/plugins/datatables/datatables.min.css">
		<!-- Main CSS -->
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/plugins/fullcalendar/fullcalendar.min.css">
        <link rel="stylesheet" href="/assets/css/cutsom-user.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
           <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel='stylesheet' href='http://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css'>
  
  @yield('css')