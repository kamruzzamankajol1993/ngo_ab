@extends('front.master.master')

@section('title')
{{ trans('first_info.dash')}} | {{ trans('header.ngo_ab')}}
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
<?php







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
            <div class="col-lg-9 col-md-6 col-sm-12">
                @include('flash_message')
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home"
                                        type="button" role="tab" aria-controls="home" aria-selected="true">Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="messages-tab" data-bs-toggle="tab"
                                        data-bs-target="#messages"
                                        type="button" role="tab" aria-controls="messages" aria-selected="false">
                                    Documents
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                        data-bs-target="#settings"
                                        type="button" role="tab" aria-controls="settings" aria-selected="false">Settings
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <!--end col-->
                                    <div class="col-xxl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">NGO Profile</h5>
                                                <div class="profile_about">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>Registration Number</td>
                                                            <td>{{ $ngo_list_all->registration_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Which country organization?</td>
                                                            <td>{{ $ngo_list_all->country_of_origin }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Company head information</td>
                                                            <td>Name: {{ $ngo_list_all->name_of_head_in_bd }} <br> Address: {{ $ngo_list_all->organization_address }} <br> Phone Number: {{ $ngo_list_all->phone }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Recommended area</td>
                                                            <td>{{ $ngo_list_all->district }},{{ $ngo_list_all->sub_district }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php




                                     $renew_list_all = DB::table('renews')->where('user_id',Auth::user()->id)->get();


                                        ?>

                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header align-items-center d-flex">
                                                        <h4 class="card-title mb-0  me-2">Recent Activity</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="profile-timeline">
                                                            <div class="d-flex">

                                                                @if(count($name_change_list) == 0   && count($renew_list_all) == 0)

                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
                                                                        No Activity
                                                                    </h6>

                                                                </div>
                                                                @else
                                                                @foreach($name_change_list as $all_name_change_list)
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
                                                                        Name Changes Request
                                                                    </h6>
                                                                    <small class="text-muted">Date: {{ $all_name_change_list->created_at->format('d-M-Y')}} &
                                                                        Time: {{ $all_name_change_list->main_time }}</small>
                                                                </div>
                                                                @endforeach

                                                                @foreach($name_change_list_r as $all_name_change_list)
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
                                                                        Renew Request
                                                                    </h6>
                                                                    <small class="text-muted">Date:{{ $all_name_change_list->created_at->format('d-M-Y')}} &
                                                                        Time:{{ $all_name_change_list->main_time }}</small>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <h5 class="card-title flex-grow-1 mb-0">Documents</h5>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless align-middle mb-0">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">File Name</th>
                                                            <th scope="col">Type</th>

                                                            <th scope="col">Upload Date</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0">
                                                                            <a target="_blank" href="{{ route('form_one_pdf',['main_id'=>$ngo_list_all->user_id,'id'=>'plan']) }}" >পরিচালন পরিকল্পনা</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('form_one_pdf',['main_id'=>$ngo_list_all->user_id,'id'=>'treasury_bill']) }}">চালানের কপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('form_one_pdf',['main_id'=>$ngo_list_all->user_id,'id'=>'treasury_bill']) }}">ট্রেজারি চালানের মূলকপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('form_one_pdf',['main_id'=>$ngo_list_all->user_id,'id'=>'final_pdf']) }}">কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম - ০১ এর ফাইনাল কপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->updated_at->format('d-M-Y')}}</td>

                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('form_eight_pdf',['main_id'=>$ngo_list_all->user_id]) }}">কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম - ০৮ এর ফাইনাল কপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all_form_eight->updated_at->format('d-M-Y')}}</td>

                                                        </tr>

                                                        @foreach($all_source_of_fund as $all_get_all_source_of_fund_data)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('source_of_fund',$all_get_all_source_of_fund_data->id ) }}">সম্ভাব্য দাতার কাছ থেকে প্রতিশ্রুতির চিঠি(দাতা সংস্থার নাম)</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach



                                                        @foreach($form_ngo_data_doc as $key=>$all_get_all_source_of_fund_data)

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngo_doc',$all_get_all_source_of_fund_data->id ) }}">এনজিও নথি {{ str_replace($engDATE, $bangDATE,$key+1) }}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach


                                                        @foreach($form_member_data_doc as $key=>$all_get_all_source_of_fund_data)

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngo_member_doc',$all_get_all_source_of_fund_data->id ) }}">এনজিও কর্মকর্তাদের নথি  {{ str_replace($engDATE, $bangDATE,$key+1) }}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach


                                                        @foreach($get_all_data_other as $key=>$all_get_all_source_of_fund_data)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('other_pdf_view',$all_get_all_source_of_fund_data->id ) }}">অন্যান্য পিডিএফ কপি {{ str_replace($engDATE, $bangDATE,$key+1) }}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('register.update') }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.person_name')}}</label>
                                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" id="">

                                                <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="id" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">{{ trans('header.email')}}</label>
                                                <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email" id="" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.password')}}</label>
                                                <input type="password" class="form-control" name="password" id="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">প্রোফাইল ছবি</label>
                                                <input type="file" class="form-control" name="image" name="password" id="">
                                            </div>


                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.phone_number')}}</label>
                                                <input type="text" value="{{ Auth::user()->phone }}" class="form-control" name="phone" id="">
                                                {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                                            </div>
                                            <div class="d-grid d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-registration">{{ trans('first_info.update1')}}</button>
                                            </div>
                                        </form>
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
