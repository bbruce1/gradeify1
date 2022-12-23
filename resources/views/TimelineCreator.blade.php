@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title"></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="/home">Home</a></li>
						<li class="breadcrumb-item active">Timeline Creator</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="set_main">
                    <h1>Timeline Creator</h1>
                    <h6 class="text-left">This timeline creator will help you study for anything requiring dates, particularly history. Use this to help visualise material requiring memorzation of dates.</h6>
				</div>
				{{-- <button type="button" class="btn btn-rounded btn-info my-4" data-toggle="modal" data-target="#adddeckmodal">Create Timeline</button> --}}
			</div>
		</div>
        <div class="row">
            <div class="col ">
                <hr class="my-3">
                <h5 class="my-4 font-weight-bold">Create New Timeline</h6>
                <form action="">
                    <div class="form-group">
                        <input type="text" name="startdate" placeholder="start date" class="form-control col-3 d-inline">
                        <input type="text" name="enddate" placeholder="end date" class="form-control col-3 d-inline">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Enter" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">

            <div class="col bg-light m-3 py-3 d-flex justify-content-around">
                <button class="btn btn-primary">Select point</button>
                <button class="btn btn-primary">enter point</button>
                <button class="btn btn-primary">Test</button>
                <button class="btn btn-primary">Games</button>
                <button class="btn btn-primary">New Timeline</button>

            </div>
        </div>
        <div class="container">
            <h4 class="text-secondary m-5 text-center">(Timeline Here)</h4>
            <button class="btn btn-primary">Save</button>
        </div>
		<div class="loader" style="display: none;" >
			<span class="spinner-border spinner-border-sm" role="status"></span>
		</div>


	</div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@endsection
