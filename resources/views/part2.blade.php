@extends("layouts.master")
@section("title","Part 2")
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part2home-css.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/swiper.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part2.css") }}">
@endsection

@section('navbar')
    @parent
@endsection

@section('content')
    <!-- body -->
    <div class="body">

        <div class="content-container col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
            <div class="header-content">
                <div>Practic part 2 (30 sentences)</div>
            </div>
            <div class="content col-12">
                <div class="col-2 timer">
                    <div class="time-detail">
                        <!-- <button class="timer-btn">Timer</button> -->
                        <span class="clock">00:00:00</span>
                    </div>
                </div>

                <div class="p1 col-10">
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
                        @for($i=1; $i<=10 ; $i++)
                        <div class="ques">
                            <div class="no-ques">
                                <?php
                                echo "Câu $i";

                                echo "</div>";
                                echo "<div class='tick col-12 col-sm-10 row'>";
                                echo "<label class='col-4'><input type='radio' name=\"choise$i\">A</label>";
                                echo "<label class='col-4'><input type=\"radio\" name=\"choise1$i\">B</label>";
                                echo "<label class=\"col-4\"><input type=\"radio\" name=\"choise$i\">C</label>";
                            echo '</div>';
                            ?>
                        </div>
                        @endfor

                    </div>
                </div>
                <input type="button" class="btn btn-primary" id="submitPart2" value="Submit">
            </div>
        </div>
    </div>


@endsection

@section('footer')
    @parent
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/practice.js") }}"></script>
    <script type="text/javascript" src="{{ URL::asset("js/swiper.js") }}"></script>
@endsection

