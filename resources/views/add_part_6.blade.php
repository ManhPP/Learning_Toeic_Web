@extends('layouts.master')
@section('title','add part 6 phan doc')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/home_css_part6.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <!-- body -->
    <div class="body row">
        <div
                class="row col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 align-center no-padding">
            <div class="label-style">**Tạo đề thi từ ngân hàng câu hỏi (<a target="_blank" style="font-size: 0.9em" href="{{Route("part6paragraphcontroller.listpart6para")}}">Cập nhập ngân hàng đoạn văn!</a>)</div>
            <div class="col-12 time-detail">
                <span>Tiêu đề: </span> <input id="tittle">
            </div>
        </div>

        <!-- part 6 -->
        <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 6 (12 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <div class="direct">
                        <span class="red">Rerection </span> <span>: A word or
							phrase is missing in each of the sentences below. Four answer
							choices are given below each sentence. Select the best answer to
							complete the sentence. Then click on (A), (B), (C), or (D) on
							your test screen.</span>
                    </div>
                    <div class="list-cau">


                    </div>
                    <!-- them cau -->
                    <div class="div-choise-para">
                        <img alt="add" id="ico-add"
                             src="{{URL::asset("imgs/round-add.png")}}">
                    </div>
                    <div style="text-align: center;">
                        <button id="submit-add">Add part</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- chon cau -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-choise-ques">
        <button type="button" class="btn btn-default" id="btn-input-yes" style="background-color:coral"
                data-next="false">Ok</button>
        <button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
        <div id="num-ques-choise">
            <span id="num-cau-choise">0</span>/4
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
                                <th class="col-12">Câu hỏi(<span id="sum-ques">{{count($arrDoan)}}</span>/<span
                                            id="total-ques">{{$sum }}</span>)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $indexPara = 0 ?>
                                @foreach( $arrDoan as $doan)
                                <tr class="d-flex row" data-id="{{$doan->id }}">
                                    <td class="col-12">
                                        <input class="checkbox-choise" type="checkbox">
                                        <span class="ques-content">Đoạn văn id {{$doan->id }}</span>
                                        <img class="expand-ico"
                                             src="{{URL::asset("imgs/next.png")}}">
                                        <img class="shorten-ico hide"
                                             src="{{URL::asset("imgs/down-arrow.png")}}">

                                        <div class="content-para hide">
                                            <?php $indexQues = 0 ?>
                                            @foreach( $doan->part6 as $cau)
                                                <?php $checkA ='' ?>
                                                <?php $checkB = '' ?>
                                                <?php $checkC = '' ?>
                                                <?php $checkD = '' ?>

                                                @if( $cau->daDung =='A')
                                                    <?php $checkA = 'checked'?>
                                                @endif

                                                @if($cau->daDung == 'B')
                                                    <?php $checkB = 'checked' ?>
                                                @endif

                                                @if($cau->daDung == 'C')
                                                    <?php $checkC = 'checked' ?>
                                                @endif

                                                @if($cau->daDung == 'D')
                                                    <?php $checkD  = 'checked'?>
                                                @endif

                                                <div class="ques" data-asw="{{$cau->daDung }}"
                                                     data-id="{{$cau->id }}">
                                                    <div>
                                                        <span class="no-ques">Câu {{$indexQues +1 }}</span> <span
                                                                class="ques-content">{{$cau->cauHoi }}</span>
                                                    </div>
                                                    <div class="row" data-idpara = "{{$doan->id }}">
                                                        <label class="col-12 col-md-6"><input
                                                                    disabled="disabled" type="radio" name="choise{{$cau->id }}"
                                                                    {{$checkA }}><span class="asw-content">{{$cau->daA }}</span></label>
                                                        <label class="col-12 col-md-6"><input
                                                                    disabled="disabled" type="radio" name="choise{{$cau->id }}"
                                                                    {{$checkB}}><span class="asw-content">{{$cau->daB }}</span></label>
                                                        <label class="col-12 col-md-6"><input
                                                                    disabled="disabled" type="radio" name="choise{{$cau->id }}"
                                                                    {{$checkC }}><span class="asw-content">{{$cau->daC }}</span></label>
                                                        <label class="col-12 col-md-6"><input
                                                                    disabled="disabled" type="radio" name="choise{{$cau->id }}"
                                                                    {{$checkD }}><span class="asw-content">{{$cau->daD }}</span></label>
                                                    </div>
                                                    <hr>
                                                </div>
                                            {{ $indexQues +=1 }}
                                            @endforeach
                                        </div>
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

    <div style="display: none;">
        <div id="path-add">{{Route("readingpartcontroller.addpart6")}}</div>
        <div id="root-path">{{URL("")}}</div>
    </div>
@endsection


@section('footer')
    @parent
    <script src="{{URL::asset("js/admin-add-part6/admin-them-part6.js")}}"></script>
@endsection
