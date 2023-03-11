@extends('front.master.master')

@section('title')
Name Change | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<?php
 $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

?>


<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if(empty(Auth::user()->image))
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @else
                                     <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @endif
                                <div class="mt-3">
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>User Profile</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('name_change_page') }}">
                                <p class="{{ Route::is('add_other_doc') ||  Route::is('committee_ngo_member') || Route::is('view_form_8_for_change') || Route::is('name_change_page') || Route::is('send_name_change_page')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>NGO Name Change</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew_page') }}">
                                <p class="{{ Route::is('renew_page')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>Renew Application</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>Logout</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="committee_container">
                            <h5 class="mb-4">NGO Document Registration</h5>
                            <form method="post" action="{{ route('store_other_doc') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ০২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় "নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ অনুলিপি
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/ (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        ৩০০/তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        এনজিও বিষয়ক ব্যুরোর মুল সনদপত্র
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত কপি
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কা্যবিবরণীর (উপস্থিত সদস্যদের তালিকাসহ) সত্যায়িত কপি
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)।
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        দাখিলকৃত চালানের ডপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকলিসহ (কোড নং-১-১১৩৩-০০৩৫-০৩১১)
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন/নাম পরিবর্তন/গঠনতন্ত্রের যে কোন ধারা পরিবর্তনের বিষয়ে দাখিলকৃত ফি এর উপর ১৫% বকেয়া ভ্যাট (যদি ইতোমধ্যে প্রদান না করা হয়ে থাকে) সংশ্লিষ্ট কোডে জমাপূর্বক চালানের মুলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration"
                                            >Add Document
                                    </button>
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

@endsection
