@extends('layouts.master')
@section('title','Account manager')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/user_manage_account.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <div class="body row">
        <div class="col-12 title-lev1">Quản lý tài khoản cá nhân</div>
        <div class="col-12" id="infor-container">
            <div class="title-lev2">Thông tin cơ bản</div>
            <div class="info-basic">
                <div class="info-item">
                    <span>Họ tên: </span>
                    <span>Trần Văn Vĩnh</span>
                </div>
                <div class="info-item">
                    <span>Giới tính:</span>
                    <label><input type="radio" checked="checked">Nam</label>
                    <label><input type="radio">Nữ</label>
                </div>
                <div class="info-item">
                    <span>Ngày sinh:</span>
                    <input type="date">
                </div>
                <div class="info-item">
                    <span>User name:</span>
                    <span>vinhyt98</span>
                </div>
                <div class="info-item">
                    <span>Password:</span>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/user_manage_account.js") }}"></script>
@endsection