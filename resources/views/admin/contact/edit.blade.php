@extends('admin.layouts.layout')

@section('title')
    تعديل رسائل الموقع
@stop

@section('header')
@stop


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        تعديل رسائل الموقع "
                        {{$contact->contact_name}}
                        "
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel/contact')}}">التحكم في رسائل الموقع</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/adminpanel/contact/'.$contact->contact_name.'/edit')}}">

                                تعديل رسائل الموقع "
                                {{$contact->contact_name}}
                                "

                            </a></li>
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
                        <h3 class="card-title">
                            تعديل رسائل الموقع "
                            {{$contact->contact_name}}
                            "
                        </h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">


                        {!! Form::model($contact,['method'=>'PATCH','action'=>['ContactController@update',$contact->id]]) !!}

                            @include('admin.contact.form')

                            {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </section>




@stop


@section('footer')

@stop