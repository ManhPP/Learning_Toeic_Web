@extends("layouts.master")

@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/forumHome-css.css")}}">
@endsection

@section("title")
    Forum home
@endsection

@section("navbar")
    @parent
@endsection

@section("content")
    <!-- body -->
    <div class="body row">
        <div class="inner-body col-xl-11 row">
            <div class=" col-12 col-xl-9">
                <div class="lev-1">
                    <h2 class="no-choise">Thông tin các cuộc thảo luận</h2>
                    <p class="no-choise" style="color: #9a9696">Các bài thảo luận, thông tin, các thắc mắc liên quan đến
                        tiếng anh</p>
                    <div class="lev-2">
                        <div class="list-contents">
                            <!-- TABLE -->
                            <div class="container-fluid" style="margin-top: 10px; padding: 10px">
                                <div class="table-responsive-md no-choise">

                                    <table class="table justify-content-start table-striped table-hover"
                                           style="min-width: 600px">
                                        <thead class="thead-dark">
                                        <tr class="d-flex">
                                            <th class="col-12 col-md-10">Tiêu đề</th>
                                            <th class="col-md-2 hide-md">View/Reply</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="d-flex">
                                            <td class="col-12 col-md-10">
                                                <div class="tittle" data-toggle="tooltip" data-placement="top"
                                                     title="Thì hiên tại đơn trong tiếng anh vi du dai de test overflow 1 332 324 23423 4234 32545 3245234">
                                                    Thì hiên tại đơn trong tiếng anh vi du dai de test overflow 1 332
                                                    324
                                                    23423 4234 32545 3245234
                                                </div>
                                                <div>
                                                    <span class="user">Trần Văn Vĩnh, </span><span
                                                            class="date">03/01/2019</span>
                                                </div>
                                            </td>
                                            <td class="col-md-2 hide-md"><p class="count">160/122</p></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-12 col-md-10">
                                                <div class="tittle" data-toggle="tooltip" data-placement="top"
                                                     title="Thì hiên tại đơn trong tiếng anh 324 23 4234 23432 4324 324 234 234 234 2 42">
                                                    Thì hiên tại đơn trong tiếng anh 324 23 4234 23432 4324 324 234 234
                                                    234
                                                    2 42
                                                </div>
                                                <div>
                                                    <span class="user">Trần Văn Vĩnh, </span><span
                                                            class="date">03/01/2019</span>
                                                </div>
                                            </td>
                                            <td class="col-md-2 hide-md"><p class="count">160/12</p></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-12 col-md-10">
                                                <div class="tittle" data-toggle="tooltip" data-placement="top"
                                                     title="Thì hiên tại đơn trong tiếng anh">Thì hiên tại đơn trong
                                                    tiếng
                                                    anh
                                                </div>
                                                <div>
                                                    <span class="user">Trần Văn Vĩnh, </span><span
                                                            class="date">03/01/2019</span>
                                                </div>
                                            </td>
                                            <td class="col-md-2 hide-md"><p class="count">170/423</p></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Thong ke cac bai -->
            <div id="count-discus" class="col-lg-3" style="height: 300px;">
                <div class="tittle-tk">Thống kê diễn đàn</div>
                <div class="content-tk">
                    <p>Số lượng thành viên: 120</p>
                    <p>Số lượt truy truy cập trong ngày: 12</p>
                    <p>Số bài đăng trong ngày: 12</p>
                    <p>Số bài đăng trong tháng: 11111</p>
                </div>
                <button id="add-discus">Đăng bài thảo luận</button>
            </div>
        </div>
    </div>
@endsection

@section("footer")
    @parent
@endsection
@section("js")
    <script type="text/javascript" src="{{URL::asset("js/forumHome.js")}}"></script>
@endsection
