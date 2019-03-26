<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{URL::asset("css/bootstrap.min.css") }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{URL::asset("css/admin.css") }}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset("fonts/font-awesome-4.7.0/css/font-awesome.css") }}">
	
</head>

<body>
	 @section('navbar')
	 <!-- HEADER -->
	<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
		<div class="container-fluid">
			<!-- Brand -->
			<span class="navbar-brand-me">BKTOEIC ADMIN</span> 

			<!-- Navbar links -->
			<div class=" navbar-collapse justify-content-end" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link mr-100" href="#" title="Report"><img class="ico-header" src="{{URL::asset("imgs/email-icon.png") }}"></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" title="Account Info"><img class="ico-header" src="{{URL::asset("imgs/account-icon.png") }}"></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" title="Logout"><i class="fa fa-sign-out "></i></a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
	 @show
	 @yield('content')

	 @section('js')
		<script type="text/javascript" src="{{URL::asset("js/jquery-3.3.1.slim.min.js") }}"></script>
		<script type="text/javascript" src="{{URL::asset("js/js-for-admin-acc.js") }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script type="text/javascript" src="{{URL::asset("js/bootstrap.min.js") }}"></script>
	 @show
</body>