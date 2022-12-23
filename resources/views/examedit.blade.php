@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Edit Exam</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="home">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="examlist">Exam</a></li>
									<li class="breadcrumb-item active">Edit Exam</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card">
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Exam Information</span></h5>
											</div>
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Exam Name</label>
													<input type="text" class="form-control" value="Class Test">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Class</label>
													<select class="form-control">
														<option>10</option>
														<option>LKG</option>
														<option>UKG</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
														<option>7</option>
														<option>8</option>
														<option>9</option>
														<option>10</option>
														<option>11</option>
														<option>12</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Subject</label>
													<input type="text" class="form-control" value="English">
												</div>
											</div>
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Fees</label>
													<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">$</span>
													</div>
													<input type="text" class="form-control">
												</div>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Start Time</label>
													<input type="text" class="form-control" value="10:00 AM">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>End Time</label>
													<input type="text" class="form-control" value="01:00 PM">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Event Date</label>
													<input type="text" class="form-control" value="26-11-2020">
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
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->


@endsection