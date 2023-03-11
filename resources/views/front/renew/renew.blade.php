@extends('front.master.master')

@section('title')
Renew | {{ trans('header.ngo_ab')}}
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

            $name_change_list = DB::table('renews')->where('user_id',Auth::user()->id)->latest()->value('status');




            ?>


            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>NGO Renew</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    @if(empty($name_change_list) || $name_change_list == 'Rejected')
                                    <div class="d-grid d-md-flex justify-content-end">
                                        <button type="button"  class="btn btn-registration"
                                                onclick="location.href = '{{ route('ngo_renew_list_new') }}';">NGO Renew
                                        </button>
                                    </div>
                                    @else
                                    <div class="d-grid d-md-flex justify-content-end">
                                        <button type="button" disabled class="btn btn-registration"
                                                onclick="location.href = '{{ route('ngo_renew_list_new') }}';">NGO Renew
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if(empty($name_change_list) || $name_change_list == 'Rejected')
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>There is no NGO Renew request</h5>
                                </div>
                            </div>
                            @else
                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">Renew request list</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL. No.</th>
                                        <th>Date</th>

                                        <th>Status</th>
                                    </tr>
                                    @foreach($name_change_list_all as $key=>$all_name_change_list_all)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $all_name_change_list_all->created_at->format('d-M-Y')}}</td>

                                        <td><span class="text-success">{{ $all_name_change_list_all->status }}</span></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                            <div class="name_change_instruction mt-5">
                                <div class="others_inner_section mb-3">
                                    <h1>NGO Renew Instruction</h1>
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
                                        <h5>৩.১ নিবন্ধন সনদ নবায়ন আবেদনের সাথে সংযোজিতব্য কাগজপত্র এবং তথ্যাদি (দেশী এনজিও'র নিবন্ধন
                                            নবায়নের জন্য)</h5>
                                        <table class="table table-borderless instruction_table">
                                            <tr>
                                                <td>ক)</td>
                                                <td>পূরণকৃত এফডি-৮ ফরম;</td>
                                            </tr>
                                            <tr>
                                                <td>খ)</td>
                                                <td>ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা:</td>
                                            </tr>
                                            <tr>
                                                <td>গ)</td>
                                                <td>নির্বাহী কমিটির সদস্যার পাসপোর্ট সাইজের ছবিশহ জাতীয় পরিছয়পত্রের সত্যায়িত অনুলিপি:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঘ)</td>
                                                <td>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত অনুলিপি;</td>
                                            </tr>
                                            <tr>
                                                <td>ঙ)</td>
                                                <td>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি;</td>
                                            </tr>
                                            <tr>
                                                <td>চ)</td>
                                                <td>উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি অনুমোদন
                                                    সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ছ)</td>
                                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি মর্মে সভাপতি এবং সাধারণ সম্পাদকের যৌথ স্বাক্ষরে
                                                    প্রত্যয়নপত্র;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>জ)</td>
                                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের
                                                    মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র
                                                    পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়নের অনুলিপি;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঝ)</td>
                                                <td>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট এবং বার্ষিক প্রতিবেদনের
                                                    সত্যায়িত অনুলিপি;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঞ)</td>
                                                <td>'অন্য কোন আইনে নিবন্ধিত হলে সংশ্লিষ্ট কর্তৃপক্ষের অনুমোদিত নির্বাহী
                                                    কমিটির তালিকার সত্যায়িত অনুলিপি;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ট)</td>
                                                <td>সর্বশেষ নিবন্ধন/নবায়ন সনদের সত্যায়িত অনুলিপি;</td>
                                            </tr>
                                            <tr>
                                                <td>ঠ)</td>
                                                <td>Right to Information Act-2009-এর আওতায় Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ
                                                    পত্রের অনুলিপি;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ড)</td>
                                                <td>সংস্থার নিকট তফফিল-১ এ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া
                                                    ভ্যাট থাকলে চালানমুলে জমা প্রদানের প্রমাণক;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঢ)</td>
                                                <td>'নিবদ্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান
                                                    সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ণ)</td>
                                                <td>বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের সংক্ষিপ্ত বিবরণ
                                                    (সংযুক্ত ছক অনুযায়ী):
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>ক্রঃ নং</th>
                                                <th>সন[বিগত ০৫ (পাঁচ) বছর]</th>
                                                <th>প্রকল্পের নাম</th>
                                                <th>মেয়াদ</th>
                                                <th>কাজের প্রকৃতি</th>
                                                <th>অর্থের পরিমাণ</th>
                                                <th>ছাড়কৃত অর্থ</th>
                                                <th>গৃহীত বৈদেশিক অনুদান</th>
                                                <th>ব্যয়</th>
                                                <th>অবশিষ্ট</th>
                                                <th>মন্তব্য</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>০১</td>
                                                <td>০২</td>
                                                <td>০৩</td>
                                                <td>০৪</td>
                                                <td>০৫</td>
                                                <td>০৬</td>
                                                <td>০৭</td>
                                                <td>০৮</td>
                                                <td>০৯</td>
                                                <td>১০</td>
                                                <td>১১</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane container" id="tofen">
                                        <h5>৩.২ নিবন্ধন সনদ নবায়ন আবেদনের সাথে সংযুক্ত প্রযোজ্য কাগজপত্র এবং তথ্যাদি (বিদেশি
                                            এনজিও'র নিবন্ধন নবায়নের জন্য)</h5>
                                        <table class="table table-borderless instruction_table">
                                            <tr>
                                                <td>ক)</td>
                                                <td>পূরণকৃত এফডি-৮ ফরম</td>
                                            </tr>
                                            <tr>
                                                <td>খ)</td>
                                                <td>বোর্ড অব ডিরেক্টরস/বোর্ড অব ট্রাষ্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস
                                                    অব জান্টিস কর্তৃক নোটারীকৃত/সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>গ)</td>
                                                <td>সংস্থার বাই লজ (By laws)/গঠনতন্ত্র (সংশ্লিষ্ট দেশের পিস অব জান্টিস কর্তৃক
                                                    নোটারীকৃত/সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঘ)</td>
                                                <td>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত
                                                    অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঙ)</td>
                                                <td>সংস্থার বোর্ড অব ডিরেন্টরস/বোর্ড অব ট্রাষ্টিজ সভার কার্যবিবরণীর
                                                    (কার্যবিবরণীতে বোর্ড গঠন সংক্রান্ত, নিবন্ধন নবায়ন করার প্রস্তাব, গঠনতন্ত্র পরিবর্তন
                                                    সংক্রান্ত বিষয়াদি উল্লেখপূর্বক) (সংশ্লিষ্ট দেশের পিস অব জান্টিস কর্তৃক
                                                    নোটারীকৃত/সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>চ)</td>
                                                <td>সংস্থার গঠনতন্ন পারবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাৰদ অর্থ
                                                    জমাদানের মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র
                                                    পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়ন পত্রের কপি সংশ্লিষ্ট দেশের
                                                    পিস অব জাস্টিস কর্তৃক নোটারীকৃত/ সত্যায়িত)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ছ)</td>
                                                <td>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট: এবং বার্ষিক প্রতিবেদন সত্যায়িত অনুলিপি;</td>
                                            </tr>
                                            <tr>
                                                <td>জ)</td>
                                                <td>সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের পিস অব জান্টিস কর্তৃক
                                                    নোটারীকৃত/সত্যায়িত) অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঝ)</td>
                                                <td>সর্বশেষ নিবন্ধন/নবায়ন সনদপত্রের ২টি সত্যায়িত অনুলিপি</td>
                                            </tr>
                                            <tr>
                                                <td>ঞ)</td>
                                                <td>Right to Information Act-২০০৯ এর আওতায়
                                                    Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ট)</td>
                                                <td>সংস্থার নিকট তফফিল -১ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া
                                                    ভ্যাট থাকলে তাহা চালানমুলে জমা প্রদানের প্রমাণক;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ঠ)</td>
                                                <td>সংস্থার বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের
                                                    সংক্ষিপ্ত বিবরণ
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>ক্রঃ নং</th>
                                                <th>সন[বিগত ০৫ (পাঁচ) বছর]</th>
                                                <th>প্রকল্পের নাম</th>
                                                <th>মেয়াদ</th>
                                                <th>কাজের প্রকৃতি</th>
                                                <th>অর্থের পরিমাণ</th>
                                                <th>ছাড়কৃত অর্থ</th>
                                                <th>গৃহীত বৈদেশিক অনুদান</th>
                                                <th>ব্যয়</th>
                                                <th>অবশিষ্ট</th>
                                                <th>মন্তব্য</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>০১</td>
                                                <td>০২</td>
                                                <td>০৩</td>
                                                <td>০৪</td>
                                                <td>০৫</td>
                                                <td>০৬</td>
                                                <td>০৭</td>
                                                <td>০৮</td>
                                                <td>০৯</td>
                                                <td>১০</td>
                                                <td>১১</td>
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
