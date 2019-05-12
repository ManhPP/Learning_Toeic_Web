<!DOCTYPE html>
<html>
<head>
	<title>Quan ly phan doc</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css"
		  href="{{ URL::asset("css/bootstrap.min.css") }}"/>
	<link rel="stylesheet" type="text/css"
		  href="{{ URL::asset("css/admin-baihoc-pd/admin-baihoc-pd.css") }}">
</head>
<body>
	@include('header_admin')
<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/admin-baihoc-pd/admin-baihoc-pd.css") }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/header-admin.css") }}"/>
	<!-- body -->
	<div class="container-fluid" style="padding-top: 50px;">
		<!-- table and button -->
		<div class="row justify-content-center">
			<!-- Khung ngoai table -->
			<div class="col-11 row justify-content-center"
				style="border: 1px black solid; margin-top: 3em; padding: 0">
				<!-- tieu de khung ngoai -->
				<div class="col-12"
					style="height: 2em; background-color: #B8B8B8; line-height: 2em">
					<span>Bảng quản lý bài học</span>
				</div>

				<!-- search -->
				<div class="col-12 row"
					style="padding-top: 1em; padding-bottom: 1em">
					<div class="col-12 col-sm-6 row" id="noti"></div>

				</div>

				<!-- TABLE -->
				<div class="justify-content-center col-12 main-table"
					id="table-thaoluan">
					<table class="table table-bordered" style="min-width: 800px">
						<thead class="thead-dark">
							<tr class="d-flex">
								<th class="col-sm-1 col-md-1" data-name="id"><span>ID</span><img
									class="ico-filter" alt="filter"
									src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-4 col-md-4" data-name="tittle"><span>Tiêu đề</span><img class="ico-filter" alt="filter"
									src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-3 col-md-3" data-name="loaiPart"><span>Loại bài học</span><img class="ico-filter" alt="filter"
									src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-3 col-md-3" data-name="accessCount"><span>Lượt truy cập</span><img class="ico-filter" alt="filter"
									src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-1 col-md-1"><span>Xem</span></th>
							</tr>
						</thead>
						<tbody>
							<?php $index =0 ?>
							@foreach( $arrBaiHoc as $baiHoc )
								<tr class="d-flex">
									<td class="col-sm-1 col-md-1">{{$baiHoc->id }}</td>
									<td class="col-sm-4 col-md-4">{{$baiHoc->title }}</td>
									@if($baiHoc->loaiPart == null)
										<td class="col-sm-3 col-md-3">Bài kiểm tra</td>
									@endif
									@if($baiHoc->loaiPart != null)
										<td class="col-sm-3 col-md-3">{{$baiHoc->loaiPart }}</td>
									@endif
									<td class="col-sm-3 col-md-3">{{$baiHoc->accessCount }}</td>
									<td class="col-sm-1 col-md-1"><div class="detail">
									<a target="_blank" class="view" href="{{route("readingpartcontroller.practicepartdoc")}}?id={{$baiHoc->id}}">View</a>/<a target="_blank" class="update" href="{{URL("")}}/admin/bai-hoc-manager/update-part-doc?id={{$baiHoc->id}}"}>Update</a>
									</div></td>
								</tr>
								<?php $index +=1 ?>
							@endforeach
						</tbody>
					</table>
				</div>


			</div>

			<!-- btn delete -->
			<div class="col-11 row justify-content-start"
				style="margin-top: 3em; margin-bottom: 5em">
				<input class="btn-mana" id="add" type="button" name=""
					value="Thêm bài học" style="background-color: #02671c"> <input
					class="btn-mana" id="delete" type="button" name=""
					value="Xóa bài học" style="background-color: #F70000;">
			</div>
		</div>
		<!-- footer -->
		<div class="container-fluid row justify-content-center footer"
			style="height: 5em; line-height: 5em; padding-left: 5em; bottom: 0; background-color: #E8E8E8; z-index: 0">
			<span>Copyright © BKTOEIC 2019</span>
		</div>
	</div>

	<!-- chon part de them -->
	<div class="modal fade" tabindex="-1" role="dialog"
		 aria-labelledby="mySmallModalLabel" aria-hidden="true"
		 id="model-choose-part">
		<div class="modal-dialog" style="top: 5em">
			<div class="modal-content" id="modal-content-iques">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Chọn part muốn thêm</h4>
				</div>
				<div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="choose-part col-8 col-md-6 checked-choose" data-path="{{Route("viewaddpart5")}}">Add part 5</div>
                        </div>
                        <div class="col-12">
                            <div class="choose-part col-8 col-md-6" data-path="{{Route("viewaddpart6")}}">Add part 6</div>
                        </div>
                        <div class="col-12">
                            <div class="choose-part col-8 col-md-6" data-path="{{Route("viewaddpart7")}}">Add part 7</div>
                        </div>

                    </div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn-input-yes"
							data-next="false">Ok</button>
					<button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript"
			src="{{URL::asset("js/jquery-3.3.1.min.js")}}"></script>
	<script type="text/javascript"
			src="{{URL::asset("js/admin-baihoc-pd/admin-baihoc-pd.js")}}"></script>
	<script
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script type="text/javascript"
			src="{{URL::asset("js/header-admin.js")}}"></script>
	<script type="text/javascript"
			src="{{URL::asset("js/bootstrap.min.js")}}"></script>
</body>
</html>
