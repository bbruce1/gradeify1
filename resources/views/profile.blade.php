@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="alert alert-success text-center" id="showimage-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<p id="imagesuccess"></p>
								</div>

								<div class="alert alert-success text-center" id="showimage-error">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<p id="imageerror"></p>
								</div>
								<div class="row align-items-center" id="edit-profile-image">    
									<div class="col-auto profile-image">
										<a href="#">
											@if(Auth::user()->profile_image)
												<img class="rounded-circle" alt="User Image" src="assets/img/userprofiles/{{ Auth::user()->profile_image }}">
											@else
												<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
											@endif
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{ Auth::user()->name }}</h4>
										<!-- <h6 class="text-muted">MyDokimiLLC</h6> -->
										<!-- <div class="user-Location"><i class="fas fa-map-marker-alt"></i> Florida, United States</div> -->
										<!-- <div class="about-text">Lorem ipsum dolor sit amet.</div> -->
									</div>
									<div class="col-auto profile-btn">
										
										<a href="javascript:void(0)" class="btn btn-primary" id="click-profile-editbtn">
											Edit
										</a>
									</div>
								</div>

								<div class="row align-items-center" id="update-profile-image" style="display: none;">
									<form class="specialform" id="imageupload-form" enctype="multipart/form-data">
										@csrf
										<div class="col-auto profile-image">
											<a href="#">
												@if(Auth::user()->profile_image)
													<img class="rounded-circle" alt="User Image" id="image_preview"
													 src="assets/img/userprofiles/{{ Auth::user()->profile_image }}">
												@else
													<img class="rounded-circle" alt="User Image" id="image_preview" src="assets/img/profiles/avatar-02.jpg">
												@endif
											</a>
										</div>

										<div class="col ml-md-n2 profile-user-info">
											<h4 class="user-name mb-0">{{ Auth::user()->name }}</h4>
											<div class="form-group col-6" style="margin-left: -12px;">
												<input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/*">
											</div>
										</div>

										<div class="col-auto profile-btn">
											<button class="btn btn-primary">Save Changes</button>
										</div>
									</form>
								</div>

							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body" id="editinfo">
													@if (Session::has('success'))
						                                <div class="alert alert-success text-center">
						                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						                                    <p>{{ Session::get('success') }}</p>
						                                </div>
						                            @endif

						                            @if (Session::has('error'))
						                                <div class="alert alert-danger text-center">
						                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						                                    <p>{{ Session::get('error') }}</p>
						                                </div>
						                            @endif
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" href="javascript:void(0)" id="clickeditbtn"><i class="far fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9">{{ Auth::user()->name }}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-9">24 Jul 1983</p>
													</div> -->
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-9">{{ Auth::user()->email }}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-9">305-310-5857</p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-9 mb-0">4663  Agriculture Lane,<br>
														Miami,<br>
														Florida - 33165,<br>
														United States.</p>
													</div> -->
												</div>

												<div class="card-body" id="updateinfo" style="display: none;">
													<h5 class="card-title">
														<span>Personal Details</span>
													</h5>
													<div class="row">
														<div class="col-md-10 col-lg-6">
															<form id="editprofile-form" method="post" action="/editprofile">
																@csrf
																<div class="form-group">
																	<label>Name</label>
																	<input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
																</div>
																<div class="form-group">
																	<label>Email ID</label>
																	<input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
																</div>
																<button class="btn btn-primary" type="submit">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											
										</div>

										<div class="col-lg-3">
											
											<!-- Account Status -->
											<!-- <div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Account Status</span>
														<a class="edit-link" href="#"><i class="far fa-edit mr-1"></i> Edit</a>
													</h5>
													<button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button>
												</div>
											</div> -->
											<!-- /Account Status -->

											<!-- Skills -->
											<!-- <div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Skills </span> 
														<a class="edit-link" href="#"><i class="far fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="skill-tags">
														<span>Html5</span>
														<span>CSS3</span>
														<span>WordPress</span>
														<span>Javascript</span>
														<span>Android</span>
														<span>iOS</span>
														<span>Angular</span>
														<span>PHP</span>
													</div>
												</div>
											</div> -->
											<!-- /Skills -->

										</div>
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											
											<div class="alert alert-success text-center" id="showsuccess">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
												<p id="loginsuccess"></p>
				                            </div>

				                            <div class="alert alert-success text-center" id="showerror">
				                            	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                            	<p id="loginerror"></p>
				                            </div>

											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form id="changepass-form">
														@csrf
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="oldpass" class="form-control">
															<div>
					                                            <span id="err"></span>
					                                        </div>
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" id="password" name="newpass" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="confirmpass" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
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
	  	$(document).ready(function () {

	  		//edit profile form validation
	      	$('#editprofile-form').validate({
	      		rules: {
	      			name: {
	      				required: true
	      			},
	      			email: {
	      				required: true,
	      				email:true
	      			}
	      		},
	      		
	      		messages: {
	      			name: {
	      				required : "Name is required."  
	      			},
	      			email: {
	      				required : "Email ID is required.",
	      				email : "Email ID is Invalid"  
	      			}
	      		}
	      	});

	      	//change password form validation
	      	$('#showsuccess').hide();
            $('#showerror').hide();

	      	$('#changepass-form').validate({
	      		rules: {
	      			oldpass: {
	      				required: true
	      			},
	      			newpass: {
	      				required: true
	      			},
	      			confirmpass: {
	      				required: true,
	      				equalTo: "#password"
	      			}
	      			
	      		},
	      		
	      		messages: {
	      			oldpass: {
	      				required : "Old Password is required."  
	      			},
	      			newpass: {
	      				required : "New Password is required."  
	      			},
	      			confirmpass: {
	      				required: "Confirm Password is required."
	      			}
	      		},

	      		submitHandler: function(form) {
                    var formData = new FormData(form);
                    var error = document.getElementById("err")
                    $.ajax({
                        type: "post",
                        url: "{{ url('changepassword') }}",             
                        data: formData,
                        dataType:'json',
                        cache: false,
                        contentType:false,             
                        processData: false,      
                        success: function (response)
                        {
                            if(response.success == 1)
                            {
                                $('#showerror').hide();
                                $('#loginsuccess').html(response.message);
                                $('#showsuccess').show();

                            }
                            else if(response.success == 2)
                            {
                                error.textContent = response.message ;
                                error.style.color = "red" ;
                            }
                            else
                            {
                                $('#loginerror').html(response.message);
                                $('#showerror').show();
                            }
                        }
                    });
                }
	      	});
	  	});
	</script>
	<script type="text/javascript">

		$("#clickeditbtn").click(function(){
		  	$("#editinfo").hide();
		  	$("#updateinfo").show();
		});

	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			profile_image.onchange = evt => {
				const [file] = profile_image.files
				if (file) {
				    image_preview.src = URL.createObjectURL(file)
				}
			}
		});
	</script>

	<script type="text/javascript">
		$("#click-profile-editbtn").click(function(){
			$("#edit-profile-image").hide();
		  	$("#update-profile-image").show();	
		});

		$('#showimage-success').hide();
        $('#showimage-error').hide();

		// $("#click-profile-updatebtn").click(function(){
		// 	var profile_image = $("#profile_image").val();

		// 	$.ajax({
		// 		type: "post",
		// 		url: "{{ url('changeprofileimage') }}",             
		// 		data: {
		// 			"_token": "{{ csrf_token() }}",
  //             		profile_image:profile_image
		// 		}, 
		// 		success: function (response)
		// 		{
		// 			if(response.success == 1)
		// 			{
		// 				$('#showimage-error').hide();
		// 				$('#imagesuccess').html(response.message);
		// 				$('#showimage-success').show();
		// 			}
		// 			else
		// 			{
		// 				$('#imageerror').html(response.message);
		// 				$('#showimage-error').show();
		// 			}
		// 		}
		// 	});
		// });

		$('#imageupload-form').validate({
			rules: {
				profile_image: {
					required: true
				}
			},

			messages: {
				profile_image: {
					required : "Profile Image is required."
				}
			},

			submitHandler: function(form) {
				var formData = new FormData(form);
				$.ajax({
					type: "post",
					url: "{{ url('changeprofileimage') }}",             
					data: formData,
					dataType:'json',
					cache: false,
					contentType:false,             
					processData: false,      
					success: function (response)
					{
						if(response.success == 1)
						{
							$('#showimage-error').hide();
							$('#imagesuccess').html(response.message);
							$('#showimage-success').show();
						}
						else
						{
							$('#imageerror').html(response.message);
							$('#showimage-error').show();
						}
					}
				});
			}
		});
	</script>

@endsection