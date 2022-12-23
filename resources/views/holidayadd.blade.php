@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Add Holiday</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="holiday.html">Holiday</a></li>
									<li class="breadcrumb-item active">Add Holiday</li>
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
												<h5 class="form-title"><span>Holiday Information</span></h5>
											</div>
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Holiday Id</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Holiday Name</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Type of Holiday</label>
													<select class="form-control" id="exampleFormControlSelect1">
														<option>Select Holiday</option>
														<option>Public Holiday</option>
														<option>College Holiday</option>
														<option>Exam Holiday</option>
														<option>Others</option>
													  </select>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Start Date</label>
													<input type="date" class="form-control">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>End Date</label>
													<input type="date" class="form-control">
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