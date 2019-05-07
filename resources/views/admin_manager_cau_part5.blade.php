@extends('layouts.master')
@section('title','manage sentence in part 5')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/admin_manager_cau_part5/admin_manager_cau_part5.css") }}">
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
                    <th class="col-12">Câu hỏi(<span id="sum-ques">{{ count($arrCau) }}</span>/<span id="total-ques">{{ $sum }}</span>)</th>
                </tr>
            </thead>
            <tbody>
                {{-- <c:set var="index" value="1"/> --}}
                {{$index = 1 }}
                {{-- <c:forEach items="${arrCau }" var="cau"> --}}
                    @foreach($arrCau as $cau)
                    {{-- <c:set var="checkA" value=""/>
                    <c:set var="checkB" value=""/>
                    <c:set var="checkC" value=""/>
                    <c:set var="checkD" value=""/> --}}
                    {{ $checkA = "" }}
                    {{ $checkB = "" }}
                    {{ $checkC = "" }}
                    {{ $checkD = "" }}
                    {{-- <c:choose>
                        <c:when test="${cau.dADung=='A' }">
                            <c:set var="checkA" value="checked='checked'"/>
                        </c:when>
                        <c:when test="${cau.dADung=='B' }">
                            <c:set var="checkB" value="checked='checked'"/>
                        </c:when>
                        <c:when test="${cau.dADung=='C' }">
                            <c:set var="checkC" value="checked='checked'"/>
                        </c:when>
                        <c:when test="${cau.dADung=='D' }">
                            <c:set var="checkD" value="checked='checked'"/>
                        </c:when>
                                </c:choose>			 --}}

                    
                    @if($cau->dADung == 'A')
                        {{ $checkA = "checked = 'checked'" }}
                    @endif
                    @if($cau->dADung == 'B')
                        {{ $checkB = "checked = 'checked'" }}
                    @endif
                    @if($cau->dADung == 'C')
                        {{ $checkC = "checked = 'checked'" }}
                    @endif
                    @if($cau->dADung == 'D')
                        {{ $checkD = "checked = 'checked'" }}
                    @endif

                    {{-- <tr class="d-flex" data-id="${cau.id }"> --}}
                        <tr class="d-flex" data-id="{{ $cau->id  }}">
                        <td class="col-12"><img class="ico-forward"
                            src="{{ URL::asset("imgs/forward-arrow.png") }}">
                            <span class="content-ques">{{ $cau->cauHoi }}</span>
                            <div class="controll-ques">
                                <span class="btn-update" data-id="{{ $cau->id }}">update</span>
                                <span>•</span>
                                <span class="btn-del" data-id="{{ $cau->id }}">delete</span>
                            </div> 
                            <img class="expand-ico" src="{{ URL::asset("imgs/next.png") }}">
                            <img class="shorten-ico hide" src="{{ URL::asset("imgs/down-arrow.png") }}">
                            <div class="div-da hide">
                                <hr>
                                <div>
                                    <b>Đáp án</b>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6">
                                        <input disabled="disabled" type="radio" name="choise-{{ $index }}" value="A" {{ $checkA }} >
                                        <span>{{ $cau->daA }}</span>
                                    </label>
                                    <label class="col-12 col-md-6">
                                        <input disabled="disabled" type="radio" name="choise-{{ $index }}" value="B" {{ $checkB }}>
                                        <span>{{ $cau->daB }}</span>
                                    </label>
                                    <label class="col-12 col-md-6">
                                        <input disabled="disabled" type="radio" name="choise-{{ $index }}" value="C" {{ $checkC }}>
                                        <span>{{ $cau->daC }}</span>
                                    </label>
                                    <label class="col-12 col-md-6">
                                        <input disabled="disabled" type="radio" name="choise-{{ $index }}" value="D" {{ $checkD }}>
                                        <span>{{ $cau->daD }}</span>
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {{-- <c:set var="index" value="${index+1 }"/> --}}
                    {{ $index += 1 }}
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<img src="{{ URL::asset("imgs/add.png") }}"
    id="ico-add-ques">

<!-- nhap noi dung cau -->
<div class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true"
    id="model-input-ques">
    <div class="modal-dialog" style="top: 5em">
        <div class="modal-content" id="modal-content-iques">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nhập câu hỏi</h4>
            </div>
            <div class="modal-body">

                <div class="label-style col-12">**Thêm ngân hàng câu hỏi</div>
                <div class="col-12">
                    <div class="red">*Câu hỏi:</div>
                    <textarea id="ques1-input" class="full-width" rows="3"
                        placeholder="Phần thứ nhất của câu hỏi"></textarea>
                    <textarea id="ques2-input" class="full-width" rows="3"
                        placeholder="Phần thứ hai của câu hỏi"></textarea>
                    <div class="red">*Trả lời:</div>
                    <div class="row">
                        <label class="col-12 col-md-6"><input type="radio"
                            name="choise-asw" value="A" checked="checked">A: <input
                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                            type="radio" name="choise-asw" value="B">B: <input
                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                            type="radio" name="choise-asw" value="C">C: <input
                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                            type="radio" name="choise-asw" value="D">D: <input
                            class="input-asw"></label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="btn-input-yes"
                    data-next="false">Ok</button>
                <button type="button" class="btn" id="btn-input-oan">Ok
                    and next</button>
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
        <div class="modal-content" id="modal-content-iques">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nhập câu hỏi</h4>
            </div>
            <div class="modal-body">

                <div class="label-style col-12">**Update câu hỏi</div>
                <div class="col-12">
                    <div class="red">*Câu hỏi:</div>
                    <textarea id="ques1-update" class="full-width" rows="3"
                        placeholder="Phần thứ nhất của câu hỏi"></textarea>
                    <textarea id="ques2-update" class="full-width" rows="3"
                        placeholder="Phần thứ hai của câu hỏi"></textarea>
                    <div class="red">*Trả lời:</div>
                    <div class="row">
                        <label class="col-12 col-md-6"><input type="radio"
                            name="choise-asw-up" value="A" checked="checked">A: <input
                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                            type="radio" name="choise-asw-up" value="B">B: <input
                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                            type="radio" name="choise-asw-up" value="C">C: <input
                            class="input-asw"></label> <label class="col-12 col-md-6"><input
                            type="radio" name="choise-asw-up" value="D">D: <input
                            class="input-asw"></label>
                    </div>
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

<div style="display: None">
    <div id='path-add'>
        {{ Route('part5controller.add') }}
    </div>
    <div id='path-update'>
        {{ Route('part5controller.update') }}
    </div>
    <div id='path-delete'>
        {{ Route('part5controller.delete') }}
    </div>
</div>

@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/admin_manager_cau_part5/admin_manager_cau_part5.js") }}"></script>
@endsection