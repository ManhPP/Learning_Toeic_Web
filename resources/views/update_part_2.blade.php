@extends('layouts.master')
@section('title','update part 2')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/admin-update-part2.css")}}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <div class="body row">
        <div class="row">
            <div class="col-12 time-detail">
                <span>Tiêu đề: </span>
                <input id="tittle" value="{{$part2->title}}">
            </div>
        </div>


        <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 2 (30 sentences), *(Admin phải upload tất cả
                    các file và chọn đáp án đúng cho từng câu)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <span>Input audio here</span>
                        <form id="form-upload-audio" data-path="{{$part2->audio}}">
                            <input id="up-audio" type="file" name="audio" accept="audio/*">
                        </form>
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <span>Input image intro here</span>
                        <form class="form-upload-img" data-path="{{$part2->intro}}">
                            <input id="up-img" type="file" name="file-image" accept="image/*">
                        </form>
                    </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                    @php $index = 1  @endphp
                    @foreach($part2->part2 as $cauPart2)
                        {{$checkA = ""}}
                        {{$checkB = ""}}
                        {{$checkC = ""}}
                            @if($cauPart2->dADung == 'A')
                                @php $checkA = "checked='checked'" @endphp
                            @endif
                            @if($cauPart2->dADung == 'B')
                                @php $checkB = "checked='checked'" @endphp
                            @endif
                            @if($cauPart2->dADung == 'C')
                                @php $checkC = "checked='checked'" @endphp
                            @endif
                            <div class="ques" data-asw="{{$cauPart2->dADung}}" data-id="{{$cauPart2->id}}" id="q{{$index}}">
                                <div class="no-ques">Câu {{$index }}</div>
                                <div class="tick col-12 col-sm-10 row">
                                    <label class="col-3"><input type="radio" name="choise-{{$index }}" value="A" {{$checkA }}>A</label>
                                    <label class="col-3"><input type="radio" name="choise-{{$index }}" value="B" {{$checkB }}>B</label>
                                    <label class="col-3"><input type="radio" name="choise-{{$index }}" value="C" {{$checkC }}>C</label>
                                </div>
                            </div>
                            @php $index++ @endphp
                        @endforeach

                        <div style="text-align: center;margin-top: 2em;">
                            <input style="width: 5em;" type="button" value="Update" id="add-part">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Open modal -->
<button id="my-button" style="display: none;" data-toggle="modal"
		data-target="#myModal">Open modal</button>
	<div style="display: none;">
		<div id="path-update">{{Route("part2controller.update")}}</div>
		<div id="root-path">{{URL("")}}</div>
		<div id="id-user">${acc.id }</div>
		<div id="id-part">{{$part2->id}}</div>
	</div>
@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/admin-update-part2.js") }}"></script>
@endsection