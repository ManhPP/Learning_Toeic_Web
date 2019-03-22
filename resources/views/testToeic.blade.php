@extends("layouts.master")

@section("css")
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/testToeic.css")}}">
@endsection

@section("title")
    Test toeic
@endsection

@section("navbar")
    @parent
@endsection

@section("content")
    <!-- body -->
    <div class="body row">
        <div class="row">
            <div class="col-12 time-detail">
                <button class="timer-btn">Timer</button>
                <span class="clock">00:00:00</span>
            </div>
        </div>


        <!-- part 1 -->
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 1 (20 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <audio controls="controls">
                            <source src="../audio/audio-part1-1.mp3"/>
                        </audio>
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <img src="../img-toeic/intro-part1.png">
                    </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 1
                            </div>
                            <div class="div-img">
                                <img src="../img-toeic/part1-cau1.png">
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
                                <img src="../img-toeic/part1-cau2.png">
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
                                <img src="../img-toeic/part1-cau3.png">
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
                                <img src="../img-toeic/part1-cau4.png">
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
                                <img src="../img-toeic/part1-cau5.png">
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
                                <img src="../img-toeic/part1-cau6.png">
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
                                <img src="../img-toeic/part1-cau7.png">
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
                                <img src="../img-toeic/part1-cau8.png">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <div class="ques">
                            <div class="no-ques">
                                Câu 9
                            </div>
                            <div class="div-img">
                                <img src="../img-toeic/part1-cau9.png">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                        <div class="ques">
                            <div class="no-ques">
                                Câu 10
                            </div>
                            <div class="div-img">
                                <img src="../img-toeic/part1-cau10.png">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise">A</label>
                                <label class="col-3"><input type="radio" name="choise">B</label>
                                <label class="col-3"><input type="radio" name="choise">C</label>
                                <label class="col-3"><input type="radio" name="choise">D</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- part 2 -->
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 2 (30 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <audio controls="controls">
                            <source src="../audio/audio-part1-2.mp3"/>
                        </audio>
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <img src="../img-toeic/intro-part2.png">
                    </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 1
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau2 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 2
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau3 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 3
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau4 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 4
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau5 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 5
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau6 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 6
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau7 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 7
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau8 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 8
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <!-- cau9 -->
                        <div class="ques">
                            <div class="no-ques">
                                Câu 9
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                        <div class="ques">
                            <div class="no-ques">
                                Câu 10
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-4"><input type="radio" name="choise">A</label>
                                <label class="col-4"><input type="radio" name="choise">B</label>
                                <label class="col-4"><input type="radio" name="choise">C</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- part 3 -->
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 3 (30 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <audio controls="controls">
                            <source src="../audio/audio-part1-2.mp3"/>
                        </audio>
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <img src="../img-toeic/intro-part3.png">
                    </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->
                        <p class="ques refer-ques">Questions 1-3 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 1</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 2</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 3</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <p class="ques refer-ques">Questions 4-6 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 4</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 5</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 6</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <p class="ques refer-ques">Questions 7-9 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 7</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 8</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 9</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- part 4 -->
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 4 (30 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <!-- audio -->
                    <div class="audio">
                        <audio controls="controls">
                            <source src="../audio/audio-part1-2.mp3"/>
                        </audio>
                    </div>
                    <hr>

                    <!-- intro img-->
                    <div class="intro">
                        <img src="../img-toeic/intro-part4.png">
                    </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->
                        <p class="ques refer-ques">Questions 1-3 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 1</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 2</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 3</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <p class="ques refer-ques">Questions 4-6 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 4</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 5</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 6</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <p class="ques refer-ques">Questions 7-9 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 7</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 8</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                        <!-- cau1 -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 9</span>
                                <span>Who most likely is the speaker?</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef gsfsdf ưef</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: f fw èwefwefwf</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: đá wqd</label>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- part 5 -->
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
                    <div class="list-cau">
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 1</span>
                                <span>Jupiter has just under 70 documented moons, .............. four largest of which are the Galilean moons Io, Callisto, Ganymede and Europa.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: a</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  an</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: the</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: Ø</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 2</span>
                                <span>"I have seen thousands of ideas die on the vine, because the individuals that have them never ............... that fear of failing," he says.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: get around</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  get up</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: get over</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: get in</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 3</span>
                                <span>Fast & Furious 6 ................... at number one at the North American box office, taking more than double The Hangover Part III's opening takings.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: will debute</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: debutes</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: has debuted</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: is going to debute</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 4</span>
                                <span>A new drug that could help reduce damage to the body after a heart attack, stroke or major surgery ................ by UK scientists.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: developed</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B:  was developed</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: has developed</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: has been developed</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 5</span>
                                <span>.................., charities and other non-profit organisations have led efforts to provide safe food, water and medications in the developing world.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: Traditionally</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: Traditional</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: Tradition</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: Traditions</label>
                            </div>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- part 6 -->
        <div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="header-content">
                <div>Practic part 6 (12 sentences)</div>
            </div>
            <div class="content">
                <div class="p1">
                    <div class="direct">
                        <span class="red">Rerection </span>
                        <span>: A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then click on (A), (B), (C), or (D) on your test screen.</span>
                    </div>
                    <div class="list-cau">

                        <!-- mot cau -->
                        <p class="ques refer-ques">Questions 1-3 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 1</span>
                                <span>Please let me take this opportunity to introduce myself as the newly.....(141).....sales agent for GK Trading Company.
								</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: appointed</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: appointing</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: appoint</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: appointment</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 2</span>
                                <span>As I have joined the company recently, I went.....(142).....our records and found that you are one of our most valuable customers.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: with</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: into</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: through</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: over</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 3</span>
                                <span>As an initiative to a growing business relationship that will benefit both of us, I will be pleased to visit you in your office at your convenience in order to understand about your company and this will enable me to.....(143).....you with a better service. I could also introduce our new products to you.I wish to call in your office, and I want to make the appointment as I am looking forward to meeting you personally.
								Yours sincerely,
								Praveen Kumar.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: give</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: provide</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: award</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: deliver</label>
                            </div>
                            <hr>
                        </div>

                        <!-- mot cau -->
                        <p class="ques refer-ques">Questions 4-6 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 4</span>
                                <span>Please let me take this opportunity to introduce myself as the newly.....(141).....sales agent for GK Trading Company.
								</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: appointed</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: appointing</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: appoint</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: appointment</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 5</span>
                                <span>As I have joined the company recently, I went.....(142).....our records and found that you are one of our most valuable customers.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: with</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: into</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: through</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: over</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 6</span>
                                <span>As an initiative to a growing business relationship that will benefit both of us, I will be pleased to visit you in your office at your convenience in order to understand about your company and this will enable me to.....(143).....you with a better service. I could also introduce our new products to you.I wish to call in your office, and I want to make the appointment as I am looking forward to meeting you personally.
								Yours sincerely,
								Praveen Kumar.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: give</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: provide</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: award</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: deliver</label>
                            </div>
                            <hr>
                        </div>

                        <!-- mot cau -->
                        <p class="ques refer-ques">Questions 7-9 refer to the following conversation.</p>
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 7</span>
                                <span>Please let me take this opportunity to introduce myself as the newly.....(141).....sales agent for GK Trading Company.
								</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: appointed</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: appointing</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: appoint</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: appointment</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 8</span>
                                <span>As I have joined the company recently, I went.....(142).....our records and found that you are one of our most valuable customers.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: with</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: into</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: through</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: over</label>
                            </div>
                            <hr>
                        </div>
                        <!-- mot cau -->
                        <div class="ques">
                            <div>
                                <span class="no-ques">Câu 9</span>
                                <span>As an initiative to a growing business relationship that will benefit both of us, I will be pleased to visit you in your office at your convenience in order to understand about your company and this will enable me to.....(143).....you with a better service. I could also introduce our new products to you.I wish to call in your office, and I want to make the appointment as I am looking forward to meeting you personally.
								Yours sincerely,
								Praveen Kumar.</span>
                            </div>
                            <div class="row">
                                <label class="col-12 col-md-6"><input type="radio" name="choise">A: give</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">B: provide</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">C: award</label>
                                <label class="col-12 col-md-6"><input type="radio" name="choise">D: deliver</label>
                            </div>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- part 7 -->
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

                    <div class="list-cau">
                        <!-- mot doan -->
                        <div>
                            <div class="paragrap">
                                <img src="../img-toeic/part7-1.jpg">
                            </div>
                            <!-- mot cau -->
                            <p class="ques refer-ques">Questions 1-3 refer to the following conversation.</p>
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 1</span>
                                    <span>Which flight leaves in the morning?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: QV 645</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: QV 635</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: TG 129</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: PG 242</label>
                                </div>
                                <hr>
                            </div>
                            <!-- mot cau -->
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 2</span>
                                    <span>Which route has a flight every day?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: Chiang Mai – Luang Prabang</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: Luang Prabang – Chiang Mai</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: Chiang Mai – Phuket</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: Chiang Mai – Koh Samui</label>
                                </div>
                                <hr>
                            </div>
                            <!-- mot cau -->
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 3</span>
                                    <span>What is NOT true about "cheapest class" tickets?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: They cannot be changed.</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: They cannot be refunded.</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: They are available for all flight routes.</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: They cannot be upgraded.</label>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <!-- mot doan -->
                        <div>
                            <div class="paragrap">
                                <img src="../img-toeic/part7-21.png">
                                <img src="../img-toeic/part7-22.gif">
                            </div>
                            <!-- mot cau -->
                            <p class="ques refer-ques">Questions 1-5 refer to the following conversation.</p>
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 1</span>
                                    <span>How much can an employee receive as an epidemiologist?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: $48,066.00</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: $40,949.00</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: $48,545.00</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: More than $40,949.00</label>
                                </div>
                                <hr>
                            </div>
                            <!-- mot cau -->
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 2</span>
                                    <span>How long does the Federal Career Intern Program (FCIP) last?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: Twenty-four months</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: Two months</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: One year</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: Two semesters</label>
                                </div>
                                <hr>
                            </div>
                            <!-- mot cau -->
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 3</span>
                                    <span>When should candidates start submitting applications for the FCIP?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: October 30th 2009</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: April 06th 2012</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: November 03rd 2009</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: Relaxable</label>
                                </div>
                                <hr>
                            </div>
                            <!-- mot cau -->
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 4</span>
                                    <span>What should NOT be included in the applications for the Assistant Director position?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: Curriculum vitae</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: Photocopies of relevant educational certificates</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: An on-line test</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: One recent photograph</label>
                                </div>
                                <hr>
                            </div>
                            <!-- mot cau -->
                            <div class="ques">
                                <div>
                                    <span class="no-ques">Câu 5</span>
                                    <span>What is NOT true about the mentioned vacancies?</span>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">A: Both students and non-students have the chance to participate in the FCIP.</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">B: All vacancies in the second notice are kept under control by the Federal Government.</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">C: According to the second notice, the outstanding candidates are chosen on-line.</label>
                                    <label class="col-12 col-md-6"><input type="radio" name="choise">D: Applications must be handed in by a specific date.</label>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script type="text/javascript" src="{{URL::asset("js/testToeic.js")}}"></script>
@endsection