@extends('layouts.app')

@section('title')
    إتصل بنا
@stop

@section('header')
    {!! Html::style('cus/contact.css') !!}
    <style>
        .input-group-addon:first-child{
            border-left: 0;
            border-right: 1px solid #ccc;
        }
    </style>
@stop

@section('content')


    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1>
                        إتصل بنا
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    {!! Form::open(['method'=>'POST','action'=>'ContactController@store']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_message">
                                        الرسالة</label>
                                    <textarea name="contact_message" id="message" class="form-control" rows="9" cols="25" required="required"
                                              placeholder="من فضلك أكتب رسالتك"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_name">
                                        الإسم</label>
                                    <input type="text" name="contact_name" class="form-control" id="name" placeholder="من فضلك أدخل إسمك" required="required"
                                           value="{{\Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->name : ''}}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="contact_email">
                                        البريد الإلكتروني</label>
                                    <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i>
                                </span>
                                        <input type="email" name="contact_email" class="form-control" id="email" placeholder="من فضلك أدخل الايميل" required="required"
                                        value="{{\Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email : ''}}"
                                        /></div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_type">
                                        موضوع الرسالة</label>
                                    <select id="subject" name="contact_type" class="form-control" required="required">
                                        @foreach(contact() as $key => $con)
                                            <option value="{{$key}}">{{$con}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="banner_btn pull-right" id="btnContactUs">
                                    أرسل الرسالة</button>
                            </div>
                        </div>
                        <br>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> مكتبنا </legend>
                    <address>
                        <strong>{{nl2br(getSetting('Address'))}}.</strong><br>
                        <br>
                        <abbr title="Phone">
                            ت:</abbr>
                        {{getSetting('mobile')}}
                    </address>
                    <address>
                        <strong>{{nl2br(getSetting('sitename'))}}</strong><br>
                        <a href="mailto:{{nl2br(getSetting('email'))}}">{{nl2br(getSetting('email'))}}</a>
                    </address>
                </form>
            </div>
        </div>
    </div>
    {{--<center>--}}
    {{--<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>--}}
    {{--</center>--}}
    <br>
    <br>


@endsection

@section('footer')

@stop
