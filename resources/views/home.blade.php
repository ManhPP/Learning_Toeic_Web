@extends('layouts.master')

@section('title', 'home')
@section("css")
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/home-css.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">
@endsection
@section('navbar')
	@parent
@endsection
	

@section('content')
	<!-- cover -->
	<div id="cover" class="container-fluid">
		<div id="inner-cover">
			<div class="center">
				<div class="container-fluid bottom" ><p id="text-cover">FREE TO LEARNING ENGLISH</p></div>
			</div>
			<div class="split"></div>
			<div class="center content-cover">
				<p class="text-content">WITH ONE HOUR PER DAY,  OUR WEBSITE WILL HELP YOU IMPROVE YOUR LEVEL TOEIC</p>
				@if(isset($userLogin))

				@else
					<button id="btn-register" class="register wow bounce no-outline" data-wow-duration="1.5s">REGISTER NOW</button>
					<b><i>OR</i></b>
					<button id="btn-login" class="register wow bounce no-outline" data-wow-duration="1.5s">LOGIN NOW</button>
				@endif

			</div>
		</div>
	</div>


	<!-- content -->
	<div class="content-services">
		<div class="container-fluid" style="margin-top: 4em; margin-bottom: 5em">
			<p class="wow fadeInLeft" data-wow-delay="1s" 
			style="text-align: center;font-size: 3.2em; user-select: none">OUR SERVICES</p>
		</div>
		<div class="row">
			<div class="col-9 row" style="margin: 0 auto">
				<div class="our-service col-12 col-lg-4 border-services right-border" id="prac-read" data-path="{{ Route("readingpartcontroller.index") }}">
					<div class="tittle">
						PRACTICE READING
					</div>
					<div class="detail">
						Start practice reading with our extensive reading system
					</div>
				</div>
				<div class="our-service col-12 col-lg-4 border-services  right-border" id="prac-lis" data-path="{{ Route("listeningpartcontroller.index") }}">
					<div class="tittle">
						PRACTICE LISTENING
					</div>
					<div class="detail">
						Start listening with our extensive listening
					</div>
				</div>
				<div class="our-service col-12 col-lg-4 border-services" data-path="{{ Route("testcontroller.index") }}">
					<div class="tittle">
						TOEIC TEST
					</div>
					<div class="detail">
						Test your toeic level with the internaltional standard test
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('footer')
	@parent
	<script>
		$(document).on("click", "#btn-register", function(){
			window.location.href = "{{Route("accountcontroller.registerindex")}}";
		});
		$(document).on("click", "#btn-login", function(){
			window.location.href = "{{Route("mylogincontroller.login")}}"
		});
	</script>
@endsection

@section("js")
	<script type="text/javascript" src="{{ URL::asset("js/wow.min.js") }}"></script>
	<script type="text/javascript" src="{{ URL::asset("js/home.js") }}"></script>
	<script>
		new WOW().init();
	</script>
@endsection
