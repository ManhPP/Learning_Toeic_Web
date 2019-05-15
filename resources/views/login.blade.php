<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ URL::asset("imgs/favicon.ico") }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/bootstrap.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("fonts/font-awesome-4.7.0/css/font-awesome.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("fonts/iconic/css/material-design-iconic-font.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/hamburgers.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animsition.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/select2.min.css") }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/daterangepicker.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/util.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/main.css") }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ URL::asset("imgs/bg-01.jpg") }}')">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action="{{ Route("mylogincontroller.postlogin") }}">
					{{csrf_field()}}
					<span class="login100-form-title p-b-49">
						<u>Login BKToeic</u>
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
{{-- 					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div> --}}
					
					<div class="container-login100-form-btn" style="margin-top: 3em">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-105" style="padding-top: 3em;">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="{{Route("accountcontroller.registerindex")}}" class="txt2">
							Sign Up
						</a>
					</div>
					<div class="flex-col-c p-t-105" style="padding-top: 3em;">
						<a href="{{Route("home")}}" class="txt2">
							return home
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ URL::asset("js/jquery-3.3.1.min.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset("js/animsition.min.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset("js/popper.js") }}"></script>
	<script src="{{ URL::asset("js/bootstrap.min.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset("js/select2.min.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset("js/moment.min.js") }}"></script>
	<script src="{{ URL::asset("js/daterangepicker.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset("js/countdowntime.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset("js/main.js") }}"></script>

</body>
</html>