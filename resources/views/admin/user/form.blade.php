
    @csrf

{{--form------------------------------------------------------------------------------}}

    {{csrf_field()}}


    <div class="form-group row{{ $errors->has('name') ? ' is-invalid' : '' }}">


        <div class="col-md-6 col-md-offset-6">

            {!! Form::text('name',null,['class'=>'form-control','required','autofocus','placeholder'=>'إسم المستخدم']) !!}

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('admin') ? ' is-invalid' : '' }}">


        <div class="col-md-6 col-md-offset-6">

            {!! Form::select('admin',['0'=>'user','1'=>'admin'],null,['class'=>'form-control','required']) !!}

            @if ($errors->has('admin'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('admin') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('email') ? ' is-invalid' : '' }}">

        <div class="col-md-6 col-md-offset-6">

            {!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'البريد الإلكتروني']) !!}

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    @if(!isset($user))

        <div class="form-group row{{ $errors->has('password') ? ' is-invalid' : '' }}">

            <div class="col-md-6 col-md-offset-6">

                {!! Form::password('password',['class'=>'form-control','required','placeholder'=>'كلمة المرور']) !!}

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                @endif
            </div>
        </div>



        <div class="form-group row{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">

            <div class="col-md-6 col-md-offset-6">

                {!! Form::password('password_confirmation',['class'=>'form-control','required','unique','placeholder'=>'تأكيد كلمة المرور']) !!}

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                @endif
            </div>
        </div>
    @endif
    <div class="form-group row mb-0">
        <div class="col-md-12">
            {!! Form::submit('تنفيـــــذ',['class'=>'btn btn-warning']) !!}
                <i class="fa fa-btn fa-user" style="color: #FFFFFF"></i>
        </div>
    </div>
