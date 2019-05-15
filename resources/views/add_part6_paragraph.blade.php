@extends('layouts.master')
@section('title','add part para 6')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/home_css_part6.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <!-- body -->
    <div class="body row">
        <!-- TABLE -->
        <div class="justify-content-center col-12 main-table">
            <table class="table table-bordered" style="min-width: 400px">
                <thead class="thead-dark">
                <tr class="d-flex">
                    <th class="col-12">Câu hỏi(<span id="sum-ques">{{count($arrDoan) }}</span>/<span
                                id="total-ques">{{$sum }}</span>)
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php $indexPara = 0 ?>
                @foreach($arrDoan as $doan)

                    <tr class="d-flex row" data-id="{{$doan->id }}">

                        <td class="col-12">
                            <img class="ico-forward" src="{{URL::asset("imgs/forward-arrow.png")}}">

                            <span class="ques-content"> Đoạn văn id {{$doan->id }}</span>
                            <div class="controll-ques">
                                <span class="btn-update" data-id="{{ $doan->id }}">update</span>
                                <span>•</span>
                                <span class="btn-del" data-id="{{ $doan->id }}">delete</span>
                            </div>
                            <img class="expand-ico" src="{{URL::asset("imgs/next.png")}}">
                            <img class="shorten-ico hide" src="{{URL::asset("imgs/down-arrow.png")}}">

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
                                            <?php $checkB = 'checked'?>
                                    @endif

                                        @if($cau->daDung == 'C')
                                            <?php $checkC = 'checked'?>
                                        @endif

                                        @if($cau->daDung == 'D')
                                            <?php $checkD = 'checked'?>
                                        @endif

                                    <div class="ques" data-asw="{{$cau->daDung }}" data-id="{{$cau->id }}">
                                        <div>
                                            <span class="no-ques">Câu {{$indexQues+1 }}</span>
                                            <span class="ques-content">{{$cau->cauHoi }}</span>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$cau->id }}" {{$checkA }}><span class="asw-content">{{$cau->daA }}</span></label>
                                            <label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$cau->id }}" {{$checkB }}><span class="asw-content">{{$cau->daB }}</span></label>
                                            <label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$cau->id }}" {{$checkC }}><span class="asw-content">{{$cau->daC }}</span></label>
                                            <label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$cau->id }}" {{$checkD }}><span class="asw-content">{{$cau->daD }}</span></label>
                                        </div>
                                        <hr>
                                    </div>
                                    <?php $indexQues +=1 ?>
                                @endforeach
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <img src="{{URL::asset("imgs/round-add.png")}}"
             id="ico-add-ques">
    </div>


    <!-- nhap noi dung cau -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-input-ques">
        <div class="modal-dialog" style="top: 5em">
            <div class="modal-content" id="modal-content-iques">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Nhập đoạn văn part 6
                        (nhập 3 câu)</h4>
                </div>
                <div class="modal-body">

                    <div class="label-style col-12">
                        **Thêm ngân hàng đoạn văn (câu <span class="ques-in-para">1</span>)
                    </div>

                    <div class="div-ques" data-index="1">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Phần thứ nhất của câu hỏi"></textarea>
                            <textarea class="full-width ques2-input" rows="3"
                                      placeholder="Phần thứ hai của câu hỏi"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-asw1" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw1" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw1" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw1" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="2">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Phần thứ nhất của câu hỏi"></textarea>
                            <textarea class="full-width ques2-input" rows="3"
                                      placeholder="Phần thứ hai của câu hỏi"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-asw2" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw2" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw2" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw2" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="3">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Phần thứ nhất của câu hỏi"></textarea>
                            <textarea class="full-width ques2-input" rows="3"
                                      placeholder="Phần thứ hai của câu hỏi"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-asw3" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw3" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw3" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw3" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <ul class="pagination"
                            style="justify-content: center; margin-top: 2em">
                            <li class="page-item active pagination-input" data-page="1"><span
                                        class="page-link">1</span></li>
                            <li class="page-item pagination-input" data-page="2"><span
                                        class="page-link">2</span></li>
                            <li class="page-item pagination-input" data-page="3"><span
                                        class="page-link">3</span></li>
                        </ul>
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btn-input-yes"
                            data-next="false">Ok</button>
                    <button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- update -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-update-ques">
        <div class="modal-dialog" style="top: 5em">
            <div class="modal-content" id="modal-content-update">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update đoạn văn part
                        6</h4>
                </div>
                <div class="modal-body">

                    <div class="label-style col-12">
                        **Update ngân hàng đoạn văn (câu <span class="ques-in-para">1</span>)
                    </div>

                    <div class="div-ques" data-index="1">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Phần thứ nhất của câu hỏi"></textarea>
                            <textarea class="full-width ques2-input" rows="3"
                                      placeholder="Phần thứ hai của câu hỏi"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-up1" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up1" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up1" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up1" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="2">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Phần thứ nhất của câu hỏi"></textarea>
                            <textarea class="full-width ques2-input" rows="3"
                                      placeholder="Phần thứ hai của câu hỏi"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-up2" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up2" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up2" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up2" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="3">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Phần thứ nhất của câu hỏi"></textarea>
                            <textarea class="full-width ques2-input" rows="3"
                                      placeholder="Phần thứ hai của câu hỏi"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-up3" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up3" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up3" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-up3" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <ul class="pagination"
                            style="justify-content: center; margin-top: 2em">
                            <li class="page-item active pagination-input" data-page="1"><span
                                        class="page-link">1</span></li>
                            <li class="page-item pagination-input" data-page="2"><span
                                        class="page-link">2</span></li>
                            <li class="page-item pagination-input" data-page="3"><span
                                        class="page-link">3</span></li>
                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btn-update-yes"
                            data-next="false">Ok</button>
                    <button type="button" class="btn btn-primary" id="btn-update-no">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none">
        <div id="path-add">{{Route("part6paragraphcontroller.add")}}</div>
        <div id="path-delete">{{Route("part6paragraphcontroller.delete")}}</div>
        <div id="path-update">{{Route("part6paragraphcontroller.update")}}</div>
    </div>
@endsection


@section('footer')
    @parent
    <script src="{{URL::asset("js/admin-manager-doan-part6/admin-manager-doan-part6.js")}}"></script>
@endsection
