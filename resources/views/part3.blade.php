@extends("layouts.master")
@section("title","Part 3")
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part2home-css.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/swiper.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part3.css") }}">
@endsection
@section('navbar')
    @parent
@endsection
@section('content')
    <div class="body row">
    <div class="content-container col-11">
        <div class="header-content col-12">
            <div>Practic part 3 (30 sentences)</div>
        </div>
        <div class="content col-12">
            <div class="col-2 timer">
                <div class="time-detail">
                    <span class="clock">00:00:00</span>
                </div>
            </div>
            <div class="p1 col-10" style="float: right;">
                <!-- audio -->
                <div class="audio">
                    <audio controls="controls">
                        <source src="../audio/audio-part3.mp3"/>
                    </audio>
                </div>
                <hr>

                <!-- intro img-->
                <div class="intro">
                    <img src="../img-toeic/intro-part-3.png">
                </div>
                <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->


                        @for ($i=1;$i<=10;$i++)
                            <?php
                            echo "<div class=\"ques$i\"><div>
								<span class=\"no-ques\">Câu $i:</span>
								<span>Who most likely is the speaker?</span>
							</div>";
							echo '<div class="div-img">';
                            echo "<img src=\"../img-toeic/part1-cau1.png\">";
                            echo '</div><div class="tick col-12 col-sm-10 row">';
                            echo "<label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">A: fdsfasfsddfsafsad</label>
                                <label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">B: sdfdsfdsfdsfdsfdsds</label>
                                <label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">C: sdfdsfddsfdsfdf</label>
                                <label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">D: sdfdsfdfsfsdds</label>
                            </div></div>";
                            ?>
                        @endfor


                    </div>
                    <button class="btn btn-primary" id="submitPart1">Submit</button>

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

