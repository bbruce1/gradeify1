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
			<div class="row">
				<div class="flip_btn1_left">
					<a href="/timeLineLearn/{{ $timeLineId }}"><button type="button" class="btn btn-primary btnwidth">Learn</button></a>
					<a href="/timelineTest/{{ $timeLineId }}"><button type="button" class="btn btn-primary btnwidth">Test</button></a>
					<button type="button" class="btn btn-primary btnwidth">Flashcard</button>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

<hr>
<!-- timeline_design -->
<div class="row">
	<div class="wizard-progress">
		@foreach($timeLineDetails as $timeLineDetail)
		<div class="step in-progress">
			<div class="name"><span>{{ $timeLineDetail->description }}</span></div>
			<div class="node"></div>
			<span class="date">{{ $timeLineDetail->dateTime }}</span>
		</div>
		@endforeach
	</div>
</div>

	<!-- <div class="row">
		<div class="filterData">
			@foreach($timeLineDetails as $timeLineDetail)
			<h6>{{ $timeLineDetail->dateTime }}</h6>
			<p>{{ $timeLineDetail->description }}</p>
			@endforeach
		</div>
	</div> -->

		<div class="row">
			<div  class="col-12 rangeSliderDiv"><input type="text" id="startDate" name="startDate" value="{{ $startDate }}" readonly><div id="slider-range"></div><input type="text" id="endDate" name="endDate" value="{{ $endDate }}" readonly></div>
			
			<input type="hidden" class="timeLineId" value="{{ $timeLine->id }}">
			<input type="hidden" value="{{ $endDate }}" id="endDate">
			<input type="hidden" value="{{ $startDate }}" id="startDate">
		</div>


<hr>


		<div class="row">
			<div class="col-sm-12 text-center">
				<h5 style="text-align: left;">All Timeline</h5>
				<hr>
				<div class="flash_main">
					<?php $i = 1; ?>
					@foreach($timeLineDetails as $timeLineDetail)
					    <a href="#"><?php echo $i; $i++; ?><div class="row"><div class="col-3">{{ $timeLineDetail->dateTime }} </div><div class="col-9"> {{ $timeLineDetail->description }}</div></div></a>
					@endforeach
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


<script type="text/javascript">
	$(document).ready(function(){

		setTimeout(function () {
			$(function () {
				$("#slider-range").slider({
					range: true,
					min: new Date($("#startDate").val()).getTime() / 1000,
					max: new Date($("#endDate").val()).getTime() / 1000,
					step: 86400,
					values: [new Date($("#startDate").val()).getTime() / 1000, new Date($("#endDate").val()).getTime() / 1000],
					slide: function (event, ui) {
						var startDate = new Date(ui.values[0] * 1000).toDateString();
						var endDate = new Date(ui.values[1] * 1000).toDateString();
						// $(".left_label").css('display','none');
						// $(".right_label").css('display','none');
						var startInputDate = (new Date(ui.values[0]* 1000)).getFullYear()+'-'+(((new Date(ui.values[0]* 1000)).getMonth())+1)+'-'+(new Date(ui.values[0]* 1000)).getDate();
						var endInputDate = (new Date(ui.values[1]* 1000)).getFullYear()+'-'+(((new Date(ui.values[1]* 1000)).getMonth())+1)+'-'+(new Date(ui.values[1]* 1000)).getDate();
						$("#startDate").val(startInputDate);
						$("#endDate").val(endInputDate);
						// $(".ui-slider-handle").html(new Date(ui.values[0] * 1000));
						// $(".ui-slider-range").prepend('<div class="left_label" style="margin-left: 0px;margin-top: 5%;"><label>'+(new Date(ui.values[0]* 1000)).getDate()+'-'+(((new Date(ui.values[0]* 1000)).getMonth())+1)+'-'+(new Date(ui.values[0]* 1000)).getFullYear()+'</label></div>');
						// $(".ui-slider-range").append('<div class="left_label" style="margin-left: 100px;"><label>'+(new Date(ui.values[1]* 1000)).getDate()+'-'+(((new Date(ui.values[1]* 1000)).getMonth())+1)+'-'+(new Date(ui.values[1]* 1000)).getFullYear()+'</label></div>');
						
						var timeLineId = $(".timeLineId").val();
						// $(".wizard-progress").html('');
						data = {startDate: startDate, endDate: endDate, timeLineId: timeLineId};
						$.ajax({
							dataType:"json",
							type:"get",
							contentType: false,
							processData: false,
							url:"/getDataTimeLine?startDate="+startDate+"&endDate="+endDate+"&timeLineId="+timeLineId,
							success: function(data)
							{
								var finalData = "";
								$.each( data['data'], function( key, value ) {
									finalData += '<div class="step in-progress"><div class="name"><span>'+ value['description'] +'</span></div><div class="node"></div><span class="date">'+ value['dateTime'] +'</span></div>';
								});
								$(".wizard-progress").html(finalData);
							}
						})
						$("#amount").val((new Date(ui.values[0] * 1000).toDateString()) + " - " + (new Date(ui.values[1] * 1000)).toDateString());
					}
				});
				$("#amount").val((new Date($("#slider-range").slider("values", 0) * 1000).toDateString()) +
					" - " + (new Date($("#slider-range").slider("values", 1) * 1000)).toDateString());
			});
		},100);
		

		
	});
</script>
@endsection
