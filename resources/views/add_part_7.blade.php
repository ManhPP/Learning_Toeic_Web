@extends('layouts.master')
@section('title','manager add part 7')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/admin_them_part7.css")}}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')

    <!-- body -->
    <div class="body row">
        <div class="row col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 align-center no-padding">
            <div class="label-style">**Tạo đề thi từ ngân hàng câu hỏi (<a target="_blank" style="font-size: 0.9em" href="{{Route("part7paragraphcontroller.getpart7paragraph")}}">Cập nhập ngân hàng câu hỏi!</a>)</div>
            <div class="col-12 time-detail">
                <span>Tiêu đề: </span> <input id="tittle">
            </div>
        </div>

        <!-- part 7 -->
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 7 (40 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <div class="direct">
                        <span class="red">Directions </span>
                        <span>: In this part, you will read a selection of texts, such as magazine and newspaper articles, letters, and advertisements. Each text is followed by several questions. Select the best answer for each question and click on (A), (B), (C), or (D) on your test screen.</span>
                    </div>
                    <div>
                        <div class="type-para" >Đoạn đơn</div>
                        <div class="list-cau1 list-cau" data-type="Đoạn đơn" data-num-ques="0">

                        </div> <!-- end listcau -->

                        <div class="div-choose-para">
                            <img alt="add" id="ico-add1" src="{{URL::asset("imgs/round-add.png")}}">
                        </div>
                    </div>

                    <div class="split">
                    </div>

                    <div>
                        <div class="type-para" >Đoạn kép</div>
                        <div class="list-cau2 list-cau" data-type="Đoạn kép">

                        </div> <!-- end listcau -->

                        <div class="div-choose-para">
                            <img alt="add" id="ico-add2" src="{{URL::asset("imgs/round-add.png")}}">
                        </div>
                    </div>


                    <div style="text-align: center;">
                        <button id="submit-add">Add part</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- chon cau doan don -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-choose-ques1">
        <button type="button" class="btn btn-default" id="btn-input-yes1" style="background-color:coral"
                data-next="false">Ok</button>
        <button type="button" class="btn btn-primary" id="btn-input-no1">Cancel</button>
        <div id="num-para-choose1">
            <span id="num-doan-choose1">0</span>/9 para
        </div>
        <div id="num-ques-choose1">
            <span id="num-cau-choose1">0</span>/28 ques
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
                                <th class="col-12">Câu hỏi(<span id="sum-ques1">{{count($arrDoanDon)}}</span>/<span
                                            id="total-ques1">{{$sumDoanDon}}</span>)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $indexPara=0?>
                            @foreach($arrDoanDon as $doan)
                                <tr class="d-flex row" data-id="{{$doan->id}}">
                                    <td class="col-12">
                                        <input class="checkbox-choose" type="checkbox">
                                        <span class="ques-content">Đoạn văn id {{$doan->id}} - <span
                                                    class="type-part">{{$doan->loaiPart7}} (<span
                                                        class="num-ques">{{count($doan->cauPart7s)}}</span> câu)</span>
											</span>
                                        <img class="expand-ico"
                                             src="${pageContext.request.contextPath}/resources/img/next.png">
                                        <div class="div-append-para hide">
                                            <div class="boundary-para" data-id={{$doan->id}} data-num-ques="{{count($doan->cauPart7s)}}">
                                                <div class="paragrap">
                                                    <img src="{{$doan->doanVan1}}">
                                                    @if(strlen($doan->doanVan2)>0)
                                                        <br>
                                                        <img src="{{$doan->doanVan2}}">
                                                    @endif
                                                </div>
                                                <div class="para" data-id="{{$doan->id}}">
                                                    <?php $index = 1?>
                                                    @foreach($doan->cauPart7s as $cau)
                                                        <?php $checkA = ""?>
                                                        <?php $checkB = ""?>
                                                        <?php $checkC = ""?>
                                                        <?php $checkD = ""?>

                                                            @if($cau->daDung == "A")
                                                                <?php $checkA="checked='checked'"?>
                                                            @endif
                                                            @if($cau->daDung == "B")
                                                                <?php $checkB="checked='checked'"?>
                                                            @endif
                                                            @if($cau->daDung == "C")
                                                                <?php $checkC="checked='checked'"?>
                                                            @endif
                                                            @if($cau->daDung == "D")
                                                                <?php $checkD="checked='checked'"?>
                                                            @endif


                                                        <!-- mot cau -->
                                                        <div class="ques" data-id="{{$cau->id}}" data-asw="{{$cau->daDung}}">
                                                            <div>
                                                                <span class="no-ques">Câu {{$index}}</span> <span
                                                                        class="ques-content">{{$cau->cauHoi}}</span>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-12 col-md-6"><input type="radio"
                                                                                                      name="choose{{$index}}" value="A" {{$checkA}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daA}}</span></label> <label
                                                                        class="col-12 col-md-6"><input type="radio"
                                                                                                       name="choose{{$index}}" value="B" {{$checkB}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daB}}</span></label> <label
                                                                        class="col-12 col-md-6"><input type="radio"
                                                                                                       name="choose{{$index}}" value="C" {{$checkC}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daC}}</span></label> <label
                                                                        class="col-12 col-md-6"><input type="radio"
                                                                                                       name="choose{{$index}}" value="D" {{$checkD}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daD}}</span></label>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                        <?php $index++?>
                                                        @endforeach
                                                </div>
                                            </div>
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

    <!-- chon cau doan kep -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-choose-ques2">
        <button type="button" class="btn btn-default" id="btn-input-yes2" style="background-color:coral"
                data-next="false">Ok</button>
        <button type="button" class="btn btn-primary" id="btn-input-no2">Cancel</button>
        <div id="num-para-choose2">
            <span id="num-doan-choose2">0</span>/4
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
                                <th class="col-12">Câu hỏi(<span id="sum-ques2">{{count($arrDoanKep)}}</span>/<span
                                            id="total-ques2">{{$sumDoanKep}}</span>)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{$indexPara=0}}
                            @foreach($arrDoanKep as $doan)
                                <tr class="d-flex row" data-id="{{$doan->id}}">
                                    <td class="col-12">
                                        <input class="checkbox-choose" type="checkbox">
                                        <span class="ques-content">Đoạn văn id {{$doan->id}} - <span
                                                    class="type-part">{{$doan->loaiPart7}}</span></span>
                                        <img class="expand-ico"
                                             src="${pageContext.request.contextPath}/resources/img/next.png">
                                        <div class="div-append-para hide">
                                            <div class="boundary-para" data-num-ques="5" data-id="{{$doan->id}}">
                                                <div class="paragrap">
                                                    <img src="{{$doan->doanVan1}}">
                                                    @if(strlen($doan))
                                                        <br>
                                                        <img src="{{$doan->doanVan2}}">
                                                    @endif
                                                </div>
                                                <div class="para" data-id="{{$doan->id}}">
                                                    <?php $index=1?>
                                                    @foreach($doan->cauPart7s as $cau)
                                                        <?php $checkA = ""?>
                                                        <?php $checkB = ""?>
                                                        <?php $checkC = ""?>
                                                        <?php $checkD = ""?>

                                                        @if($cau->daDung == "A")
                                                            <?php $checkA="checked='checked'"?>
                                                        @endif
                                                        @if($cau->daDung == "B")
                                                            <?php $checkB="checked='checked'"?>
                                                        @endif
                                                        @if($cau->daDung == "C")
                                                            <?php $checkC="checked='checked'"?>
                                                        @endif
                                                        @if($cau->daDung == "D")
                                                            <?php $checkD="checked='checked'"?>
                                                        @endif

                                                        <!-- mot cau -->
                                                        <div class="ques" data-id="{{$cau->id}}" data-asw="{{$cau->daDung}}">
                                                            <div>
                                                                <span class="no-ques">Câu {{$index}}</span> <span
                                                                        class="ques-content">{{$cau->cauHoi}}</span>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-12 col-md-6"><input type="radio"
                                                                                                      name="choose{{$index}}" value="A" {{$checkA}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daA}}</span></label> <label
                                                                        class="col-12 col-md-6"><input type="radio"
                                                                                                       name="choose{{$index}}" value="B" {{$checkB}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daB}}</span></label> <label
                                                                        class="col-12 col-md-6"><input type="radio"
                                                                                                       name="choose{{$index}}" value="C" {{$checkC}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daC}}</span></label> <label
                                                                        class="col-12 col-md-6"><input type="radio"
                                                                                                       name="choose{{$index}}" value="D" {{$checkD}} disabled="disabled"><span
                                                                            class="asw-content">{{$cau->daD}}</span></label>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                        <?php $index++?>
                                                    @endforeach
                                                </div>
                                            </div>
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
        <div id="style-for-prev">
            <style>
                .paragrap {
                    text-align: center;
                }
                .paragrap img {
                    max-width: 100%;
                    margin-bottom: 2em;
                }
                .para .ques {
                    width: 65%;
                    margin: 0 auto;
                }
                .para .no-ques {
                    border: none;
                    width: 3.5em;
                    height: 1.8em;
                    line-height: 1.8em;
                    text-align: center;
                    margin: 40px auto 5px 1%;
                    border-radius: 10px;
                    background: #c53d1e;
                    color: white;
                    display: inline-block;
                }
                .row {
                    width: 100%;
                    margin: 0;
                }
            </style>
        </div>
    </div>


    <div style="display: none">
        <div id="path-add">{{route('readingpartcontroller.addpart7')}}</div>
        <div id="path-update">{{route('readingpartcontroller.updatepart7')}}</div>
{{--        <div id="path-del">{{route('part7paragraph.delpara')}}</div>--}}
    </div>
@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/admin_them_part7.js") }}"></script>
@endsection