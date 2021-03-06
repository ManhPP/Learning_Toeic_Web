
<!DOCTYPE html>
<html>
<head>
<title>admin quản lý tài khoản</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css"
    href="{{URL::asset("css/bootstrap.min.css")}}">
<link rel="stylesheet" type="text/css"
    href="{{URL::asset("css/admin-account.css")}}">
</head>
<body>

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
					<span>Bảng quản lý tài khoản</span>
				</div>

				<!-- search -->
				<div class="col-12 row"
					style="padding-top: 1em; padding-bottom: 1em">
					<div class="col-12 col-sm-6 row" id="noti">
						<!-- <c:if test="${noti=='1'}"> -->
                             @if($noti=='1')
                            <span style="color: green">Thêm tài khoản thành công.</span>
                            @endif
                            @if($noti=='2')
							<span style="color: red">Thêm tài khoản không thành công.</span>
                            @endif
						    @if($noti=='3')
							<span style="color: red">Không được để trống các trường.</span>
                            @endif 
					</div>

				</div>

				<!-- TABLE -->
				<div class="justify-content-center col-12 main-table" id="my-table">
					<table class="table table-bordered" style="min-width: 800px">
						<thead class="thead-dark">
							<tr class="d-flex">
								<th class="col-sm-1 col-md-1" data-name="id"><span>ID</span><img
									class="ico-filter" alt="filter" src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-2 col-md-2" data-name="hoTen"><span>Họ và tên</span><img
									class="ico-filter" alt="filter" src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-2 col-md-2" data-name="ngaySinh"><span>Ngày sinh</span><img
									class="ico-filter" alt="filter" src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-1 col-md-1" data-name="gioiTinh"><span>Giới tính</span><img
									class="ico-filter" alt="filter" src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-2 col-md-2" data-name="username"><span>Username</span><img
									class="ico-filter" alt="filter" src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-2 col-md-2" data-name="email"><span>Email</span><img
									class="ico-filter" alt="filter" src="{{URL::asset("imgs/filter.png")}}"></th>
								<th class="col-sm-2 col-md-2" data-name="hasRole"><span>ROLE</span><img
									class="ico-filter" alt="filter" src="{{URL::asset("imgs/filter.png")}}"></th>
							</tr>
						</thead>
						<tbody>
								@foreach($arrUser as $acc)
								@if($acc->active==1)
								<tr class="d-flex" data-activ="{{$acc->active}}">
									<td class="col-sm-1 col-md-1">{{$acc->id}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->hoTen}}</td>
									<td class="col-sm-2 col-md-2">
											{{\Carbon\Carbon::parse($acc->ngaySinh)->format('d/m/Y')}}  </td>
									<td class="col-sm-1 col-md-1">{{$acc->gioiTinh}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->username}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->email}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->hasRole}}</td>
								</tr>
								@endif
								@if($acc->active==0)
									<tr class="d-flex ban" data-activ="{{$acc->active}}" >
									<td class="col-sm-1 col-md-1">{{$acc->id}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->hoTen}}</td>
									<td class="col-sm-2 col-md-2">
											{{\Carbon\Carbon::parse($acc->ngaySinh)->format('d/m/Y')}}  </td>
									<td class="col-sm-1 col-md-1">{{$acc->gioiTinh}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->username}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->email}}</td>
									<td class="col-sm-2 col-md-2">{{$acc->hasRole}}</td>
								</tr>
								@endif
								
                                @endforeach
						</tbody>
					</table>
				</div>

			<!-- btn ban -->
			<div class="col-11 row justify-content-start"
				style="margin-top: 3em; margin-bottom: 5em">
				<input class="btn-func" id="add" type="button" name=""
					value="Add account" , data-toggle="modal"
					data-target="#myModal-add"
					style="padding: 0.8em 1em; background-color: #02671c; color: white; border: none">
					
				<input class="btn-func" id="update" type="button" name=""
					value="Update account" ,
					style="padding: 0.8em 1em; background-color: #c5a403; color: white; border: none">
					
				<input class="btn-func" id="del" type="button" name=""
					value="Delete account"
					style="padding: 0.8em 1em; background-color: #373738; color: white; border: none">
					
				<input class="btn-func" id="unban" type="button" name=""
					value="Unban account"
					style="padding: 0.8em 1em; background-color: #085d96; color: white; border: none">

				<input class="btn-func" id="ban" type="button" name=""
					value="Ban account"
					style="padding: 0.8em 1em; background-color: #F70000; color: white; border: none">
			</div>
		</div>
		<!-- footer -->
	<div class="container-fluid row justify-content-center footer"
		style="height: 5em; line-height: 5em; padding-left: 5em; bottom: 0; background-color: #E8E8E8; z-index: 0">
		<span>Copyright © BKTOEIC 2019</span>
	</div>
	

	</div>

	<!-- confirm cho ban-unban-->
	<div class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="mySmallModalLabel" aria-hidden="true"
		id="model-confirm">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Confirm</h4>
				</div>
				<div class="modal-body">
					<p>Hãy chọn yes để xác nhận hành động!!!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="modal-btn-yes">Yes</button>
					<button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- confirm cho del-->
	<div class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="mySmallModalLabel" aria-hidden="true"
		id="model-confirm-del">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Confirm</h4>
				</div>
				<div class="modal-body">
					<p>Hãy chọn yes để xác nhận hành động!!!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="modal-del-yes">Yes</button>
					<button type="button" class="btn btn-primary" id="modal-del-no">No</button>
				</div>
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
				<div class="modal-body">
					<input type="text" id="filter-val1" placeholder="Input put here" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn-filter-yes">Ok</button>
					<button type="button" class="btn btn-primary" id="btn-filter-no">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<!-- model them account -->
	<div class="modal fade" id="myModal-add">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #035904">
					<h4 class="modal-title" style="color: white">Thêm account</h4>
				</div>
				<form action="{{url('/admin/account-manager/add')}}" method="POST"
					modelAttribute="account" id="form-them" role="form" accept-charset="UTF-8">
					{{ csrf_field() }}
					<div class="modal-body">
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Họ tên</span> <input
								type="text" name="hoTen">
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Ngày sinh</span><input
								type="date" name="ngaySinh">
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Giới tính</span><select
								name="gioiTinh">
								<option value="Male">Male</option>
								<option value="Female">Female</option>

							</select>
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Username</span> <input 
								type="text" name="username" class="username"  /> 
								<img class="ico-noti-usr hide right" alt="tick"
								src="{{URL::asset("imgs/tick.png")}}"  /> 
								<img class="ico-noti-usr hide wrong" alt="tick"
								src="{{URL::asset("imgs/cross.png")}}"  />
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Password</span> <input
								type="password" name="pass">
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Email</span> <input
								type="text" name="email" class="email" > <img
								class="ico-noti-em hide right" alt="tick"
								src="{{URL::asset("imgs/tick.png")}}" value="emailyes"/> <img
								class="ico-noti-em hide wrong" alt="tick"
								src="{{URL::asset("imgs/cross.png")}}" value="emailno"/>
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Type account</span>
							<select name="hasRole">
								<option value="ROLE_USER">user</option>
								<option value="ROLE_ADMIN">admin</option>
							</select>
						</div>
					</div>
					<div class="modal-footer" style="justify-content: center">
						<button id="submit-add-btn"
							style="background-color: #035904; color: white"
							class="btn btn-default" data-dismiss="modal">ADD</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- model update account -->
	<div class="modal fade" id="myModal-update">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #c5a403">
					<h4 class="modal-title" style="color: white">Update account</h4>
				</div>

				<form action="{{url('/admin/account-manager/update')}}" method="POST"
					modelAttribute="account" id="form-update" role="form" accept-charset="UTF-8">
					{{ csrf_field() }}
					<input name="id" style="display: none" id="id-submit-update"> 
					<div >
							<span class="col-3" style="line-height: 35px" >ID:</span> 
							<input
								type="text" name="ID" id="IDacc" value="">
						</div>
					<div class="modal-body">
						
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Họ tên</span> <input
								type="text" name="hoTen" >
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Ngày sinh</span><input
								type="date" name="ngaySinh" >
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px" >Giới tính</span><select
								name="gioiTinh">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Username</span> <input
								type="text" name="username" class="updateusername" /> <img
								class="ico-noti-usr hide right" alt="tick"
								src="{{URL::asset("imgs/tick.png")}}" /> <img
								class="ico-noti-usr hide wrong" alt="tick"
								src="{{URL::asset("imgs/cross.png")}}" />
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Password</span> <input
								type="password" name="pass" >
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Email</span> <input
								type="text" name="email" class="updateemail" > <img
								class="ico-noti-em hide right" alt="tick"
								src="{{URL::asset("imgs/tick.png")}}" /> <img
								class="ico-noti-em hide wrong" alt="tick"
								src="{{URL::asset("imgs/cross.png")}}" />
						</div>
						<div class="input-modal row">
							<span class="col-3" style="line-height: 35px">Type account</span>
							<select name="hasRole">
								<option value="ROLE_USER">user</option>
								<option value="ROLE_ADMIN">admin</option>
							</select>
						</div>
					</div>
					<div class="modal-footer" style="justify-content: center">
						<button id="submit-update-btn"
							style="background-color: #c5a403; color: white"
							class="btn btn-default" data-dismiss="modal">UPDATE</button>
					</div>
				</form>
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
            src="{{URL::asset("imgs/cross.png")}}" style="height: 13px"
			data-toggle="tooltip" title="Remove filter">
	</div>

	<div style="display: none;">
		<div id="csrf-name">${_csrf.headerName}</div>
		<div id="csrf-value">${_csrf.token}</div>
		<div id="root-path">{{URL("")}}</div>
	</div>
	
	<script type="text/javascript"
        src="{{URL::asset("js/jquery-3.3.1.min.js")}}"></script>
	<script type="text/javascript"
        src="{{URL::asset("js/admin-account.js")}}"></script>
	<script type="text/javascript"
        src="{{URL::asset("js/header-admin.js")}}"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script type="text/javascript"
        src="{{URL::asset("js/bootstrap.min.js")}}"></script>
</body>
</html>