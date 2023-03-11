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
                                <p class="{{ Route::is('name_change_page')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>NGO Name Change</p>
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

            <?php

            $name_change_list = DB::table('namechanges')->where('user_id',Auth::user()->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>NGO Name Change</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="d-grid d-md-flex justify-content-end">
                                        @if(empty($name_change_list) || $name_change_list == 'Rejected')
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('send_name_change_page') }}';">NGO Name Change
                                        </button>
                                        @else
                                        <button type="button" disabled class="btn btn-registration"
                                        onclick="location.href = '{{ route('send_name_change_page') }}';">NGO Name Change
                                </button>

                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(empty($name_change_list) || $name_change_list == 'Rejected')
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>There is no name changes request</h5>
                                </div>
                            </div>
                            @else



                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">Name changes request list</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL. No.</th>
                                        <th>Date</th>
                                        <th>Previous Name(Bangla)</th>
                                        <th>Previous Name(English)</th>
                                        <th>New Name(Bangla)</th>
                                        <th>New Name(English)</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach($name_change_list_all as $key=>$all_name_change_list_all)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $all_name_change_list_all->created_at->format('d-M-Y')}}</td>
                                        <td>{{ $all_name_change_list_all->previous_name_ban }}</td>
                                        <td>{{ $all_name_change_list_all->previous_name_eng }}</td>
                                        <td>{{ $all_name_change_list_all->present_ban }}</td>
                                        <td>{{ $all_name_change_list_all->present_name_eng }}</td>
                                        <td><span class="text-success">{{ $all_name_change_list_all->status }}</span></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                            <div class="name_change_instruction mt-5">
                                <div class="others_inner_section mb-3">
                                    <h1>NGO Name Change Instruction</h1>
                                    <div class="notice_underline"></div>
                                </div>
                                <ul class="nav nav-tabs custom_tab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tofban">For Local NGO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tofen">For Foreign NGO</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content custom_tab_content">
                                    <div class="tab-pane container active" id="tofban">
                                        <h5>৫.১ দেশী এনজিও'র নাম পরিবর্তনের জন্য প্রয়োজনীয় তথ্যাবলী :</h5>
                                        <table class="table table-borderless instruction_table">
                                            <tr>
                                                <td>ক)</td>
                                                <td>০২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় "নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের
                                                    মূলকপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>খ)</td>
                                                <td>নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-
                                                    ১৮৩৬) চালানের মূলকপিসহ অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>গ)</td>
                                                <td>গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/ (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-
                                                    ১৮৩৬) চালানের মূলকপিসহ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঘ)</td>
                                                <td>ফরম-৮ মোতাবেক নির্বাহী কমিটির তালিকা</td>
                                            </tr>
                                            <tr>
                                                <td>ঙ)</td>
                                                <td>নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট
                                                    সাইজের ছবি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>চ)</td>
                                                <td>৩০০/তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি</td>
                                            </tr>
                                            <tr>
                                                <td>ছ)</td>
                                                <td>এনজিও বিষয়ক ব্যুরোর মুল সনদপত্র</td>
                                            </tr>
                                            <tr>
                                                <td>জ)</td>
                                                <td>পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি</td>
                                            </tr>
                                            <tr>
                                                <td>ঝ)</td>
                                                <td>প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত
                                                    কপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঞ)</td>
                                                <td>সর্বশেষ সাধারণ সদস্যদের তালিকা</td>
                                            </tr>
                                            <tr>
                                                <td>ট)</td>
                                                <td>নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কা্যবিবরণীর (উপস্থিত সদস্যদের
                                                    তালিকাসহ) সত্যায়িত কপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঠ)</td>
                                                <td>পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে
                                                    মর্মে
                                                    অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)।
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ড)</td>
                                                <td>দাখিলকৃত চালানের ডপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকলিসহ (কোড
                                                    নং-১-১১৩৩-০০৩৫-০৩১১)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঢ)</td>
                                                <td>২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন/নাম
                                                    পরিবর্তন/গঠনতন্ত্রের যে কোন ধারা পরিবর্তনের বিষয়ে দাখিলকৃত ফি এর উপর ১৫%
                                                    বকেয়া ভ্যাট (যদি ইতোমধ্যে প্রদান না করা হয়ে থাকে) সংশ্লিষ্ট কোডে জমাপূর্বক চালানের
                                                    মুলকপিসহ
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane container" id="tofen">
                                        <h5 class="pt-4">৫.২ বিদেশি এনজিও'র নাম পরিবর্তনের জন্য প্রয়োজনীয় তথ্যাবলী</h5>
                                        <table class="table table-borderless instruction_table">
                                            <tr>
                                                <td>ক)</td>
                                                <td>২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় ) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের
                                                    মূলকপিসহ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>খ)</td>
                                                <td>নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩- ০০০০-১৮৩৬)
                                                    চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং-১-১১৩৩-০০৩৫-০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>গ)</td>
                                                <td>গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/-(তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-১৮৩৬)
                                                    চালানের মুলকপি এবং ১৫% ভ্যাট (কোড নং-১-১১৩৩-০০৩৫-০৩১১)জমাপূর্বক চালানের মূলকপিসহ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঘ)</td>
                                                <td>সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস/বোর্ড অব ট্রাষ্টির তালিকা (সংশ্লিষ্ট দেশের পিস
                                                    অৰ জাস্টিস কর্তৃক নোটারীকৃত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঙ)</td>
                                                <td>নাম পরিবর্তন বিষয়ে সংশ্লিষ্ট দেশের বোর্ড অব ডিরেন্টরস/বোর্ড অব ট্রাস্টির সিদ্ধান্তের কপি (সংশ্লিষ্ট দেশের পিস অব জান্টিস কর্তৃক নোটারীকৃত মূলকপিসহ)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>চ)</td>
                                                <td>৩০০/(তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর মুলকপিসহ</td>
                                            </tr>
                                            <tr>
                                                <td>ছ)</td>
                                                <td>এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র</td>
                                            </tr>
                                            <tr>
                                                <td>জ)</td>
                                                <td>সংস্থার পরিবর্তিত নামের সনদপত্রইনকর্পোরেট সার্টিফিকেট (সংশ্লিষ্ট দেশের নোটারীকৃত মূলকপি)</td>
                                            </tr>
                                            <tr>
                                                <td>ঝ)</td>
                                                <td>সংস্থার পরিবর্তিত নামের বাই লজ(3% 18%/5)/গঠনতন্ত্রের কপি (সংশ্লিষ্ট দেশের
                                                    পিস অব জান্টিস কর্তৃক নোটারীকৃত মূলকপিসহ)</td>
                                            </tr>
                                            <tr>
                                                <td>ঞ)</td>
                                                <td>সংস্থার পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার
                                                    উপর বর্তাইবে মর্মে অংগীকার নামা (সংস্থা প্রধান কর্তৃক স্বাক্ষরিত)</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবদ্ধন নবায়ন/নাম পরিবর্তন/গঠনতন্ত্রের যে কোন ধারা পরিবর্তনের বিষয়ে দাখিলকৃত ফি এর উপর
                                                    ১৫% বকেয়া ভ্যাট (যদি ইতোমধ্যে প্রদান না করা হয়ে থাকে) সংশ্লিষ্ট কোডে জমাপূর্বক চালানের মূলকপিসহ</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
