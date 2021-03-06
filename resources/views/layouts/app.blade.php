<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}
    {!! Html::script('website/js/jquery.min.js') !!}
    {!! Html::style('cus/css/select2.css') !!}

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{getSetting()}}
        @yield('title')
    </title>


    @yield('header')

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
{!! Html::style('cus/css/fonts.css') !!}

    <!-- Styles -->




</head>
<body style="direction: rtl">

    <div id="app" >

        <div class="header">
            <div class="container"> <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-paper-plane"></i> ONE</a>
                <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="images/nav_icon.png" alt="" /> </a>
                    <ul class="nav" id="nav">
                        <li class="current"><a href="{{url('/home')}}"> الرئيسية </a></li>
                        <li><a href="{{url('/showAllBuilding')}}"> كل العقارات </a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 إيجار <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(bu_type() as $keyType=>$type)
                                    <li style="width: 100%">
                                        <a class="dropdown-item" href="{{ url('/search?bu_rent=1&bu_type='.$keyType) }}">
                                            {{$type}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   تمليك    <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(bu_type() as $keyType=>$type)
                                    <li style="width: 100%">
                                        <a class="dropdown-item" href="{{ url('/search?bu_rent=0&bu_type='.$keyType) }}">
                                            {{$type}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>

                        <li><a href="about.html"> من نحن </a></li>
                        <li><a href="services.html"> خدماتنا </a></li>
                        <li><a href="{{url('/contact')}}"> اتصل بنا </a></li>
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('إضافة عضو') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('تسجيل خروج') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                        <div class="clear"></div>
                    </ul>

                </div>
            </div>
        </div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="footer">
        <div class="footer_bottom">
            <div class="follow-us">
                <a class="fa fa-facebook social-icon" href="{{getSetting('facebook')}}"></a>
                <a class="fa fa-twitter social-icon" href="{{getSetting('twitter')}}"></a>
                <a class="fa fa-youtube social-icon" href="{{getSetting('youtube')}}"></a>
            </div>
            <div class="copy">
                <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
            </div>
        </div>
    </div>

    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.flexslider.js') !!}
    {!! Html::script('website/js/responsive-nav.js') !!}
    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
        $('.select2').select2({
            dir : "rtl"
        });
    </script>



    @yield('footer')

</body>
</html>
