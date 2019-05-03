@extends('layouts.master')
@section('title','add part 6')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/home_css_part6.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <div class="body row">
        <div
                class="row col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 align-center no-padding">
            <div class="label-style">**Tạo đề thi từ ngân hàng câu hỏi</div>
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
                        <!--
                                                mot cau
                                                <p class="ques refer-ques">Questions 1-3 refer to the
                                                    following conversation.</p>
                                                <div class="ques">
                                                    <div>
                                                        <span class="no-ques">Câu 1</span> <span>Please let me
                                                            take this opportunity to introduce myself as the
                                                            newly.....(141).....sales agent for GK Trading Company. </span>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-12 col-md-6"><input type="radio"
                                                            name="choise">A: appointed</label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                            name="choise">B: appointing</label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                            name="choise">C: appoint</label> <label class="col-12 col-md-6"><input
                                                            type="radio" name="choise">D: appointment</label>
                                                    </div>
                                                    <hr>
                                                </div>
                                                mot cau
                                                <div class="ques">
                                                    <div>
                                                        <span class="no-ques">Câu 2</span> <span>As I have joined
                                                            the company recently, I went.....(142).....our records and
                                                            found that you are one of our most valuable customers.</span>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-12 col-md-6"><input type="radio"
                                                            name="choise">A: with</label> <label class="col-12 col-md-6"><input
                                                            type="radio" name="choise">B: into</label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                            name="choise">C: through</label> <label class="col-12 col-md-6"><input
                                                            type="radio" name="choise">D: over</label>
                                                    </div>
                                                    <hr>
                                                </div>
                                                mot cau
                                                <div class="ques">
                                                    <div>
                                                        <span class="no-ques">Câu 3</span> <span>As an initiative
                                                            to a growing business relationship that will benefit both of
                                                            us, I will be pleased to visit you in your office at your
                                                            convenience in order to understand about your company and this
                                                            will enable me to.....(143).....you with a better service. I
                                                            could also introduce our new products to you.I wish to call in
                                                            your office, and I want to make the appointment as I am looking
                                                            forward to meeting you personally. Yours sincerely, Praveen
                                                            Kumar.</span>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-12 col-md-6"><input type="radio"
                                                            name="choise">A: give</label> <label class="col-12 col-md-6"><input
                                                            type="radio" name="choise">B: provide</label> <label
                                                            class="col-12 col-md-6"><input type="radio"
                                                            name="choise">C: award</label> <label class="col-12 col-md-6"><input
                                                            type="radio" name="choise">D: deliver</label>
                                                    </div>
                                                    <hr>
                                                </div> -->
                    </div>
                    <!-- them cau -->
                    <div class="div-choise-para">
                        <img alt="add" id="ico-add"
                             src="${pageContext.request.contextPath}/resources/img/round-add.png">
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
        <button type="button" class="btn btn-default" id="btn-input-yes"
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
                                <th class="col-12">Câu hỏi(<span id="sum-ques">${fn:length(arrDoan) }</span>/<span
                                            id="total-ques">${sum }</span>)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            <c:set var="indexPara" value="0" />--}}
{{--                            <c:forEach items="${arrDoan }" var="doan">--}}
{{--                                <tr class="d-flex row" data-id="${doan.id }">--}}
{{--                                    <td class="col-12">--}}
{{--                                        <input class="checkbox-choise" type="checkbox">--}}
{{--                                        <span class="ques-content">Đoạn văn id ${doan.id }</span>--}}
{{--                                        <img class="expand-ico"--}}
{{--                                             src="${pageContext.request.contextPath}/resources/img/next.png">--}}
{{--                                        <img class="shorten-ico hide"--}}
{{--                                             src="${pageContext.request.contextPath}/resources/img/down-arrow.png">--}}

{{--                                        <div class="content-para hide">--}}
{{--                                            <c:set var="indexQues" value="0" />--}}
{{--                                            <c:forEach items="${doan.listCauPart6 }" var="cau">--}}
{{--                                                <c:set var="checkA" value="" />--}}
{{--                                                <c:set var="checkB" value="" />--}}
{{--                                                <c:set var="checkC" value="" />--}}
{{--                                                <c:set var="checkD" value="" />--}}
{{--                                                <c:choose>--}}
{{--                                                    <c:when test="${cau.daDung=='A' }">--}}
{{--                                                        <c:set var="checkA" value="checked='checked'" />--}}
{{--                                                    </c:when>--}}
{{--                                                    <c:when test="${cau.daDung=='B' }">--}}
{{--                                                        <c:set var="checkB" value="checked='checked'" />--}}
{{--                                                    </c:when>--}}
{{--                                                    <c:when test="${cau.daDung=='C' }">--}}
{{--                                                        <c:set var="checkC" value="checked='checked'" />--}}
{{--                                                    </c:when>--}}
{{--                                                    <c:when test="${cau.daDung=='D' }">--}}
{{--                                                        <c:set var="checkD" value="checked='checked'" />--}}
{{--                                                    </c:when>--}}
{{--                                                </c:choose>--}}

{{--                                                <div class="ques" data-asw="${cau.daDung }"--}}
{{--                                                     data-id="${cau.id }">--}}
{{--                                                    <div>--}}
{{--                                                        <span class="no-ques">Câu ${indexQues+1 }</span> <span--}}
{{--                                                                class="ques-content">${cau.cauHoi }</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row" data-idpara = "${doan.id }">--}}
{{--                                                        <label class="col-12 col-md-6"><input--}}
{{--                                                                    disabled="disabled" type="radio" name="choise${cau.id }"--}}
{{--                                                                    ${checkA }><span class="asw-content">${cau.daA }</span></label>--}}
{{--                                                        <label class="col-12 col-md-6"><input--}}
{{--                                                                    disabled="disabled" type="radio" name="choise${cau.id }"--}}
{{--                                                                    ${checkB }><span class="asw-content">${cau.daB }</span></label>--}}
{{--                                                        <label class="col-12 col-md-6"><input--}}
{{--                                                                    disabled="disabled" type="radio" name="choise${cau.id }"--}}
{{--                                                                    ${checkC }><span class="asw-content">${cau.daC }</span></label>--}}
{{--                                                        <label class="col-12 col-md-6"><input--}}
{{--                                                                    disabled="disabled" type="radio" name="choise${cau.id }"--}}
{{--                                                                    ${checkD }><span class="asw-content">${cau.daD }</span></label>--}}
{{--                                                    </div>--}}
{{--                                                    <hr>--}}
{{--                                                </div>--}}
{{--                                                <c:set var="indexQues" value="${indexQues+1 }" />--}}
{{--                                            </c:forEach>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            </c:forEach>--}}
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

@endsection

@section('footer')
    @parent
@endsection