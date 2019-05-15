<!-- <%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%> -->
<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>add part 1</title>
<link rel="stylesheet" type="text/css"
	href="{{URL::asset("css/bootstrap.min.css")}}">
<link rel="stylesheet" type="text/css"
	href="{{URL::asset("css/admin-them-part1.css")}}">
<link rel="stylesheet" type="text/css"
	href="{{URL::asset("css/animate.css")}}">
</head>
<body>
	<nav id="bar"
		class="navbar navbar-expand-md navbar-dark fixed-top nav-background">
		<!-- Brand -->
		<a class="navbar-brand" href="{{URL("")}}">BKTOEIC</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" id="toggle-bar" type="button"
			data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse justify-content-end head-bar"
			id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="{{URL("")}}">HOME</a></li>
				<li class="nav-item"><a class="nav-link" href="{{Route("discussionController.home")}}">FORUM</a></li>
				<li class="nav-item" id="btn-login"><a class="nav-link"
					href="{{Route('mylogincontroller.login')}}">LOGIN</a></li>
			</ul>
		</div>
	</nav>

	<!-- body -->
	<div class="body row">
		<div class="row">
			<div class="col-12 time-detail">
				<span>Tiêu đề: </span>
				<input id="tittle">
			</div>
		</div>



		<div
			class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
			<div class="header-content">
				<div style="padding-left: 1em">Practic part 1 (10 sentences), *(Admin phải upload tất cả
					các file và chọn đáp án đúng cho từng câu)</div>
			</div>
			<div class="content">
				<div class="p1">
					<!-- audio -->
					<div class="audio">
						<span>Input audio here</span>
						<form id="form-upload-audio">
							<input id="up-audio" type="file" name="audio" accept="audio/*">
						</form>
					</div>
					<hr>

					<!-- intro img-->
					<div class="intro">
						<span>Input image intro here</span>
						<form class="form-upload-img">
							<input class="up-img" type="file" name="file-image" accept="image/*">
						</form>
					</div>
					<hr>
					<!-- list cau hoi -->
					<div class="list-cau">
						<!-- cau1 -->
						<div class="ques">
							<div class="no-ques">Câu 1</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-1" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-1" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-1" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-1" value="D">D</label>
							</div>
						</div>
						<!-- cau2 -->
						<div class="ques">
							<div class="no-ques">Câu 2</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-2" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-2" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-2" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-2" value="D">D</label>
							</div>
						</div>
						<!-- cau3 -->
						<div class="ques">
							<div class="no-ques">Câu 3</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-3" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-3" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-3" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-3" value="D">D</label>
							</div>
						</div>
						<!-- cau4 -->
						<div class="ques">
							<div class="no-ques">Câu 4</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-4" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-4" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-4" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-4" value="D">D</label>
							</div>
						</div>
						<!-- cau5 -->
						<div class="ques">
							<div class="no-ques">Câu 5</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-5" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-5" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-5" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-5" value="D">D</label>
							</div>
						</div>
						<!-- cau6 -->
						<div class="ques">
							<div class="no-ques">Câu 6</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-6" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-6" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-6" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-6" value="D">D</label>
							</div>
						</div>
						<!-- cau7 -->
						<div class="ques">
							<div class="no-ques">Câu 7</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-7" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-7" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-7" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-7" value="D">D</label>
							</div>
						</div>
						<!-- cau8 -->
						<div class="ques">
							<div class="no-ques">Câu 8</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-8" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-8" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-8" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-8" value="D">D</label>
							</div>
						</div>
						<!-- cau9 -->
						<div class="ques">
							<div class="no-ques">Câu 9</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-9" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-9" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-9" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-9" value="D">D</label>
							</div>
						</div>
						<!-- cau10 -->
						<div class="ques">
							<div class="no-ques">Câu 10</div>
							<div class="div-img">
								<span>Input image here</span>
								<form class="form-upload-img" style="padding: 1em">
									<input class="up-img" type="file" name="file-image"
										accept="image/*">
								</form>
							</div>
							<div class="tick col-12 col-sm-10 row">
								<label class="col-3"><input type="radio" name="choise-10" checked="checked" value="A">A</label>
								<label class="col-3"><input type="radio" name="choise-10" value="B">B</label>
								<label class="col-3"><input type="radio" name="choise-10" value="C">C</label>
								<label class="col-3"><input type="radio" name="choise-10" value="D">D</label>
							</div>
						</div>
						<div style="text-align: center;margin-top: 2em;">
							<input style="width: 5em;" type="button" value="Add" id="add-part">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- footer -->
	<div class="footer row">
		<div class="col-8">
			<div class="line">ABOUT US</div>
			<div class="line">
				<img
					src="{{URL::asset("imgs/locate.png")}}"><span>Địa
					chỉ:Số 1, Đại Cồ Việt, Bách Khoa, Hà Nội</span>
			</div>
			<div class="line">
				<img
					src="{{URL::asset("imgs/contact.png")}}"><span>SDT:+84
					327201345</span>
			</div>
			<div class="line">
				<img
					src="{{URL::asset("imgs/email.png")}}"><span>Email:
					bktoiec@gmail.com</span>
			</div>
		</div>
		<div class="col-4">
			<div class="line">CONTACT</div>
			<div class="line">
				<img style="margin-right: 3px; width: 32px; height: 32px"
					src="{{URL::asset("imgs/fb.png")}}">
				<img
					src="{{URL::asset("imgs/twitter.png")}}"
					style="width: 32px; height: 32px">
			</div>
		</div>
	</div>

	<!-- modal -->
	<div class="modal fade" id="myModal" style="padding: 0">
		<div class="modal-dialog">
			<div class="modal-content"
				style="border-right: 18px; border-radius: 18px">
				<div class="modal-header justify-content-center"
					style="background-color: rgb(50, 63, 71); border-radius: 18px 18px 0 0;">
					<h4 class="modal-title" style="color: white">LOGIN</h4>
				</div>

				<div class="modal-body"
					style="background-color: rgba(46, 62, 72, 0.93); border-radius: 0 0 18px 18px">
					<div class="container-fluid " class="row">
						<form>
							<div style="text-align: center; padding-top: 2em">
								<input class="col-11 login-input no-outline" type="text"
									name="user" placeholder="USERNAME" autocomplete="off">
							</div>
							<div style="text-align: center; padding-top: 2em">
								<input class="col-11 login-input no-outline" type="password"
									name="pass" placeholder="PASSWORD" autocomplete="off">
							</div>
							<div style="text-align: center; padding-top: 4em">
								<input class="col-6 no-outline" type="submit" value="LOGIN"
									style="height: 3em; background-color: rgb(36, 123, 179); border: none; margin-bottom: 25px; border-radius: 10px; color: white; cursor: pointer;">
							</div>
						</form>
					</div>
				</div>
				<!-- <div class="modal-footer">
		            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div> -->
			</div>
		</div>
	</div>
	<!-- Open modal -->
	<button id="my-button" style="display: none;" data-toggle="modal"
		data-target="#myModal">Open modal</button>
	<div style="display: none;">
		<div id="path-add">{{Route("part1controller.create")}}</div>
		<div id="root-path">{{URL("")}}</div>
		<div id="id-user">1</div>
	</div>
	<div></div>

	<script type="text/javascript"
		src="{{ URL::asset("js/jquery-3.3.1.min.js") }}"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script type="text/javascript"
		src="{{URL::asset("js/bootstrap.min.js")}}"></script>
	<script type="text/javascript"
		src="{{URL::asset("js/admin-them-part1.js")}}"></script>
</body>
</html>