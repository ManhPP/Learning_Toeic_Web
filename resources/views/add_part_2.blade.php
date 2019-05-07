@extends('layouts.master')
@section('title','add part 2')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/admin_add_part2.css")}}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <!-- body -->
    <div class="body row">
        <div class="row">
            <div class="col-12 time-detail">
                <span>Tiêu đề: </span>
                <input id="tittle">
            </div>
        </div>
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 2 (30 sentences), *(Admin phải upload tất cả các file và chọn đáp án đúng cho từng
                    câu)
                </div>
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
                    <!-- intro img-->
                    <div class="intro">
                        <span>Input image intro here</span>
                        <form class="form-upload-img">
                            <input id="up-img" type="file" name="file-image" accept="image/*">
                        </form>
                    </div>
                    <!-- list cau hoi -->
                    @for($index=0;$index<30;$index++)
                    <div class="list-cau">
                        <div class="ques">
                            <div class="no-ques">
                                Câu {{$index+1}}
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise{{$index}}" checked="checked" value="A">A</label>
                                <label class="col-4"><input type="radio" name="choise{{$index}}" value="B">B</label>
                                <label class="col-4"><input type="radio" name="choise{{$index}}" value="C">C</label>
                            </div>
                        </div>
                    </div>
                    @endfor
                    <div style="text-align: center;margin-top: 2em;">
                        <input style="width: 5em;" type="button" value="Add" id="add-part">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection
<div style="display: none;">
    <div id="csrf-name">${_csrf.headerName}</div>
    <div id="csrf-value">${_csrf.token}</div>
    <div id="root-path">{{URL("")}}</div>
    <div id="id-user">1</div>
</div>
<!-- Open modal -->
<button id="my-button" style="display: none;" data-toggle="modal"
        data-target="#myModal">Open modal</button>
<script type="text/javascript"
        src="{{ URL::asset("js/jquery-3.3.1.min.js") }}"></script>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript"
        src="{{URL::asset("js/bootstrap.min.js")}}"></script>
<script type="text/javascript"
        src="{{URL::asset("js/admin_add_part2.js")}}"></script>