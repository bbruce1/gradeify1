<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout.partials.head')
</head>

<body id="bodyClass">
	<script type="text/javascript">
		if(localStorage.content == 'darkMode'){
			var element = document.getElementById("bodyClass");
			element.classList.add("dark-theme");
		}
		else{
			var element = document.getElementById("bodyClass");
			element.classList.remove("dark-theme");
		}
	</script>
	@include('layout.partials.header')
	@include('layout.partials.nav')
	@yield('content')
	@include('layout.partials.footer')
	@include('layout.partials.footer-scripts')
	@yield('script')
</body>

<script type="text/javascript">

		if(localStorage.content == 'darkMode'){
			$(".mode").addClass("lightMode");
			$(".mode").removeClass("darkMode");
			$(".mode > span").html("Light Mode");
			$(".mode > span").css("color","white");
		}
		else{
			$(".mode").removeClass("lightMode");
			$(".mode").addClass("darkMode");
			$(".mode > span").html("Dark Mode");
			$(".mode > span").css("color","black");
		}
	$(document).ready(function(){


		$(".sliderChange").on("click",function(){
			var className = $(".mode").attr("class");
			if(className.indexOf('darkMode') != -1){
				$("body").addClass("dark-theme");
				$(".mode > span").html("Light Mode");
				$(".mode > span").css("color","white");
				$(".mode").addClass("lightMode");
				$(".mode").removeClass("darkMode");
				localStorage.content = 'darkMode';
			}
			else{
				$("body").removeClass("dark-theme");
				$(".mode > span").html("Dark Mode");
				$(".mode > span").css("color","black");
				$(".mode").addClass("darkMode");
				$(".mode").removeClass("lightMode");
				localStorage.content = 'lightMode';
			}
		})
	})
</script>
</html>
