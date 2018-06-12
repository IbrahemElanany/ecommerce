@if(\Illuminate\Support\Facades\Session::has('flash_message'))
    <div class="alert alert-warning" id="mes">
        {{\Illuminate\Support\Facades\Session::get('flash_message')}}
    </div>

@endif