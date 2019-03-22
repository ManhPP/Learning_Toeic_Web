<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/bootstrap.min.css") }}">

    @yield("css")

	{{--<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/animate.css") }}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/swiper.min.css") }}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/home-css.css") }}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::asset("css/prhome-css.css") }}">--}}
    
    <title>@yield('title')</title>
</head>
<body>
    @section('navbar')
        <nav id="bar" class="navbar navbar-expand-md navbar-dark fixed-top nav-background">
            <!-- Brand -->
            <a class="navbar-brand" href="#">BKTOEIC</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" id="toggle-bar" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end head-bar" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FORUM</a>
                    </li>
                    <li class="nav-item" id="btn-login">
                        <a class="nav-link" href="#">LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>
{{--         
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
        </button> --}}
    @show

    @yield('content')

    @section('footer')
        <!-- footer -->
        <div class="footer row">
            <div class="col-8">
                <div class="line">ABOUT US</div>
                <div class="line"><img src="{{URL::asset("imgs/locate.png")}}"><span>Địa chỉ:Số 1, Đại Cồ Việt, Bách Khoa, Hà Nội</span></div>
                <div class="line"><img src="{{URL::asset("imgs/contact.png")}}"><span>SDT:+84 327201345</span></div>
                <div class="line"><img src="{{URL::asset("imgs/email.png")}}"><span>Email: bktoiec@gmail.com</span></div>
            </div>
            <div class="col-4">
                <div class="line">CONTACT</div>
                <div class="line">
                    <img style="margin-right: 3px; width: 32px; height: 32px" src="{{URL::asset("imgs/fb.png")}}">
                    <img src="{{URL::asset("imgs/twitter.png")}}" style="width: 32px; height: 32px">
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ URL::asset("js/jquery-3.3.1.min.js") }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset("js/bootstrap.min.js") }}"></script>
    @show
    @yield("js")
</body>
</html>