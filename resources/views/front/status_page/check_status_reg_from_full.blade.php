@extends('front.master.master')

@section('title')
{{ trans('header.check_status')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<!-- End Header -->
<section>
    <div class="container">
        <div class="card">
            <div class="card-body p-5">
                <div class="others_inner_section pb-4">
                    <h1>Application Status Result</h1>
                    <div class="notice_underline"></div>
                </div>
                <div class="d-flex justify-content-center mt-4 mb-3">
                    <img src="{{ asset('/') }}public/front/assets/img/icon/survey-results.png" alt="" width="200" height="200">
                </div>
                <div class="text-center">
                    <h1>We Have Found Your Result</h1>
                    <p>You Application ID is <span style="font-size: 24px; color: #075E24">{{ $get_all_the_data_reg }}</span> <br> and result is  <span style="font-size: 24px; color: #075E24">{{ $get_all_the_data_status }} in NGOAB</span></p>
                </div>

            </div>
        </div>
    </div>
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
