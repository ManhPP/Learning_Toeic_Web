@extends('layouts.master')
@section('title','update testing')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/admin_update_bkt.css") }}">
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
                <span>Tiêu đề: </span> <input id="tittle" value="{{$bkt->title}}">
                <form id="form-upload-audio" style="margin-top: 2em" data-path="{{$bkt->audio}}">
                    <span>Audio: </span><input id="up-audio" type="file" name="audio" accept="audio/*">
                </form>
            </div>
        </div>

        @php $part1 = ""@endphp
        @php $part2 = ""@endphp
        @php $part3 = ""@endphp
        @php $part4 = ""@endphp
        @php $part5 = ""@endphp
        @php $part6 = ""@endphp
        @php $part7 = ""@endphp

        @foreach($bkt->listeningParts as $partNghe)
            @if($partNghe->loaiPart == "Part 1")
               <div style="display: none">{{$part1 = $partNghe }}</div>
            @endif
            @if($partNghe->loaiPart == "Part 2")
               <div style="display: none">{{$part2 = $partNghe }}</div>
            @endif
            @if($partNghe->loaiPart == "Part 3")
               <div style="display: none">{{$part3 = $partNghe }}</div>
            @endif
            @if($partNghe->loaiPart == "Part 4")
               <div style="display: none">{{$part4 = $partNghe }}</div>
            @endif
        @endforeach
        @foreach($bkt->readingParts as $partDoc)
            @if($partDoc->loaiPart == "Part 5")
               <div style="display: none">{{$part5 = $partDoc }}</div>
            @endif
            @if($partDoc->loaiPart == "Part 6")
               <div style="display: none">{{$part6 = $partDoc }}</div>
            @endif
            @if($partDoc->loaiPart == "Part 7")
               <div style="display: none">{{$part7 = $partDoc }}</div>
            @endif
        @endforeach

        <!-- BKT -->
        <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div style="padding-left: 1em>Bài kiểm tra</div>
            </div>
            <div class="content">
                <div class="choose-part row">
                     @for($index=1; $index<=7; $index++)
                        @php $temp="" @endphp
                        @php $loaiPart = "nghe" @endphp
                            @if($index==1)
                                <div style="display: none">
                                    {{$temp=$part1}}
                                </div>
                            @endif
                            @if($index==2)
                                <div style="display: none">
                                    {{$temp=$part2}}
                                </div>
                            @endif
                            @if($index==3)
                                <div style="display: none">
                                    {{$temp=$part3}}
                                </div>
                            @endif
                            @if($index==4)
                                <div style="display: none">
                                    {{$temp=$part4}}
                                </div>
                            @endif
                            @if($index==5)
                                <div style="display: none">
                                    {{$temp=$part5}}
                                    {{$loaiPart = "doc"}}
                                </div>
                            @endif
                            @if($index==6)
                                <div style="display: none">
                                    {{$temp=$part6}}
                                    {{$loaiPart = "doc"}}
                                </div>
                            @endif
                            @if($index==7)
                                <div style="display: none">
                                    {{$temp=$part7}}
                                    {{$loaiPart = "doc"}}
                                </div>
                            @endif
                        <div class="boundary-choose col-8 col-sm-6 col-md-4 col-xl-3" id="div{{$index}}">
                            <div class="boundary-div-choose hide">
                                <div class="div-choose" data-part="{{$index}}">
                                    <img alt="add" src="/imgs/admin-them-bkt/add.png">
                                </div>
                                <div class="lb-choose">
                                    Chọn part {{$index}}
                                </div>
                            </div>
                            <div class="div-part" data-part="{{$index}}">
                                <div class="part-name">PART {{$index}}</div>
                                <div class="part-detail">
                                    <div class="part-title">{{$temp->title}}</div>
                                    <div class="controll row">
                                        <div class="col-6">
                                            @if($loaiPart == 'doc')
                                                <a target="_blank" href="{{Route("readingpartcontroller.practicepartdoc")}}?id={{$temp->id}}">
                                                    <div class="ctrl-btn btn-view">View</div>
                                                </a>
                                            @else
                                                <a target="_blank" href="{{Route("listeningpartcontroller.practicepartnghe")}}?id={{$temp->id}}">
                                                    <div class="ctrl-btn btn-view">View</div>
                                                </a>
                                            @endif

                                        </div>
                                        <div class="col-6">
                                            <div class="ctrl-btn btn-remove" data-part="{{$index}}" data-id="{{$temp->id}}">Remove</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endfor
                </div>
            </div>
            <div style="text-align: center;">
                <button id="submit-add">Update bài kiểm tra</button>
            </div>
        </div>

    </div>

    <!-- chon part1 -->
    <div class="modal fade modal-choose-part" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="modal-choose-part1" data-part="1">
        <button type="button" class="btn btn-yes btn-default" id="btn-input-yes1" style="background-color: coral;" data-next="false">Ok</button>
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
                                <th class="col-12">Part 1(<span id="sum-ques">{{count($listPart1)}}</span>)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index=1 @endphp
                            @foreach($listPart1 as $part1)
                                <tr class="d-flex" data-id="{{$part1->id}}">
                                    <td class="col-12">
                                        <a href="{{Route("listeningpartcontroller.practicepartnghe")}}?id={{$part1->id}}" target="_blank">
                                            <input type="checkbox" class="choose-ques-add">
                                            <span class="content-ques">{{$part1->title}} (id {{$part1->id}})</span>
                                            <img class="expand-ico" src="/imgs/next.png">
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
        <button type="button" class="btn btn-yes btn-default" style="background-color: coral;" id="btn-input-yes2" data-next="false">Ok</button>
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
                                <th class="col-12">Part 2(<span id="sum-ques">{{count($listPart2)}}</span>/)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index=1 @endphp
                            @foreach($listPart2 as $part2)
                                <tr class="d-flex" data-id="{{$part2->id}}">
                                    <td class="col-12">
                                        <a href="{{Route("listeningpartcontroller.practicepartnghe")}}?id={{$part2->id}}" target="_blank">
                                            <input type="checkbox" class="choose-ques-add">
                                            <span class="content-ques">{{$part2->title}} (id {{$part2->id}})</span>
                                            <img class="expand-ico" src="/imgs/next.png">
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
        <button type="button" class="btn btn-yes btn-default" style="background-color: coral;"  id="btn-input-yes3" data-next="false">Ok</button>
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
                                <th class="col-12">Part 3(<span id="sum-ques">{{count($listPart3)}}</span>)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index=1 @endphp
                            @foreach($listPart3 as $part3)
                                <tr class="d-flex" data-id="{{$part3->id}}">
                                    <td class="col-12">
                                        <a href="{{Route("listeningpartcontroller.practicepartnghe")}}?id={{$part3->id}}" target="_blank">
                                            <input type="checkbox" class="choose-ques-add">
                                            <span class="content-ques">{{$part3->title}} (id {{$part3->id}})</span>
                                            <img class="expand-ico" src="/imgs/next.png">
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
        <button type="button" class="btn btn-yes btn-default" style="background-color: coral;" id="btn-input-yes4" data-next="false">Ok</button>
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
                                <th class="col-12">Part 4(<span id="sum-ques">{{count($listPart4)}}</span>)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index=1 @endphp
                            @foreach($listPart4 as $part4)
                                <tr class="d-flex" data-id="{{$part4->id}}">
                                    <td class="col-12">
                                        <a href="{{Route("listeningpartcontroller.practicepartnghe")}}?id={{$part4->id}}" target="_blank">
                                            <input type="checkbox" class="choose-ques-add">
                                            <span class="content-ques">{{$part4->title}} (id {{$part4->id}})</span>
                                            <img class="expand-ico" src="/imgs/next.png">
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
        <button type="button" class="btn btn-yes btn-default" style="background-color: coral;" id="btn-input-yes5" data-next="false">Ok</button>
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
                                <th class="col-12">Part 5(<span id="sum-ques">{{count($listPart5)}}</span>)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index = 1 @endphp
                            @foreach($listPart5 as $part5)
                                <tr class="d-flex" data-id="{{$part5->id}}">
                                    <td class="col-12">
                                        <a href="{{Route("readingpartcontroller.practicepartdoc")}}?id={{$part5->id}}" target="_blank">
                                            <input type="checkbox" class="choose-ques-add">
                                            <span class="content-ques">{{$part5->title}} (id {{$part5->id}})</span>
                                            <img class="expand-ico" src="/imgs/next.png">
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
        <button type="button" class="btn btn-yes btn-default" style="background-color: coral;" id="btn-input-yes6" data-next="false">Ok</button>
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
                                <th class="col-12">Part 6(<span id="sum-ques">{{count($listPart6)}}</span>)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index = 1 @endphp
                            @foreach($listPart6 as $part6)
                                <tr class="d-flex" data-id="{{$part6->id}}">
                                    <td class="col-12">
                                        <a href="{{Route("readingpartcontroller.practicepartdoc")}}?id={{$part6->id}}" target="_blank">
                                            <input type="checkbox" class="choose-ques-add">
                                            <span class="content-ques">{{$part6->title}} (id {{$part6->id}})</span>
                                            <img class="expand-ico" src="/imgs/next.png">
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
        <button type="button" class="btn btn-yes btn-default" style="background-color: coral;" id="btn-input-yes7" data-next="false">Ok</button>
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
                                <th class="col-12">Part 7(<span id="sum-ques">{{count($listPart7)}}</span>)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index = 1 @endphp
                            @foreach($listPart7 as $part7)
                                <tr class="d-flex" data-id="{{$part7->id}}">
                                    <td class="col-12">
                                        <a href="{{Route("readingpartcontroller.practicepartdoc")}}?id={{$part7->id}}" target="_blank">
                                            <input type="checkbox" class="choose-ques-add">
                                            <span class="content-ques">{{$part7->title}} (id {{$part7->id}})</span>
                                            <img class="expand-ico" src="/imgs/next.png">
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
    <div style="display: none">
        <div id="path-update">{{Route("testcontroller.update")}}</div>
        <div id="id-bkt">{{$bkt->id}}</div>
    </div>

@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/admin_update_bkt.js") }}"></script>
@endsection	