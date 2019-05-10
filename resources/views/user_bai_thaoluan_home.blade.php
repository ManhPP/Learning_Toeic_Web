@extends('layouts.master')
@section('title','thao luan')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/user_thaoluan_home/user_thaoluan_home.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    
<!-- body -->
<div class="body row">
    <div class="inner-body col-xl-11 row">
        <div class=" col-12 col-xl-9">
            <div class="lev-1">
                <h2 class="no-choise">Thông tin các cuộc thảo luận</h2>
                <p class="no-choise" style="color: #9a9696">Các bài thảo luận,
                    thông tin, các thắc mắc liên quan đến tiếng anh</p>
                <div class="lev-2">
                    <div class="list-contents">
                        <!-- TABLE -->
                        <div class="container-fluid"
                            style="margin-top: 10px; padding: 10px">
                            <div class="table-responsive-md no-choise"
                                style="overflow: hidden;">

                                <table id="table-btl"
                                    class="table justify-content-start table-striped table-hover"
                                    style="min-width: 600px">
                                    <thead class="thead-dark">
                                        <tr class="d-flex">
                                            <th class="col-12 col-md-10">Tiêu đề</th>
                                            <th class="col-md-2 hide-md">View/Reply</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $index = 0 ?>
                                        @foreach($arrBtl as $btl)
                                            <tr class="d-flex">
                                                <td class="col-12 col-md-10">
                                                    <div class="tittle" data-toggle="tooltip"
                                                        data-placement="top" title="{{ $btl->tieuDe }}"><a class="color-tittle no-decoration" href="{{route('dicussionController.view',['id'=>$btl->id])}}">{{ $btl->tieuDe }}</a></div>
                                                    <div>
                                                        <span class="user">{{ $btl->account->hoTen }}, </span><span
                                                            class="date">
                                                            <?php $date = date_create( $btl->ngayDang );?>
                                                            {{date_format($date,'M d, y')}}
                                                        </span>
                                                                {{--<fmt:formatDate--}}
                                                                {{--value="{{ $btl->ngayDang }}" pattern="dd/MM/yyyy" /></span>--}}
                                                    </div>
                                                </td>
                                                <td class="col-md-2 hide-md"><p class="count">{{ $btl->accessCount }}/{{ $arrNumCmt[$index] }}</p></td>
                                            </tr>
                                            <?php $index += 1 ?>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- pagination -->
                            {{--<div id="cur-page" style="display: none">1</div>--}}
                            {{--<div style="display: none">--}}
                                {{--{{ $numPage = number_format($numBtl/10) }}--}}
                            {{--</div>--}}
                            {{--@if($numBtl > ($numPage*10))--}}
                                {{--{{ $numPage += 1 }}--}}
                            {{--@endif--}}
                            {{--<div style="display:none">--}}
                                {{--{{ $curPage = 0 }}--}}
                            {{--</div>--}}

                            {{--@if($numUser > 0)--}}
                            {{--<div style="display:none">--}}
                                {{--{{ $curPage = 1 }}--}}
                            {{--</div>--}}
                            {{--@endif--}}

                            {{--<ul class="pagination" style="justify-content: center;"--}}
                                {{--data-max-page="{{ $numPage }}">--}}
                                {{--<li class="page-item" id="pre"><span class="page-link"><</span></li>--}}

                                {{--@for($i = 1; $i <= $numPage; $i++)--}}
                                    {{--<!-- add class active cho pagation day tien -->--}}
                                    {{--<div style="display:none">--}}
                                        {{--{{ $cls = "" }}--}}
                                    {{--</div>--}}
                                    {{--@if($i == 1)--}}
                                        {{--<div style="display:none">--}}
                                                {{--{{ $cls = "active" }}--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                    {{--<!-- them dau 3... -->--}}

                                    {{--@if($i == 2)--}}
                                        {{--<li class="page-item hide more" id="first"><span--}}
                                            {{--class="page-link">...</span></li>--}}
                                    {{--@endif--}}
                                    {{--@if($i == $numPage && $numPage > 6)--}}
                                        {{--<li class="page-item more" id="last"><span--}}
                                            {{--class="page-link">...</span></li>--}}
                                    {{--@endif--}}
                                    {{--<!-- an ca pagation phai sau -->--}}
                                    {{--<div style="display:none">--}}
                                            {{--{{ $hi = "" }}--}}
                                    {{--</div>--}}
                                    {{--@if($i != $numPage && $i > 5)--}}
                                    {{--<div style="display:none">--}}
                                            {{--{{ $hi = "hide" }}--}}
                                    {{--</div>--}}
                                    {{--@endif--}}
                                    {{--<li class="page-num page-item {{ $cls }} {{ $hi }}" data-page="{{ $i }}"><span--}}
                                        {{--class="page-link">{{ $i }}</span></li>--}}
                                {{--@endfor--}}
                                {{--<li class="page-item" id="ne"><span class="page-link">></span></li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Thong ke cac bai -->
        <div id="count-discus" class="col-lg-3" style="height: 300px;">
            <div class="tittle-tk">Thống kê diễn đàn</div>
            <div class="content-tk">
                <p>Số lượng thành viên: {{ $numUser }}</p>
                <p>Số bài thảo luận trên diễn đàn: {{ $numBtl }}</p>
                    {{--<p>Số bài đăng trong ngày: {{ $btlPerDay }}</p>--}}
                    {{--<p>Số bài đăng trong tháng: {{ $btlPerMonth }}</p>--}}
            </div>
            <a class="no-decoration" style="color: white" href="{{route('discussionController.indexAdd')}}">
                <button id="add-discus">Đăng bài thảo luận</button>
            </a>
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

    <!-- modal -->
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
</div>
<div id="root-path" style="display: none;">{{ URL("") }}</div>
<!-- Open modal -->
<button id="my-button" style="display: none;" data-toggle="modal"
    data-target="#myModal">Open modal</button>
@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/user_thaoluan_home/user_thaoluan_home.js") }}"></script>
@endsection	