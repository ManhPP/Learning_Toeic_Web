
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css"
    href="{{URL::asset("css/bootstrap.min.css")}}">
<link rel="stylesheet" type="text/css"
    href="{{URL::asset("css/admin-baihoc-pn.css")}}">
</head>
<body>

	<!-- HEADER -->

    <!-- <c:import url="header-admin.jsp" /> -->
	@include('header_admin') 

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
                            <!-- <c:set var="index" value="0" /> -->
                            @php $index=0; @endphp
							<!-- <c:forEach items="${arrBaiHoc }" var="baiHoc"> -->
                                @foreach($arrBaiHoc as $baihoc)
								<tr class="d-flex">
									<td class="col-sm-1 col-md-1">{{$baihoc->id}}</td>
									<td class="col-sm-4 col-md-4">{{$baihoc->title}}</td>
									<!-- <c:if test="${baiHoc.loaiPart==null }"> -->
                                        @if($baihoc->loaiPart==null)
										<td class="col-sm-3 col-md-3">Bài kiểm tra</td>
                                    <!-- </c:if>  -->
                                        @endif
									<!-- <c:if test="${baiHoc.loaiPart!=null }"> -->
                                    @if($baihoc->loaiPart!=null)
										<td class="col-sm-3 col-md-3">{{$baihoc->loaiPart}}</td>
                                    <!-- </c:if> -->
                                    @endif
									<td class="col-sm-3 col-md-3">{{$baihoc->acessCount}}</td>
									<td class="col-sm-1 col-md-1"><div class="detail">
									<a target="_blank" class="view" href="${pageContext.request.contextPath }/guest/luyen-nghe?id=${baiHoc.id}">View</a>/<a target="_blank" class="update" href="{{url('admin/bai-hoc-manager/update-part-nghe',$baihoc->id)}} ">Update</a>
									</div></td>
								</tr>
                                <!-- <c:set var="index" value="${index+1 }" /> -->
                                @php $index++ @endphp
                            <!-- </c:forEach> -->
                            @endforeach
						</tbody>
					</table>
				</div>

				<!-- pagination -->
				<div class="col-12 row"
					style="padding-top: 1em; padding-bottom: 1em">
					<!-- <fmt:formatNumber var="numPage" value="${numBaiHoc/10}"
                        maxFractionDigits="0" /> -->
                        @php $numPage=round($numBaiHoc/10); @endphp
					<!-- <c:if test="${numBaiHoc>(numPage*10) }"> -->
                        @if($numBaiHoc>($numPage*10))
                        <!-- <c:set var="numPage" value="${numPage+1 }" /> -->
                            @php $numPage=$numPage+1; @endphp
                    <!-- </c:if> -->
                         @endif

                    <!-- <c:set var="curPage" value="0" /> -->
                    @php $curPage=0; @endphp
					<!-- <c:if test="${numBaiHoc>0 }"> -->
                        @if($numBaiHoc>0)
                        <!-- <c:set var="curPage" value="1" /> -->
                        @php $curPage=1; @endphp
                    <!-- </c:if> -->
                        @endif
					<span class="col-md-6 col-sm-12">Show <span id="cur-page">{{$curPage}}</span>
						of <span id="sum-page">{{$curPage}}</span> table
					</span> <span>
						<ul class="pagination" data-max-page="{{$curPage}}">
							<li class="page-item" id="pre"><span class="page-link"><</span></li>
							<!-- <c:forEach var="i" begin="1" end="${numPage }"> -->
                                @for($i=1;$i<=$numPage;$i++)
								<!-- add class active cho pagation day tien -->
                                <!-- <c:set var="cls" value="" /> -->
                                @php $cls; @endphp
								<!-- <c:if test="${i==1 }"> -->
                                   @if($i==1)
                                    <!-- <c:set var="cls" value="active" /> -->
                                    @php $cls="active"; @endphp
                                <!-- </c:if> -->
                                    @endif
								<!-- them dau 3... -->
								<!-- <c:if test="${(i==2)}"> -->
                                    @if($i==2)
									<li class="page-item hide more" id="first"><span
										class="page-link">...</span></li>
                                <!-- </c:if> -->
                                    @endif
								<!-- <c:if test="${(i==numPage) and (numPage>6)}"> -->
                                    @if($i==$numPage&&$numPage>6)
									<li class="page-item more" id="last"><span
										class="page-link">...</span></li>
                                <!-- </c:if> -->
                                    @endif
								<!-- an ca pagation phai sau -->
                                <!-- <c:set var="hi" value="" /> -->
                                @php $hi=""; @endphp
								<!-- <c:if test="${(i!=numPage) and (i>5) }"> -->
                                    @if($i!=$numPage&&$i>5)
                                    <!-- <c:set var="hi" value="hide" /> -->
                                    @php $hi="hide"; @endphp
                                <!-- </c:if> -->
                                    @endif
								<li class="page-num page-item {{$cls}} {{$hi}}" data-page="{{$i}}"><span
									class="page-link">{{$i}}</span></li>
                            <!-- </c:forEach> -->
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
					<input type="text" id="input-number"
						placeholder="Input page' number"
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

	<!-- footer -->
	<!-- <div class="container-fluid row justify-content-center footer"
		style="height: 5em; line-height: 5em; padding-left: 15em; position: fixed; bottom: 0; background-color: #E8E8E8; z-index: 0">
		<span>Copyright © BKTOEIC 2019</span>
	</div> -->
	<script type="text/javascript"
		src="{{URL::asset("js/jquery-3.3.1.min.js")}}"></script>
	<script type="text/javascript"
    src="{{URL::asset("js/admin-baihoc-pn.js")}}"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script type="text/javascript"
		<!-- src="{{URL::asset("js/header-admin.js")}}"></script> -->
	<script type="text/javascript"
		src="{{URL::asset("js/bootstrap.min.js")}}"></script>
</body>
</html>