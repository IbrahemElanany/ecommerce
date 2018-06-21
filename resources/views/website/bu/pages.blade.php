<div class="col-lg-3">
    <div class="profile-sidebar">
        <h2 style="text-align: center">خيارات العقارات</h2>
        <div class="profile-usermenu">
            <ul class="nav" style="padding-right: 0">
                <li class="active">
                    <a href="{{url('/showAllBuilding')}}">
                        <i class="fa fa-home"></i>
                        كل العقارات </a>
                </li>
                <li>
                    <a href="{{url('/ForRent')}}">
                        <i class="fa fa-money"></i>
                        إيجار </a>
                </li>
                <li>
                    <a href="{{url('/ForBuy')}}">
                        <i class="fa fa-bell"></i>
                        تمليك </a>
                </li>
                <li>
                    <a href="{{url('/type/0')}}">
                        <i class="fa fa-bell"></i>
                        شقة </a>
                </li>
                <li>
                    <a href="{{url('/type/1')}}">
                        <i class="fa fa-bell"></i>
                        فيلا </a>
                </li>
                <li>
                    <a href="{{url('/type/2')}}">
                        <i class="fa fa-bell"></i>
                        شالية </a>
                </li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
    <br>
    <div class="profile-sidebar">
        <h2 style="text-align: center">البحث المتقدم</h2>
        <div class="profile-usermenu" style="padding: 10px;">
            {!! Form::open(['method'=>'get','url'=>'search']) !!}

            {{csrf_field()}}

            <ul class="nav" style="padding-right: 0">
                <li>
                    {!! Form::text('bu_price_from',null,['class'=>'form-control','placeholder'=>' سعر العقار من ']) !!}
                </li>
                <br>
                <li>
                    {!! Form::text('bu_price_to',null,['class'=>'form-control','placeholder'=>' سعر العقار إلي ']) !!}
                </li>
                <br>
                <li>
                    {!! Form::text('bu_square',null,['class'=>'form-control','placeholder'=>'مساحة العقار']) !!}
                </li>
                <br>
                <li>
                    {!! Form::select('bu_rooms',bu_rooms(),null,['class'=>'form-control','placeholder'=>'عدد الغرف']) !!}
                </li>
                <br>
                <li>
                    {!! Form::select('bu_type',bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
                </li>
                <br>
                <li>
                    {!! Form::select('bu_place',bu_place(),null,['class'=>'form-control select2','placeholder'=>'منطقة العقار']) !!}
                </li>
                <br>
                <li>
                    {!! Form::select('bu_rent',bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
                </li>
                <br>
                <li>
                    {!! Form::select('bu_status',bu_status(),null,['class'=>'form-control','placeholder'=>'حالة العقار']) !!}
                </li>
                <li>
                    {!! Form::submit('إبحث',['class'=>'banner_btn']) !!}
                </li>

            </ul>
            {!! Form::close() !!}
        </div>
        <!-- END MENU -->
    </div>

</div>