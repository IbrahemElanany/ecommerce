
    @csrf

{{--form------------------------------------------------------------------------------}}

    {{csrf_field()}}


    <div class="form-group row{{ $errors->has('bu_name') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_name">إسم العقار</label>
        <div class="col-md-10">

            {!! Form::text('bu_name',null,['class'=>'form-control','required','autofocus']) !!}

            @if ($errors->has('bu_name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_rooms') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_rooms">عدد الغرف</label>
        <div class="col-md-10">

            {!! Form::text('bu_rooms',null,['class'=>'form-control','required','autofocus']) !!}

            @if ($errors->has('bu_rooms'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_rooms') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_price') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_price">سعر العقار</label>
        <div class="col-md-10">

            {!! Form::text('bu_price',null,['class'=>'form-control','required','autofocus']) !!}

            @if ($errors->has('bu_price'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_price') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group row{{ $errors->has('bu_rent') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_rent">نوع العملية</label>
        <div class="col-md-10">

            {!! Form::select('bu_rent',bu_rent(),null,['class'=>'form-control','required']) !!}

            @if ($errors->has('bu_rent'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_rent') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_square') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_square">مساحة العقار</label>
        <div class="col-md-10">

            {!! Form::text('bu_square',null,['class'=>'form-control','required','autofocus']) !!}

            @if ($errors->has('bu_square'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_square') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_type') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_type">نوع العقار</label>
        <div class="col-md-10">

            {!! Form::select('bu_type',bu_type(),null,['class'=>'form-control','required']) !!}

            @if ($errors->has('bu_type'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_type') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_place') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_place">منطقة العقار</label>
        <div class="col-md-10">

            {!! Form::select('bu_place',bu_place(),null,['class'=>'select2 form-control','required']) !!}

            @if ($errors->has('bu_place'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_place') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_meta') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_meta">الكلمات الدلالية</label>
        <div class="col-md-10">

            {!! Form::text('bu_meta',null,['class'=>'form-control','required','autofocus']) !!}

            @if ($errors->has('bu_meta'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_meta') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_small_des') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_small_des">وصف العقار لمحركات البحث</label>
        <div class="col-md-10">

            {!! Form::textarea('bu_small_des',null,['class'=>'form-control','required','autofocus','rows'=>4]) !!}

            @if ($errors->has('bu_small_des'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_small_des') }}</strong>
                </span>
            @endif
            <div class="alert alert-warning">
                لا يمكن ادخال اكثر من 160 حرف علي حسب معايير جوجل
            </div>
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_langtuide') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_langtuide">خط الطول</label>
        <div class="col-md-10">

            {!! Form::text('bu_langtuide',null,['class'=>'form-control','required','autofocus']) !!}

            @if ($errors->has('bu_langtuide'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_langtuide') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_latitude') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_latitude">دائرة العرض</label>
        <div class="col-md-10">

            {!! Form::text('bu_latitude',null,['class'=>'form-control','required','autofocus']) !!}

            @if ($errors->has('bu_latitude'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_latitude') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_large_des') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_large_des">وصف مطول للعقار</label>
        <div class="col-md-10">

            {!! Form::textarea('bu_large_des',null,['class'=>'form-control','required','autofocus','rows'=>4]) !!}

            @if ($errors->has('bu_large_des'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_large_des') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('bu_status') ? ' is-invalid' : '' }}">

        <label class="col-md-2" for="bu_status">حالة العقار</label>
        <div class="col-md-10">

            {!! Form::select('bu_status',bu_status(),null,['class'=>'form-control','required']) !!}

            @if ($errors->has('bu_status'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bu_status') }}</strong>
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
