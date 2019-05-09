@extends('layouts.master')
@section('title','add part 1')

@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/home_css_part1.css")}}">
@endsection

@section('navbar')
    @parent
@endsection

@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="body row">
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 1 (10 sentences), *(Admin phải upload tất cả các file và chọn đáp án đúng cho từng câu)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <span>Input audio here</span>
                        <form id="form-upload-audio">
                            <input type="file" name="audio" id="audio" accept="audio/*">
                        </form>
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <span>Input image intro here</span>
                        <input type="file" name="intro" id="intro" accept="image/*">
                    </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 1:
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau2 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 2
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau3 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 3
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau4 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 4
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau5 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 5
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau6 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 6
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau7 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 7
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau8 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 8
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau9 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 9
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- cau10 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 10
                            </div>
                            <div class="div-img">
                                <span>Input image intro here</span>
                                <input type="file" name="#" accept="image/*">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <!-- submit -->
                        <div class="submit">
                            <button type="button" class="btn btn-warning btnsubmit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display: none">
        <div id="path-add">{{Route("part1controller.creratepart1")}}</div>
    </div>

@endsection
@section('js')
    <!-- <script type="text/javascript" src="../js/home-js.js"></script> -->
   
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btnsubmit').click(function(){
                var audio=$('#audio').val();
                var intro=$('#intro').val();
                var formData = $("#form-upload-audio").attr("data-path");
                console.log(audio);
                var loaiPart="part 1";
                var acessCount=0;
                var title="Sport";
                $.ajax({
                    url: "{{ url('addlisteningpart') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // contentType:"application/json; charset=utf-8",
                    // dataType: 'json',
                    data: {audio:audio,intro:intro,loaiPart:loaiPart,acessCount:acessCount,title:title},
                    success: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
@section('footer')
    @parent
@endsection