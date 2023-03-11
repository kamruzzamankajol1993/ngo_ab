@extends('front.master.master')

@section('title')
{{ trans('first_info.all_reg_form')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<?php

$get_reg_id = DB::table('ngostatuses')->where('user_id',Auth::user()->id)->value('status');


?>

@if(empty($get_reg_id))
<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="card">
                        <div class="card-header">
                            {{ trans('first_info.ngo_Registration_All_Steps')}}

                            <button class="btn btn-sm btn-danger"  onclick="deleteTag(2)" >{{ trans('first_info.reset')}}</button>
                            <form id="delete-form-2" action="{{ route('reset_all_data') }}" method="POST" style="display: none;">

                                @csrf

                            </form>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('particulars_of_Organisation') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <h5>{{ trans('first_info.fd_one')}}</h5>

                                                    <p>{{ trans('first_info.Application_for_registration')}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('form_8_ngo_committee_member') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>
                                                    <h5>{{ trans('first_info.form_eight')}}</h5>
                                                    <p>{{ trans('first_info.Application_for_registration')}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('ngo_member') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    @if(session()->get('locale') == 'en')
                                                    <h5>সদস্যের তথ্য</h5>
                                                    <p>এনজিও এর  সকল সদস্যদের তথ্য</p>
                                                    @else
                                                    <h5>Member's Info</h5>
                                                    <p>NGO ALl Member's Information</p>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('ngo_document') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-file-powerpoint-o"></i>
                                                    </div>
                                                    @if(session()->get('locale') == 'en')
                                                    <h5>অন্যান্য নথি</h5>
                                                    <p>এনজিও এর সকল  নথি</p>

                                                    @else
                                                    <h5>Other's Document</h5>
                                                    <p>NGO ALl Document</p>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('ngo_member_document') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                    @if(session()->get('locale') == 'en')
                                                    <h5>ছবি ও এনআইডি  জমা দিন</h5>
                                                    <p>পাসপোর্ট সাইজের ছবি ও জাতীয় পরিচয়পত্রের সত্যায়িত কপি
                                                        কার্যনির্বাহী কমিটির সদস্যদের কার্ড</p>
                                                    @else
                                                    <h5>Image & NID Submit</h5>
                                                    <p>Attested copy of Passport' size photograph and National Identity
                                                        Card of Executive Committee members</p>
                                                        @endif
                                                </div>
                                            </a>
                                        </div>
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
@else
<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-center">
                                <i class="fa fa-check-circle confirmation_icon"></i>
                            </div>
                            <div class="text-center">
                                <h1>Application Submitted!</h1>
                                <p>Your NGO Application Has Been Submitted Into NGOAB</p>
                                <p>When your application will be accepted you will get confirmation message </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endif
@endsection

@section('script')

@endsection
