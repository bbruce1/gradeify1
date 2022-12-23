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
						<li class="breadcrumb-item active">Searched Set</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			
			<div class="col-sm-12 text-center">
				<div class="set_main">
					@forelse($sets as $key)
						<a href="website/{{ $key->id }}">{{ $key->sets_name }}</a>
					@empty
						<h4>Set not found.</h4>
					@endforelse
				</div>
			</div>
			
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
@section('script')		

@endsection
