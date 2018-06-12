@extends('layouts.app')

@section('title')
    تسجيل الدخول
@stop

@section('content')

    <div class="container">
        <div class="contact_bottom">

            <hr>

            <h3>
                تسجيل الدخول
            </h3>

            <hr>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6 col-md-offset-6">
                        <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input style="float: right; margin-left: 10px" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('تذكرني') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-btn fa-sign-in" style="color: #FFFFFF"></i>
                            {{ __('تسجيل الدخول') }}
                        </button>

                        <a class="banner_btn" href="{{ route('password.request') }}">
                            {{ __('هل نسيت كلمة المرور ؟') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix">

        </div>

        <br>

    </div>



@endsection
