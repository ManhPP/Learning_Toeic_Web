@extends('layouts.master')
@section('title','Account manager')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/user_manage_account.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    <div class="body row">
        <div class="col-12 title-lev1">Quản lý tài khoản cá nhân</div>
        <div class="col-12" id="infor-container">
            <div class="group-basic">
                <div class="title-lev2">Thông tin cơ bản</div>
                <div class="info-basic child-group">
                    <div class="info-item" data-item="{{$userLogin->hoTen}}">
                        <span>Họ tên: </span>
                        <span class="show-info">
                            <span>{{$userLogin->hoTen}}</span>
                            <img class="ico-edit" src="{{URL::asset('imgs/edit_acc.png')}}">
                        </span>
                        <input type="text" id="input-ht" placeholder="Họ tên" value="{{$userLogin->hoTen}}" class="input-info hide">
                    </div>
                    <div class="info-item" data-item="Male">
                        @php $checkMale="" @endphp
                        @php $checkFemale="" @endphp

                        @if($userLogin->gioiTinh == "Male")
                            @php $checkMale = "checked='checked'" @endphp
                        @else
                            @php $checkFemale = "checked='checked'" @endphp
                        @endif
                        <span>Giới tính:</span>
                        <span class="show-info">
                            <label><input type="radio" {{$checkMale}} disabled="disabled">Nam</label>
                            <label><input type="radio" {{$checkFemale}} disabled="disabled">Nữ</label>
                            <img class="ico-edit" src="{{URL::asset('imgs/edit_acc.png')}}">
                        </span>
                        <span class="input-info hide radio-input"  id="input-gt">
                            <label><input type="radio" name="gt" {{$checkMale}} value="Male">Nam</label>
                            <label><input type="radio" name="gt" {{$checkFemale}} value="Female">Nữ</label>
                        </span>
                    </div>
                    <div class="info-item" data-item="{{$userLogin->ngaySinh}}">
                        <span>Ngày sinh:</span>
                        <span class="show-info">
                            <span>{{$userLogin->ngaySinh}}</span>
                            <img class="ico-edit" src="{{URL::asset('imgs/edit_acc.png')}}">
                        </span>
                        <input type="date" id="input-ns" value="{{$userLogin->ngaySinh}}" class="input-info hide">
                    </div>
                    <div class="info-item" data-item="{{$userLogin->username}}">
                        <span>User name:</span>
                        <span class="show-info">
                            <span>{{$userLogin->username}}</span>
                            <img class="ico-edit" src="{{URL::asset('imgs/edit_acc.png')}}">
                        </span>
                        <input type="text" id="input-username" class="input-info hide" value="{{$userLogin->username}}" placeholder="Username">
                    </div>
                    <div class="info-item" data-item="{{$userLogin->email}}">
                        <span>Email:</span>
                        <span class="show-info">
                            <span>{{$userLogin->email}}</span>
                            <img class="ico-edit" src="{{URL::asset('imgs/edit_acc.png')}}">
                        </span>
                        <input type="text" id="input-email" class="input-info hide" value="{{$userLogin->email}}" placeholder="Email">
                    </div>
                    <div class="info-item" data-item="">
                        <span>Password:</span>
                        <span class="show-info">
                            <span>*********</span>
                            <img class="ico-edit" src="{{URL::asset('imgs/edit_acc.png')}}">
                        </span>
                        <input type="password" id="input-password" value="" class="input-info hide">
                    </div>
                    <button id="delete-acc">Xóa tài khoản</button>
                    <span class="hide" id="group-update">
                        <button id="update-acc">Update khoản</button>
                        <button id="cancle-update">Cancle</button>
                    </span>
                </div>
            </div>

            <div class="group-more">
                <div class="title-lev2">Thông tin hoạt động</div>
                <div class="more-info child-group">
                    <div class="info-item">
                        <span>Số lượng bài đăng: </span>
                        <span>{{count($userLogin->discussion)}}</span>
                    </div>
                    <div class="info-item">
                        <span>Số lượng comment:</span>
                        <span>{{count($userLogin->comment) + count($userLogin->replyComment)}}</span>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading" id="heading-discuss">
                                <a data-toggle="collapse" href="#collapse1">Các bài thảo luận</a>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse body-collapse">
                                @foreach($userLogin->discussion as $discuss)
                                    <div class="panel-body panel-item" data-path="{{Route("dicussionController.view")}}?id={{$discuss->id}}">
                                        <span>{{$discuss->tieuDe}}</span>
                                        <button class="del-discuss" data-id="{{$discuss->id}}">Xóa</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- confirm cho del -->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-confirm-del">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa tài khoản!!!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal-del-yes">Yes</button>
                    <button type="button" class="btn btn-primary" id="modal-del-no">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- confirm cho update-->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-confirm-update">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa update khoản!!!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal-update-yes">Yes</button>
                    <button type="button" class="btn btn-primary" id="modal-update-no">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- confirm cho del discuss-->
    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="model-confirm-del-discuss">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa bài đăng!!!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal-del-dis-yes">Yes</button>
                    <button type="button" class="btn btn-primary" id="modal-del-dis-no">No</button>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none;">
        <div id="acc-id">{{$userLogin->id}}</div>
        <div id="del-path">{{Route("accountcontroller.delete")}}</div>
        <div id="del-path-discuss">{{Route("discussioncontroller.delete")}}</div>
        <div id="update-path">{{Route("accountcontroller.updateforuser")}}</div>
    </div>
@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/user_manage_account.js") }}"></script>
@endsection