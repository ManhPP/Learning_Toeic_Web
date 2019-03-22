@extends("layouts.master")

@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/viewPost.css")}}">
@endsection

@section("tittle","View post")

@section("navbar")
    @parent
@endsection

@section("content")
    <div id="data-id-btl" style="display: none;">1</div>
    <div class="body row" style="margin-top: 55px">
        <div class="content-discus col-12 col-md-10">
            <div id="tittle">Đây là tiêu đề mới</div>
            <hr>
            <div class="cont">
                <div class="ques" id="noi-dung-btl">
                    Đây là nội dung bài thảo luận!!!
                </div>
                <div class="own-ques">
                    <p>Trần Văn Vĩnh ·
                        <span class="reply-comment-color" id="update-btl">Update</span>
                    </p>
                </div>
                <div id="tittle-asw">
                    <span class="no-select">Answer</span>
                </div>

                <div class="div-cmt row">
					<textarea type="text" class="add-cmt col-12"
                              placeholder="Thêm bình luận" data-lev="lev1" data-btl="1"></textarea>
                </div>
                <div
                        style="padding: 30px 20px 5px 15px; font-size: 1.2em; font-weight: bold;">Bình
                    luận
                </div>
                <div class="asw">
                    <div class="user-asw">
                        <div class="user-aswlv1">
                            <div class="asw-info">
                                <span class="pointer">Trần Văn Nam</span> · <span
                                        class="reply-comment-color btn-report pointer">Report</span>


                            </div>
                            <div class="asw-content" data-cmt="1">sdf sfsdd fs fs</div>
                            <div class="reply-comment-color reply-comment-size no-select">
									<span class="reply pointer" data-cmt="1">Trả
										lời<span> · </span>
									</span> <span class="show-more pointer" data-cmt="1">Các
										bình luận(<span class="num-rep" data-cmt="1">9</span>)
									</span>

                            </div>
                        </div>
                        <div class="user-aswlv2">
                            <div class="rep-outer" data-cmt="1"></div>
                            <div class="rep-cmt-controll" data-cmt="1">
									<span class="show-more no-select hide"
                                          style="margin-bottom: 2px" data-cmt="1"
                                          data-show-lev="lev2">Show more · </span> <span
                                        class="pointer btn-hide hide" data-cmt="1">Hide</span>
                                <div class="div-cmt row">
										<textarea type="text" class="add-cmt col-12 hide"
                                                  placeholder="Thêm bình luận" data-cmt="1"
                                                  data-lev="lev2"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="user-aswlv1">
                            <div class="asw-info">
                                <span class="pointer">Trần Văn Vĩnh</span> ·
                                <span class="reply-comment-color btn-report pointer">Report</span>
                                <span class="more-action">···
										<span class="span-list-action hide">
											<img class="triangle" src="{{URL::asset("imgs/viewPost/triangle.png")}}"/>
											<div class="action-choise" data-cmt="57"
                                                 data-cmt-lev="lev1">
												<div class="update">Chỉnh sửa.</div>
												<div class="del">Xóa.</div>
											</div>
										</span>
									</span>
                            </div>
                            <div class="asw-content" data-cmt="57">2</div>
                            <div class="reply-comment-color reply-comment-size no-select">
									<span class="reply pointer" data-cmt="57">Trả
										lời<span> · </span>
									</span> <span class="show-more pointer" data-cmt="57">Các
										bình luận(<span class="num-rep" data-cmt="57">0</span>)
									</span>
                            </div>
                        </div>
                        <div class="user-aswlv2">
                            <div class="rep-outer" data-cmt="57"></div>
                            <div class="rep-cmt-controll" data-cmt="57">
									<span class="show-more no-select hide"
                                          style="margin-bottom: 2px" data-cmt="57"
                                          data-show-lev="lev2">Show more · </span> <span
                                        class="pointer btn-hide hide" data-cmt="57">Hide</span>
                                <div class="div-cmt row">
										<textarea type="text" class="add-cmt col-12 hide"
                                                  placeholder="Thêm bình luận" data-cmt="57"
                                                  data-lev="lev2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pagination -->

                    <ul class="pagination"
                        style="justify-content: center; margin-top: 20px; padding-top: 3em"
                        data-max-page="3">
                        <li class="page-item" id="pre"><span class="page-link"><</span></li>
                        <li class="page-num page-item active " data-page="1"><span
                                    class="page-link">1</span></li>
                        <li class="page-num page-item  " data-page="2"><span
                                    class="page-link">2</span></li>
                        <li class="page-num page-item  " data-page="3"><span
                                    class="page-link">3</span></li>
                        <li class="page-num page-item  " data-page="2"><span
                                    class="page-link">4</span></li>
                        <li class="page-num page-item  " data-page="3"><span
                                    class="page-link">5</span></li>
                        <li class="page-item more" id="first"><span
                                    class="page-link">...</span></li>
                        <li class="page-num page-item  " data-page="3"><span
                                    class="page-link">7</span></li>
                        <li class="page-item" id="ne"><span class="page-link">></span></li>
                    </ul>
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
                                <input class="col-6" type="submit" value="Report now"
                                       style="height: 3em; background-color: rgb(210, 32, 32); color: white">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Open modal -->
    <button type="button" id="btn-messreport" style="display: none;"
            data-toggle="modal" data-target="#mesage-report">Open modal</button>
@endsection

@section("footer")
    @parent
@endsection

@section("js")
    <script type="text/javascript" src="{{URL::asset("js/viewPost.js")}}"></script>
@endsection