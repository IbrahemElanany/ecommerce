@extends('layouts.app')

@section('title')

    {{$buInfo->bu_name}}
@stop

@section('header')
    {!! Html::style('cus/buall.css') !!}
@stop

@section('content')


    <div class="container">
        <div class="row profile">
            <div class="col-lg-9">
                <ol class="breadcrumb" style="background-color: #FFFFFF;">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/showAllBuilding')}}">كل العقارات</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/SingleBuilding/'.$buInfo->id)}}">
                            العقار:
                            {{$buInfo->bu_name}}
                        </a></li>

                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key => $value)
                                <li class="breadcrumb-item "><a href="{{url('/search?'.$key.'='.$value)}}">{{searchField()[$key]}} :
                                        @if($key == 'bu_place')
                                            {{bu_place()[$value]}}
                                        @elseif($key == 'bu_type')
                                            {{bu_type()[$value]}}
                                        @elseif($key == 'bu_rent')
                                            {{bu_rent()[$value]}}
                                        @else
                                            {{$value}}
                                        @endif
                                    </a></li>
                            @endforeach
                        @endif
                    @endif
                </ol>
                <div class="profile-content">
                    <h1>{{$buInfo->bu_name}}</h1>
                    
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('/search?bu_price='.$buInfo->bu_price)}}" class="btn btn-default bu_detail">
                            السعر :
                            {{$buInfo->bu_price}}
                        </a>
                        <a href="{{url('/search?bu_square='.$buInfo->bu_square)}}" class="btn btn-default bu_detail">
                            المساحة :
                            {{$buInfo->bu_square}}
                        </a>
                        <a href="{{url('/search?bu_place='.$buInfo->bu_place)}}" class="btn btn-default bu_detail">
                            المنطقة :
                            {{bu_place()[$buInfo->bu_place]}}
                        </a>
                        <a href="{{url('/search?bu_rooms='.$buInfo->bu_rooms)}}" class="btn btn-default bu_detail">
                            عدد الغرف :
                            {{$buInfo->bu_rooms}}
                        </a>
                        <a href="{{url('/search?bu_rent='.$buInfo->bu_rent)}}" class="btn btn-default bu_detail">
                            نوع العملية :
                            {{bu_rent()[$buInfo->bu_rent]}}
                        </a>
                        <a href="{{url('/search?bu_type='.$buInfo->bu_type)}}" class="btn btn-default bu_detail">
                            نوع العقار :
                            {{bu_type()[$buInfo->bu_type]}}
                        </a>
                        <br><br>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>

                    </div>
                    <hr>
                    <img src="{{checkIfImageIsexist($buInfo->image,'/public/website/thumb/','/website/thumb/')}}" class="img-responsive" alt="صورة العقار">
                    <hr>
                    <p>
                        {!! nl2br($buInfo->bu_large_des) !!}
                    </p>
                    <hr>
                    <div id="map" style="width:100%;height:500px"></div>
                </div>
                <br>
                <div class="profile-content">

                    <h3>عقارات أخري قد تهمك</h3>
                    <hr>
                    @include('website.bu.sharefile',['buAll'=>$same_rent])
                    <hr>
                    @include('website.bu.sharefile',['buAll'=>$same_type])
                </div>
            </div>
            @include('website.bu.pages')
        </div>
    </div>
    {{--<center>--}}
    {{--<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>--}}
    {{--</center>--}}

    <br>
    <br>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b2a9cc32d71fe5c"></script>

@endsection

@section('footer')

    <script>
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng({{$buInfo->bu_latitude}},{{$buInfo->bu_langtuide}});
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas,mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>

    {!! Html::script('cus/buall.js') !!}
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>


@stop
