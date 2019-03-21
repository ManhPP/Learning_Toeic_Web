@extends('layouts.master')
@section('title',"practice test home")

@section('navbar')
	@parent	
@endsection

@section('content')
	<!-- body -->
	<div class="body">

		<!-- cover -->
		<div class="cover">

		</div>

		<!-- suggess -->
		<div class="suggess content-body row">
			<div class="header-suggess">
				<span>Top of tests</span>
			</div>
			<!-- Swiper -->
			<div class="swiper-container col-8 col-sm-11" id="mySwiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 1: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 2: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 3: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 4: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 5: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 6: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 7: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 8: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 9: IIG 2018
						</div>
					</div>
					<div class="swiper-slide row">
						<div class="test col-12">
							<img src="/imgs/prHome/test.jpg">
						</div>
						<div class="detail-lession col-12">
							Test 10: IIG 2018 111111111111h1h1h1h1h1h1h1h1h1h1h1h1h1h1h
						</div>
					</div>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
				<!-- Add Arrows -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
		
		<!-- search -->
		<dir class="content-body">
			<div class="header-suggess row">
				<span class="col-3">Search</span>
				<div class="search-div col-9">
					<input id="search-input" type="text" name="search" placeholder="Search test">
					<input id="search-submit" type="submit" value="SEARCH">
				</divF>
			</div>
		</dir>


		<!-- table -->
		<div class="container-fluid">
			<div class="table-responsive-sm table-outter">
				<table class="table justify-content-start table-hover" id="search-table">
					<thead>
						<tr class="d-flex">
							<th class="col-12 col-sm-10 col-md-7">Test name</th>
							<th class="col-0 col-sm-2 col-md-5 count">Access count</th>
						</tr>
					</thead>
					<tbody>
						<tr class="d-flex r">
							<td class="col-12 col-sm-10 col-md-7">
								<span><img src="/imgs/prHome/book.png"></span>
								<span>Test 1: Hello word!!</span>
							</td>
							<td class="col-0 col-sm-2 col-md-5 count">1500</td>
						</tr>
						<tr class="d-flex r">
							<td class="col-12 col-sm-10 col-md-7">
								<span><img src="/imgs/prHome/book.png"></span>
								<span>Test 2: Hello word!!</span>
							</td>
							<td class="col-0 col-sm-2 col-md-5 count">1320</td>
						</tr>
						<tr class="d-flex r">
							<td class="col-12 col-sm-10 col-md-7">
								<span><img src="/imgs/prHome/book.png"></span>
								<span>Test 3: Hello word!!</span>
							</td>
							<td class="col-0 col-sm-2 col-md-5 count">980</td>
						</tr>
						<tr class="d-flex r">
							<td class="col-12 col-sm-10 col-md-7">
								<span><img src="/imgs/prHome/book.png"></span>
								<span>Test 4: Hello word!!</span>
							</td>
							<td class="col-0 col-sm-2 col-md-5 count">600</td>
						</tr>
						<tr class="d-flex r">
							<td class="col-12 col-sm-10 col-md-7">
								<span><img src="/imgs/prHome/book.png"></span>
								<span>Test 5: Hello word!!</span>
							</td>
							<td class="col-0 col-sm-2 col-md-5 count">580</td>
						</tr>

					</tbody>
				</table>

			</div>
		</div>

	</div>
@endsection


@section('footer')
	@parent
@endsection
@section('js')
	<script type="text/javascript" src="{{ URL::asset("js/prhome-js.js") }}"></script>
	<script type="text/javascript" src="{{ URL::asset("js/swiper.js") }}"></script>
@endsection