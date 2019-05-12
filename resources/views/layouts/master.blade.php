<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/master.css") }}">

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
            <a class="navbar-brand" href="{{URL("")}}">BKTOEIC</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" id="toggle-bar" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end head-bar" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL("")}}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route("discussionController.home")}}">FORUM</a>
                    </li>
                    @if( empty($userLogin) || $userLogin==null)
                        <li class="nav-item" id="btn-login">
                            <a class="nav-link" href="{{Route('mylogincontroller.login')}}">LOGIN</a>
                        </li>
                    @else
                        <li class="nav-item" id="btn-ava">
                            <div id="ava">{{str_limit($userLogin->hoTen, $limit = 1, $end='')}}</div>
                            <div id="menu-acc" class="hide">
                                <form action="{{Route("mylogincontroller.logout")}}" method="get">
                                    <div id="bnt-logout">Logout</div>
                                </form>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
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
        <script>
            $(document).on("click", "#bnt-logout", function(){
               $(this).parent().submit();
            });

        </script>
    @show
    @yield("js")
</body>
</html>