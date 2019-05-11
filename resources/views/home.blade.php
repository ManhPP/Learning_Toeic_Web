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

				<button class="register wow bounce no-outline" data-wow-duration="1.5s">REGISTER NOW</button>
				<b><i>OR</i></b>
				<button class="register wow bounce no-outline" data-wow-duration="1.5s">LOGIN NOW</button>			
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
						Start listening with our extenxive listening
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

{{--	--}}
{{--	<!-- chon cac part -->--}}
{{--	<!-- cho bai doc -->--}}
{{--	<div class="container-tab">--}}
{{--		<img class="ext" id="ex1" src="{{URL::asset("imgs/home/close.png")}}">--}}
{{--		<div class="part-choice" id="part1"><p>Practice part 1</p></div>--}}
{{--		<div class="part-choice" id="part2"><p>Practice part 2</p></div>--}}
{{--		<div class="part-choice" id="part3"><p>Practice part 3</p></div>--}}
{{--		<div class="part-choice" id="part4"><p>Practice part 4</p></div>--}}
{{--	</div>--}}
{{--	--}}

{{--	<!-- cho bai nghe -->--}}
{{--	<div class="container-tab">--}}
{{--		<img class="ext" id="ex2" src="{{URL::asset("imgs/home/close.png")}}">--}}
{{--		<div class="part-choice" id="part5"><p>Practice part 5</p></div>--}}
{{--		<div class="part-choice" id="part6"><p>Practice part 6</p></div>--}}
{{--		<div class="part-choice" id="part7"><p>Practice part 7</p></div>	--}}
{{--	</div>--}}
@endsection


@section('footer')
	@parent
@endsection

@section("js")
	<script type="text/javascript" src="{{ URL::asset("js/wow.min.js") }}"></script>
	<script type="text/javascript" src="{{ URL::asset("js/home.js") }}"></script>
	<script>
		new WOW().init();
	</script>
@endsection
