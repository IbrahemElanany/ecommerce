@extends('admin.layouts.layout')

@section('title')
    إضافة عقار جديد
@stop

@section('header')
    {!! Html::style('cus/css/select2.css') !!}
@stop


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>إضافة عقار جديد </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel/bu')}}">التحكم في العقارات</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/adminpanel/bu/create')}}">إضافة عقار جديد</a></li>
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
                        <h3 class="card-title">إضافة عقار جديد</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">


                        {!! Form::open(['method'=>'POST','url'=>'/adminpanel/bu','files'=>true]) !!}


                        @include('admin.bu.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>


@stop


@section('footer')
    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
        $('.select2').select2({
            dir : "rtl"
        });
    </script>
@stop