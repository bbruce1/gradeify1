@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Holiday</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="home">Dashboard</a></li>
									<li class="breadcrumb-item active">Holiday</li>
								</ul>
							</div>
							<div class="col-auto text-right float-right ml-auto">
								<a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
								<a href="holidayadd" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
													<th>Holiday Name</th>
													<th>Type</th>
													<th>Start Date</th>
													<th>End Date</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>PRE2209</td>
													<td>
														<h2>
															<a>Sports Day</a>
														</h2>
													</td>
													<td>College Holiday</td>													
													<td>17 Aug 2020</td>
													<td>19 Aug 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>Memorial Day</a>
														</h2>
													</td>
													<td>Public Holiday</td>													
													<td>05 Aug 2020</td>
													<td>06 Aug 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>Annual Day</a>
														</h2>
													</td>
													<td>College Holiday</td>														
													<td>04 Sept 2020</td>
													<td>07 Sept 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>Exam Holiday</a>
														</h2>
													</td>
													<td>Semester leave</td>													
													<td>17 Sept 2020</td>
													<td>30 Sept 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>PRE2209</td>
													<td>
														<h2>
															<a>Sports Day</a>
														</h2>
													</td>
													<td>College Holiday</td>													
													<td>17 Aug 2020</td>
													<td>19 Aug 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>Memorial Day</a>
														</h2>
													</td>
													<td>Public Holiday</td>													
													<td>05 Aug 2020</td>
													<td>06 Aug 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>Annual Day</a>
														</h2>
													</td>
													<td>College Holiday</td>														
													<td>04 Sept 2020</td>
													<td>07 Sept 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>Exam Holiday</a>
														</h2>
													</td>
													<td>Semester leave</td>													
													<td>17 Sept 2020</td>
													<td>30 Sept 2020</td>
                                                    <td class="text-right">
														<div class="actions">
															<a href="holidayedit" class="btn btn-sm bg-success-light mr-2">
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