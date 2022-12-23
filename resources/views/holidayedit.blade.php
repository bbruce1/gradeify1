@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Edit Holiday</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="holidays">Holidays</a></li>
									<li class="breadcrumb-item active">Edit Holidays</li>
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
													<label>Holiday Name</label>
													<input type="text" class="form-control" value="Holiday">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<div class="form-group">
														<label>Holiday Date</label>
															<input type="text" id="date" class="form-control">
														<span class="form-text text-muted">dd/mm/yyyy</span>
													</div>
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