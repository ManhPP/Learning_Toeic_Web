@extends('layouts.master')
@section('title','update part 5')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/admin_update_part5/admin_update_part5.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    
<div style="position: relative; top: 6em">
	
    <div class="row col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 align-center no-padding">
        <div class="label-style">**Update part 5 (<a target="_blank" style="font-size: 0.9em" href="{{Route("part5controller.index")}}">Cập nhập ngân hàng câu hỏi!</a>)</div>
        <div class="col-12 time-detail">
            <span>Tiêu đề: </span> <input id="tittle" value = "{{ $partDoc->title }}">
        </div>
    </div>

    <!-- part 5 -->
    <div
        class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
        <div class="header-content">
            <div>Practic part 5 (40 sentences)</div>
        </div>
        <div class="content">
            <div class="p1">
                <div class="direct">
                    <span class="red">Rerection </span> <span>: A word or phrase
                        is missing in each of the sentences below. Four answer choices are
                        given below each sentence. Select the best answer to complete the
                        sentence. Then click on (A), (B), (C), or (D) on your test screen.</span>
                </div>
                <div class="list-cau">
                    <div id="list-to-add">
                        <?php $index = 0 ?>
                        @foreach($partDoc->cauPart5s as $cau)
                            <?php $checkA = "";?>
                            <?php $checkB = "";?>
                            <?php $checkC = "";?>
                            <?php $checkD = "";?>
                            @if($cau->daDung == "A")
                                <?php $checkA="checked='checked'";?>
                            @endif
                            @if($cau->daDung == "B")
                                <?php $checkB="checked='checked'";?>
                            @endif
                            @if($cau->daDung == "C")
                                <?php $checkC="checked='checked'";?>
                            @endif
                            @if($cau->daDung == "D")
                                <?php $checkD="checked='checked'";?>
                            @endif

                            <!-- mot cau -->
                            <div class="ques one-ques" data-asw="{{ $cau->dADung }}" data-id="{{ $cau->id }}">
                                <div>
                                    <span class="no-ques">Câu {{ $index+1 }}</span> <span
                                        class="ques-content">{{ $cau->cauHoi }}</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"> <input type="radio" disabled="disabled"
                                        name="choise{{ $index }}" value="A" {{ $checkA }}>{{ $cau->daA }}
                                    </label> <label class="col-12 col-md-6"> <input type="radio" disabled="disabled"
                                        name="choise{{ $index }}" value="B" {{ $checkB }}>{{ $cau->daB }}
                                    </label> <label class="col-12 col-md-6"> <input type="radio" disabled="disabled"
                                        name="choise{{ $index }}" value="C" {{ $checkC }}>{{ $cau->daC }}
                                    </label> <label class="col-12 col-md-6"> <input type="radio" disabled="disabled"
                                        name="choise{{ $index }}" value="D" {{ $checkD }}>{{ $cau->daD }}
                                    </label>
                                </div>
                                <div class="align-right">
                                    <img class="ico-modified ico-del" alt="minus"
                                        src="{{ URL::asset("imgs/round-minus.png") }}">
                                </div>
                                <hr>
                            </div>
                            @php $index += 1 @endphp
                        @endforeach
                    </div>

                    <div class="ques">
                        <div class="align-right">
                            <img class="ico-modified" id="ico-add" alt="add"
                                src="{{ URL::asset("imgs/round-add.png") }}">
                        </div>
                        <hr>
                    </div>
                    <div style="text-align: center;">
                        <button id="submit">Update part 5</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- chon cau -->
<div class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true"
    id="model-choise-ques">
    <button type="button" class="btn btn-default" id="btn-input-yes"
        data-next="false" style="background-color: coral;">Ok</button>
    <button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
    <div id="num-ques-choise">
        <span id="num-cau-choise">0</span>/40
    </div>
    <div class="modal-dialog"
        style="top: 2em; max-width: 100%; width: 65em;">
        <div class="modal-content" id="modal-content-iques">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Chọn câu hỏi</h4>
            </div>
            <div class="modal-body">
                <div class="justify-content-center col-12 main-table">
                    <table class="table table-bordered" style="min-width: 400px">
                        <thead class="thead-dark">
                            <tr class="d-flex">
                                <th class="col-12">Câu hỏi(<span id="sum-ques">{{ count($arrCau) }}</span>/<span
                                    id="total-ques">{{ $sum }}</span>)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1 ?>
                            @foreach($arrCau as $cau)
                                <?php $checkA = "" ?>
                                <?php $checkB = "" ?>
                                <?php $checkC = "" ?>
                                <?php $checkD = "" ?>
                                @if($cau->dADung == 'A')
                                    @php $checkA = "checked = 'checked'" @endphp
                                @endif
                                @if($cau->dADung == 'B')
                                    @php $checkB = "checked = 'checked'" @endphp
                                @endif
                                @if($cau->dADung == 'C')
                                    @php $checkC = "checked = 'checked'" @endphp
                                @endif
                                @if($cau->dADung == 'D')
                                    @php $checkD = "checked = 'checked'" @endphp
                                @endif
                                <tr class="d-flex" data-id="{{ $cau->id  }}">
                                    <td class="col-12"><input type="checkbox"
                                        class="choise-ques-add"> <span class="content-ques">{{ $cau->cauHoi }}</span>
                                        <img class="expand-ico"
                                        src="{{ URL::asset("imgs/next.png") }}">
                                        <img class="shorten-ico hide"
                                        src="{{ URL::asset("imgs/down-arrow.png") }}">
                                        <div class="div-da hide">
                                            <hr>
                                            <div>
                                                <b>Đáp án</b>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 col-md-6"> <input
                                                    disabled="disabled" type="radio" name="choise-{{$index}}"
                                                    value="A" {{ $checkA }}> <span>{{ $cau->daA }}</span>
                                                </label> <label class="col-12 col-md-6"> <input
                                                    disabled="disabled" type="radio" name="choise-{{$index}}"
                                                    value="B" {{ $checkB }}> <span>{{ $cau->daB }}</span>
                                                </label> <label class="col-12 col-md-6"> <input
                                                    disabled="disabled" type="radio" name="choise-{{$index}}"
                                                    value="C" {{ $checkC }}> <span>{{ $cau->daC }}</span>
                                                </label> <label class="col-12 col-md-6"> <input
                                                    disabled="disabled" type="radio" name="choise-{{$index}}"
                                                    value="D" {{ $checkD }}> <span>{{ $cau->daD }}</span>
                                                </label>
                                            </div>
                                        </div></td>
                                </tr>
                                @php $index += 1 @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" id="btn-input-yes"
                    data-next="false">Ok</button>
                <button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
            </div> -->
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
		<div id='path-update'>
			{{ Route('readingpartcontroller.update') }}
        </div>
        <div id="id-part">{{ $partDoc->id }}</div>
	</div>


@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/admin_update_part5/admin_update_part5.js") }}"></script>
@endsection	