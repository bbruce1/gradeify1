@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->

<style>
	.flip-container.hover .flipper {
		transform: rotateY(180deg);
	}

	.flip-container,
	.front,
	.back {
		width: 250px;
		height: 190px;
	}

	.flipper {
		transition: 0.8s;
		transform-style: preserve-3d;
		position: relative;
	}

	.front,
	.back {
		backface-visibility: hidden;
		position: absolute;
		top: 0;
		left: 0;
		/*padding: 20px;*/
    word-break: break-all;
	}
	.back > .front{
    overflow-y: auto;
    height: 190px;
    width: 95%;
    padding: 15px 15px 15px 15px;
    word-break: break-all;
}

	.front {
		z-index: 2;
		transform: rotateY(0deg);
	}

	.back {
		transform: rotateY(180deg);
		background-color: #fff;
	}

	#owl-demo .item img{
		display: block;
		width: 100%;
		height: auto;
	}
	.owl-carousel {
		display: none;
		width: 100%;
		z-index: 1;
		margin: 0 auto;
		width: 22%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.owl-carousel .owl-stage-outer {
    
	    background-color: #fff;
	    box-shadow: 0 0 15px #d2d1d1;
	   }

	   .front.artist-1 span:first-child{
			   	 display: flex;
		    text-align: center;
		    width: 92%;
		    position: relative;
		    top: 40%;
		    font-weight: 700;
		    align-items: center;
		    justify-content: center;
	   }
	   .front.artist-1 span:last-child{
	   	    display: flex;
		    align-items: flex-end;
		    height: 80%;
		    justify-content: center;
		    width: 92%;
		    color: gray;
		    font-size: 14px;
		    font-weight: normal;
	   }


	@media (max-width: 600px)
	{
		.owl-carousel {
			display: none;
			width: 100%;
			z-index: 1;
			margin: 0 auto;
			width: 90%;
			display: flex;
			justify-content: center;
			align-items: center;
		}
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
						<li class="breadcrumb-item active">Flashcard</li>
					</ul>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<h5 class="page-title">{{ $deck->deck_name }}</h5>
					<p>{{ $deck->description }}</p>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="flip_btn">
			<div class="flip_btn_left">
			<a href="/flashLearn/{{ $deck->id }}"><button type="button" class="btn btn-primary">Learn</button></a>
			<a href=""><button type="button" class="btn btn-primary">Test</button></a>
		</div>
		<div class="flip_btn_right">
			<button type="button" class="btn btn-primary">Write</button>
			<button type="button" class="btn btn-primary">Flashcard</button>
		</div>
		</div>

		<div id="owl-demo" class="owl-carousel owl-theme">
			@foreach($flashcards as $key)
				<div class="item">
					<div class="flip-container">
						<div class="flipper">
							<div class="front artist-1">
								<span>{{ $key->flashcard_terms }}</span>
								<span>Click to Flip Over</span>
							</div>
							<div class="back">
								<div class="front artist-1">
									{{ $key->flashcard_defination }}
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="row">
			<div class="col-sm-12 text-center">
				<h5 style="text-align: left;">Total Flashcards</h5>
				<hr>
				<div class="flash_main">
					<?php $i = 1; ?>
					@foreach($flashcards as $key)
					    <a href="#"><?php echo $i; $i++; ?><div class="row"><div class="col-3">{{ $key->flashcard_terms }} </div><div class="col-9"> {{ $key->flashcard_defination }}</div></div></a>
					@endforeach
				</div>
				<button type="button" class="btn btn-rounded btn-info my-4" data-toggle="modal" data-target="#addflashcardmodal">Create Flashcard</button>
			</div>
		</div>
		<div class="loader" style="display: none;" >
			<span class="spinner-border spinner-border-sm" role="status"></span>
		</div>
		<div class="modal fade Create_new_set_popup " id="addflashcardmodal" role="dialog">
			<div class="modal-dialog modal-md modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Create Flashcard</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body pb-0">
						<form autocomplete="off" id="addflashcardform" method="post">
							@csrf
						<div class="form-group">
							<label>Flashcard Term</label>
                            <input type="hidden" name="deckid" value="{{$deckid}}">
							<input type="text" name="flashcardname" class="form-control">
						</div>
						<div class="form-group">
							<label>Flashcard Description</label>
							<input type="text" name="flashcarddesc" class="form-control" >
						</div>
					</div>
					<div class="modal-footer border-0 mb-2">
						<button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Create Flashcard</button>
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

		


		$('.flip-container .flipper').click(function() {
			$(this).closest('.flip-container').toggleClass('hover');
			$(this).css('transform, rotateY(180deg)');
		});

 
		$("#owl-demo").owlCarousel({

	      navigation : true,

	      slideSpeed : 300,
	      paginationSpeed : 400,

	      items : 1, 
	      itemsDesktop : false,
	      itemsDesktopSmall : false,
	      itemsTablet: false,
	      itemsMobile : false

  		});
 


		$("#addflashcardform").validate({
            rules: {
                "flashcardname": {required: true},
                "flashcarddesc": {required: true},
            },
            messages: {
                "flashcardname": {required: "Please enter name for the set."},
                "flashcarddesc": {required: "Please enter description for the set."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addflashcardform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
                    url:"/flashcard/createflashcard",
                    success: function(data)
                    {
                        if(data.success == "0"){
                        	alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addflashcardmodal").modal("hide");
                            $('#addflashcardform').each(function(){ this.reset(); });
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
