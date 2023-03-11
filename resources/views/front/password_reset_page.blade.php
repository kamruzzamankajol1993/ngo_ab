@extends('front.master.master')

@section('title')
{{ trans('main.Password_Reset_Form')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="d-lg-flex login_box">
            <div class="bg order-1 order-md-2" style="background-image:url('public/front/assets/img/login/PM-6-.png');"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <h3>{{ trans('main.Password_Reset_Form')}} | <strong>{{ trans('header.ngo_ab')}}</strong></h3>
                            <p class="mb-4">@include('flash_message').</p>
                            <p class="mb-4"> {{ trans('main.change_password')}}!</p>
                            <form method="post" action="{{ route('password_change_confirmed') }}" id="form">
                                @csrf
                                <div class="form-group first mb-3">
                                    <label for="username">{{ trans('header.password')}}</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required data-parsley-length=“[5,10]” data-parsley-trigger=“keyup”>
                                    <input type="hidden" name="id" value="{{ $id }}" class="form-control" placeholder="Password" >
                                </div>






                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit"  class="btn btn-registration" > {{ trans('main.update_password')}}</button>
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


            password: {
                required: true
            },


        },


               messages:
 {



            password: {
                required: "Password Field is required"
            }




 }
    });
});
</script>


@endsection
