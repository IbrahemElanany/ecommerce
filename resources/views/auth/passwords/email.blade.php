@extends('layouts.app')

{{--{!! Html::style('css/app.css') !!}--}}

@section('title')
    إسترجاع كلمة المرور
@stop

@section('content')

    <div class="container">
        <div class="contact_bottom">

            <hr>

            <h3>
                إعادة تعيين كلمة المرور
            </h3>

            <hr>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

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
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('إرسال كلمة المرور للبريد الإلكتروني') }}
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
