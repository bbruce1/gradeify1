@extends('layout.mainlayout')
@section('content')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Note Details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
									<li class="breadcrumb-item active">Notes</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
									<form action="/noteorganizer/{{ $setid }}/savenote" method="POST">
                                        @csrf
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Note</span></h5>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Note Desc.</label>
                            						<input type="hidden" name="noteid" value="{{$noteid}}">
                                                    <textarea rows="4" cols="20" class="form-control summernote " placeholder="Enter your message here" name="notedesc">{{ $ndata['description'] }}</textarea>
                                                    <small class="text-danger font-weight-bold"></small>
                                                </div>
											</div>
											<div class="col-12 mb-3">
													<button type="submit" class="btn btn-primary" name="finish" value="Save">Save</button>
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
@endsection

{{-- @section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function()
        {
            $('#reset').onclick(function()
            {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                })
            })
        })
    </script>
@endsection --}}
