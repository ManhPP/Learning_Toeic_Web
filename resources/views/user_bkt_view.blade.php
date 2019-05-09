@extends('layouts.master')
@section('title','lam bai kiem tra')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/user_bkt_view/user_bkt_view.css") }}">
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
                <div class="audio col-12" id="audio-bkt">
                            <audio controls="controls">
                                <source src="{{ $bkt->audio }}" />
                            </audio>
                </div>
            </div>
    
            <div style="display:none">
                {{ $part1 = "" }}
                {{ $part2 = "" }}
                {{ $part3 = "" }}
                {{ $part4 = "" }}
                {{ $part5 = "" }}
                {{ $part6 = "" }}
                {{ $part7 = "" }}
                {{ $numQues = 1 }}
            </div>
            
            @foreach($bkt->listeningParts as $partNghe)
                @if($partNghe->loaiPart == 'Part 1')
                    <div style="display:none">
                        {{ $part1 = $partNghe }}
                    </div>
                    @php
                        error_log($part1);   
                    @endphp
                @endif

                @if($partNghe->loaiPart == 'Part 2')
                    <div style="display:none">
                        {{ $part2 = $partNghe }}
                    </div>
                @endif

                @if($partNghe->loaiPart == 'Part 3')
                    <div style="display:none">
                        {{ $part3 = $partNghe }}
                    </div>
                @endif

                @if($partNghe->loaiPart == 'Part 4')
                    <div style="display:none">
                        {{ $part4 = $partNghe }}
                    </div>
                @endif
                
            @endforeach
    
    
            @foreach($bkt->readingParts as $partDoc)
                
                @if($partDoc->loaiPart == 'Part 5')
                    <div style="display:none">
                        {{ $part5 = $partDoc }}
                    </div>
                @endif

                @if($partDoc->loaiPart == 'Part 6')
                    <div style="display:none">
                        {{ $part6 = $partDoc }}
                    </div>
                @endif

                @if($partDoc->loaiPart == 'Part 7')
                    <div style="display:none">
                        {{ $part7 = $partDoc }}
                    </div>
                @endif
            @endforeach
    
            {{-- <!-- part 1 -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 show"
                data-part="1">
                <div class="header-content">
                    <div>Practic part 1 (20 sentences)</div>
                </div>
                <div class="content">
                    <div class="p1">
    
                        <!-- intro img-->
                        <div class="intro">
                            <img src="{{ $part1->intro }}">
                        </div>
                        <hr>
                        <!-- list cau hoi -->
                        <div class="list-cau">
                            <div style="display:none">
                                {{ $index = 1 }}
                            </div>
                            
                            @foreach($part1->part1 as $cauPart1)
                            
                                <div class="ques" id="q{{ $index }}" data-asw="{{ $cauPart1->dADung }}" data-ques="{{ $numQues }}">
                                    <div class="no-ques">Câu {{ $numQues }}</div>
                                    <div class="div-img">
                                        <img src="{{ $cauPart1->anh }}">
                                    </div>
                                    <div class="tick col-12 col-sm-10 row">
                                        <label class="col-3"><input type="radio"
                                            name="choise{{ $numQues }}" value="A">A</label> <label
                                            class="col-3"><input type="radio"
                                            name="choise{{ $numQues }}" value="B">B</label> <label
                                            class="col-3"><input type="radio"
                                            name="choise{{ $numQues }}" value="C">C</label> <label
                                            class="col-3"><input type="radio"
                                            name="choise{{ $numQues }}" value="D">D</label>
                                    </div>
                                </div>

                                <div style="display:none">
                                        {{ $index += 1 }}
                                        {{ $numQues += 1 }}
                                </div>
                        
                            @endforeach
                        </div>
                    </div>
                    <!-- <div style="text-align: center; padding: 3em 0 0 0;">
                        <div id="num-right" style="padding-bottom: 2em; color: blue;"></div>
                        <input class="submit-asw" type="button" value="Nộp bài">
                    </div> -->
                </div>
            </div>
    
            <!-- part 2 -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 hide"
                data-part="2">
                <div class="header-content">
                    <div>Practic part 2 (30 sentences)</div>
                </div>
                <div class="content">
                    <div class="p1">
                        
                        <!-- intro img-->
                        <div class="intro">
                            <img src="{{ $part2->intro }}">
                        </div>
                        <hr>
                        <!-- list cau hoi -->
                        <div class="list-cau">
                            <!-- cau1 -->
                            <div style="display:none">
                                    {{ $index = 1 }}
                            </div>
                            @foreach($part2->part2 as $cau)
                            
                                <div class="ques" data-asw="{{ $cau->dADung }}" data-ques="{{ $numQues }}">
                                    <div class="no-ques" data-id="{{ $cau->id }}">Câu {{ $numQues }}</div>
                                    <div class="tick col-12 col-sm-10 row">
                                        <label class="col-4"><input type="radio"
                                            name="choise{{ $numQues }}" value="A">A</label> <label
                                            class="col-4"><input type="radio"
                                            name="choise{{ $numQues }}" value="B">B</label> <label
                                            class="col-4"><input type="radio"
                                            name="choise{{ $numQues }}" value="C">C</label>
                                    </div>
                                </div>
                                <div style="display:none">
                                        {{ $index += 1 }}
                                        {{ $numQues += 1 }}
                                </div>
                            @endforeach
                        </div>
    
                        <!-- <div style="text-align: center; padding: 3em 0 0 0;">
                            <div id="num-right" style="padding-bottom: 2em; color: blue;"></div>
                            <input class="submit-asw" type="button" value="Nộp bài">
                        </div> -->
                    </div>
                </div>
            </div>
    
            <!-- part 3 -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 hide"
                data-part="3">
                <div class="header-content">
                    <div>Practic part 3 (30 sentences)</div>
                </div>
                <div class="content">
                    <div class="p1">
                        
                        <!-- intro img-->
                        <div class="intro">
                            <img src="{{ $part3->intro }}">
                        </div>
                        <hr>
                        <!-- list cau hoi -->
                        <div class="list-cau">

                            <div style="display:none">
                                    {{ $index = 0 }}
                            </div>
                            @foreach($part3->conversation_paragraph as $dht)
                                @foreach($dht->conversationSentence as $cht)

                                    @if( $index%3 == 0 )
									<div class="block" data-index="{{ $index }}">
										<p class="ques refer-ques">Questions {{ $index + 1}}-{{ $index + 3}}
											refer to the following conversation.</p>
                                    @endif
                                    <div class="ques" data-index="{{ $index }}"
                                        data-asw="{{ $cht->dADung }}">
                                        <div>
                                            <div class="no-ques">Câu {{ $index + 1}}</div>
                                            <div class="ques-content">{{ $cht->cauHoi }}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 col-md-6"><input type="radio"
                                                name="choise{{ $index }}" value="A"> A<span class="asws">{{ $cht->daA }}</span></label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                name="choise{{ $index }}" value="B"> B<span class="asws">{{ $cht->daB }}</span></label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                name="choise{{ $index }}" value="C"> C<span class="asws">{{ $cht->daC }}</span></label>
                                            <label class="col-12 col-md-6"><input type="radio"
                                                name="choise{{ $index }}" value="D"> D<span class="asws">{{ $cht->daD }}</span></label>
                                        </div>
                                        <hr>
                                    </div>
                                    @if( $index%3 == 2 )
                                        </div>
                                    @endif
                                    <div style="display:none">
                                        {{ $index += 1 }}
                                    </div>
                                        
                                    @endforeach
                                @endforeach
                            <!-- <div style="text-align: center; margin-top: 2em;">
                                <div id="num-right" style="padding-bottom: 2em; color: blue;"></div>
                                <input style="width: 5em;" type="button" value="Nộp bài"
                                    class="submit-asw">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- part 4 -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 hide"
                data-part="4">
                <div class="header-content">
                    <div>Practic part 4 (30 sentences)</div>
                </div>
                <div class="content">
                    <div class="p1">
                        
    
                        <!-- intro img-->
                        <div class="intro">
                            <img src="{{ $part4->intro }}">
                        </div>
                        <hr>
                        <!-- list cau hoi -->
                        <div class="list-cau">
                            <div style="display:none">
                                {{ $index = 0 }}
                            </div>
                            @foreach($part4->conversation_paragraph as $dht)
                                @foreach($dht->conversationSentence as $cht)
                                        @if( $index%3 == 0 )
                                        <div class="block" data-index="{{ $index }}">
                                            <p class="ques refer-ques">Questions {{ $index + 1}}-{{ $index + 3}}
                                                refer to the following conversation.</p>
                                        @endif
                                        <div class="ques" data-index="{{ $index }}"
                                            data-asw="{{ $cht->dADung }}">
                                            <div>
                                                <div class="no-ques">Câu {{ $index + 1}}</div>
                                                <div class="ques-content">{{ $cht->cauHoi }}</div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 col-md-6"><input type="radio"
                                                    name="choise{{ $index }}" value="A"> A<span class="asws">{{ $cht->daA }}</span></label>
                                                <label class="col-12 col-md-6"><input type="radio"
                                                    name="choise{{ $index }}" value="B"> B<span class="asws">{{ $cht->daB }}</span></label>
                                                <label class="col-12 col-md-6"><input type="radio"
                                                    name="choise{{ $index }}" value="C"> C<span class="asws">{{ $cht->daC }}</span></label>
                                                <label class="col-12 col-md-6"><input type="radio"
                                                    name="choise{{ $index }}" value="D"> D<span class="asws">{{ $cht->daD }}</span></label>
                                            </div>
                                            <hr>
                                        </div>
                                        @if( $index%3 == 2 )
                            </div>
                            @endif
                            <div style="display:none">
                                {{ $index += 1 }}
                            </div>
                        @endforeach
                        @endforeach
                        <!-- <div style="text-align: center; margin-top: 2em;">
                            <div id="num-right" style="padding-bottom: 2em; color: blue;"></div>
                            <input style="width: 5em;" type="button" value="Nộp bài"
                                class="submit-asw">
                        </div> -->
                    </div>
                </div>
            </div>
            </div> --}}
        
            <!-- part 5 -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 hide"
                data-part="5"
                >
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
                            <div style="display:none">
                                {{ $index = 0 }}
                            </div>
                            @foreach($part5->cauPart5s as $cau)
                           
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
                                    <div style="display:none">
                                        {{ $index += 1 }}
                                    </div>
                                @endforeach
                            <!-- <div class="noti"></div>
                            <div style="text-align: center;">
                                <button class="submit-asw">Nộp bài</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
{{--     
            <!-- part 6 -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 hide"
                data-part="6">
                <div class="header-content">
                    <div>Practic part 6 (12 sentences)</div>
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
                                <div style="display:none">
                                    {{ $index = 1 }}
                                </div>
                            @foreach($part6->part6Paragraphs as $doanVan)
                                <p class="ques refer-ques">Questions {{ $index }}-{{ $index+2 }} refer to the following conversation.</p>
                                @foreach($doanVan->part6 as $cau)
                                
                                    <div class="ques" data-asw="{{$cau->daDung }}">
                                            <div>
                                                <div class="no-ques">Câu {{$index }}</div>
                                                <span class="ques-content">{{$cau->cauHoi }}</span>
                                            </div>
                                            <div class="row">
                                                <label class="scol-12 col-md-6"><input type="radio"
                                                                                        name="choise{{$cau->id }}" value="A">{{$cau->daA}}</label> <label
                                                        class="col-12 col-md-6"><input type="radio"
                                                                                        name="choise{{$cau->id }}" value="B">{{$cau->daB}}</label> <label
                                                        class="col-12 col-md-6"><input type="radio"
                                                                                        name="choise{{$cau->id }}" value="C">{{$cau->daC}}</label> <label
                                                        class="col-12 col-md-6"><input type="radio" 
                                                                                        name="choise{{$cau->id }}" value="D">{{$cau->daD }}</label>
                                            </div>
                                            <hr>
                                        </div>
                                        <div style="display:none">
                                            {{ $index += 1 }}
                                        </div>
            
                                    @endforeach
                                @endforeach
            
                            <!-- <div class="noti"></div>
                            <div style="text-align: center;">
                                <button class="submit-asw">Nộp bài</button>
                            </div> -->
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- part 7 -->
            <div
                class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 hide"
                data-part="7"
                >
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
                            <div style="display:none">
                                {{ $index = 1 }}
                            </div>
                            @foreach($part7->part7Paragraphs as $doan)
                                @if(count($doan->doanVan2) == 0)
                                
                                    <div data-id="{{ $doan->id }}">
                                        <p class="ques refer-ques">Questions {{ $index }}-{{ $index + count($doan->listCauPart7) -1 }} refer to the
                                                following conversation.</p>
                                        <div class="paragrap">
                                            <img src="{{ $doan->doanVan1 }}">
                                        </div>
                                        @foreach($doan->cauPart7s as $cau)
                                        
                                            <div class="ques" data-asw="{{ $cau->daDung }}" data-ques="{{ $numQues }}">
                                                <div>
                                                    <span class="no-ques">Câu {{ $numQues }}</span> <span>{{ $cau->cauHoi }}</span>
                                                </div>
                                                <div class="row">
                                                    <label class="col-12 col-md-6"><input type="radio"
                                                        name="choise{{ $numQues }}" value="A">{{ $cau->daA }}</label> <label class="col-12 col-md-6"><input
                                                        type="radio" name="choise{{ $numQues }}" value="B">{{ $cau->daB }}</label> <label
                                                        class="col-12 col-md-6"><input type="radio"
                                                        name="choise{{ $numQues }}" value="C">{{ $cau->daC }}</label> <label class="col-12 col-md-6"><input
                                                        type="radio" name="choise{{ $numQues }}" value="D">{{ $cau->daD }}</label>
                                                </div>
                                                <hr>
                                            </div>
                                            <div style="display:none">
                                                {{ $index += 1 }}
                                                {{ $numQues += 1 }}
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                            <!-- cho doan kep -->
                            @foreach($part7->part7Paragraphs as $doan)
                                @if(count($doan->doanVan2) > 0)
                                    <div>
                                        <p class="ques refer-ques">Questions {{ $index }}-{{ $index + count($doan->listCauPart7) -1 }} refer to the
                                                following conversation.</p>
                                        <div class="paragrap">
                                            <img src="{{ $doan->doanVan1 }}">
                                            <img src="{{ $doan->doanVan2 }}">
                                        </div>
                                        @foreach($doan->cauPart7s as $cau)
                                        
                                            <div class="ques" data-asw="{{ $cau->daDung }}" data-ques="{{ $numQues }}">
                                                <div>
                                                    <span class="no-ques">Câu {{ $numQues }}</span> <span>{{ $cau->cauHoi }}</span>
                                                </div>
                                                <div class="row">
                                                    <label class="col-12 col-md-6"><input type="radio"
                                                        name="choise{{ $numQues }}" value="A">{{ $cau->daA }}</label> <label class="col-12 col-md-6"><input
                                                        type="radio" name="choise{{ $numQues }}" value="B">{{ $cau->daB }}</label> <label
                                                        class="col-12 col-md-6"><input type="radio"
                                                        name="choise{{ $numQues }}" value="C">{{ $cau->daC }}</label> <label class="col-12 col-md-6"><input
                                                        type="radio" name="choise{{ $numQues }}" value="D">{{ $cau->daD }}</label>
                                                </div>
                                                <hr>
                                            </div>
                                            <div style="display:none">
                                                {{ $index += 1 }}
                                                {{ $numQues += 1 }}
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                            <div class="noti"></div>
                            <div style="text-align: center;">
                                <button class="submit-asw">Nộp bài</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> --}}
    
        <ul class="pagination" style="justify-content: center; margin-top: 2em">
            <li class="page-item page-num active" data-item="1"><span class="page-link">1</span></li>				
            <li class="page-item page-num" data-item="2"><span class="page-link">2</span></li>				
            <li class="page-item page-num" data-item="3"><span class="page-link">3</span></li>				
            <li class="page-item page-num" data-item="4"><span class="page-link">4</span></li>				
            <li class="page-item page-num" data-item="5"><span class="page-link">5</span></li>				
            <li class="page-item page-num" data-item="6"><span class="page-link">6</span></li>				
            <li class="page-item page-num" data-item="7"><span class="page-link">7</span></li>				
        </ul>
    
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
    <script type="text/javascript" src="{{ URL::asset("js/user_bkt_view/user_bkt_view.js") }}"></script>
@endsection	