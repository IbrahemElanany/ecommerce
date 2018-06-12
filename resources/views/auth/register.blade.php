@extends('layouts.app')

{{--{!! Html::style('css/app.css') !!}--}}

@section('title')
    تسجيل عضوية جديدة
@stop


@section('content')

    <div class="container">
        <div class="contact_bottom">

            <hr>

            <h3>
                تسجيل عضوية جديدة
            </h3>

            <hr>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">


                    <div class="col-md-6 col-md-offset-6">
                        <input id="name" type="text" placeholder="إسم المستخدم" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6 col-md-offset-6">
                        <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6 col-md-offset-6">
                        <input id="password" type="password" placeholder="كلمة المرور" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6 col-md-offset-6">
                        <input id="password-confirm" type="password" placeholder="تأكيد كلمة المرور" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-btn fa-user" style="color: #FFFFFF"></i>
                            {{ __('تسجيل العضو') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix">

        </div>

        <br>

    </div>

@endsection
