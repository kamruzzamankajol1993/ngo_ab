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
                                <p class="{{ Route::is('name_change_page') || Route::is('send_name_change_page')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>NGO Name Change</p>
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
                        <div class="step_box">
                            <ul class="process-model more-icon-preocess">
                                <li class="active visited">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <p>New Name</p>

                                </li>
                                <li>
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    <p>Form-08</p>

                                </li>
                                <li>
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    <p>Committee Member</p>

                                </li>
                                <li>
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <p>ID Card & Images</p>

                                </li>
                                <li>
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>Documents</p>

                                </li>
                            </ul>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                NGO New Name
                            </div>
                            <div class="card-body">
                                <form method="get" action="{{ route('view_form_8_for_change') }}">

                                    <div class=" mb-3">
                                        <label for="" class="form-label">Previous Name</label>
                                        <input type="text" value="{{ $ngo_list_all->organization_name }}" name="previous_name" class="form-control" id="">
                                    </div>

                                    <div class=" mb-3">
                                        <label for="" class="form-label">Previous Name(Bangla)</label>
                                        <input type="text" value="{{ $ngo_list_all->organization_name_ban }}" name="previous_name_ban" class="form-control" id="">
                                    </div>


                                    <div class=" mb-3">
                                        <label for="" class="form-label">New Name</label>
                                        <input type="text" value="{{ Session::get('new_name') }}" name="new_name" class="form-control" id="">
                                    </div>


                                    <div class=" mb-3">
                                        <label for="" class="form-label">New Name(Bangla)</label>
                                        <input type="text" value="{{ Session::get('new_name_ban') }}"  name="new_name_ban" class="form-control" id="">
                                    </div>
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration"
                                               >Next
                                        </button>
                                    </div>
                                </form>
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
