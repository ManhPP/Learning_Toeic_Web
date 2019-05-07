@extends('layouts.master')
@section('title','practice part 1')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/guest_part1_view/guest_part1_view.css") }}">
@endsection
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
            <div>Practic part 1 (20 sentences)</div>
        </div>
        <div class="content">
            <div class="p1">
                <!-- audio -->
                <div class="audio">
                    <audio controls="controls">
                        <source src="{{ $partNghe->audio }}"/>
                    </audio>
                </div>
                <hr>
                
                <!-- intro img-->
                <div class="intro">
                    <img src="{{ $partNghe->intro }}">
                </div>
                <hr>
                <!-- list cau hoi -->
                <div class="list-cau">
                    {{ $index = 1 }}
                    @foreach( $partNghe->part1 as $cauPart1)
                        <div class="ques" id="q{{ $index }}" data-asw="{{ $cauPart1->dADung }}">
                            <div class="no-ques">
                                Câu {{ $index }}
                            </div>
                            {{-- <div class="noti"></div> --}}
                            <div class="div-img">
                                <img src="{{ $cauPart1->anh }}">
                            </div>
                            <div class="tick col-12 col-sm-10 row">
                                <label class="col-3"><input type="radio" name="choise{{ $index }}" value="A">A</label>
                                <label class="col-3"><input type="radio" name="choise{{ $index }}" value="B">B</label>
                                <label class="col-3"><input type="radio" name="choise{{ $index }}" value="C">C</label>
                                <label class="col-3"><input type="radio" name="choise{{ $index }}" value="D">D</label>
                            </div>
                        </div>
                        {{ $index += 1 }}
                    @endforeach
                </div>
            </div>
            <div style="text-align: center;padding: 3em 0 0 0;">
                <div id="num-right" style="padding-bottom: 2em;color: blue;"></div>
                <input id="submit-asw" type="button" value="Nộp bài">
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="myModal" style="padding: 0">
    <div class="modal-dialog">
        <div class="modal-content" style="border-right: 18px; border-radius: 18px">
            <div class="modal-header justify-content-center" style="background-color: rgb(50, 63, 71); border-radius: 18px 18px 0 0;">
                <h4 class="modal-title" style="color: white">LOGIN</h4>
            </div>

            <div class="modal-body" style="background-color: rgba(46, 62, 72, 0.93);border-radius: 0 0 18px 18px">
                <div class="container-fluid " class="row">
                    <form >
                        <div style="text-align: center; padding-top: 2em">
                            <input class="col-11 login-input no-outline" type="text" name="user" placeholder="USERNAME" autocomplete="off" >
                        </div>
                        <div style="text-align: center; padding-top: 2em">
                            <input class="col-11 login-input no-outline" type="password" name="pass"  placeholder="PASSWORD" autocomplete="off">
                        </div>
                        <div style="text-align: center; padding-top: 4em">
                            <input class="col-6 no-outline" type="submit" value="LOGIN" style="height: 3em; background-color: rgb(36, 123, 179); border: none; margin-bottom: 25px; border-radius: 10px; color: white; cursor: pointer;" >
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
<button id="my-button" style="display: none;" data-toggle="modal" data-target="#myModal">
    Open modal
</button>


@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/guest_part1_view/guest_part1_view.js") }}"></script>
@endsection	