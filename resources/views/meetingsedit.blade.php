@extends('layout.mainlayout')
@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Edit Meeting</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="teacher">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="meetings">Meetings</a></li>
									<li class="breadcrumb-item active">Edit Meeting</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<form action="/meetingsedit/{{$meeting[0]->id}}" method="POST">
                                        @csrf
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Meeting Information</span></h5>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Meeting ID</label>
													<input type="text" class="form-control" name="meeting_id" value="{{$meeting[0]->meeting_id}}">
                                                    <small class="text-danger">{{ $errors->first('meeting_id') }}</small>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Meeting Name</label>
													<input type="text" class="form-control" name="name" value="{{$meeting[0]->name}}">
                                                    <small class="text-danger">{{ $errors->first('name') }}</small>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Time</label>
													<input type="time" id="time" class="form-control" name="time" value="{{$meeting[0]->time}}">
                                                    <small class="text-danger">{{ $errors->first('time') }}</small>
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
