@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Edit Subject</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="subjects.html">Subject</a></li>
									<li class="breadcrumb-item active">Edit Subject</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<form action="/subjectedit/{{$subject[0]->id}}" method="post">
                                        @csrf
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Subject Information</span></h5>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Subject ID</label>
													<input type="text" class="form-control" name="subject_id" value="{{$subject[0]->subject_id}}">
                                                    <small class="text-danger">{{ $errors->first('subject_id') }}</small>

												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Subject Name</label>
													<input type="text" class="form-control" name="subjectname" value="{{$subject[0]->name}}">
                                                    <small class="text-danger">{{ $errors->first('subjectname') }}</small>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Period</label>
													<input type="text" class="form-control" name="class_no" value="{{$subject[0]->class_no}}">
                                                    <small class="text-danger">{{ $errors->first('class_no') }}</small>
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
@endsection
