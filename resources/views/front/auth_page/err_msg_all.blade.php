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
                <h5 class="text-center mb-4" style="color: #006A4E">NGOAB-Verify</h5>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('/') }}public/front/assets/img/icon/email.webp" alt="" width="200" height="200">
                </div>
                <div class="text-center">
                    <h2>Please verify your email</h2>
                    <p>After verification you can enter your profile</p>
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
