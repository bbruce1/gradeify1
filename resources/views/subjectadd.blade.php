@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Add Subject</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="subjects.html">Subject</a></li>
									<li class="breadcrumb-item active">Add Subject</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
                                    <form autocomplete="off" id="addsubjectform" action="/subjects/createsubject" method="post">
                                        @csrf
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Subject Information</span></h5>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Subject ID</label>
													<input type="text" name="subject_id" class="form-control">
                                                    <small class="text-danger">{{ $errors->first('subject_id') }}</small>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Subject Name</label>
													<input type="text" name="subjectname" class="form-control" >
                                                    <small class="text-danger">{{ $errors->first('subjectname') }}</small>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Class</label>
                                                    <input type="text" name="classno" class="form-control">
                                                    <small class="text-danger">{{ $errors->first('classno') }}</small>
												</div>
											</div>
											<div class="col-12">
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
@section('script')
{{-- <script type="text/javascript">
	$(document).ready(function(){
		$("#addsubjectform").validate({
            rules: {
                "subjectname": {required: true},
                "classno": {required: true},
                "subject_id": {required: true},
            },
            messages: {
                "subjectname": {required: "Please enter Subject Name."},
                "classno": {required: "Please enter Class no."},
                "subject_id":{required: "Please enter Subject Id"},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addsubjectform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/subjects/createsubject",
                    success: function(data)
                    {
                        if(data.success == "0"){
                        	alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addsubjectmodal").modal("hide");
                            $('#addsubjectform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });
	});

</script> --}}
@endsection
