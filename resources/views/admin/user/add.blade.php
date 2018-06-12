@extends('admin.layouts.layout')

@section('title')
    إضافة عضو
@stop

@section('header')
@stop


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>أضف عضو </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel/users')}}">التحكم في الأعضاء</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/adminpanel/users/create')}}">إضافة عضو جديد</a></li>
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
                        <h3 class="card-title">أضف عضو جديد</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">

                        <form method="POST" action="{{ url('/adminpanel/users') }}">

                            @include('admin.user.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


@stop


@section('footer')

@stop