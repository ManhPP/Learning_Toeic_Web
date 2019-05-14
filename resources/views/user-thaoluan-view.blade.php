@extends('layouts.master')
@section('title',"View discussion")
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/user-thaoluan-view/user-thaoluan-view.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')

    <!-- body -->
    <div id="data-id-btl" style="display: none;">{{$btl->id }}</div>
    <div id="data-id-acc" style="display: none;">{{$userLogin->id }}</div>
    <div class="body row" style="margin-top: 55px">
        <div class="content-discus col-12 col-md-10">
            <div id="tittle">{{$btl->tieuDe }}</div>
            <hr>
            <div class="cont">
                <div class="ques" id="noi-dung-btl">{!! $btl->noiDung !!}</div>
                <div class="own-ques">
                    <p>
                        @if(isset($userLogin))
                            @if($btl->account->id != $userLogin->id)
                                {{$btl->account->hoTen }} · <span class="reply-comment-color btn-report" data-id="{{$btl->id }}" data-type="rpbtl">Report</span>
                            @endif
                            @if($btl->account->id == $userLogin->id)
                                {{$btl->account->hoTen }} · <span class="reply-comment-color" id="update-btl">Update</span>
                            @endif
                        @else
                            {{$btl->account->hoTen }}
                        @endif


                    </p>
                </div>
                <div id="tittle-asw">
                    <span class="no-select">Answer</span>
                </div>

                <div class="div-cmt row">
					<textarea type="text" class="add-cmt col-12"
                              placeholder="Thêm bình luận" data-lev="lev1" data-btl="{{$btl->id }}"></textarea>
                </div>
                <div
                        style="padding: 30px 20px 5px 15px; font-size: 1.2em; font-weight: bold;">Bình
                    luận</div>
                <div class="asw">

                    <div class="user-asw">
                        <?php $index =0 ?>
                            @foreach($btl->comment as $cmt)
                            <div class="user-aswlv1">
                                <div class="asw-info">
                                    <span class="pointer">{{$cmt->account->hoTen }}</span> · <span
                                            class="reply-comment-color btn-report pointer" data-id="{{$cmt->id }}" data-type="rpcmt">Report</span>
                                    @isset($userLogin)
                                        @if($userLogin->id == $cmt->account->id)
                                            <span class="more-action">··· <span
                                                        class="span-list-action hide"> <img class="triangle"
                                                                                            src="{{URL::asset("imgs/triangle.png")}}" />
                                                    <div class="action-choise" data-cmt="{{$cmt->id }}"
                                                         data-cmt-lev="lev1">
                                                        <div class="update">Chỉnh sửa.</div>
                                                        <div class="del">Xóa.</div>
                                                    </div>
                                            </span>
                                            </span>
                                        @endif
                                        @if($userLogin->id != $cmt->account->id)
                                            @if($userLogin->hasRole == 'ROLE_ADMIN')
                                                <span class="more-action">··· <span
                                                            class="span-list-action hide"> <img class="triangle"
                                                                                                src="{{URL::asset("imgs/triangle.png")}}" />
                                                        <div class="action-choise" data-cmt="{{$cmt->id }}"
                                                             data-cmt-lev="lev1">
                                                            <div class="del">Xóa.</div>
                                                        </div>
                                                </span>
                                                </span>
                                            @endif
                                        @endif
                                    @endisset

                                </div>
                                <div class="asw-content" data-cmt="{{$cmt->id }}">{{$cmt->noiDung }}</div>
                                <div class="reply-comment-color reply-comment-size no-select">
									<span class="reply pointer" data-cmt="{{$cmt->id }}">Trả
										lời<span> · </span>
									</span> <span class="show-more pointer" data-cmt="{{$cmt->id }}">Các
										bình luận(<span class="num-rep" data-cmt="{{$cmt->id }}">{{$listSumReply[$index]}}</span>)
									</span>

                                </div>
                            </div>
                            <div class="user-aswlv2">
                                <div class="rep-outer" data-cmt="{{$cmt->id }}"></div>
                                <div class="rep-cmt-controll" data-cmt="{{$cmt->id }}">
									<span class="show-more no-select hide"
                                          style="margin-bottom: 2px" data-cmt="{{$cmt->id }}"
                                          data-show-lev="lev2">Show more · </span> <span
                                            class="pointer btn-hide hide" data-cmt="{{$cmt->id }}">Hide</span>
                                    <div class="div-cmt row">
										<textarea type="text" class="add-cmt col-12 hide"
                                                  placeholder="Thêm bình luận" data-cmt="{{$cmt->id }}"
                                                  data-lev="lev2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php $index +=1 ?>
                        @endforeach
                    </div>

                    <!-- pagination -->
                    {{--<fmt:formatNumber var="numPage" value="${numCmt/10}"--}}
                                      {{--maxFractionDigits="0" />--}}
                    {{--<c:if test="${numCmt>(numPage*10) }">--}}
                        {{--<c:set var="numPage" value="${numPage+1 }" />--}}
                    {{--</c:if>--}}

                    {{--<c:set var="curPage" value="0" />--}}
                    {{--<c:if test="${numCmt>0 }">--}}
                        {{--<c:set var="curPage" value="1" />--}}
                    {{--</c:if>--}}
                    {{--<ul class="pagination"--}}
                        {{--style="justify-content: center; margin-top: 20px; padding-top: 3em"--}}
                        {{--data-max-page="${numPage }">--}}
                        {{--<li class="page-item" id="pre"><span class="page-link"><</span></li>--}}
                        {{--<c:forEach var="i" begin="1" end="${numPage }">--}}
                            {{--<!-- add class active cho pagation day tien -->--}}
                            {{--<c:set var="cls" value="" />--}}
                            {{--<c:if test="${i==1 }">--}}
                                {{--<c:set var="cls" value="active" />--}}
                            {{--</c:if>--}}
                            {{--<!-- them dau 3... -->--}}
                            {{--<c:if test="${(i==2)}">--}}
                                {{--<li class="page-item hide more" id="first"><span--}}
                                            {{--class="page-link">...</span></li>--}}
                            {{--</c:if>--}}
                            {{--<c:if test="${(i==numPage) and (numPage>6)}">--}}
                                {{--<li class="page-item more" id="last"><span--}}
                                            {{--class="page-link">...</span></li>--}}
                            {{--</c:if>--}}
                            {{--<!-- an ca pagation phai sau -->--}}
                            {{--<c:set var="hi" value="" />--}}
                            {{--<c:if test="${(i!=numPage) and (i>5) }">--}}
                                {{--<c:set var="hi" value="hide" />--}}
                            {{--</c:if>--}}
                            {{--<li class="page-num page-item ${cls } ${hi}" data-page="${i }"><span--}}
                                        {{--class="page-link">${i }</span></li>--}}
                        {{--</c:forEach>--}}
                        {{--<li class="page-item" id="ne"><span class="page-link">></span></li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
    </div>


    <!-- nhap so trang -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-input-page">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Input page</h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="input-number"
                           placeholder="Input page' number"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btn-input-yes">Ok</button>
                    <button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div id="cur-page" style="display: none">1</div>
    <!-- modal login -->
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


    <!-- them message repory -->
    <div class="modal fade" id="mesage-report">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title">REPORT MESSAGE</h4>
                </div>

                <div class="modal-body">
                    <div class="container-fluid " class="row">
                        <form>
                            <div style="text-align: center; padding-top: 2em">
                                <input id="input-report" placeholder="Thông tin report..."
                                       class="col-12" type="text">
                            </div>
                            <div style="text-align: center; padding-top: 4em">
                                <input id="btn-report" class="col-6" type="button" value="Report now"
                                       style="height: 3em; background-color: rgb(210, 32, 32); color: white">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none;" id="root-path">{{URL("")}}</div>
    <form action="{{route('discussionController.indexUpdate')}}" id="req-form-update" method="get">
        <div style="display: none;">
            <input name="id" value='{{$btl->id }}'>
            <div id="id-user">{{$userLogin->id }}</div>
            {{--<input name="noiDung" value='{{$btl->noiDung }}'>--}}
            {{--<input name="tieuDe" value='{{$btl->tieuDe }}'>--}}
        </div>
    </form>
    <!-- Open modal -->
    <button type="button" id="btn-messreport" style="display: none;"
            data-toggle="modal" data-target="#mesage-report">Open modal</button>



@endsection

@section("footer")
    @parent
@endsection

@section("js")
    <script type="text/javascript"
            src="{{URL::asset("js/wow.min.js")}}"></script>
    <script type="text/javascript" src="{{URL::asset("js/user-thaoluan-view/user-thaoluan-view.js")}}"></script>

@endsection