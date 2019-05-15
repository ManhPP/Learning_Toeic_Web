@extends('layouts.master')
@section('title','manager para part 7')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/manager_para_part7.css")}}">
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
                    <th class="col-12">Câu hỏi(<span id="sum-ques">{{count($arrDoan)}}</span>/<span
                                id="total-ques">{{$sum}}</span>)
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $indexPara = 0  ?>
                @foreach($arrDoan as $doan)
                    <tr class="d-flex row" data-id="{{$doan->id }}">
                        <td class="col-12"><img class="ico-forward"
                                                src="{{URL::asset("imgs/forward-arrow.png")}}">
                            <span class="ques-content">Đoạn văn id {{$doan->id }} - <span
                                        class="type-part">{{$doan->loaiPart7 }}</span></span>
                            <div class="controll-ques">
                                <span class="btn-update" data-id="{{$doan->id }}">update</span> <span>•</span>
                                <span class="btn-del" data-id="{{$doan->id }}">delete</span>
                            </div> <img class="expand-ico"
                                        src="{{URL::asset("imgs/next.png")}}">


                            <div class="div-append-para hide">
                                <div>
                                    <div class="paragrap">
                                        <img src="{{$doan->doanVan1 }}">
                                        @if(strlen($doan->doanVan2) > 0)
                                            <br>
                                            <img src="{{$doan->doanVan2 }}">
                                        @endif
                                    </div>
                                    <div class="para" data-id="{{$doan->id }}">
                                    <?php $index = 1  ?>
                                    @foreach($doan->cauPart7s as $cau)
                                        <?php $checkA = ""?>
                                        <?php $checkB = ""?>
                                        <?php $checkC = ""?>
                                        <?php $checkD = ""?>
                                        @if($cau->daDung == 'A')
                                            <?php $checkA = "checked='checked'"?>
                                        @endif
                                        @if($cau->daDung == 'B')
                                            <?php $checkB = "checked='checked'"?>
                                        @endif
                                        @if($cau->daDung == 'C')
                                            <?php $checkC = "checked='checked'"?>
                                        @endif
                                        @if($cau->daDung == 'D')
                                            <?php $checkD = "checked='checked'"?>
                                        @endif
                                        <!-- mot cau -->
                                            <div class="ques" data-id="{{$cau->id}}" data-asw="{{$cau->daDung}}">
                                                <div>
                                                    <span class="no-ques">Câu {{$index }}</span> <span
                                                            class="ques-content">{{$cau->cauHoi }}</span>
                                                </div>
                                                <div class="row">
                                                    <label class="col-12 col-md-6"><input type="radio"
                                                                                          name="choise{{$index }}" value="A" {{$checkA }} disabled="disabled"><span
                                                                class="asw-content">{{$cau->daA }}</span></label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                                                           name="choise{{$index }}" value="B" {{$checkB }} disabled="disabled"><span
                                                                class="asw-content">{{$cau->daB }}</span></label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                                                           name="choise{{$index }}" value="C" {{$checkC }} disabled="disabled"><span
                                                                class="asw-content">{{$cau->daC }}</span></label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                                                           name="choise{{$index }}" value="D" {{$checkD }} disabled="disabled"><span
                                                                class="asw-content">{{$cau->daD }}`</span></label>
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
    <img src="{{URL::asset("imgs/add.png")}}"
         id="ico-add-ques">

    <!-- nhap noi dung cau -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-input-ques">
        <div class="modal-dialog" style="top: 5em">
            <div class="modal-content" id="modal-content-iques">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Nhập đoạn văn part 7 (nhập <span id="max-ques">2-</span>5 câu)
                    </h4>
                    <div class="type-para">
                        <span class="label-type">Loại đoạn văn: </span> <label><input
                                    value="1" type="radio" name="type-para" checked="checked">Đoạn
                            đơn</label> <label><input value="2" type="radio" name="type-para">Đoạn
                            kép</label>
                    </div>
                </div>
                <div class="modal-body">

                    <div class="label-style col-12">
                        **Thêm ngân hàng đoạn văn (câu <span class="ques-in-para">1</span>)
                        <div class="input-para">
                            <div>
                                <span>Đoạn văn 1: </span>
                                <form id="form-up-img1" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input name="file-image" class="upload-para" type="file"
                                           accept="image/*">
                                </form>
                            </div>
                            <div id="div-num-ques">
                                <span>Nhập số câu: </span> <select id="select-num-ques">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="hide" id="form-upload2">
                                <span>Đoạn văn 2: </span>
                                <form id="form-up-img2" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input name="file-image" class="upload-para" type="file" accept="image/*">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="div-ques" data-index="1">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-input-asw1" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw1" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw1" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw1" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="2">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-input-asw2" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw2" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw2" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw2" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="3">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-input-asw3" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw3" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw3" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw3" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>

                    <div class="div-ques hide" data-index="4">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-input-asw4" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw4" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw4" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw4" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="5">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-input-asw5" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw5" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw5" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-input-asw5" value="D">D: <input
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
                            <li class="page-item pagination-input hide" data-page="3"><span
                                        class="page-link">3</span></li>
                            <li class="page-item pagination-input hide" data-page="4"><span
                                        class="page-link">4</span></li>
                            <li class="page-item pagination-input hide" data-page="5"><span
                                        class="page-link">5</span></li>
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
                    <h4 class="modal-title" id="myModalLabel">Update đoạn văn part 7</h4>
                </div>
                <div class="modal-body">

                    <div class="label-style col-12">
                        **Update ngân hàng đoạn văn (câu <span class="ques-in-para">1</span>)
                        <div class="input-para">
                            <div>
                                <span>Đoạn văn 1: </span>
                                <form id="form-update-img1">
                                    <input name="file-image" class="upload-para" type="file"
                                           accept="image/*">
                                </form>
                            </div>
                            <div id="form-update2">
                                <span>Đoạn văn 2: </span>
                                <form id="form-update-img2">
                                    <input name="file-image" class="upload-para" type="file"
                                           accept="image/*">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="div-ques" data-index="1">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
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
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
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
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
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

                    <div class="div-ques hide" data-index="4">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-asw4" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw4" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw4" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw4" value="D">D: <input
                                            class="input-asw"></label>
                            </div>
                        </div>
                    </div>
                    <div class="div-ques hide" data-index="5">
                        <div class="col-12">
                            <div class="red">*Câu hỏi:</div>
                            <textarea class="full-width ques1-input" rows="3"
                                      placeholder="Nhập câu hỏi tại đây"></textarea>
                            <div class="red">*Trả lời:</div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio"
                                                                      name="choise-asw5" value="A" checked="checked">A: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw5" value="B">B: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw5" value="C">C: <input
                                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                                            type="radio" name="choise-asw5" value="D">D: <input
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
                            <li class="page-item pagination-input" data-page="4"><span
                                        class="page-link">4</span></li>
                            <li class="page-item pagination-input" data-page="5"><span
                                        class="page-link">5</span></li>
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

    <!-- preview -->
    <!-- update -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-preview-ques">
        <div class="modal-dialog"
             style="top: 5em; width: 65em; max-width: 100%">
            <div class="modal-content" id="modal-content-update"
                 ; style="width: 65em; max-width: 100%">
                <div class="modal-header">
                    <h4 class="modal-title">Preview paragraph</h4>
                </div>
                <div class="modal-body">


                </div>

            </div>
        </div>
    </div>

    <div style="display: none">
        <div id="path-upload">{{route('part7paragraph.upload')}}</div>
        <div id="path-add">{{route('part7paragraph.add')}}</div>
        <div id="path-update">{{route('part7paragraph.update')}}</div>
        <div id="path-del">{{route('part7paragraph.delpara')}}</div>
        <div id="root-path">
            {{URL("")}}
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/manager_para_part7.js") }}"></script>
@endsection