@extends("layouts.master")
@section("title","part1")
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part2home-css.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/swiper.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/part1.css") }}">
@endsection
@section('navbar')
    @parent
@endsection
@section('content')
    <!-- body -->
    <div class="body row">
        <div class="content-container col-11">
            <div class="header-content">
                <div>Practic part 5 (40 sentences)</div>
            </div>
            <div class="content">
                <div class="col-2 timer">
                    <div class="time-detail">
                        <span class="clock">00:00:00</span>
                    </div>
                </div>
                    <div class="p1 col-10">
                        <div class="direct" style="margin-top: 2%">
                            <span class="red">Rerection </span>
                            <span>: A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then click on (A), (B), (C), or (D) on your test screen.</span>
                        </div>
                    <hr>
                    <!-- list cau hoi -->
                    <div class="list-cau">
                        <!-- cau1 -->


                        @for ($i=1;$i<=10;$i++)
                            <?php
                            echo "<div class=\"ques ques$i\"><div>
								<span class=\"no-ques\">Câu $i</span>
								<span>Who most likely is the speaker?</span>
							</div><div class=\"div-img\">";
                            echo "<img src=\"../img-toeic/part1-cau1.png\">";
                            echo '</div><div class="tick col-12 row">';
                            echo "<label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">A: sdasdaasdsa </label>
                                <label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">B: asdasdsadsad</label>
                                <label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">C: asdasdsadsad</label>
                                <label class=\"col-3\"><input type=\"radio\" name=\"choise$i\">D: sadsdsdsa</label>
                            </div></div>";
                            ?>
                        @endfor


                    </div>
                    <button class="btn btn-primary" id="submitPart1">Submit</button>

                </div>
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

