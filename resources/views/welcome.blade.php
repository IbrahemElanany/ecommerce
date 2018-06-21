@extends('layouts.app')




@section('title')

    موقع العقارات
    |
    مرحبا بك زائرنا الكريم

@stop

@section('header')

    <style>
        .banner{
            background: url({{checkIfImageIsexist(getSetting('main_slider') , '/public/website/slider/' , '/website/slider/')}}) no-repeat center;
            min-height: 500px;
            width: 100%;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding-bottom: 100px;
        }
    </style>

    <script src=""></script> <!-- Modernizr -->
    {!! Html::style('main/css/reset.css') !!}
    {!! Html::style('main/css/style.css') !!}
    {!! Html::script('main/js/modernizr.js') !!}
@stop
@section('content')

    <div class="banner text-center">
        <div class="container">
            <div class="banner-info">
                <h1>
                    أهلا بك في

                    {{getSetting()}}

                </h1>
                <br>
                <div>

                {!! Form::open(['method'=>'get','url'=>'search']) !!}

                {{csrf_field()}}

                <div class="row">
                    <div class="col-lg-3">
                        {!! Form::select('bu_rooms',bu_rooms(),null,['class'=>'select2 form-control','placeholder'=>'عدد الغرف']) !!}
                    </div>
                    <div class="col-lg-3">
                        {!! Form::text('bu_square',null,['class'=>'form-control','placeholder'=>'مساحة العقار']) !!}
                    </div>
                    <div class="col-lg-3">
                        {!! Form::text('bu_price_to',null,['class'=>'form-control','placeholder'=>' سعر العقار إلي ']) !!}
                    </div>
                    <div class="col-lg-3">
                        {!! Form::text('bu_price_from',null,['class'=>'form-control','placeholder'=>' سعر العقار من ']) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        {!! Form::submit('إبحث',['class'=>'btn','style'=>'width:100%']) !!}
                    </div>
                    <div class="col-lg-3">
                        {!! Form::select('bu_type',bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
                    </div>
                    <div class="col-lg-3">
                        {!! Form::select('bu_place',bu_place(),null,['class'=>'form-control select2','placeholder'=>'منطقة العقار']) !!}
                    </div>
                    <div class="col-lg-3">
                        {!! Form::select('bu_rent',bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                </div>
                <a class="banner_btn" href="{{url('/showAllBuilding')}}">المـزيــد</a> </div>
        </div>
    </div>
    <div class="main">
        <ul class="cd-items cd-container">
            @foreach(\App\Bu::where('bu_status',1)->get() as $bu)
                <li class="cd-item effect8">
                    <img src="{{checkIfImageIsexist($bu->image,'/public/website/thumb/','/website/thumb/')}}" alt="{{$bu->name}}" title="{{$bu->name}}">
                    <a href="#0" data-id="{{$bu->id}}" class="cd-trigger" title="{{$bu->name}}">نبذة سريعة</a>
                </li> <!-- cd-item -->
            @endforeach
        </ul> <!-- cd-items -->

        <div class="cd-quick-view">
            <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li class="selected"><img class="imagebox" src="" alt="Product 1"></li>
                </ul> <!-- cd-slider -->

                <ul class="cd-slider-navigation">
                    <li><a class="cd-next" href="#0">Prev</a></li>
                    <li><a class="cd-prev" href="#0">Next</a></li>
                </ul> <!-- cd-slider-navigation -->
            </div> <!-- cd-slider-wrapper -->

            <div class="cd-item-info">
                <h2 class="titlebox"></h2>
                <p class="desbox"></p>

                <ul class="cd-item-action">
                    <li><a href="" class="pricebox add-to-cart"></a></li>
                    <li><a href="#0" class="morebox">إقرأ المزيد</a></li>
                </ul> <!-- cd-item-action -->
            </div> <!-- cd-item-info -->
            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->
                    </div>
                </div>
            </div>
        </div>

@stop

@section('footer')
    {!! Html::script('main/js/jquery-2.1.1.js') !!}
    {!! Html::script('main/js/velocity.min.js') !!}
    {!! Html::script('main/js/main.js') !!}
    <script>
        function urlHome() {
            return '{{\Illuminate\Support\Facades\Request::root()}}';
        }
        function noImageUrl() {
            return '{{getSetting('no_image')}}';
        }
    </script>
@stop