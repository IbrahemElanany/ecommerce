@if(count($buAll)>0)



    @foreach($buAll as $key=>$bu)

            @if($key %3 == 0 && $key != 0)
                <div class="clearfix"></div>
            @endif

            <div class="col-sm-4 pull-right">
                <article class="col-item">
                    <div class="photo">
                        <div class="options-cart-round">
                            <a href="{{url('/SingleBuilding/'.$bu->id)}}">
                                <button class="btn btn-default" title="أظهر التفاصيل">
                                    <span class="fa fa-shopping-cart"></span>
                                </button>
                            </a>
                        </div>
                        <a href="#"> <img src="{{checkIfImageIsexist($bu->image,'/public/website/thumb/','/website/thumb/')}}" class="img-responsive" alt="Product Image" /> </a>
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price-details col-md-6">
                                <h1>{{$bu->bu_name}}</h1>
                                <br>
                                <p class="details">
                                    {{str_limit($bu->bu_small_des,45)}}
                                </p>
                                <hr>

                                <span class="price-new">مساحة العقار : {{$bu->bu_square}} &nbsp;/&nbsp; </span>
                                <span class="price-new" style="color: #2ABB9B;"> {{bu_rent()[$bu->bu_rent]}}&nbsp; /&nbsp; </span>
                                {{--<span class="price-new">عدد الغرف : {{bu_rooms()[$bu->bu_rooms]}}</span>--}}
                                <span class="price-new" style="color: #2ABB9B;"> {{bu_type()[$bu->bu_type]}} </span>
                                <br>
                                <span class="price-new">سعر العقار : {{$bu->bu_price}}</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach

    <div class="clearfix"></div>

@else
    <div class="alert alert-danger">
        لا توجد أي عقارات حاليا
    </div>

@endif