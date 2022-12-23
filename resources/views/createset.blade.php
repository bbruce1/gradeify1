@extends('layout.mainlayout')
@section('content')		

<!-- Page Wrapper -->
<style>
	#slideshows {
    display: flex;
    width: 100% !important;
}
.plus_button {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    font-size: 41px;
    background-color: #46B8AA;
    color: #fff;
    right: 52px;
    bottom: 34px;
    z-index: 1111;
	box-shadow: rgb(50 50 93 / 40%) 0px 6px 20px -2px, rgb(0 0 0 / 30%) 0px 3px 20px -3px;
}
.bx-controls-direction_1 {
    position: absolute;
    right: 24px;
}
.bx-controls-direction_1 i:first-child {
    margin-right: 21px;
}
.bx-controls-direction_1 i {
    font-size: 18px;
    }
#slideshows > div {
	    min-width:34% !important;
   }
   a.bx-prev {
    margin-right: 5px;
	
}
.bx-controls-direction{
	display:none;
}
.bx-viewport {
    overflow: unset !important;
}
span{
	position: relative;
}

.page-header .breadcrumb .right_content li {
	margin-left: 10px;
}
.page-header .breadcrumb .right_content {
	margin-right: 30px;
}
.page-header .breadcrumb > div {
    display: inline-flex;
}

.page-header .breadcrumb {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    width: 28%;
}
div#slide-counter {
    position: absolute;
    right: 87px;
}
.bx-controls-direction {
    position: absolute;
    top: -23px;
    right: 0;
}
</style>

<style>

 .owl-theme .owl-nav [class*=owl-]:hover {
	 background: transparent !important;
	 color: black !important;
}
 .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot {
	 outline: none;
}
 #owl-example-article .item img {
	 display: block;
	 width: 100%;
	 height: auto;
}
 .owl-next span, .owl-prev span {
	 font-size: 30px !important;
	 cursor: pointer;
	 outline: none !important;
}
 .owl-next span:focus, .owl-prev span:focus {
	 outline: none !important;
}
 .owl-nav {
	 position: absolute;
	 top: -24.3em;
     right: 108px;
}
 .owl-item {
	 background-color: transparent;
	 color: white;
	 text-align: center;
}
 .owl-prev {
	 float: left;
	 font-size: 20px;
	 text-transform: uppercase;
	 padding: 20px;
	 margin-right: 20px;
	 margin-top: 0;
}
 .owl-next {
	 float: right;
	 font-size: 20px;
	 text-transform: uppercase;
	 padding: 20px;
}
 .owl-dots {
	counter-reset: slides-num;
    position: absolute;
	top: -54px;
    right: 70px;
}
.owl-prev i, .owl-next i{
	font-size: 1rem;
}
button.owl-prev i, button.owl-next i {
    position: relative;
    right: -94px;
    top: 21em;
    color: #6c757d;
    cursor: pointer;
}
 .owl-dots:after {
	 content: counter(slides-num);
	 display: inline-block;
	 font-size: 1rem;
	 font-weight: 700;
	 vertical-align: middle;
}
 .owl-dot {
	 display: inline-block;
	 counter-increment: slides-num;
	/* Increment counter */
	 margin-right: 5px;
}
 .owl-dot span {
	 display: none;
}
 .owl-dot.active:before {
	 content: counter(slides-num) " / ";
	/* Use the same counter to get current item. */
	 display: inline-block;
	 vertical-align: middle;
	 font-size: 1rem;
	 position: absolute;
	 left: -10px;
	 top: 0;
}
 
.bx-pager-item {
       	display: none;
    }
    span#slideshows {
    display: flex;
    width: 100% !important;
}
ul#slideshows span {
    width: 30% !important;
}

button.slick-prev, button.slick-next {
    display: none !important;
} 

.slider__counter {
	position: absolute;
    top: -48px;
    right: 63px;
    z-index: 1;
    font-size: 18px;
    font-weight: 600;
    color: #8c8c8c;
    /* mix-blend-mode: difference; */
    pointer-events: none;
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
						<div class="left_content">
							<li class="breadcrumb-item"><a href="/home">Home</a></li>
							<li class="breadcrumb-item active">Create A study guide</li>
						</div>
						<div class="right_content">						
							<!-- <li class="float-right "> 1 / 2 </li>
							<li class="float-right "> <i class="fa fa-sharp fa-solid fa-angle-left active" id="11" data-value="Another Test"></i> <i class="fa fa-sharp fa-solid fa-angle-right " id="11" data-value="Another Test"></i> </li> -->
						</div>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="page-header">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="set_main owl-carousel">
					@foreach($sets as $key)
					<div>

						<a href="website/{{ $key->id }}"><span>{{ $key->sets_name }}</span><span>{{ $key->sets_description }}</span><div class="set_flex"><img src="/assets/img/userprofiles/{{ $user->profile_image }}" class="setProfileImage" alt=""><div class="set_p"><p>{{ $user->name }}</p><p>{{ $user->role }}</p></div></div></a>
						<i class="fa fa-trash deleteSet" id="{{ $key->id }}" data-value="{{ $key->sets_name }}" ></i>
					</div>

					@endforeach
				</div>
				<button type="button" class="btn btn-rounded btn-info my-4" data-toggle="modal" data-target="#addsetmodal">Create New Study Guide</button>
			</div>
			
					<div class="col-sm-12">
						<h3 class="page-title"></h3>
						<ul class="breadcrumb">
							<div class="left_content">
								<li class="breadcrumb-item"><a href="/home">Home</a></li>
								<li class="breadcrumb-item active">Create A Deck</li>
							</div>
							<div id="slide-counter"></div>
						
							 <div class="bx-controls-direction_1">
							 <i class="fa fa-sharp fa-solid fa-angle-left prevdeck" id="11" data-value="Another Test"></i> 
							 <i class="fa fa-sharp fa-solid fa-angle-right nextdeck" id="11" data-value="Another Test"></i>
							</div>
							
						</ul>
					</div>


			<div class="col-sm-12 text-center">
				<div class="dash-widget">
                    <div class="deck_main slider1"  >
                        @foreach($decks as $key)
						<div class='slider__item'>
                            <a href="/flashcard/{{ $key->id }}"><span>{{ $key->deck_name }}</span><span>{{ $key->description }}</span></a>
							<span><a href="../deleteDeck/{{$key->id}}"><i class="float-right fa fa-trash"></i></a></span>
                         </div>
							@endforeach
                    </div>
                </div>
				<a href="/newDeckFlashPage/0"><button type="button" class="btn btn-rounded btn-info my-4" data-toggle="modal" data-target="">Create Decks</button></a>
			</div>
		</div>
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
									<input type="hidden" name="setid" value="0">
								
									<textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div class="modal-footer border-0 mb-2">
								<button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>

		<div class="plus_button" data-toggle="modal" data-target="#add-some-class"><span>+</span></div>
		
		<div class="loader" style="display: none;" >
			<span class="spinner-border spinner-border-sm" role="status"></span>
		</div>
		<div class="modal dark-mode fade Create_new_set_popup " id="add-some-class" role="dialog">
			<div class="modal-dialog modal-md modal-dialog-centered">
				<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-body pb-0">
					<div class="paragraph--type--card-row">

						<div class="card custom_card" onclick="window.location.href='/newTimelineCreator/0'">
							<div class="card-image"><img src="{{asset('assets/img/1.png')}}" /></div>
							<div class="card-content">  
								<p>Create Flashcards</p>
								<p>These flashcards won't be tied to a note!</p>
							</div>
						</div>

						<div class="card custom_card"  data-toggle="modal" data-target="#addnotesmodal" onClick=" $('#add-some-class .modal-content').css('display','none')">
							<div class="card-image"><img src="{{asset('assets/img/2.png')}}"  /></div>
							<div class="card-content">
								
								<p>Create a note</p>
							   <p>We'll automatically create flashcards from your note</p>
							</div>
						</div>
						<div class="card custom_card card-3-w">
							<div class="card-image"><img src="{{asset('assets/img/3.png')}}"/></div>
							<div class="card-content">
								
								<p>Create a study Guide</p>
								<p>Tip: Right click on your home page to create one quickly.</p>
							</div></div>



						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<div class="modal fade Create_new_set_popup " id="addsetmodal" role="dialog">
			<div class="modal-dialog modal-md modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Create Set</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body pb-0">
						<form autocomplete="off" id="addsetform" method="post">
							@csrf
						<div class="form-group">
							<label">Set Name</label>
							<input type="text" name="setname" class="form-control" >
						</div>
						<div class="form-group">
							<label">Set Description</label>
							<!-- <input type="text" name="setdesc" class="form-control" > -->
							<textarea  name="setdesc" class="form-control" cols="30" rows="10"></textarea>
						</div>
					</div>
					<div class="modal-footer border-0 mb-2">
						<button type="submit" class="btn btn-rounded btn-info my-0 ml-auto mr-auto">Create Set</button>
						</form>
					</div>
				</div>
			</div>
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
                            <input type="hidden" name="setid" value="0">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script>
	$(document).ready(function(){
		$(".owl-carousel").owlCarousel({
		margin: 10,
		loop: true,
		dots: true,
		nav: true,
		items: 2,
		navText : [' <i class="fa fa-sharp fa-solid fa-angle-left active" id="11" data-value="Another Test"></i>',' <i class="fa fa-sharp fa-solid fa-angle-right " id="11" data-value="Another Test"></i> ']

		});
	})
</script>

<script type="text/javascript">
	</script>

<script type="text/javascript">
	var $slider = $('.slider1');

if ($slider.length) { 
  var currentSlide;
  var slidesCount;
  var sliderCounter = document.createElement('div');
  sliderCounter.classList.add('slider__counter');
  
  var updateSliderCounter = function(slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    slidesCount = slick.slideCount;
    $(sliderCounter).text(currentSlide + '/' +slidesCount)

  };


  $slider.on('init', function(event, slick) {
    $slider.append(sliderCounter);
    updateSliderCounter(slick);

  });

  $slider.on('afterChange', function(event, slick, currentSlide) {
    updateSliderCounter(slick, currentSlide);
     });

  $('.slider1').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});

  $slider.slick();
}
</script>
<script>
	
	$(document).on('click', '.prevdeck', function () {
    $("button.slick-prev").click();
});
$(document).on('click', '.nextdeck', function () {
    $("button.slick-next").click();
});
</script>


<script type="text/javascript">
	$(document).ready(function(){


		$(".deleteSet").on("click",function(){
			var delId = $(this).attr('id');
			var setName = $(this).attr('data-value');
			console.log(setName);
			swal({
				title: "Are you sure?", 
				text: "You want to delete '"+setName+"' .", 
				type: "warning",
				confirmButtonText: "Delete",
    			confirmButtonColor: "#DC3545",
    			showCancelButton: true,
				cancelButtonText: "Cancel",
				cancelButtonColor: "#FFC107",
				}).then((result) => {
					if (result.value) {
						$.ajax({
		                    dataType:"json",
		                    type:"get",
		                    data:{delId:delId},
		                    url:"/sets/deleteset",
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
		                        		'Set deleted successfully!',
		                        		'success'
		                        		)
		                            setTimeout(function(){window.location.reload()},1500);
		                        }
		                    }
		                });
					}
			})
		})


		$("#addsetform").validate({
            rules: {
                "setname": {required: true},
                "setdesc": {required: true},
            },
            messages: {
                "setname": {required: "Please enter name for the set."},
                "setdesc": {required: "Please enter description for the set."},
            },
            submitHandler: function(){
                $(".loader").show();
                var form = $('#addsetform')[0];
                var data = new FormData(form);
                $.ajax({
                    dataType:"json",
                    type:"post",
                    contentType: false,
                    processData: false,
                    data:data,
					
                    url:"/sets/createset",
                    success: function(data)
                    {
                        if(data.success == "0"){
                        	alert(data.error);
                            $(".loader").hide();
                        }
                        else if(data.success == "1")
                        {
                            $(".loader").hide();
                            $("#addsetmodal").modal("hide");
                            $('#addsetform').each(function(){ this.reset(); });
                            alert(data.response);
                            window.location.reload();
                        }
                    }
                });
            }
        });

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
</script>
@endsection
