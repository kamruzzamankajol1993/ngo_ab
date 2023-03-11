<div class="main_header">
    <div class="container">
        <div class="header_body">
            <div class="d-flex justify-content-center">
                <div class="header_box">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/home.png" alt="">
                        <h3>{{ trans('header.home')}} </h3>
                    </a>
                </div>
                <div class="header_box">

                    @if (Auth::check())
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/apply_online.png" alt="">
                        <h3>{{ trans('header.apply_online')}} </h3>
                    </a>
                    @else
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/apply_online.png" alt="">
                        <h3>{{ trans('header.apply_online')}}</h3>
                    </a>


                    @endif
                </div>
                @if (Auth::check())

             <?php   $ngo_status_list = DB::table('ngostatuses')->where('user_id',Auth::user()->id)->value('status'); ?>

                @if(empty($ngo_status_list) || $ngo_status_list == 'Ongoing')

                <div class="header_box">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/renew.png" alt="">
                        <h3>{{ trans('header.renew_application')}}</h3>
                    </a>
                </div>
                <div class="header_box">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/name_change.png" alt="">
                        <h3>{{ trans('header.name_change')}}</h3>
                    </a>
                </div>
                @else

                <div class="header_box">
                    <a href="{{ route('renew_page') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/renew.png" alt="">
                        <h3>{{ trans('header.renew_application')}}</h3>
                    </a>
                </div>
                <div class="header_box">
                    <a href="{{ route('name_change_page') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/name_change.png" alt="">
                        <h3>{{ trans('header.name_change')}}</h3>
                    </a>
                </div>
                @endif

                @else
                <div class="header_box">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/renew.png" alt="">
                        <h3>{{ trans('header.renew_application')}}</h3>
                    </a>
                </div>
                <div class="header_box">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/name_change.png" alt="">
                        <h3>{{ trans('header.name_change')}}</h3>
                    </a>
                </div>
                @endif
                <div class="header_box">
                    <a href="{{ route('ngo_instruction_page') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/instruction.png" alt="">
                        <h3>{{ trans('header.instruction')}}</h3>
                    </a>
                </div>
                <div class="header_box">
                    <a href="{{ route('ngo_registration_fee_list') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/fees.png" alt="">
                        <h3>{{ trans('header.registration_fee')}}</h3>
                    </a>
                </div>
                <div class="header_box">
                    <a href="{{ route('status_page') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/status.png" alt="">
                        <h3>{{ trans('header.check_status')}}</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
