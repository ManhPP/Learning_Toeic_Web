@extends('layouts.master')
@section('title','add part 4')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part2home-css.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/swiper.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part3.css") }}">--}}
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <br/>
    <br/>
    <br/>
    <div class="body row">
        <div class="row">
            <div class="col-12 time-detail">
                <span>Tiêu đề: </span> <input id="tittle">
            </div>
        </div>

        <!-- part 3 -->
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 4 (30 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <span>Input audio here</span>
                        <form id="form-upload-audio">
                            <input id="up-audio" type="file" name="audio" accept="audio/*">
                        </form>
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <span>Input image intro here</span>
                        <form class="form-upload-img">
                            <input id="up-img" type="file" name="file-image" accept="image/*">
                        </form>
                    </div>
                    <hr>
                    <!-- list cau hoi -->
{{--                    <div class="list-cau">--}}
{{--                        <c:forEach var="index" begin="0" end="29">--}}
{{--                            <c:if test="${index%3==0 }">--}}
{{--                                <div class="block" data-index="${index }">--}}
{{--                                    <p class="ques refer-ques">Questions ${index+1 }-${index+3 } refer to the following conversation.</p>--}}
{{--                            </c:if>--}}
{{--                            <div class="ques" data-index="${index }">--}}
{{--                                <div>--}}
{{--                                    <span class="no-ques">Câu ${index+1 }</span>--}}
{{--                                    <span class="ques-content"></span>--}}
{{--                                    <span><img class="ico-edit" data-index="${index }" src="${pageContext.request.contextPath}/resources/img/edit.png"></span>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <label class="col-12 col-md-6"><input type="radio" name="choise${index }" value="A"><span class="asws">A: </span></label>--}}
{{--                                    <label class="col-12 col-md-6"><input type="radio" name="choise${index }" value="B"><span class="asws">B: </span></label>--}}
{{--                                    <label class="col-12 col-md-6"><input type="radio" name="choise${index }" value="C"><span class="asws">C: </span></label>--}}
{{--                                    <label class="col-12 col-md-6"><input type="radio" name="choise${index }" value="D"><span class="asws">D: </span></label>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                            </div>--}}
{{--                            </c:if test="${index%3==2 }">--}}
{{--                    </div>--}}
{{--                    </c:if>--}}
{{--                    </c:forEach>--}}
{{--                    <div style="text-align: center;margin-top: 2em;">--}}
{{--                        <input style="width: 5em;" type="button" value="Add" id="add-part">--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    </div>



@endsection

@section('footer')
    @parent
@endsection