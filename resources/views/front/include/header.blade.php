<div class="upper_header">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="header_left_side">

                    @if(session()->get('locale') == 'en')
                    <a href="{{ route('index') }}"><img src="{{ asset('/') }}public/front/assets/img/logo/logo.png" class="logo_img" alt="">
                        <h1>গণপ্রজাতন্ত্রী বাংলাদেশ<br>
                            সরকার </h1>
                    </a>
                    @else
                    <a href="{{ route('index') }}"><img src="{{ asset('/') }}public/front/assets/img/logo/logo.png" class="logo_img" alt="">
                        <h1>Government of the <br>
                            People’s Republic of Bangladesh</h1>
                    </a>
                    @endif
                </div>

            </div>
            <div class="col-6">
                <div class="header_right_text">

                    @if(session()->get('locale') == 'en')
                    <h1>এনজিও বিষয়ক ব্যুরো<br>
                        প্রধানমন্ত্রীর অফিস
                    </h1>
                    @else
                    <h1>NGO Affairs Bureau <br>
                        Prime Minister's Office
                    </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="second_header">
    <div class="container">
        <div class="d-flex flex-row-reverse">
            <div class="p-2">
                <button onclick="location.href = '{{ route('change_language') }}';" class="{{ session()->get('locale') == 'en' ? 'btn btn-eng' : 'btn btn-ban' }}">{{ trans('header.bangla')}}</button>
            </div>
            <div class="p-2">
                <button onclick="location.href = '{{ route('change_language') }}';" class="{{ session()->get('locale') == 'sp' ? 'btn btn-eng' : 'btn btn-ban' }}">English</button>
            </div>
            @if (Auth::check())
            <div class="p-2">
                <button class="btn  btn-registration" onclick="location.href = '{{ route('dashboard') }}';">{{ Auth::user()->name }}</button>
            </div>
            @else
            <div class="p-2">
                <button class="btn  btn-registration" onclick="location.href = '{{ route('login') }}';">{{ trans('header.sign_in')}}</button>
            </div>
            @endif

        </div>
    </div>
</div>
