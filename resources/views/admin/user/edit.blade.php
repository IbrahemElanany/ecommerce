@extends('admin.layouts.layout')

@section('title')
    تعديل عضو
@stop

@section('header')
@stop


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        تعديل العضو "
                        {{$user->name}}
                        "
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel/users')}}">التحكم في الأعضاء</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel/users/create')}}">إضافة عضو جديد</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/adminpanel/users/'.$user->name.'/edit')}}">

                                تعديل العضو "
                                {{$user->name}}
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
                             تعديل العضو "
                            {{$user->name}}
                            "
                        </h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">


                        {!! Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id]]) !!}

                            @include('admin.user.form')

                            {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            تعديل كلمة المرور
                        </h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">


                        {!! Form::open(['method'=>'post','action'=>['UsersController@changePassword',$user->id]]) !!}


                        <div class="form-group row{{ $errors->has('password') ? ' is-invalid' : '' }}">

                            <div class="col-md-6">

                                {!! Form::password('password',['class'=>'form-control','placeholder'=>'كلمة المرور']) !!}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                {!! Form::submit('تنفيـــــذ',['class'=>'btn btn-warning']) !!}
                                <i class="fa fa-btn fa-user" style="color: #FFFFFF"></i>
                            </div>
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </section>


@stop


@section('footer')

@stop