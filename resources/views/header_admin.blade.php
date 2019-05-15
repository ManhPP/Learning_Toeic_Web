
	
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
					<div class="sum-notice">{{count($listReport)}}</div>
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
		<li><a id="link-acc" href="{{Route("accountcontroller.get")}}"><img class="ico-manag"
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
	<div id="skip-rp-path">{{Route("reportcontroller.changestatusprocess")}}</div>
</div>


<!-- report -->
<div class="modal fade" tabindex="-1" role="dialog"
	 aria-labelledby="mySmallModalLabel" aria-hidden="true"
	 id="model-message">
	<div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
		<div class="modal-content" id="modal-content-iques">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Thông báo</h4>
			</div>
			<div class="modal-body">
				<div id="body-rp">
					@foreach($listReport as $rp)
						@php $loaiReport = "" @endphp
						@if($rp->loaiReport == 'cmt')
							@php $loaiReport = "comment" @endphp
						@else
							@if($rp->loaiReport == 'repcmt')
								@php $loaiReport = "reply comment" @endphp
							@else
								@php $loaiReport == "bài thảo luận" @endphp
							@endif
						@endif
						<div class="group-rp">
							<div class="row one-rp">
								<div class="col-12">
									<span class="acc-rp">Tài khoản: {{$rp->user->hoTen}}, id {{$rp->user->id}} đã report {{$loaiReport }} với nội dung: </span>
									<span class="content-rp">{{$rp->noiDung }}</span>
								</div>
							</div>

							<div clas="col-12">
								@if($rp->loaiReport == 'cmt')
									<span class="acc-rp">Nội dung comment bị report: </span>
									<span class="content-rp">{{$rp->comment->noiDung}}</span>
								@endif
								@if($rp->loaiReport == 'repcmt')
									<span class="acc-rp">Nội dung reply comment bị report: </span>
									<span class="content-rp">{{$rp->replyComment->noiDung }}</span>
								@endif
							</div>

							<div class="col-12 div-proc-rp">
								<button class="btn proc-rp admin-skip-report" id="skip-rp" data-id="{{$rp->id}}">Bỏ qua repport</button>
								@if($rp->loaiReport == 'cmt')
									<button class="btn proc-rp admin-del-cmt" id="view-rp" data-path="{{Route("commentController.delete")}}" data-id="{{$rp->comment->id}}">Xóa comment</button>
								@endif
								@if($rp->loaiReport == 'repcmt')
									@php $idparent = -1 @endphp
									<div style="display: none">{{$idparent = $rp->replyComment->comment->id}}</div>
									<button class="btn proc-rp admin-del-rep" id="view-rp" data-parent="{{$idparent}}" data-path="{{Route("replyCommentController.deleteReply")}}" data-id="{{$rp->replyComment->id}}">Xóa replycomment</button>
								@endif
								@if($rp->loaiReport == 'btl')
									<a href="{{Route("dicussionController.view")}}?id={{$rp->discussion->id}}" target="_blank"><button class="btn proc-rp" id="view-rp">Đi đến btl</button></a>
								@endif
							</div>
						</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-12" style="text-align: right;">
						<button id="btn-close" class="btn" style="color: white; background: red">Close</button>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>