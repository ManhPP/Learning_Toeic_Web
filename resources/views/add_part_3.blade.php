@extends('layouts.master')
@section('title','add part 3')
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
                <button class="timer-btn">Timer</button>
                <span class="clock">00:00:00</span>
            </div>
        </div>



        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 3 (30 sentences), *(Admin phải upload tất cả các file và chọn đáp án đúng cho từng câu)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <span>Input audio here</span>
                        <input type="file" name="#" accept="audio/*">
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <span>Input image intro here</span>
                        <input type="file" name="#" accept="image/*">
                    </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 1</span>
                                <input class="input-ques full-width" type="text" name="">
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise1">A: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise1">B: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise1">C: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise1">D: <input class="input-ques" type="text" name=""></label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 2</span>
                                <input class="input-ques full-width" type="text" name="">
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise2">A: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise2">B: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise2">C: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise2">D: <input class="input-ques" type="text" name=""></label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 3</span>
                                <input class="input-ques full-width" type="text" name="">
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise3">A: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise3">B: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise3">C: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise3">D: <input class="input-ques" type="text" name=""></label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 4</span>
                                <input class="input-ques full-width" type="text" name="">
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise4">A: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise4">B: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise4">C: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise4">D: <input class="input-ques" type="text" name=""></label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 5</span>
                                <input class="input-ques full-width" type="text" name="">
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise5">A: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise5">B: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise5">C: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise5">D: <input class="input-ques" type="text" name=""></label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 6</span>
                                <input class="input-ques full-width" type="text" name="">
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise6">A: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise6">B: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise6">C: <input class="input-ques" type="text" name=""></label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise6">D: <input class="input-ques" type="text" name=""></label>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('footer')
    @parent
@endsection