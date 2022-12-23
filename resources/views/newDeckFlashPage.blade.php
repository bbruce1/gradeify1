@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<style>
	

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
		<form action="" method="post" id="FlashDeckForm">
			@csrf
			<div class="row">
				<div class="col-sm-12">
					<div class="headingFlash">
						<h4>Create a Flashcard Deck</h4>
						<button type="button" class="btn btn-primary createFlashDeck">Create</button>
					</div>
				</div>
				<div class="flash_deck">
					<div class="col-12">
						<label for="title">Title</label>
						<input type="text" name="title" id="title" class="form-control title">
						<input type="hidden" name="setId" value="{{ $setId }}"><br>
					</div>
					<div class="col-12">
						<label for="description">Description</label>
						<input type="text" name="description" id="description" class="form-control description">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="flash_main_enter">
					<a href="javascript:void()">
						<div class="row">
							<div class="col-3">
								<input type="text" class="form-control" name="flashTerm1" id="flshterm1" placeholder="Flash Term">
							</div>
							<div class="col-9">
								<input type="text" class="form-control" name="flashDes1" id="flashDes1" placeholder="Flash Description">
							</div>
						</div>
					</a>
				</div>
				<div class="flash_main_enter">
					<a href="javascript:void()">
						<div class="row">
							<div class="col-3">
								<input type="text" class="form-control" name="flashTerm2" id="flshterm2" placeholder="Flash Term">
							</div>
							<div class="col-9">
								<input type="text" class="form-control" name="flashDes2" id="flashDes2" placeholder="Flash Description">
							</div>
						</div>
					</a>
				</div>
				<div class="flash_main_enter flash_main_enter3">
					<a href="javascript:void()">
						<div class="row">
							<div class="col-3">
								<input type="text" class="form-control" name="flashTerm3" id="flshterm3" placeholder="Flash Term">
							</div>
							<div class="col-9">
								<input type="text" class="form-control" name="flashDes3" id="flashDes3" placeholder="Flash Description">
							</div>
						</div>
					</a>
				</div>
				<div class="flash_main_enter appendFlash">
					<a href="javascript:void()">
						<div class="row justify-content-center">
							<div class="col-12">
								<input type="button" class="form-control addFlashButton" value="+">
							</div>
						</div>
					</a>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var i = 4;
		$('.addFlashButton').on("click",function(){
			var newDiv = '';
			newDiv = '<div class="flash_main_enter flash_main_enter'+i+'"><a href="javascript:void()"><div class="row"><div class="col-3"><input type="text" class="form-control" name="flashTerm'+ i +'" id="flshterm'+ i +'" placeholder="Flash Term"></div><div class="col-9"><input type="text" class="form-control" name="flashDes'+ i +'" id="flashDes'+ i +'" placeholder="Flash Description"></div></div></a></div>';
			index = i -1;
			$('.flash_main_enter'+index).append(newDiv);
			i = i + 1;
		})


		$('.createFlashDeck').on("click",function(){
			var formData = $("#FlashDeckForm")[0];
			var data = new FormData(formData);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/createFlashDeckSave",
                    success: function(data)
                    {
                    	if(data.success == "0"){
                    		swal(
                    			'Error!',
                    			'Spmething went wrong!',
                    			'error'
                    			)
                    	}
                    	else if(data.success == "1")
                    	{
                    		swal(
                    			'Success',
                    			'Deck created successfully!',
                    			'success'
                    			)
                    		setTimeout(function(){window.location.reload()},1500);
                    	}
                    }
                });
		})

	})
</script>
@endsection
