@extends('layouts.masterAdmin')

@section('title', 'Admin')

@section('navbar')
	@parent
@endsection

@section('content')
	<!-- body -->
	<div class="container-fluid" style="padding-top: 20px;">
		<!-- menu left -->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li>b
					<a href="http://localhost:8000/adacc"><img class="ico-manag" src="{{URL::asset("imgs/account-manager.png") }}">Quản lý tài khoản</a>
				</li>
				<li>
					<a href="http://localhost:8000/adlesson" ><img class="ico-manag" src="{{URL::asset("imgs/baihoc-manager.png") }}">Quản lý bài học</a>
				</li>
				<li>
					<a href="http://localhost:8000/addiscuss" class="choice"><img class="ico-manag" src="{{URL::asset("imgs/btl-manager.png") }}">Quản lý bài thảo luận</a>
				</li>	
				<li>
					<p class="copyright">Copyright © BKTOEIC 2019</p>
				</li>
			</ul>

		</div>
		<!-- table and button -->
		<div class="row justify-content-center" style="margin-left: 12em;">
			<!-- Khung ngoai table -->
			<div class="col-11 row justify-content-center" style="border: 1px black solid; margin-top: 3em; padding: 0">
				<!-- tieu de khung ngoai -->
				<div class="col-12" style="height: 2.75em; background-color: #0CD7E1; line-height: 2em">
					<div class="pull-left justify-content-center " style="font-size: 18px;margin-top: 5px">Bảng quản lý bài thảo luận</div>
					
					<div class="pull-right">
						<div class="input-group">
						        <input id="search" type="text" class="form-control" placeholder="Search" name="search">
						        <div class="input-group-btn">
						          <button id="btnsearch" class="btn btn-default" style="background-color: #A9F414" type="submit">
						            <i class="fa fa-search" aria-hidden="true"></i>
						          </button>
						        </div>
						</div>
					</div>	 			

				</div>

				<!-- TABLE -->
				<div class="justify-content-center col-12 main-table">
					<table class="table table-bordered" style="min-width: 800px">
						<thead class="thead-dark">
							<tr class="d-flex">
								<th class="col-sm-1 col-md-1">ID</th>
								<th class="col-sm-4 col-md-4">Tiêu đề</th>
								<th class="col-sm-2 col-md-2">Ngày đăng</th>
								<th class="col-sm-1 col-md-1">User'id đăng bài</th>
								<th class="col-sm-1 col-md-1">Lượt truy cập</th>
								<th class="col-sm-1 col-md-1">Số bình luận</th>
								<th class="col-sm-1 col-md-1">Số report</th>
								<th class="col-sm-1 col-md-1">View</th>
							</tr>
						</thead>
						<tbody>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh Hỏi về thì hiện tại đơn trong tiếng anh Hỏi về thì hiện tại đơn trong Hỏi về thì hiện tại đơn trong Hỏi về thì hiện tại đơn trong Hỏi về thì hiện tại đơn trong</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">2</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">3</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">4</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">5</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">6</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">7</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">8</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">9</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
							<tr class="d-flex">
								<td class="col-sm-1 col-md-1">10</td>
								<td class="col-sm-4 col-md-4">Hỏi về thì hiện tại đơn trong tiếng anh</td>
								<td class="col-sm-2 col-md-2">1/1/2019</td>
								<td class="col-sm-1 col-md-1">1</td>
								<td class="col-sm-1 col-md-1">562</td>
								<td class="col-sm-1 col-md-1">426</td>
								<td class="col-sm-1 col-md-1">0</td>
								<td class="col-sm-1 col-md-1"><button class="detail">View</button></td>
							</tr>
						</tbody>
					</table>				
				</div>

				<!-- search -->
				<div class="col-12 row" style="padding-top: 1em;padding-bottom: 1em">
					<span class="col-md-6 col-sm-12">Show 10 of 10 entries</span>
					<span class="col-md-6 col-sm-12 row justify-content-end">
						<input class="pre-next" type="button" name="" value="Previous">
						<input class="pre-next" type="button" name="" value="1" style="background-color: #4053CB">
						<input class="pre-next" type="button" name="" value="Next">
					</span>
				</div>
			</div>

			<!-- btn delete -->
			<div class="col-11 row justify-content-start" style="margin-top: 3em; margin-bottom: 5em">
				<input id="DD" type="button" name="" value="Xóa bài thảo luận" style="padding: 0.8em 1em; background-color: #F70000; color: white; border-radius: 10px; margin-left: 22px;">
				<input id="UD" type="button" name="" value="Sửa bài thảo luận" style="padding: 0.8em 1em; background-color: #ff0066; color: white; border-radius: 10px; margin-left: 23px">
			</div>
		</div>
		
	</div>
@endsection

 @section('js')
 	@parent
 @endsection
