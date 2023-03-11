@extends('front.master.master')

@section('title')
{{ trans('header.Log_in')}}| {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="d-lg-flex login_box">
          <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('/') }}public/front/assets/img/login/PM-6-.png');"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">

                            @if(session()->get('locale') == 'en')
                            <h3>লগইন করুন</h3>
                            <p class="mb-4">@include('flash_message')</p>
                            <p class="mb-4" style="font-size:12px;">আমাদের <strong>এনজিও অ্যাফেয়ার্স ব্যুরোর</strong> ডিজিটাল প্ল্যাটফর্মে আবার স্বাগতম</p>
                            @else
                            <h3>Login to</h3>
                            <p class="mb-4">@include('flash_message')</p>
                            <p class="mb-4" style="font-size:12px">Welcome Back to Our <strong>NGO Affairs Bureau's</strong> Digital Platform</p>
                            @endif
                            <form method="post" action="{{ route('login.post') }}" id="form">
                                @csrf
                                <div class="form-group first mb-3">
                                    <label for="username">{{ trans('header.email')}}</label>
                                    <input type="email" name="email" class="form-control" placeholder="your-email@gmail.com" id="email" required data-parsley-type=“email” data-parsley-trigger=“keyup”  >
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">{{ trans('header.password')}}</label>
                                    <input type="password" name="password"  required data-parsley-length=“[5,10]” data-parsley-trigger=“keyup”  class="form-control" placeholder="Your Password" id="password">
                                </div>

                                <div class="d-flex mb-3 align-items-center">
                                    <span class="ml-auto"><a href="{{ route('admin.password.request') }}" class="forgot-pass">{{ trans('header.Forgot_Password')}}</a></span>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    @if(session()->get('locale') == 'en')
                                    <span class="ml-auto">কোন অ্যাকাউন্ট নেই? <a href="{{ route('register') }}">{{ trans('header.Registration_Here')}}</a></span>
                                    @else
                                    <span class="ml-auto">Don't Have Any Account? <a href="{{ route('register') }}">{{ trans('header.Registration_Here')}}</a></span>
                                    @endif
                                </div>

                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration" >{{ trans('header.Log_in')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
