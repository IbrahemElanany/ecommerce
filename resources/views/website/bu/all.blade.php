@extends('layouts.app')

@section('title')
    كل العقارات
@stop

@section('header')
    {!! Html::style('cus/buall.css') !!}
@stop

@section('content')


    <div class="container">
        <div class="row profile">
            <div class="col-lg-9">
                <ol class="breadcrumb" style="background-color: #FFFFFF;">
                    <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/showAllBuilding')}}">كل العقارات</a></li>

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
                    @include('website.bu.sharefile')
                    <div class="text-center">
                        {{$buAll->appends(\Illuminate\Support\Facades\Request::except('page'))->render()}}

                    </div>
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


@endsection

@section('footer')
    {!! Html::script('cus/buall.js') !!}
@stop
