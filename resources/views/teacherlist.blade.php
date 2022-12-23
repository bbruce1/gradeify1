@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Teachers</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Teachers</li>
								</ul>
							</div>
							<div class="col-auto text-right float-right ml-auto">
								<a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
								<a href="add-teacher.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 datatable">
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th>Class</th>
													<th>Gender</th>
													<th>Subject</th>
													<th>Section</th>
													<th>Mobile Number</th>
													<th>Address</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>PRE2209</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
															<a href="teacherdetails">Aaliyah</a>
														</h2>
													</td>
													<td>10</td>
													<td>Female</td>
													<td>Mathematics</td>
													<td>A</td>
													<td>097 3584 5870</td>
													<td>911 Deer Ridge Drive,USA</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE2213</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-03.jpg" alt="User Image"></a>
															<a href="teacherdetails">Malynne</a>
														</h2>
													</td>
													<td>8</td>
													<td>Female</td>
													<td>Physics</td>
													<td>A</td>
													<td>242 362 3100</td>
													<td>Bacardi Rd P.O. Box N-4880, New Providence</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE2143</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-04.jpg" alt="User Image"></a>
															<a href="teacherdetails">Levell Scott</a>
														</h2>
													</td>
													<td>10</td>
													<td>Male</td>
													<td>Science</td>
													<td>B</td>
													<td>026 7318 4366</td>
													<td>P.O. Box: 41, Gaborone</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE2431</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
															<a href="teacherdetails">Minnie</a>
														</h2>
													</td>
													<td>11</td>
													<td>Male</td>
													<td>History</td>
													<td>C</td>
													<td>952 512 4909</td>
													<td>4771  Oral Lake Road, Golden Valley</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE1534</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-06.jpg" alt="User Image"></a>
															<a href="teacherdetails">Lois A</a>
														</h2>
													</td>
													<td>10</td>
													<td>Female</td>
													<td>English</td>
													<td>B</td>
													<td>413 289 1314</td>
													<td>2844 Leverton Cove Road, Palmer</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE2153</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-07.jpg" alt="User Image"></a>
															<a href="teacherdetails">Calvin</a>
														</h2>
													</td>
													<td>9</td>
													<td>Male</td>
													<td>Mathematics</td>
													<td>C</td>
													<td>701 753 3810</td>
													<td>1900  Hidden Meadow Drive, Crete</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE1434</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-08.jpg" alt="User Image"></a>
															<a href="teacherdetails">Vincent</a>
														</h2>
													</td>
													<td>10</td>
													<td>Male</td>
													<td>Mathematics</td>
													<td>C</td>
													<td>402 221 7523</td>
													<td>3979  Ashwood Drive, Omaha</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE2345</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
															<a href="teacherdetails">Kozma  Tatari</a>
														</h2>
													</td>
													<td>9</td>
													<td>Female</td>
													<td>Science</td>
													<td>A</td>
													<td>04 2239 968</td>
													<td>Rruga E Kavajes, Condor Center, Tirana</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE2365</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
															<a href="teacherdetails">John Chambers</a>
														</h2>
													</td>
													<td>11</td>
													<td>Male</td>
													<td>Botony</td>
													<td>B</td>
													<td>870 663 2334</td>
													<td>4667 Sunset Drive, Pine Bluff</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE1234</td>
													<td>
														<h2 class="table-avatar">
															<a href="teacherdetails" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-11.jpg" alt="User Image"></a>
															<a href="teacherdetails">Nathan Humphries</a>
														</h2>
													</td>
													<td>10</td>
													<td>Male</td>
													<td>Biology</td>
													<td>A</td>
													<td>077 3499 9959</td>
													<td>86 Lamphey Road, Thelnetham</td>
													<td class="text-right">
														<div class="actions">
															<a href="editteacher" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>					
					</div>					
				</div>


@endsection