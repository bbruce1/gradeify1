@extends('layout.mainlayout')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Meetings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Meetings</li>
								</ul>
							</div>
							<div class="col-auto text-right float-right ml-auto">
								<a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
								<a href="meetingsadd" class="btn btn-primary" ><i class="fas fa-plus"></i></a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-sm-12">

							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 text-center data-table">
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
												</tr>
											</thead>
											{{-- <tbody>
												<tr>
													<td>1</td>
													<td>
														<h2>
															<a>Mr. Hansen</a>
														</h2>
													</td>
													<td>1:30pm</td>
													<td class="text-right">
														<div class="actions">
															<a href="meetingsedit" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>
														<h2>
															<a>Dr. Licato</a>
														</h2>
													</td>
													<td>2:30pm</td>
													<td class="text-right">
														<div class="actions">
															<a href="meetingsedit" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td>
														<h2>
															<a>Mr. Findler</a>
														</h2>
													</td>
													<td>3:30pm</td>
													<td class="text-right">
														<div class="actions">
															<a href="meetingsedit" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>4</td>
													<td>
														<h2>
															<a>Dr. Schiller</a>
														</h2>
													</td>
													<td>4:30pm</td>
													<td class="text-right">
														<div class="actions">
															<a href="meetingsedit" class="btn btn-sm bg-success-light mr-2">
																<i class="fas fa-pen"></i>
															</a>
															<a href="#" class="btn btn-sm bg-danger-light">
																<i class="fas fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
											</tbody> --}}
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
          ajax: "/meetings",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'time', name: 'time'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });

  </script>
@endsection
