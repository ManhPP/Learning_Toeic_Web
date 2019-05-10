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
									<a target="_blank" class="view" href="{{URL("")}}/guest/luyen-doc?id={{$baiHoc->id}}">View</a>/<a target="_blank" class="update" href="{{URL("")}}/admin/bai-hoc-manager/update-part-doc?id={{$baiHoc->id}}"}>Update</a>
									</div></td>
								</tr>
								<?php $index +=1 ?>
							@endforeach
						</tbody>
					</table>
				</div>

				<!-- pagination -->
				<div class="col-12 row"
					style="padding-top: 1em; padding-bottom: 1em">
					{{--<fmt:formatNumber var="numPage" value="${numBaiHoc/10}"--}}
						{{--maxFractionDigits="0" />--}}
					<?php round($numBaiHoc/10) ?>
					@if( $numBaiHoc > ($numPage*10) )
						<?php $numbPage +=1 ?>
					@endif
					<?php $curPage = 0 ?>
					@if($numBaiHoc > 0)
						<?php $curPage =1 ?>
					@endif
					<span class="col-md-6 col-sm-12">Show <span id="cur-page">{{$curPage }}</span>
						of <span id="sum-page">{{$numPage }}</span> table
					</span> <span>
						<ul class="pagination" data-max-page="{{$numPage }}">
							<li class="page-item" id="pre"><span class="page-link"><</span></li>
							@for($i=1;$i <= $numPage ; $i++)
								<!-- add class active cho pagation day tien -->
								<?php $cls = ''?>
								@if( $i == 1 )
									<?php $cls = 'active'?>
								@endif
								<!-- them dau 3... -->
								@if($i == 2)
									<li class="page-item hide more" id="first"><span
										class="page-link">...</span></li>
								@endif
								@if($i == $numPage && $numPage >6)
								{{--<c:if test="${(i==numPage) and (numPage>6)}">--}}
									<li class="page-item more" id="last"><span
										class="page-link">...</span></li>
								@endif
								<!-- an ca pagation phai sau -->
								<?php $hi = ''?>
								{{--<c:set var="hi" value="" />--}}
								@if($i != $numPage && $i > 5)
								{{--<c:if test="${(i!=numPage) and (i>5) }">--}}
									{{--<c:set var="hi" value="hide" />--}}
									<? $hi = 'hide'?>
								@endif
								<li class="page-num page-item {{$cls }} {{$hi}}" data-page="{{$i }}"><span
									class="page-link">{{$i }}</span></li>
							@endfor
							<li class="page-item" id="ne"><span class="page-link">></span></li>
						</ul>
					</span>
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

	</div>

	<!-- nhap so trang -->
	<div class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="mySmallModalLabel" aria-hidden="true"
		id="model-input-page">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Input page</h4>
				</div>
				<div class="modal-body">
					<input type="text" id="input-number" placeholder="Input page' number"
						oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn-input-yes">Ok</button>
					<button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<!-- filter -->
	<div class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="mySmallModalLabel" aria-hidden="true"
		id="model-input-filter">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">
						Filter
						<spa id="type-filter"></spa>
					</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn-filter-yes">Ok</button>
					<button type="button" class="btn btn-primary" id="btn-filter-no">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<!-- container them de lay cho de -->
	<div id="container-input-number" style="display: none;">
		<input id="filter-val" placeholder="Input filter"
			oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
	</div>
	<!-- lay icon de append cho de -->
	<div id="ico-append" style="display: none;">
		<img class="ico-ext-filter" alt="ico-append"
			src="{{URL::asset("imgs/cross.png")}}"
			style="height: 13px" data-toggle="tooltip" title="Remove filter">
	</div>
	<div style="display: none;">
		<div id="csrf-name">${_csrf.headerName}</div>
		<div id="csrf-value">${_csrf.token}</div>
		<div id="root-path">{{URL("")}}</div>
	</div>

	{{--<!-- footer -->--}}
	{{--<div class="container-fluid row justify-content-center footer"--}}
		 {{--style="height: 5em; line-height: 5em; padding-left: 15em; position: fixed; bottom: 0; background-color: #E8E8E8; z-index: 0">--}}
		{{--<span>Copyright © BKTOEIC 2018</span>--}}
	{{--</div>--}}
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
	{{--@endsection--}}


	{{--@section('footer')--}}
		{{--@parent--}}
		{{--<script src="{{URL::asset("js/admin-baihoc-pd/admin-baihoc-pd.js")}}"></script>--}}
		{{--<script type="text/javascript"--}}
				{{--src="${pageContext.request.contextPath}/resources/js/jquery-3.3.1.min.js"></script>--}}
{{--@endsection--}}