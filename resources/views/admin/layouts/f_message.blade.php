

@if(\Illuminate\Support\Facades\Session::has('flash_message'))

<script>
    swal({
        type: 'success',
        title: '{{Session::get('flash_message')}}',
        text: 'هذه الرسالة سوف تختفي بعد 4 ثانية',
        showConfirmButton: false,
        timer: 4000,
        // onOpen: () => {
        //     swal.showLoading()
        // },
    })
</script>

@endif