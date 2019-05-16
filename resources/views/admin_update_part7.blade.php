@extends('layouts.master')
@section('title','manager update part 7')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/admin_update_part7.css")}}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')


    <div class="body row">
        <!-- part 7 -->
        <div class="row col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 align-center no-padding">
            <div class="label-style">**Update part7 (<a target="_blank" style="font-size: 0.9em" href="{{Route("part7paragraphcontroller.getpart7paragraph")}}">Cập nhập ngân hàng đoạn văn!</a>)</div>
            <div class="col-12 time-detail">
                <span>Tiêu đề: </span> <input id="tittle" value="{{$partDoc->title}}">
            </div>
        </div>
        <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div style="padding-left: 1em">Practic part 7 (40 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <div class="direct">
                        <span class="red">Directions </span> <span>: In this part,
							you will read a selection of texts, such as magazine and newspaper
							articles, letters, and advertisements. Each text is followed by
							several questions. Select the best answer for each question and
							click on (A), (B), (C), or (D) on your test screen.</span>
                    </div>

                    <div class="list-cau">
                        <!-- cho doan don -->
                        <div class="list-cau1" data-type="Đoạn đơn">
                            <div class="type-para">Đoạn đơn</div>
                            <?php $index = 1;?>
                            @foreach($partDoc->part7Paragraphs as $doan)
                                @if(strlen($doan->doanVan2)==0)
                                    <div data-id="{{$doan->id}}" class="boundary-para" data-num-ques="{{count($doan->cauPart7s)}}">
                                        <p class="ques refer-ques">Questions <span class="begin">{{$index}}</span>-<span class="end">{{$index+ count($doan->cauPart7s)-1}}</span> refer to the
                                            following conversation.</p>
                                        <div class="paragrap">
                                            <img src="{{URL::asset($doan->doanVan1)}}">
                                        </div>
                                        @foreach($doan->cauPart7s as $cau)

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

                                            <div class="ques" data-asw="{{$cau->daDung}}" data-id="{{$cau->id}}">
                                                <div>
                                                    <span class="no-ques">Câu {{$index}}</span> <span class="ques-content">{{$cau->cauHoi}}</span>
                                                </div>
                                                <div class="row">
                                                    <label class="col-12 col-md-6"><input type="radio" disabled='disabled'
                                                                                          name="choose{{$index}}a" value="A" {{$checkA}}><span class="asw-content">{{$cau->daA}}</span></label> <label class="col-12 col-md-6"><input
                                                                type="radio" disabled="disabled" name="choose{{$index}}a" value="B" {{$checkB}}><span class="asw-content">{{$cau->daB}}</span></label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                                                           disabled='disabled' name="choose{{$index}}a" value="C" {{$checkC}}><span class="asw-content">{{$cau->daC}}</span></label> <label class="col-12 col-md-6"><input
                                                                type="radio" disabled='disabed' name="choose{{$index}}a" value="D" {{$checkD}}><span class="asw-content">{{$cau->daD}}</span></label>
                                                </div>
                                                <hr>
                                            </div>
                                            <?php $index++;?>
                                            @endforeach
                                        <div class="align-right" style="width: 65%; margin: 0 auto">
                                            <img class="ico-modified ico-del" alt="minus" data-idpara="{{$doan->id}}" src="{{ URL::asset("imgs/round-minus.png") }}">
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        </div>
                        <div class="align-right" style="margin: 0 auto; margin-right: 2em; margin-top: 2em">
                            <img class="ico-modified" id="ico-add1" data-idpara="{{$doan->id}}" alt="add" src="{{URL::asset("imgs/round-add.png")}}">
                        </div>

                        <div class="split">
                        </div>

                        <div class="list-cau2" data-type="Đoạn kép">
                            <div class="type-para">Đoạn kép</div>
                            <!-- cho doan kep -->
                            <?php $index = 1;?>
                            @foreach($partDoc->part7Paragraphs as $doan)
                                @if(strlen($doan->doanVan2)>0)
                                    <div data-id="{{$doan->id}}" class="boundary-para" data-num-ques="{{count($doan->cauPart7s)}}">
                                        <p class="ques refer-ques">Questions <span class='begin'>{{$index}}</span>-<span class='end'>{{$index + count($doan->cauPart7s) -1}}</span> refer to the
                                            following conversation.</p>
                                        <div class="paragrap">
                                            <img src="{{URL::asset($doan->doanVan1)}}">
                                            <img src="{{URL::asset($doan->doanVan2)}}">
                                        </div>

                                        @foreach($doan->cauPart7s as $cau)
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

                                            <div class="ques" data-asw="{{$cau->daDung}}$" data-id="{{$cau->id}}">
                                                <div>
                                                    <span class="no-ques">Câu {{$index}}</span> <span class="ques-content">{{$cau->cauHoi}}</span>
                                                </div>
                                                <div class="row">
                                                    <label class="col-12 col-md-6"><input type="radio"
                                                                                          name="choose{{$index}}b" disabled='disabled' {{$checkA}}
                                                                                          value="A"><span class="asw-content">{{$cau->daA}}</span></label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                                                           name="choose{{$index}}b" disabled='disabled' {{$checkB}}
                                                                                           value="B"><span class="asw-content">{{$cau->daB}}</span></label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                                                           name="choose{{$index}}b" disabled='disabled' {{$checkC}}
                                                                                           value="C"><span class="asw-content">{{$cau->daC}}</span></label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                                                           name="choose{{$index}}b" disabled='disabled' {{$checkD}}
                                                                                           value="D"><span class="asw-content">{{$cau->daD}}</span></label>
                                                </div>
                                                <hr>
                                            </div>
                                            <?php $index++;?>
                                        @endforeach
                                        <div class="align-right" style="width: 65%; margin: 0 auto">
                                            <img class="ico-modified ico-del" dara-idpara="{{$doan->id}}" alt="minus" data-idpara="{{$doan->id}}" src="{{URL::asset("imgs/round-minus.png")}}">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="align-right" style="margin: 0 auto; margin-right: 2em; margin-top: 2em">
                            <img class="ico-modified" id="ico-add2" alt="add" src="{{URL::asset("imgs/round-add.png")}}">
                        </div>

                        <div style="text-align: center;">
                            <button id="submit">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- chon cau doan don -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-choose-ques1">
        <button type="button" class="btn btn-default" id="btn-input-yes1"
                data-next="false" style="background-color: coral;">Ok</button>
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
                            <?php $indexPara=0;?>
                            @foreach($arrDoanDon as $doan)
                                <tr class="d-flex row" data-id="{{$doan->id}}">
                                    <td class="col-12">
                                        <input class="checkbox-choose" type="checkbox">
                                        <span class="ques-content">Đoạn văn id {{$doan->id}} - <span
                                                    class="type-part">{{$doan->loaiPart}}(<span
                                                        class="num-ques">{{ count($doan->cauPart7s)}}</span> câu)</span>
											</span>
                                        <img class="expand-ico"
                                             src="{{URL::asset("imgs/next.png")}}">
                                        <div class="div-append-para hide">
                                            <div class="boundary-para" data-id={{$doan->id}} data-num-ques="{{count($doan->cauPart7s)}}">
                                                <div class="paragrap">
                                                    <img src="{{URL::asset($doan->doanVan1)}}">
                                                    @if(strlen($doan->doanVan2)>0)
                                                        <br>
                                                        <img src="{{URL::asset($doan->doanVan2)}}">
                                                    @endif
                                                </div>
                                                <div class="para" data-id="{{$doan->id}}">
                                                    <?php $index=1;?>
                                                    @foreach($doan->cauPart7s as $cau)
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
                                                        <?php $index++;?>
{{--                                                    </c:forEach>--}}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
{{--                            </c:forEach>--}}
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
        <button type="button" class="btn btn-default" id="btn-input-yes2"
                data-next="false" style="background-color: coral;">Ok</button>
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
                            <?php $indexPara = 0;?>
                            @foreach($arrDoanKep as $doan)
                                <tr class="d-flex row" data-id="{{$doan->id}}">
                                    <td class="col-12">
                                        <input class="checkbox-choose" type="checkbox">
                                        <span class="ques-content">Đoạn văn id {{$doan->id}} - <span
                                                    class="type-part">{{$doan->loaiPart7}}</span></span>
                                        <img class="expand-ico"
                                             src="{{URL::asset("imgs/next.png")}}">
                                        <div class="div-append-para hide">
                                            <div class="boundary-para" data-num-ques="5" data-id="{{$doan->id}}">
                                                <div class="paragrap">
                                                    <img src="{{URL::asset($doan->doanVan1)}}">
                                                    @if(strlen($doan->doanVan2)>0)
                                                        <br>
                                                        <img src="{{URL::asset($doan->doanVan2)}}">
{{--                                                    </c:if>--}}
                                                    @endif
                                                </div>
                                                <div class="para" data-id="{{$doan->id}}">
                                                    <?php $index = 1;?>
                                                    @foreach($doan->cauPart7s as $cau)

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
                                                        <?php $index++;?>
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

    <div style="display: none">
        <div id="path-update">{{Route("readingpartcontroller.updatepart7")}}</div>
        <div id="id-path">{{$partDoc->id}}</div>
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

@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/admin_update_part7.js") }}"></script>
@endsection