@extends('layouts.master')
@section('title','them bai kiem tra')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/admin_them_bkt/admin_them_bkt.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    
	<!-- body -->
	<div class="body row">
            <div
                class="row col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 align-center no-padding">
                <div class="label-style">**Tạo đề thi từ ngân hàng câu hỏi</div>
                <div class="col-12 time-detail">
                    <span>Tiêu đề: </span> <input id="tittle">
                    <form id="form-upload-audio" style="margin-top: 2em">
                        <span>Audio: </span><input id="up-audio" type="file" name="audio" accept="audio/*">
                    </form>
                </div>
            </div>
    
            <!-- BKT -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
                <div class="header-content">
                    <div>Bài kiểm tra</div>
                </div>
                <div class="content">
                    <div class="choose-part row">
                        @for($index=1;$index<=7;$index++)
                        
                            <div class="boundary-choose col-8 col-sm-6 col-md-4 col-xl-3" id="div{{ $index }}">
                                <div class="boundary-div-choose">
                                    <div class="div-choose" data-part="{{ $index }}">
                                        <img alt="add" src="{{ URL::asset("imgs/admin-them-bkt/add.png") }}">
                                    </div>
                                    <div class="lb-choose">
                                        Chọn part {{ $index }}
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div style="text-align: center;">
                    <button id="submit-add">Thêm bài kiểm tra</button>
                </div>
            </div>
    
        </div>
    
        <!-- chon part1 -->
        <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true"
            id="modal-choose-part1" data-part="1">
            <button type="button" class="btn btn-yes btn-default" style="background-color:coral" id="btn-input-yes1" data-next="false">Ok</button>
            <button type="button" class="btn btn-cancle btn-primary" id="btn-input-no1">Cancel</button>
            <div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Chọn part</h4>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center col-12 main-table">
                            <table class="table table-bordered" style="min-width: 400px">
                                <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-12">Part 1(<span id="sum-ques">{{ count($listPart1) }}</span>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display:none">
                                        {{ $index = 1 }}
                                    </div>
                                    
                                    @foreach($listPart1 as $part1)                                    
                                        <tr class="d-flex" data-id="{{ $part1->id }}">
                                            <td class="col-12">
                                                <a href="{{URL("guest/luyen-nghe",$part1->id)}}" target="_blank">
                                                    <input type="checkbox" class="choose-ques-add">
                                                    <span class="content-ques">{{ $part1->title }} (id {{ $part1->id }})</span>
                                                    <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- chon part2 -->
        <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true"
            id="modal-choose-part2" data-part="2">
            <button type="button" class="btn btn-yes btn-default" id="btn-input-yes2" style="background-color:coral" data-next="false">Ok</button>
            <button type="button" class="btn btn-cancle btn-primary" id="btn-input-no2">Cancel</button>
            <div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Chọn part</h4>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center col-12 main-table">
                            <table class="table table-bordered" style="min-width: 400px">
                                <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-12">Part 2(<span id="sum-ques">{{ count($listPart2) }}</span>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <div style="display:none">
                                                {{ $index = 1 }}
                                        </div>
                                            
                                        @foreach($listPart2 as $part2) 
                                        <tr class="d-flex" data-id="{{ $part2->id }}">
                                            <td class="col-12">
                                                <a href="{{URL("guest/luyen-nghe",$part2->id)}}" target="_blank">
                                                    <input type="checkbox" class="choose-ques-add">
                                                    <span class="content-ques">{{ $part2->title }} (id {{ $part2->id }})</span>
                                                    <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
        <!-- chon part3 -->
        <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true"
            id="modal-choose-part3" data-part="3">
            <button type="button" class="btn btn-yes btn-default" id="btn-input-yes3" style="background-color:coral" data-next="false">Ok</button>
            <button type="button" class="btn btn-cancle btn-primary" id="btn-input-no3">Cancel</button>
            <div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Chọn part</h4>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center col-12 main-table">
                            <table class="table table-bordered" style="min-width: 400px">
                                <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-12">Part 3(<span id="sum-ques">{{ count($listPart3) }}</span>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display:none">
                                            {{ $index = 1 }}
                                    </div>
                                        
                                    @foreach($listPart3 as $part3) 
                                        <tr class="d-flex" data-id="{{ $part3->id }}">
                                            <td class="col-12">
                                                <a href="{{URL("guest/luyen-nghe",$part3->id)}}" target="_blank">
                                                    <input type="checkbox" class="choose-ques-add">
                                                    <span class="content-ques">{{ $part3->title }} (id {{ $part3->id }})</span>
                                                    <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
        <!-- chon part4 -->
        <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true"
            id="modal-choose-part4" data-part="4">
            <button type="button" class="btn btn-yes btn-default" id="btn-input-yes4" style="background-color:coral" data-next="false">Ok</button>
            <button type="button" class="btn btn-cancle btn-primary" id="btn-input-no4">Cancel</button>
            <div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Chọn part</h4>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center col-12 main-table">
                            <table class="table table-bordered" style="min-width: 400px">
                                <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-12">Part 4(<span id="sum-ques">{{ count($listPart4) }}</span>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display:none">
                                            {{ $index = 1 }}
                                    </div>
                                        
                                    @foreach($listPart4 as $part4)
                                    
                                        <tr class="d-flex" data-id="{{ $part4->id }}">
                                            <td class="col-12">
                                                <a href="{{URL("guest/luyen-nghe",$part4->id)}}" target="_blank">
                                                    <input type="checkbox" class="choose-ques-add">
                                                    <span class="content-ques">{{ $part4->title }} (id {{ $part4->id }})</span>
                                                    <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
        <!-- chon part5 -->
        <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true"
            id="modal-choose-part5" data-part="5">
            <button type="button" class="btn btn-yes btn-default" id="btn-input-yes5" style="background-color:coral" data-next="false">Ok</button>
            <button type="button" class="btn btn-cancle btn-primary" id="btn-input-no5">Cancel</button>
            <div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Chọn part</h4>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center col-12 main-table">
                            <table class="table table-bordered" style="min-width: 400px">
                                <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-12">Part 5(<span id="sum-ques">{{ count($listPart5) }}</span>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display:none">
                                            {{ $index = 1 }}
                                    </div>
                                        
                                    @foreach($listPart5 as $part5)
                                        <tr class="d-flex" data-id="{{ $part5->id }}">
                                            <td class="col-12">
                                                <a href="{{URL("guest/luyen-nghe",$part5->id)}}" target="_blank">
                                                    <input type="checkbox" class="choose-ques-add">
                                                    <span class="content-ques">{{ $part5->title }} (id {{ $part5->id }})</span>
                                                    <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
        <!-- chon part6 -->
        <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true"
            id="modal-choose-part6" data-part="6">
            <button type="button" class="btn btn-yes btn-default" id="btn-input-yes6" style="background-color:coral" data-next="false">Ok</button>
            <button type="button" class="btn btn-cancle btn-primary" id="btn-input-no6">Cancel</button>
            <div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Chọn part</h4>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center col-12 main-table">
                            <table class="table table-bordered" style="min-width: 400px">
                                <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-12">Part 6(<span id="sum-ques">{{ count($listPart6) }}</span>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display:none">
                                            {{ $index = 1 }}
                                    </div>
                                        
                                    @foreach($listPart6 as $part6)
                                        <tr class="d-flex" data-id="{{ $part6->id }}">
                                            <td class="col-12">
                                                <a href="{{URL("guest/luyen-nghe",$part6->id)}}" target="_blank">
                                                    <input type="checkbox" class="choose-ques-add">
                                                    <span class="content-ques">{{ $part6->title }} (id {{ $part6->id }})</span>
                                                    <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
        <!-- chon part7 -->
        <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true"
            id="modal-choose-part7" data-part="7">
            <button type="button" class="btn btn-yes btn-default" id="btn-input-yes7" style="background-color:coral" data-next="false">Ok</button>
            <button type="button" class="btn btn-cancle btn-primary" id="btn-input-no7">Cancel</button>
            <div class="modal-dialog" style="top: 2em;max-width: 100%;width: 65em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Chọn part</h4>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center col-12 main-table">
                            <table class="table table-bordered" style="min-width: 400px">
                                <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-12">Part 7(<span id="sum-ques">{{ count($listPart7) }}</span>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display:none">
                                            {{ $index = 1 }}
                                    </div>
                                        
                                    @foreach($listPart7 as $part7)
                                        <tr class="d-flex" data-id="{{ $part7->id }}">
                                            <td class="col-12">
                                                <a href="{{URL("guest/luyen-nghe",$part7->id)}}" target="_blank">
                                                    <input type="checkbox" class="choose-ques-add">
                                                    <span class="content-ques">{{ $part7->title }} (id {{ $part7->id }})</span>
                                                    <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
            <div id='path-add'>
                {{ Route('testcontroller.add') }}
            </div>
        </div>
    
@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/admin_them_bkt/admin_them_bkt.js") }}"></script>
@endsection	