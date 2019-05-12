@extends('layouts.master')
@section('title','luyen nghe')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/guest_luyennghe_home/guest_luyennghe_home.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/swiper.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">
@endsection
@section('navbar')
    @parent
@endsection

@section('content')
    
<!-- body -->
<div class="body">

    <!-- cover -->
    <div class="cover"
        style="background: url('{{ URL::asset("imgs/guest-luyennghe-home/cover.jpg") }}')">

    </div>

    <!-- suggess -->
        @if(count($arrPN) != 0)
        <div class="suggess content-body row">
            <div class="header-suggess">
                <span>Top of listenings</span>
            </div>
            <!-- Swiper -->
            <div class="swiper-container col-8 col-sm-11" id="mySwiper">
                <div class="swiper-wrapper">
                    <div id="num-sile" class="hide">{{ count($arrPN) }}</div>
                    @foreach($arrPN as $partNghe)
                        <div class="swiper-slide row suggest" data-id="{{ $partNghe->id }}">
                            <div class="cover-lession col-12">
                                <img
                                    src="{{ URL::asset("imgs/guest-luyennghe-home/cover-lession.jpg") }}">
                            </div>
                            <div class="detail-lession col-12">
                                <span>{{ $partNghe->loaiPart }}: </span><span>{{ $partNghe->tittle }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    @endif

    <!-- search -->
    <div class="content-body">
        <div class="header-suggess row">
            <span class="col-3">Search</span>
            <div class="search-div col-9">
                <select name="part" id="select-part">
                    <option value="0">All</option>
                    <option value="1">Part 1</option>
                    <option value="2">Part 2</option>
                    <option value="3">Part 3</option>
                    <option value="4">Part 4</option>
                </select>
                <span style="position: relative;">
                    <input id="search-input" type="text" name="search"
                        placeholder="Search listening">
                    <img class="hide" id="del-search" src="{{ URL::asset("imgs/cross.png") }}">
                </span>
                <input id="search-submit"
                        type="submit" value="SEARCH">
            </div>
        </div>
    </div>


    <!-- table -->
    <div class="container-fluid">
        <div class="table-responsive-sm table-outter">
            <table class="table justify-content-start table-hover"
                id="search-table">
                <thead>
                    <tr class="d-flex">
                        <th class="col-12 col-sm-10 col-md-7">Listening name</th>
                        <th class="col-0 col-sm-2 col-md-5 count">Access count</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            
            <!-- pagination -->
            <div class="col-12 row hide" id="pagination-div"
                style="padding-top: 1em; padding-bottom: 1em;">
                <span class="col-12">
                    <ul class="pagination" data-max-page="0" style="justify-content: center">
                        
                    </ul>
                </span>
            </div>
            
        </div>
    </div>
</div>

<div style="display: none">
    <div id="root-path">{{ URL("") }}</div>
    <div id="image-search">{{ URL::asset("imgs/guest-luyennghe-home/book.png") }}</div>
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
    <div style="display: none">
        <div id="path-search">{{Route("listeningpartcontroller.searchlistening")}}</div>
        
        {{-- <div id="path-view">{{Route("readingpartcontroller.dotest")}}</div> --}}
    </div>
@endsection

@section('footer')
    @parent
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset("js/guest_luyennghe_home/guest_luyennghe_home.js") }}"></script>
    <script type="text/javascript" src="{{ URL::asset("js/swiper.js") }}"></script>
@endsection	