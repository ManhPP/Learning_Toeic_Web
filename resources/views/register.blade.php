@extends('layouts.master')

@section('title', 'Register')
@section("css")
	<!-- Icons font CSS-->
    <link href="{{ URL::asset("fonts/mdi-font/css/material-design-iconic-font.min.css") }}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("fonts/font-awesome-4.7.0/css/font-awesome.min.css") }}">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ URL::asset("css/select2.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset("css/daterangepicker.css") }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ URL::asset("css/main-resgister.css") }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset("css/register-css.css") }}" rel="stylesheet" media="all">
@endsection
@section('navbar')
	@parent
@endsection

@section('content')
        <div class="spage-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">Registration New Account</h2>
                        <form method="POST" action="{{Route("accountcontroller.doregister")}}">
                            {{ csrf_field() }}
                            <div class="row row-space">
                                <div class="col-2-re">
                                    <div class="input-group">
                                        <label class="label">Họ tên</label>
                                        <input class="input--style-4" type="text" name="hoTen">
                                    </div>
                                </div>
                                <div class="col-2-re">
                                    <div class="input-group">
                                        <label class="label">Ngày sinh</label>
                                        <div class="input-group-icon" style="width: 100%">
                                            <input class="input--style-4 js-datepicker" type="text" name="ngaySinh">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2-re">
                                    <div class="input-group">
                                        <label class="label">Email</label>
                                        <input class="input--style-4" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-2-re">
                                    <div class="input-group row" style="margin-left: 0">
                                        <label class="label col-2-re">Giới tính</label>
                                        <div class="p-t-10">
                                            <label class="radio-container m-r-45">Male
                                                <input type="radio" checked="checked" name="gioiTinh">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">Female
                                                <input type="radio" name="gender">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2-re">
                                    <div class="input-group">
                                        <label class="label">Username</label>
                                        <input class="input--style-4" type="text" name="username">
                                    </div>
                                </div>
                                <div class="col-2-re">
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <input class="input--style-4" type="text" name="pass">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section("js")
	<!-- Jquery JS-->
    <script src="{{ URL::asset("js/jquery-3.3.1.min.js") }}"></script>
    <!-- Vendor JS-->
    <script src="{{ URL::asset("js/select2.min.js") }}"></script>
    <script src="{{ URL::asset("js/moment.min.js") }}"></script>
    <script src="{{ URL::asset("js/daterangepicker.js") }}"></script>

    <!-- Main JS-->
    <script src="{{ URL::asset("js/global.js") }}"></script>
@endsection