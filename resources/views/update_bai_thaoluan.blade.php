@extends('layouts.master')
@section('title','update bai thao luan')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/update_bai_thaoluan/update_bai_thaoluan.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    
<!-- body -->
<div id="container-body">
    <h1 style="margin-top: 65px">Update bài viết (id: {{ $btl->id }})</h1>
    <hr>
    <div style="padding: 10px">
        <span>Tiêu đề</span><input id="tittle-discus" type="text"
            name="tittle" value="{{ $btl->tieuDe }}">
    </div>
    <textarea class="ckeditor" name="editor1">
        {{ $btl->noiDung }}
    </textarea>
    <button id="pre">Preview</button>
    <button id="btn-upload">Upload anh</button>


    <form id="form-up-image">
        <input id="file-up" type="file" accept="image/*"
            style="display: none" name="file-image" />
    </form>

    <span>Width: </span><input type="number" id="w-img" style="width: 4em">px
    <span>Height: </span><input type="number" id="h-img"
        style="width: 4em">px <span style="color: red">(img's
        size is not require input)</span> <br> <br>
    <h2 style="margin-top: 10px">Preview</h2>
    <hr>
    <div id="preview-container" style="width: 100%"></div>
    <button id="btn-submit">Submit</button>
</div>

<div style="display: none;" id="div-submit"></div>
<div id="path-upload" style="display: none;">{{URL("")}}/img-btl/</div>
<div id="root-path" style="display: none;">{{ URL("") }}</div>
<!-- end body -->

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
<!-- Open modal -->
<button id="my-button" style="display: none;" data-toggle="modal"
    data-target="#myModal">Open modal</button>

<!-- confirm cho chuyen trang-->
<div class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true"
    id="model-noti-update">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
            </div>
            <div class="modal-body">
                <!-- <p>Hãy chọn yes để xác nhận hành động!!!</p> -->
                <div id="noti-update">
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display: none;" id="id-btl">{{ $btl->id }}</div>
<div id="id-user" style="display: none;" >{{ $acc->id }}</div>

@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/update_bai_thaoluan/update_bai_thaoluan.js") }}"></script>
    <script type="text/javascript"
            src="{{URL::asset("ckeditor/ckeditor.js")}}"></script>
@endsection