@extends("layouts.master")

@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/addDiscuss.css")}}">
@endsection

@section("title")Add discuss@endsection

@section("navbar")
    @parent
@endsection

@section("content")
    <div id="container-body">
        <h1 style="margin-top: 65px">Soạn thảo bài viết</h1>
        <hr>
        <div style="padding: 10px">
            <span>Tiêu đề</span><input id="tittle-discus" type="text" name="tittle">
        </div>
        <textarea class="ckeditor" name="editor1">

		</textarea>
        <button id="pre">Preview</button>
        <button id="btn-upload">Upload anh</button> <input id="file-up" type="file" accept="image/*" style="display: none" />
        <span>Width: </span><input type="number" id="w-img" style="width: 4em">px
        <span>Height: </span><input type="number" id="h-img" style="width: 4em">px
        <span style="color: red">(img's size is not require input)</span>

        <br><br>
        <h2 style="margin-top: 10px">Preview</h2>
        <hr>
        <div id="preview-container" style="width: 100%"></div>
        <button id="btn-submit">Submit</button>
    </div>

    <div style="display: none;" id="div-submit">


    </div>
@endsection

@section("js")
    <script type="text/javascript" src="{{URL::asset("js/addDiscuss.js")}}"></script>
    <script type="text/javascript" src="{{URL::asset("ckeditor/ckeditor.js")}}"></script>
@endsection