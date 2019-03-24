@extends('layouts.master')
@section('title','add part 5')
@section('navbar')
    @parent
@endsection

@section('content')
    <!-- body -->
    <div class="body row">
        <div class="row">
            <div class="col-12 time-detail">
                <button class="timer-btn">Timer</button>
                <span class="clock">00:00:00</span>
            </div>
        </div>



        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 5 (40 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <div class="direct">
                        <span class="red">Rerection </span>
                        <span>: A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then click on (A), (B), (C), or (D) on your test screen.</span>
                    </div>
                    <div class="div-add">
                        <input type="number" id="num-add" placeholder="Nhập số câu muốn thêm">
                        <button id="add">Thêm</button>
                    </div>
                    <div class="list-cau">
                        <!-- mot cau
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
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection