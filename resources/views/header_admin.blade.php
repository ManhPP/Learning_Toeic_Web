
	
<link rel="stylesheet" type="text/css"
	href="{{URL::asset("css/header-admin.css")}}">
<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
	<div class="container-fluid">
		<!-- Brand -->
		<img class="btn-expand" id="list-ico" alt="expand"
			src="{{URL::asset("imgs/list.png")}}">
		<img class="btn-expand hide" id="hide-ico" alt="expand"
			src="{{URL::asset("imgs/hide.png")}}">

		<a class="navbar-brand" href="{{URL("")}}">BKTOEIC ADMIN</a>

		<!-- Navbar links -->
		<div class=" navbar-collapse justify-content-end"
			id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item" id="recv-rp">
					<a class="nav-link mr-100" href="#">
						<img class="ico-header" src="{{URL::asset("imgs/email-icon.png")}}">
					</a>
					<div class="sum-notice">{{$sumRepost=1}}</div>
				</li>
						
				<li class="nav-item"><a class="nav-link" href="#"><img
						class="ico-header"
						src="{{URL::asset("imgs/account-icon.png")}}"></a></li>
			</ul>
		</div>
	</div>
</nav>

<!-- menu left -->
<div id="sidebar-wrapper" class="hide">
	<ul class="sidebar-nav">
		<li><a id="link-acc" href="#" class="choice"><img class="ico-manag"
				src="{{URL::asset("imgs/account-manager.png")}}">Quản
				lý tài khoản</a>
		</li>

		<li><a id="link-listen" href="{{Route("listeningpartcontroller.get")}}"><img class="ico-manag"
				src="{{URL::asset("imgs/baihoc-manager.png")}}">Quản
				lý bài nghe</a></li>

		<li><a id="link-read" href="{{Route("readingpartcontroller.getlistpartdoc")}}"><img class="ico-manag"
				src="{{URL::asset("imgs/baihoc-manager.png")}}">Quản
				lý bài đọc</a></li>

		<li><a id="link-test" href="{{Route("testcontroller.indexforadminhome")}}"><img class="ico-manag"
				src="{{URL::asset("imgs/baihoc-manager.png")}}">Quản
				lý bài BKT</a></li>

		<li><a id="link-discuss" href="{{Route("discussioncontroller.indexadminmanager")}}"><img class="ico-manag"
				src="{{URL::asset("imgs/btl-manager.png")}}">Quản
				lý bài thảo luận</a></li>
	</ul>
</div>

<div style="display: none;">
	<div id="csrf-name">${_csrf.headerName}</div>
	<div id="csrf-value">${_csrf.token}</div>
	<div id="root-path">{{URL("")}}</div>
</div>

<!-- nhap noi dung cau -->
{{--<div class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="mySmallModalLabel" aria-hidden="true"
	id="model-message">
	<div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
		<div class="modal-content" id="modal-content-iques">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Thông báo</h4>
			</div>
			<div class="modal-body">
                    @foreach($listReport as $rp)
                    @php $loaiReport=""; @endphp
					
                    @if($rp->loaiReport == 'cmt')
                        @php $loaiReport = "comment" @endphp
                    @endif
                    @if($rp->loaiReport == 'repcmt')
                        @php $loaiReport = "reply comment" @endphp
                    @endif
                    @if($rp->loaiReport  == 'btl')
                        @php $loaiReport = "bài thảo luận" @endphp
                    @endif 
                    
					<div class="group-rp">
						<div class="row one-rp">
							<div class="col-12">
								<span class="acc-rp">Tài khoản: ${rp.user.hoTen }, id ${rp.user.id } đã report ${loaiReport }: </span>
								<span class="content-rp">${rp.noiDung }</span>
							</div>
						</div>
						<div class="col-12 div-proc-rp">
							<button class="btn proc-rp" id="skip-rp" data-id="${rp.id }">Bỏ qua repport</button>
							<button class="btn proc-rp" id="view-rp">Đi đến nội dung bị report</button>
						</div>
					</div>
                @endforeach
				<div class="row">
					<div class="col-12" style="text-align: right;">
						<button id="btn-close" class="btn" style="color: white; background: red">Close</button>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
--}}