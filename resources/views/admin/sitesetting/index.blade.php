@extends('admin.layouts.layout')

@section('title')
    تغيير إعدادات الموقع
@stop

@section('header')
@stop


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تغيير إعدادات الموقع </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/adminpanel/sitesetting')}}">تغيير إعدادات الموقع</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تغيير إعدادات الموقع</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">

                        {!! Form::open(['method'=>'POST','action'=>'SiteSettingController@store']) !!}

                            {{csrf_field()}}

                            @foreach($siteSetting as $setting)

                                    <div class="form-group row{{ $errors->has('name') ? ' is-invalid' : '' }}">

                                        <div class="col-md-2">
                                            {{$setting->slug}}
                                        </div>
                                        <div class="col-md-10">

                                            @if($setting->type == 0)

                                                {!! Form::text($setting->namesetting , $setting->value ,['class'=>'form-control','required','autofocus','placeholder'=>'إسم الإعدادات']) !!}

                                            @else

                                                {!! Form::textarea($setting->namesetting , $setting->value ,['class'=>'form-control','required','autofocus','placeholder'=>'إسم الإعدادات']) !!}

                                            @endif

                                            @if ($errors->has($setting->namesetting))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first($setting->namesetting) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                            @endforeach

                            {{ Form::button(' حفظ الإعدادات '.'<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-warning'] )  }}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop


@section('footer')

@stop