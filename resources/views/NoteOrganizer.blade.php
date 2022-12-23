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
						<li class="breadcrumb-item active">Note Organizer</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="set_main">
					@foreach($ndata as $key)
					    <a href="/noteorganizer/{{ $setid }}/note/{{ $key->id }}">{{ $key->title }}{{ $key->description }}</a>
					@endforeach
				</div>
				<button type="button" class="btn btn-rounded btn-info my-4" data-toggle="modal" data-target="#addnotesmodal">Create Notes</button>
			</div>
		</div>
		<div class="loader" style="display: none;" >
			<span class="spinner-border spinner-border-sm" role="status"></span>
		</div>
		<div class="modal fade Create_new_set_popup " id="addnotesmodal" role="dialog">
			<div class="modal-dialog modal-md modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Create Notes</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body pb-0">
						<form autocomplete="off" id="addnotesform" method="post">
							@csrf
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" >
						</div>	
						<div class="form-group">
							<label>Description</label>
                            <input type="hidden" name="setid" value="{{$setid}}">
							<input type="text" name="description" class="form-control" >
						</div>
					</div>
					<div class="modal-footer border-0 mb-2">
						<button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Submit</button>
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
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$("#addnotesform").validate({
            rules: {
                "title": {required: true},
            },
            messages: {
                "title": {required: "Please enter the title for note."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addnotesform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/noteorganizer/createnote",
                    success: function(data)
                    {
                        if(data.success == "0"){
                        	alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addnotesmodal").modal("hide");
                            $('#addnotesform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });
	});
</script>
@endsection