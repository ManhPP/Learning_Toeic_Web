<!DOCTYPE html>
<html>
<head>
    <title>Admin manager discussion</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset("css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset("css/admin_thaoluan.css") }}">
</head>
<body>
    @include('header_admin')
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/admi_baihoc_bkt.css") }}"/> -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/header-admin.css") }}"/>

    <!-- body -->
    <div class="container-fluid" style="padding-top: 50px;">
        <!-- table and button -->
        <div class="row justify-content-center">
            <!-- Khung ngoai table -->
            <div class="col-11 row justify-content-center"
                 style="border: 1px black solid; margin-top: 3em; padding: 0">
                <!-- tieu de khung ngoai -->
                <div class="col-12"
                     style="height: 2em; background-color: #B8B8B8; line-height: 2em">
                    <span>Bảng quản lý bài thảo luận</span>
                </div>

                <!-- search -->
                <div class="col-12 row"
                     style="padding-top: 1em; padding-bottom: 1em">
                    <div class="col-12 col-sm-6 row" id="noti"></div>

                </div>

                <!-- TABLE -->
                <div class="justify-content-center col-12 main-table"
                     id="table-thaoluan">
                    <table class="table table-bordered" style="min-width: 800px">
                        <thead class="thead-dark">
                        <tr class="d-flex">
                            <th class="col-sm-1 col-md-1" data-name="id"><span>ID</span></th>
                            <th class="col-sm-5 col-md-5" data-name="tieuDe"><span>Tiêu
										đề</span></th>
                            <th class="col-sm-2 col-md-2" data-name="ngayDang"><span>Ngày
										đăng</span></th>
                            <th class="col-sm-1 col-md-1" data-name="userId"><span>User'id
										đăng bài</span></th>
                            <th class="col-sm-1 col-md-1" data-name="accessCount"><span>Lượt
										truy cập</span></th>
                            <th class="col-sm-1 col-md-1" data-name="soCmt"><span>Số
										bình luận</span></th>
{{--                            <th class="col-sm-1 col-md-1" data-name="soReport"><span>Số--}}
{{--										report</span><img class="ico-filter" alt="filter"--}}
{{--                                                          src="${pageContext.request.contextPath}/resources/img/filter.png"></th>--}}
                            <th class="col-sm-1 col-md-1"><span>View</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $index = 0 @endphp
                        @foreach($arrBtl as $btl)
                            <tr class="d-flex">
                                <td class="col-sm-1 col-md-1">{{$btl->id}}</td>
                                <td class="col-sm-5 col-md-5">{{$btl->tieuDe}}</td>
                                <td class="col-sm-2 col-md-2">{{$btl->ngayDang}}</td>
                                <td class="col-sm-1 col-md-1">{{$btl->account->id}}</td>
                                <td class="col-sm-1 col-md-1">{{$btl->accessCount}}</td>
                                <td class="col-sm-1 col-md-1">{{$arrNumCmt[$index]}}</td>
{{--                                <td class="col-sm-1 col-md-1">{{$arrNumReport[$index]}}</td>--}}
                                <td class="col-sm-1 col-md-1"><a class="detail" href="{{Route('dicussionController.view',['id'=>$btl->id])}}">View</a></td>
                            </tr>
                            @php $index ++ @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>


            <!-- btn delete -->
            <div class="col-11 row justify-content-start"
                 style="margin-top: 3em; margin-bottom: 5em">
                <a class="btn-mana" id="add" type="button" name="" value="Thêm bài viết" href="{{Route("discussionController.indexAdd")}}" style="background-color: #02671c" >Thêm bài viết</a>
                <input class="btn-mana" id="delete" type="button" name="" value="Xóa bài viết" data-path="{{Route("discussioncontroller.delete")}}" style="background-color: #F70000;">
            </div>
        </div>

        <div style="display: none">
            <div id="path-del">{{Route("discussioncontroller.delete")}}</div>
        </div>
        <!-- footer -->
		<div class="container-fluid row justify-content-center footer"
			style="height: 5em; line-height: 5em; padding-left: 5em; bottom: 0; background-color: #E8E8E8; z-index: 0">
			<span>Copyright © BKTOEIC 2019</span>
		</div>
    </div>


    <script type="text/javascript"
            src="{{URL::asset("js/jquery-3.3.1.min.js")}}"></script>
    <script type="text/javascript"
            src="{{URL::asset("js/admin_thaoluan.js")}}"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript"
            src="{{URL::asset("js/header-admin.js")}}"></script>
    <script type="text/javascript"
            src="{{URL::asset("js/bootstrap.min.js")}}"></script>
</body>
</html>
