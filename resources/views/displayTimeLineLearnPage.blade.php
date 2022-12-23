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
	.rightAnswer{
		background-color : rgba(40, 167, 69, 0.5);
		border : 2px solid rgb(40, 167, 69);
	}
	.wrongAnswer{
		background-color : rgba(220, 53, 69 ,0.5);
		border : 2px solid rgb(220, 53, 69, 0.5);
	}

div#rightAnswer {
    /* margin-bottom: 20px; */
    height: 90px;
    width: 100%;
    padding-left: 8px;
    border-radius: 7px;
    align-items: center;
    display: flex;
}

.options {
	height: 38px;
    width: 48px;
    background-color: #C0D0DF;
    appearance: unset;
    border-radius: 50%;
    position: relative;
    margin-right: 13px;
}
.radioCSS {
    /* border: 1px solid black; */
    border-radius: 10px;
    padding: 15px 5px 10px 10px;
    margin-bottom: 15px;
    cursor: pointer;
    width: 100%;
    display: flex;
    align-items: center;
	color: #0A0804;
}
.radioCSS label:last-child {
    margin-bottom: 0;
    overflow-y: scroll;
    height: 55px;
    word-break: break-all;
    width: 100%;
	display: flex;
    align-items: center;
	padding-top: 10px;
}
.radioCSS label:first-child{
	position: absolute;
    margin-bottom: 0;
    left: 40px;
    top: 32%;
    z-index: 1;
}
.options_2 {
    background-color: #DDD2C7;
}
.options_3 {
    background-color:#C9C3D4;
}
.options_4 {
    background-color:#CED4C3;
}
div#wrongAnswerText {
    color: #dc5865;
}
div#rightAnswerText {
    color: #28a745;
}
</style>

<div class="page-wrapper">
	<div class="content container-fluid">

		<input type="hidden" class="deckId" value="{{ $id }}" name="">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title"></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="/home">Home</a></li>
						<li class="breadcrumb-item active">Learn</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2 flashType">
				<div class="row"><span>New</span> <span class="newFlashCards"></span></div>
				<div class="row"><span>Familiar</span> <span class="familiarFlashCards"></span></div>
				<div class="row"><span>Mastered</span> <span class="masteredFlashCards"></span></div>
			</div>
			<div class="col-1">
				<div class="vl" ></div>
			</div>
			<div class="col-9">
				
				<div class="message" style="display: none;"></div>



				<div class="startButton"><button type="button" id="startButton" class="btn btn-primary">START TEST</button></div>

				<div class="startFillButton" style="display: none;"><button type="button" id="startFillButton" class="btn btn-primary">START BLANK TEST</button></div>
				

				<div class="mainContent" style="display: none;">
					<div class="term"><span>Term</span><span class="flashTerm"></span></div>
					
					<div id="rightAnswerText"  style="display: none;">This is the Rignt answer.</div>
					<div id="rightAnswer"></div>
					<div id="wrongAnswerText"  style="display: none;" >Sorry, That Doesn't Look right.</div>
					<div class="flashDescription"></div>
				</div>

				
				

				<div class="newNext" style="display: none;">
				<!-- <button type="button" id="newNext" class="btn btn-primary">Skip Question</button> -->
			</div>
				<div class="newFamilyNext" style="display: none;position: absolute;left: 38em;">
					<button type="button" id="newFamilyNext" class="btn btn-primary">Skip Question</button>
					<button type="button" id="OverRide" class="btn btn-success"  style="display: none;">Override</button>
				</div>
				
				<div class="familiarNext" style="display: none;"><button type="button" id="familiarNext" class="btn btn-primary">Submit</button></div>
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

<script type="text/javascript">

	var flashArray;

	$(document).ready(function(){
		var locked = false;


		var newNextI = 0;
		var arrayAllLength = 0;
		var familiarNextI = 0;
		var checkNewArray = [];
		var checkFamiliarArray = [];
		var allFamFlashCards = [];
		var deckId = $(".deckId").val();

		var newArray = <?php print_r(json_encode($finalNewCards)); ?>;
		$(".newFlashCards").html(newArray.length);
		flashArray = <?php print_r(json_encode($familiarTimeLineCards)); ?>;
		$(".familiarFlashCards").html(flashArray.length);
		var allArray = <?php print_r(json_encode($allTimeLineCards)); ?>;
		var MastereLength = (allArray.length) - (flashArray.length) - (newArray.length);
		$(".masteredFlashCards").html(MastereLength);

		function shuffle(array) {
  			let currentIndex = array.length,  randomIndex;
			while (currentIndex != 0) {
		    	randomIndex = Math.floor(Math.random() * currentIndex);
    			currentIndex--;

				[array[currentIndex], array[randomIndex]] = [
      				array[randomIndex], array[currentIndex]];
  				}
  			return array;
		}


		function arrayRemove(arr, value) {

			return arr.filter(function(geeks){
				return geeks['id'] != value;
			});

		}

		$(document).keypress(".options",function(event) {
			// $(document).off('keypress');
			if( locked ){
				return; 
			}

			// lock keyboard input
			locked = true; 
            if (event.keyCode === 13) {
                $("#newNext").click();
            }
            var i = 0;
            if(event.keyCode == 49){
            	var j = 1;
            }
            if(event.keyCode == 50){
            	var j = 2;
            }
            if(event.keyCode == 51){
            	var j = 3;
            }
            if(event.keyCode == 52){
            	var j = 4;
            }
            $(".options").each(function(index,value){
            	i = i + 1;
            	if(i == j){
            		$(this).attr("checked","checked");
            		$(this).change();
            	}
            })
        });

		var newArray = shuffle(newArray);

		const numsPerGroup = Math.ceil(newArray.length / 7);
		const allNewFlashCards = new Array(numsPerGroup)
  		.fill('')
		.map((_, i) => newArray.slice(i * 7, (i + 1) * 7));



		$(document).on("click",'#startButton',function(){

			if(newArray.length > 0){
				$(".mainContent").css('display','flex');
				$(".startButton").css('display','none');
				$(".message").css('display','none');
				$(".newNext").css('display','block');

				checkNewArray = allNewFlashCards[arrayAllLength];
				console.log(checkNewArray);

				var rArray = <?php echo json_encode($allTimeLineCards); ?>;
				rArray = arrayRemove(rArray,checkNewArray[0]['id']);
				rArray = shuffle(rArray);

				var randomArray = rArray.slice(0, 3);

				randomArray.push(checkNewArray[0]);
				var finalArray = shuffle(randomArray);


				var option = '';
				option += '<div class="row">';

				for(let i = 0; i < 4; i++){
					if(finalArray[i]){
						option += "<div class='col-6'><div class='radioCSS'><label>"+(i+1)+"</label><input type='radio' name='options' class='options  options_"+ (i+1) +"' id='"+ finalArray[i]['id'] +"' > <label for='"+ finalArray[i]['id'] +"' >"+ finalArray[i]['description'] +"</label></div></div> ";
					}
				}

				option += '</div>';

				$(".flashTerm").html(checkNewArray[0]['dateTime']);
				$(".flashTerm").attr('data-value',checkNewArray[0]['id']);
				$(".flashDescription").html(option);
			}
			else if(flashArray.length > 0){
				$(".mainContent").css('display','flex');
				$(".startButton").css('display','none');
				$(".flashTerm").html('');
				$(".flashDescription").html('');
				$(".newNext").css('display','none');
				$(".newFamilyNext").css('display','block');
				famFlashInit(flashArray);
			}
			else{
				swal({
					title: "Completed!!", 
					text: "You have already learnt this TimeLine", 
					type: "success",
					confirmButtonText: "ok",
				})
				setTimeout(function(){
					window.location.href = "/timeLineDetail/"+deckId;
				},1000);
			}
			

		})


		$(document).on("change","input[type=radio][name=options]",function() {
			var checkFlashTerm = $('input[name=options]:checked').attr('id');
			var checkFlashDes = $(".flashTerm").attr('data-value');
			if(checkFlashTerm == checkFlashDes){
				$(this).parent().addClass("rightAnswer");
				$(this).css("background-color",'#4EB9AC');
				$(this).prev('label').html('<i class="fa fa-check text-center text-light" style="position: absolute;right: -7px;top: 4px;"></i>');


				flashArray.push(checkNewArray[0]);

				$.ajax({
					url: '/saveTimeLineResult?id='+checkFlashTerm+'&type=familiar&deckId='+deckId,
					type: 'get',
					dataType: 'json',
					data: {id: checkFlashTerm, type: "familiar"},
					success: function(data){
						console.log("done");
					}
				})

				checkNewArray = arrayRemove(checkNewArray,checkFlashTerm);
				NI = $(".newFlashCards").html();
				$(".newFlashCards").html(NI - 1);
				FI = parseInt($(".familiarFlashCards").html(), 10);
				$(".familiarFlashCards").html(FI + 1);
			}
			else{
				$(this).parent().addClass("wrongAnswer");
				$(this).css("background-color",'#DD6B6B');
				$(this).prev('label').html('<i class="fa fa-times text-center text-light" style="position: absolute;right: -5px;top: 4px;"></i>');

				$(".options").each(function(index,value){
					if($(this).attr('id') == checkFlashDes){
						$(this).parent().addClass("rightAnswer");
						$(this).css("background-color",'#4EB9AC');
						$(this).prev('label').html('<i class="fa fa-check text-center text-light" style="position: absolute;right: -7px;top: 4px;"></i>');

					}
				})
			}
			setTimeout(function(){ 	nextNewQuestion(flashArray);locked = false; },2000);
			// console.log('here');
			
			// $(document).on('keypress');
			
		});


		function nextNewQuestion(flashArray){


			if(checkNewArray.length > 0){

				var rArray = <?php echo json_encode($allTimeLineCards); ?>;
				rArray = arrayRemove(rArray,checkNewArray[0]['id']);
				rArray = shuffle(rArray);

				var randomArray = rArray.slice(0, 3);

				randomArray.push(checkNewArray[0]);
				var finalArray = shuffle(randomArray);

				var option = '';
				option += '<div class="row">';

				for(let i = 0; i < 4; i++){
					if(finalArray[i]){
						option += "<div class='col-6'><div class='radioCSS'><label>"+(i+1)+"</label><input type='radio' name='options' class='options' id='"+ finalArray[i]['id'] +"' > <label for='"+ finalArray[i]['id'] +"' >"+ finalArray[i]['description'] +"</label></div></div> ";
					}
				}

				option += '</div>';


				$(".flashTerm").html(checkNewArray[0]['dateTime']);
				$(".flashTerm").attr('data-value',checkNewArray[0]['id']);
				$(".flashDescription").html(option);
			}
			if(checkNewArray.length == 0){
				swal({
					title: "Completed!!", 
					text: "Ready for Familiar Test?", 
					type: "success",
					confirmButtonText: "Yes!!",
					confirmButtonColor: "#FFC107",
					showCancelButton: true,
					cancelButtonText: "NO",
					cancelButtonColor: "#DC3545",
				}).then((result) => {
					if (result.value) {
						$(".flashTerm").html('');
						$(".flashDescription").html('');
						$(".newNext").css('display','none');
						$(".newFamilyNext").css('display','block');
						famFlashInit(flashArray);
						locked = false;

					}
					})
			}
		}


		function famFlashInit(flashArray) {
			var flashArray = shuffle(flashArray);

			var numsFamGroup = Math.ceil(flashArray.length / 7);

			allFamFlashCards = new Array(numsFamGroup)
			.fill('')
			.map((_, i) => flashArray.slice(i * 7, (i + 1) * 7));

			checkFamiliarArray = allFamFlashCards[0];

			$(".familiarNext").css('display','block');
			$("#familiarNext").attr('disabled','disabled');

			$(".flashTerm").html(checkFamiliarArray[0]['dateTime']);
			$(".flashTerm").attr('data-value',checkFamiliarArray[0]['description']);
			$(".flashTerm").attr('data-id',checkFamiliarArray[0]['id']);
			$(".flashDescription").html("<input type='text' class='form-control checkDescription' placeholder='Type your answer here...' >");
			$('#familiarNext').prop("disabled", false);
		}

		$(document).on("click","#newNext",function(){
			checkNewArray.push(checkNewArray.shift());
			nextNewQuestion();
			locked = false;
		})


		$(document).on("click","#familiarNext",function(){

			var btn = $(this);
			btn.prop('disabled', true);
			// setTimeout(function(){
			// 	btn.prop('disabled', false);
			// }, 3*1000);


			var checkFlashFamiliarId = $(".flashTerm").attr('data-value');
			var checkFamiliarId = $(".flashTerm").attr('data-id');
			var checkFlashFamiliarDes = $(".checkDescription").val();

			if(checkFlashFamiliarId == checkFlashFamiliarDes){

				$('.checkDescription').addClass("rightAnswer");
				

				flashArray.shift();

				$.ajax({
					url: '/saveTimeLineResult?id='+checkFamiliarId+'&type=mastered&deckId='+deckId,
					type: 'get',
					dataType: 'json',
					success: function(data){
						console.log("done");
					}
				})


				checkFamiliarArray = arrayRemove(checkFamiliarArray,checkFamiliarId);
				FI = parseInt($(".familiarFlashCards").html(), 10);
				$(".familiarFlashCards").html(FI - 1);
				MI = parseInt($(".masteredFlashCards").html(), 10);
				$(".masteredFlashCards").html(MI + 1);

				setTimeout(function(){ nextFamiliarQuestion(allFamFlashCards);locked = false;$('#newFamilyNext').attr('disabled',false); },2000)
			}
			else{
				$('.checkDescription').addClass("wrongAnswer");
				$("#rightAnswer").css('display','flex');
				$('#rightAnswer').html(checkFlashFamiliarId);
				$('#rightAnswer').addClass("rightAnswer");
				$('#wrongAnswerText').css('display','flex');
				$('#rightAnswerText').css('display','flex');
				$('#newFamilyNext').css('display','none');
				$('#OverRide').css('display','flex');
			}

			// setTimeout(function(){ nextFamiliarQuestion(allFamFlashCards);locked = false; },2000)

		})

		$(document).on("click","#newFamilyNext",function(){

			var checkFlashFamiliarId = $(".flashTerm").attr('data-value');
			var checkFamiliarId = $(".flashTerm").attr('data-id');
			var checkFlashFamiliarDes = $(".checkDescription").val();

			$('#rightAnswer').html(checkFlashFamiliarId);
			$('#rightAnswer').addClass("rightAnswer");
			$("#rightAnswer").css('display','flex');
			$('#rightAnswerText').css('display','flex');
			$('.checkDescription').attr('disabled','disabled');
			$('#newFamilyNext').attr('disabled','disabled');
			$('#familiarNext').attr('disabled','disabled');
	
				// console.log('sadasds');
				checkFamiliarArray.push(checkFamiliarArray.shift());
				setTimeout(function(){ nextFamiliarQuestion(allFamFlashCards);locked = false;$('#newFamilyNext').attr('disabled',false); },2000)

		})
		
		$(document).on("click","#OverRide",function(){
			// nextFamiliarQuestion(allFamFlashCards);
			$('.checkDescription').removeClass("wrongAnswer");
			$('#newFamilyNext').css('display','flex');
			$('#newFamilyNext').attr('disabled',false);
			$('#familiarNext').attr('disabled',false);
			$('#OverRide').css('display','none');
			$("#rightAnswer").css('display','none');
			$('#rightAnswerText').css('display','none');
			$('#wrongAnswerText').css('display','none');

			locked = false;
		});

		function nextFamiliarQuestion(allFamFlashCards){
			
			$("#rightAnswer").css('display','none');
			$('#familiarNext').attr('disabled',false);
			$('#rightAnswerText').css('display','none');
			$('#wrongAnswerText').css('display','none');

			if(checkFamiliarArray.length > 0){

				$(".flashTerm").html(checkFamiliarArray[0]['dateTime']);
				$(".flashTerm").attr('data-value',checkFamiliarArray[0]['description']);
				$(".flashTerm").attr('data-id',checkFamiliarArray[0]['id']);
				$(".flashDescription").html("<input type='text' class='form-control checkDescription' placeholder='Type your answer here...' >");
				$(".checkDescription").focus();
			}
			if(checkFamiliarArray.length == 0){
				arrayAllLength += 1;
				$(".familiarNext").css('display','none');

				if(allNewFlashCards[arrayAllLength]){
					swal({
						title: "Completed!!", 
						text: "Ready for next Group?", 
						type: "success",
						confirmButtonText: "Yes!!",
						confirmButtonColor: "#FFC107",
						showCancelButton: true,
						cancelButtonText: "NO",
						cancelButtonColor: "#DC3545",
					}).then((result) => {
						if (result.value) {
							$(".message").css('display','none');
							$(".mainContent").css('display','none');
							$(".startButton").css('display','flex');
							$(".newFamilyNext").css('display','none');
							
						}
					})
				}
				else if(allFamFlashCards[arrayAllLength]){
					famFlashInit(flashArray);
				}
				else{
					$('.message').css('display','block');

					swal({
						title: "Completed!!", 
						text: "Test Completed successfully...", 
						type: "success",
						confirmButtonText: "ok",
					})
					setTimeout(function(){
						window.location.href = "/timeLineDetail/"+deckId;
					},1000);
				}

			}
		}

	})
	
</script>
@endsection
