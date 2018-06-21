
{{csrf_field()}}



    <div class="form-group row{{ $errors->has('contact_name') ? ' is-invalid' : '' }}">

        <div class="col-md-3">
            إسم المرسل
        </div>
        <div class="col-md-9">


                {!! Form::text('contact_name' , null ,['class'=>'form-control','required','autofocus','placeholder'=>'إسم المرسل']) !!}


            @if ($errors->has('contact_name'))
                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('contact_name') }}</strong>
                                                </span>
            @endif
        </div>
    </div>
<div class="clearfix"></div>

<div class="form-group row{{ $errors->has('contact_email') ? ' is-invalid' : '' }}">

    <div class="col-md-3">
        البريد الإلكتروني
    </div>
    <div class="col-md-9">


        {!! Form::text('contact_email' , null ,['class'=>'form-control','required','autofocus','placeholder'=>'البريد الإلكتروني']) !!}


        @if ($errors->has('contact_email'))
            <span class="invalid-feedback"><strong>{{ $errors->first('contact_email') }}</strong> </span>
        @endif
    </div>
</div>
<div class="clearfix"></div>


<div class="form-group row{{ $errors->has('contact_message') ? ' is-invalid' : '' }}">

    <div class="col-md-3">
         الرسالة
    </div>
    <div class="col-md-9">


        {!! Form::textarea('contact_message' , null ,['class'=>'form-control','required','autofocus','placeholder'=>'الرسالة']) !!}


        @if ($errors->has('contact_message'))
            <span class="invalid-feedback"><strong>{{ $errors->first('contact_message') }}</strong> </span>
        @endif
    </div>
</div>
<div class="clearfix"></div>

<div class="form-group row{{ $errors->has('contact_type') ? ' is-invalid' : '' }}">

    <div class="col-md-3">
        نوع الرسالة
    </div>
    <div class="col-md-9">


        {!! Form::select('contact_type' , contact(),null ,['class'=>'form-control','required']) !!}


        @if ($errors->has('contact_type'))
            <span class="invalid-feedback"><strong>{{ $errors->first('contact_type') }}</strong> </span>
        @endif
    </div>
</div>


<div class="clearfix"></div>

<div class="form-group row{{ $errors->has('contact_type') ? ' is-invalid' : '' }}">

    <div class="col-md-12">


        {{ Form::button(' حفظ  '.'<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-warning'] )  }}

    </div>
</div>
<div class="clearfix"></div>
<br><br>

