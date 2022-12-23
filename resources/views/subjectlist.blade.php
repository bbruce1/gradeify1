@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Subjects</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="home">Dashboard</a></li>
									<li class="breadcrumb-item active">Subjects</li>
								</ul>
							</div>
							<div class="col-auto text-right float-right ml-auto">
								<a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
								<a href="subjectadd" class="btn btn-primary"><i class="fas fa-plus"></i></a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-sm-12">
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 data-table text-center">
											<thead>
												<tr>
													<th>ID</th>
                                                    <th>Subject Id</th>
													<th>Name</th>
													<th>Period</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											{{-- <tbody>
												<tr>
													<td>PRE2209</td>
													<td>
														<h2>
															<a>Mathematics</a>
														</h2>
													</td>
													<td>5</td>
													<td class="text-right">
														<div class="actions">
															<a href="subjectedit" class="btn btn-sm bg-success-light mr-2">
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
															<a>History</a>
														</h2>
													</td>
													<td>6</td>
													<td class="text-right">
														<div class="actions">
															<a href="subjectedit" class="btn btn-sm bg-success-light mr-2">
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
															<a>Science</a>
														</h2>
													</td>
													<td>3</td>
													<td class="text-right">
														<div class="actions">
															<a href="subjectedit" class="btn btn-sm bg-success-light mr-2">
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
															<a>Geography</a>
														</h2>
													</td>
													<td>8</td>
													<td class="text-right">
														<div class="actions">
															<a href="subjectedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>Botony</a>
														</h2>
													</td>
													<td>9</td>
													<td class="text-right">
														<div class="actions">
															<a href="subjectedit" class="btn btn-sm bg-success-light mr-2">
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
														<h2>
															<a>English</a>
														</h2>
													</td>
													<td>4</td>
													<td class="text-right">
														<div class="actions">
															<a href="subjectedit" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
											</tbody> --}}
                                            <tbody id="subjectlist"></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


@endsection
@section('script')
<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
        //   processing: true,
        //   serverSide: true,
          ajax: "/subjectlist",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'subject_id', name: 'subject_id'},
              {data: 'name', name: 'name'},
              {data: 'class_no', name: 'class_no'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });

  </script>
@endsection
