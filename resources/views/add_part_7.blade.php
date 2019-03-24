@extends('layouts.master')
@section('title','add part 7')
@section('navbar')
    @parent
@endsection

@section('content')
    <div class="body row">
        <div class="row">
            <div class="col-12 time-detail">
                <button class="timer-btn">Timer</button>
                <span class="clock">00:00:00</span>
            </div>
        </div>



        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 7 (40 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <div class="direct">
                        <span class="red">Directions </span>
                        <span>: In this part, you will read a selection of texts, such as magazine and newspaper articles, letters, and advertisements. Each text is followed by several questions. Select the best answer for each question and click on (A), (B), (C), or (D) on your test screen.</span>
                    </div>
                    <div  class="input-para">
                        <p>Tải đoạn văn thứ nhất <span>*(require)</span></p>
                        <input type="file" accept="image/*">
                    </div>
                    <div class="input-para">
                        <p>Tải đoạn văn thứ hai <span>*(not require)</span></p>
                        <input type="file" accept="image/*">
                    </div>
                    <div class="list-cau">
                        <!-- mot cau -->
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
                        <!-- mot cau -->
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
                        <!-- mot cau -->
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
                        <!-- mot cau -->
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
                        <!-- mot cau -->
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

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection