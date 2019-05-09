@extends("layouts.master")
@section("title","Part 7")
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/guest-part7-view/guest-part7-view.css") }}">
@endsection
@section('navbar')
    @parent
@endsection
@section('content')
    <!-- part 7 -->
    <div
            class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
        <div class="header-content">
            <div>Practic part 7 (40 sentences)</div>
        </div>
        <div class="content">
            <div class="p1">
                <div class="direct">
                    <span class="red">Directions </span> <span>: In this part,
						you will read a selection of texts, such as magazine and newspaper
						articles, letters, and advertisements. Each text is followed by
						several questions. Select the best answer for each question and
						click on (A), (B), (C), or (D) on your test screen.</span>
                </div>

                <div class="list-cau">
                    <!-- cho doan don -->
                    <?php $index = 1 ?>
                    @foreach($partDoc->part7Paragraphs as $doan)
                            @if( strlen($doan->doanVan2) == 0)
                            <div data-id="{{$doan->id }}">
                                <p class="ques refer-ques">Questions {{$index }}-{{$index+count($doan->part7)-1 }} refer to the
                                    following conversation.</p>
                                <div class="paragrap">
                                    <img src="{{URL::asset($doan->doanVan1) }}">
                                </div>
                                    @foreach($doan->cauPart7s as $cau)
                                    <div class="ques" data-asw="{{$cau->daDung }}">
                                        <div>
                                            <span class="no-ques">Câu {{$index }}</span> <span>{{$cau->cauHoi }}</span>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="A">{{$cau->daA }}</label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="B">{{$cau->daB }}</label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="C">{{$cau->daC }}</label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="D">{{$cau->daD }}</label>
                                        </div>
                                        <hr>
                                    </div>
                                    <?php $index +=1 ?>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                    <!-- cho doan kep -->
                    @foreach($partDoc->part7Paragraphs as $doan)
                        @if(strlen($doan->doanVan2) > 0)
                            <div>
                                <p class="ques refer-ques">Questions {{$index }} - {{$index + count($doan->part7) -1}} refer to the
                                    following conversation.</p>
                                <div class="paragrap">
                                    <img src="{{URL::asset(''.$doan->doanVan1.'') }}">
                                    <img src="{{URL::asset(''.$doan->doanVan2.'') }}">
                                </div>

                                @foreach($doan->cauPart7s as $cau)
                                    <div class="ques" data-asw="{{$cau->daDung }}">
                                        <div>
                                            <span class="no-ques">Câu {{$index }}</span> <span>{{$cau->cauHoi }}</span>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="A">{{$cau->daA }}</label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="B">{{$cau->daB }}</label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="C">{{$cau->daC }}</label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                                                  name="choise{{$index }}" value="D">{{$cau->daD }}</label>
                                        </div>
                                        <hr>
                                    </div>
                                    <?php $index+=1 ?>
                                @endforeach
                            </div>
                        @endif
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



    <div style="display: none;">
        <div id="root-path">{{URL("")}}</div>
        {{--<div id="id-user">{{$acc.id }}</div>--}}
    </div>

@endsection

@section('footer')
    @parent
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/guest-part7-view/guest-part7-view.js") }}"></script>
@endsection

