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
                                <p class="{{ Route::is('view_form_8_for_change_add') || Route::is('name_change_page') || Route::is('send_name_change_page')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>NGO Name Change</p>
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
                    <div class="card-header">
                        {{ trans('form 8_bn.ngo_committee_member_registration')}}
                    </div>
                    <div class="card-body">


                        <form method="post" action="{{ route('view_form_8_for_change_store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name')}}:</label>
                                <input type="text" data-parsley-required name="name"  class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.designation')}}:</label>
                                <input type="text" data-parsley-required name="desi" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}}:</label>
                                <input type="date" data-parsley-required name="dob" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}}:</label>
                                <input type="text" data-parsley-required name="nid_no"  class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}}:</label>
                                <input type="text" data-parsley-required name="phone" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}}:</label>
                                <input type="text" data-parsley-required name="father_name" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.present_address')}}:</label>
                                <textarea class="form-control" data-parsley-required name="present_address" id="exampleFormControlTextarea1"
                                          rows="2"></textarea>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}}:</label>
                                <textarea class="form-control" data-parsley-required name="permanent_address"  id="exampleFormControlTextarea1"
                                          rows="2"></textarea>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}}:</label>
                                <input type="text" data-parsley-required name="name_supouse" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.Educational_Qualification')}}:</label>
                                <input type="text" name="edu_quali" data-parsley-required class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.profession')}}:</label>
                                <select class="form-control" data-parsley-required name="profession"  id="">
                                    <option value="{{ trans('form 8_bn.govt_semi_govt_autonomous')}}<">{{ trans('form 8_bn.govt_semi_govt_autonomous')}}</option>
                                    <option value="{{ trans('form 8_bn.private_service')}}<">{{ trans('form 8_bn.private_service')}}</option>
                                    <option value="{{ trans('form 8_bn.self_service')}}">{{ trans('form 8_bn.self_service')}}</option>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.description_of_job')}}:</label>
                                <input type="text" data-parsley-required name="job_des" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}}:</label>
                                <select class="form-control" data-parsley-required name="service_status" id="">
                                    <option value="{{ trans('form 8_bn.yes')}}">{{ trans('form 8_bn.yes')}}</option>
                                    <option value="{{ trans('form 8_bn.no')}}">{{ trans('form 8_bn.no')}}</option>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.remarks')}}:</label>
                                <input type="text" data-parsley-required name="remarks" class="form-control" id="">
                            </div>
                            {{-- <div class=" mb-3">
                                <label for="" class="form-label">Signature</label>
                                <input type="file" data-parsley-required data-parsley-accept=".jpg,.jpeg,.png" name="image" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" data-parsley-required name="main_date" class="form-control" id="">
                            </div> --}}
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.add')}}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
