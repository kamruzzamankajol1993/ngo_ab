@extends('front.master.master')

@section('title')
{{ trans('main.Ngo_Type_And_Language')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
    <form method="post" action="{{ route('ngo_type_and_language_post') }}" id="form">
        @csrf
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">

                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>

                </div>

                <div class="dashboard_right">
                    <div class="tofsil2_box mt-3">
                        <h1>{{ trans('main.wellcome')}} </h1>
                        <div class="tofsil2_list">
                            <h3>{{ trans('main.sub2')}}</h3>

                                <div class="mb-4">
                                    <label for="" class="form-label">{{ trans('main.origin')}}</label>
                                    <br>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" data-parsley-checkmin="1" required type="radio" name="ngo_origin"  checked id="ngo_origin1" value="দেশিও" >
                                        <label class="form-check-label" for="ngo_origin1">{{ trans('main.ll')}} </label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input "data-parsley-checkmin="1" required type="radio" name="ngo_origin" id="ngo_origin2" value="Foreign" >
                                        <label class="form-check-label" for="ngo_origin2">{{ trans('main.ff')}}</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">{{ trans('main.lan')}}</label>
                                    <br>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input changeLang" type="radio" data-parsley-checkmin="1" required name="input_language" id="input_language1" value="en" checked >
                                        <label class="form-check-label" for="input_language1">{{ trans('main.bangla')}}</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input changeLang" data-parsley-checkmin="1" required type="radio" name="input_language" id="input_language2" value="sp" >
                                        <label class="form-check-label" for="input_language2">{{ trans('main.English')}}</label>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                        <button type="submit" class="btn btn-registration">{{ trans('main.next')}}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            ngo_origin: {
                required: true
            },
            input_language: {
                required: true
            }


        },


               messages:
 {

    ngo_origin: {
                required: " Ngo Origin Field is required"
            },

            password: {
                required: "Language Field is required"
            },




 }
    });
});
</script>
@endsection
