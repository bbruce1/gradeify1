@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->

<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<style type="text/css">
	div#slider-range {
		width: 40%;
		/*margin-left: 17em;*/
	}
	.rangeSliderDiv{
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
	}
	#startDate, #endDate {
		width: 12%;
		text-align: center;
		border: 1px solid #18AEFA;
		background-color: #18AEFA;
		border-radius: 10px;
		color: #fff;
		font-size: 15px;
		font-weight: 700;
	}
	.ui-widget-content {
		border: 1px solid #FFBC53 !important;
	}
	.ui-widget-header {
		color: #FFBC53 !important;
		background: #FFBC53 url(images/ui-bg_highlight-soft_75_cccccc_1x100.png) 50% 50% repeat-x !important;
	}
	.ui-state-default, .ui-widget-content .ui-state-default, .ui-state-focus, .ui-widget-content .ui-state-focus {
		border: 1px solid #18AEFA !important;
    	background: #18AEFA url(images/ui-bg_glass_75_dadada_1x400.png) 50% 50% repeat-x !important;
    	color: #18AEFA !important;
	}

	/*timeline_design_css*/

	/*body {
	 background-color: black;
	 font-family: sans-serif;
}*/
 .wizard-progress {
	 display: table;
	 width: 100%;
	 table-layout: fixed;
	 margin: 5em 0;
}
 .wizard-progress .step {
	 display: table-cell;
	 text-align: center;
	 vertical-align: top;
	 overflow: visible;
	 position: relative;
	 font-size: 14px;
	 color: #fff;
	 font-weight: bold;
}
 .wizard-progress .step:not(:last-child):before {
	 content: '';
	 display: block;
	 position: absolute;
	 left: 50%;
	 top: 37px;
	 background-color: #fff;
	 height: 15px;
	 width: 100%;
}
 .wizard-progress .step .node {
	display: inline-block;
    border: 6px solid #fff;
    background-color: #fff;
    border-radius: 18px;
    height: 27px;
    width: 27px;
    position: absolute;
    top: 29px;
    left: 53%;
    margin-left: -18px;
}
 .wizard-progress .step.complete:before {
	 background-color: #07c;
}
 .wizard-progress .step.complete .node {
	 border-color: #07c;
	 background-color: #07c;
}
 .wizard-progress .step.complete .node:before {
	 font-family: FontAwesome;
	 content: "\f00c";
}
 .wizard-progress .step.in-progress:before {
	 background: #07c;
	/* background: -moz-linear-gradient(left, #07c 0%, #fff 100%);
	 background: -webkit-linear-gradient(left, #07c 0%, #fff 100%);
	 background: linear-gradient(to right, #07c 0%, #fff 100%);*/
	 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#07c", endColorstr="#fff",GradientType=1);
	  background-color: #e2e1fe;
    box-shadow: 0 0 7px #e2e1fe;
}
 .wizard-progress .step.in-progress .node {	
	border-color: #6e6bfa;
    background-color: #fff;
    box-shadow: 0 0 7px #6e6bfa;
}	
span.date {
   position: relative;
    top: 5px;
    color: #4a4845;
}
 .name {
  color: #6e6bfa;
    width: 60%;
    height: 65px;
    position: relative;
    border-radius: 5px;
    overflow-y: scroll;
    left: 4em;
    word-break: break-all;
    bottom: 4em;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 0 8px #9a9a9a;
}
.rightAnswer{
		background-color : rgba(40, 167, 69, 0.5);
		border : 2px solid rgb(40, 167, 69);
	}
	.wrongAnswer{
		background-color : rgba(220, 53, 69 ,0.5);
		border : 2px solid rgb(220, 53, 69);
	}
	.answerDiv{
		background-color: white;
		padding-left: 2px;
		display: flex;
		height: 40px;
		flex-direction: column;
		border: 1px solid white;
		border-radius: 3px;
		align-items: flex-start;
	}
	.dynamicDate{
		width: 50%;
		height: 75px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		border-radius: 5px;
	}
	.answerDateDiv{
		background-color: white;
		padding: 5px 0px;
		width: 85%;
		border: 1px solid white;
		border-radius: 4px;
		display: flex;
		flex-direction: column;
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
						<li class="breadcrumb-item active">Timeline</li>
					</ul>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<h5 class="page-title">{{ $timeLine->title }}</h5>
					<p>{{ $timeLine->description }}</p>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

<hr>
<!-- timeline_design -->
<div class="row giveDescriptionTest">
	<div class="wizard-progress">
		@foreach($timeLineDetails as $timeLineDetail)
		<div class="step in-progress">
			<div class="name"><span><input type="text" name="descriptionTest" id="{{$timeLineDetail->id}}" class="form-control descriptionTest" placeholder="Enter Event" ></span></div>
			<div class="node"></div>
			<span class="date">{{ $timeLineDetail->dateTime }}</span>
		</div>
		@endforeach
	</div>
</div>

<div class="row giveDateTest" style="display: none;">

</div>


<div class="row desTest" style="margin-bottom: 10px;margin-left: 40px;">
	<button type="button" id="desTest" class="btn btn-primary">Next</button>
</div>

<div class="row dateTest" style="margin-bottom: 10px;margin-left: 40px;display: none;">
	<button type="button" id="dateTest" class="btn btn-primary">Next</button>
</div>

<div class="row nextPhase" style="margin-bottom: 10px;display: none;margin-left: 40px;">
	<button type="button" id="nextPhase" class="btn btn-primary">Next Level</button>
</div>

<div class="row retake" style="margin-bottom: 10px;display: none;margin-left: 40px;">
	<button type="button" id="retake" class="btn btn-primary">Retake</button>
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

<script>
	$("#desTest").on("click",function(){

		var desAnswerArray = [];

		$('input[name=descriptionTest]').each(function(){
			var id = $(this).attr('id');
			var answer = $(this).val();
			var item = {};
			item[id] = answer;
			desAnswerArray.push(item);
		})

		$.ajax({
			url: '/checkTestDesResult',
			type: 'GET',
			dataType: 'json',
			data: {desAnswerArray: desAnswerArray},
			success : function(response){
				$.each(response.data, function(index,value){
					var count = 0;
					var notFound = 0;
					$('input[name=descriptionTest]').each(function(){
						if($(this).attr('id') == index){
							$(this).parent().parent().addClass('wrongAnswer');
							var wrongValue = $(this).val();
							var append = '';
							append += '<span class="answerDiv"><span style="color:#DC3545">'+wrongValue+'</span><span style="color:#28A745;" >'+value+'</span>';
							$(this).parent().html(append);
						}
						else{
							$(this).parent().parent().addClass('rightAnswer');
						}
					})
				})
			}
		})

		$(".nextPhase").css("display","block");
		$(".desTest").css("display","none");
	})


	$("#nextPhase").on("click",function(){
		var nextTest = <?php print_r(json_encode($timeLineDetails)); ?>;
		$(".giveDescriptionTest").css('display','none');
		$(".nextPhase").css("display","none");
		$(".giveDateTest").css('display','block');
		$(".dateTest").css('display','block');
		var html = '';
		html += '<div class="wizard-progress">';
		for(let i = 0; i < nextTest.length; i++){
			html += '<div class="step in-progress"><div class="name"><span>'+ nextTest[i].description +'</span></div><div class="node"></div><span class="date" style="left: 5em;"><div><input type="text" name="dateTest" id="'+ nextTest[i].id +'" class="form-control dateTest" style="width:50%;" placeholder="YYYY-MM-DD" ></div></span></div>';
		}
		html += '</div>';

		$(".giveDateTest").html(html);
	})

	$("#dateTest").on("click",function(){
		var dateAnswerArray = [];

		$('input[name=dateTest]').each(function(){
			var id = $(this).attr('id');
			var answer = $(this).val();
			var item = {};
			item[id] = answer;
			dateAnswerArray.push(item);
		})


		$.ajax({
			url: '/checkTestDateResult',
			type: 'GET',
			dataType: 'json',
			data: {dateAnswerArray: dateAnswerArray},
			success : function(response){
				console.log(response.data);
				$.each(response.data, function(index,value){
					var count = 0;
					var notFound = 0;
					$('input[name=dateTest]').each(function(){
						if($(this).attr('id') == index){
							$(this).parent().addClass('wrongAnswer');
							$(this).parent().addClass('dynamicDate');
							var wrongValue = $(this).val();
							var append = '';
							append += '<span class="answerDateDiv"><span style="color:#DC3545">'+wrongValue+'</span><span style="color:#28A745;" >'+value+'</span>';
							$(this).parent().html(append);
						}
						else{
							$(this).parent().addClass('rightAnswer');
						}
					})
				})
			}
		})
		$(".dateTest").css('display','none');
		$(".retake").css('display','block');

	})

	$("#retake").on('click',function(){
		window.location.reload();
	})

</script>

@endsection
