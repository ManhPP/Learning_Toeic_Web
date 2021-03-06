@extends('layouts.master')
@section('title','practice part 5')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/guest_part5_view/guest_part5_view.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    
    <!-- part 5 -->
    <div
    class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
    <div class="header-content">
        <div>Practic part 5 (40 sentences)</div>
    </div>
    <div class="content">
        <div class="p1">
            <div class="direct">
                <span class="red">Rerection </span> <span>: A word or phrase
                    is missing in each of the sentences below. Four answer choices are
                    given below each sentence. Select the best answer to complete the
                    sentence. Then click on (A), (B), (C), or (D) on your test screen.</span>
            </div>
            <div class="list-cau">
                <?php $index = 0 ?>
                @foreach( $partDoc->cauPart5s as $cau)
                    <!-- mot cau -->
                    <div class="ques" data-asw="{{ $cau->dADung }}" data-id="{{ $cau->id }}">
                        <div>
                            <span class="no-ques">Câu {{ $index+1 }}</span>
                            <span class="ques-content">{{ $cau->cauHoi }}</span>
                        </div>
                        <div class="row">
                            <label class="col-12 col-md-6">
                                <input type="radio" name="choise{{ $index }}" value="A">{{ $cau->daA }}
                            </label>
                            <label class="col-12 col-md-6">
                                <input
                                type="radio" name="choise{{ $index }}" value="B">{{ $cau->daB }}
                            </label> 
                            <label class="col-12 col-md-6">
                                <input type="radio" name="choise{{ $index }}" value="C">{{ $cau->daC }}
                            </label>
                            <label class="col-12 col-md-6">
                                <input type="radio" name="choise{{ $index }}" value="D">{{ $cau->daD }}
                            </label>
                        </div>
                        <hr>
                    </div>
                    <?php $index += 1 ?>
                @endforeach
                <div class="noti"></div>
                <div style="text-align: center;">
                    <button id="submit">Nộp bài</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="myModal" style="padding: 0">
    <div class="modal-dialog">
        <div class="modal-content"
            style="border-right: 18px; border-radius: 18px">
            <div class="modal-header justify-content-center"
                style="background-color: rgb(50, 63, 71); border-radius: 18px 18px 0 0;">
                <h4 class="modal-title" style="color: white">LOGIN</h4>
            </div>

            <div class="modal-body"
                style="background-color: rgba(46, 62, 72, 0.93); border-radius: 0 0 18px 18px">
                <div class="container-fluid " class="row">
                    <form>
                        <div style="text-align: center; padding-top: 2em">
                            <input class="col-11 login-input no-outline" type="text"
                                name="user" placeholder="USERNAME" autocomplete="off">
                        </div>
                        <div style="text-align: center; padding-top: 2em">
                            <input class="col-11 login-input no-outline" type="password"
                                name="pass" placeholder="PASSWORD" autocomplete="off">
                        </div>
                        <div style="text-align: center; padding-top: 4em">
                            <input class="col-6 no-outline" type="submit" value="LOGIN"
                                style="height: 3em; background-color: rgb(36, 123, 179); border: none; margin-bottom: 25px; border-radius: 10px; color: white; cursor: pointer;">
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
    <button id="my-button" style="display: none;" data-toggle="modal"
    data-target="#myModal">Open modal</button>


@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/guest_part5_view/guest_part5_view.js") }}"></script>
@endsection	