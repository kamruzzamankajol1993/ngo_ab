@extends('front.master.master')

@section('title')
 {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="card">
            <div class="card-body p-5">
                <h5 class="text-center mb-4" style="color: #006A4E">Verified</h5>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('/') }}public/front/assets/img/icon/handshake.png" alt="" width="150" height="150">
                </div>
                <div class="text-center">
                    <h2>Welcome!</h2>
                    <p>We're excited to have you get started. Your Account has been confirmed. <br> Just press the button below for login.</p>
                </div>
                <div class="col-md-12 text-center">
                    <a href="{{ route('login') }}" type="button" class="btn btn-registration">Log In</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            email: {
                required: true
            },
            password: {
                required: true
            }


        },


               messages:
 {

            email: {
                required: " Email Field is required"
            },

            password: {
                required: "Password Field is required"
            },




 }
    });
});
</script>

@endsection
