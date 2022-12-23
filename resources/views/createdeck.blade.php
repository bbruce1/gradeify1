@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<style>
	
.deck_main a {
	width: 22% !important;
}
.deck_main span a {
    margin-left: -6em !important;
}

</style>
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title"></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="/home">Home</a></li>
						<li class="breadcrumb-item active">Decks</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="dash-widget">
                    <div class="deck_main">
                        @foreach($decks as $key)
                            <a href="/flashcard/{{ $key->id }}"><span>{{ $key->deck_name }}</span><span>{{ $key->description }}</span></a><span><a href="../deleteDeck/{{$key->id}}"><i class="float-right fa fa-trash"></i></a></span>
                        @endforeach
                    </div>
                </div>
				<button type="button" class="btn btn-rounded btn-info my-4" data-toggle="modal" data-target="#adddeckmodal">Create Decks</button>
			</div>
		</div>
		<div class="loader" style="display: none;" >
			<span class="spinner-border spinner-border-sm" role="status"></span>
		</div>
		<div class="modal fade Create_new_set_popup " id="adddeckmodal" role="dialog">
			<div class="modal-dialog modal-md modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Create Deck</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body pb-0">
						<form autocomplete="off" id="adddeckform" method="post">
							@csrf
						<div class="form-group">
							<label>Deck Name</label>
                            <input type="hidden" name="setid" value="{{$setid}}">
							<input type="text" name="deckname" class="form-control">
						</div>
						<div class="form-group">
							<label>Deck Description</label>
							<input type="text" name="deckdesc" class="form-control" >
						</div>
					</div>
					<div class="modal-footer border-0 mb-2">
						<button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Create Deck</button>
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
		$("#adddeckform").validate({
            rules: {
                "deckname": {required: true},
                "deckdesc": {required: true},
            },
            messages: {
                "deckname": {required: "Please enter name for the set."},
                "deckdesc": {required: "Please enter description for the set."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#adddeckform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/decks/createdeck",
                    success: function(data)
                    {
                        if(data.success == "0"){
                        	alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#adddeckmodal").modal("hide");
                            $('#adddeckform').each(function(){ this.reset(); });
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
