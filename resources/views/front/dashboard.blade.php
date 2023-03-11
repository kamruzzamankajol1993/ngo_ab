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
                    <div class="user_dashboard_right">

                        <h4>{{ trans('first_info.profile')}}</h4>
                        <?php

$get_reg_id = DB::table('ngostatuses')->where('user_id',Auth::user()->id)->value('status');


?>
@if(empty($get_reg_id))
                        <button class="btn btn-sm btn-danger"  onclick="deleteTag(2)" >{{ trans('first_info.reset')}}</button>
                        <form id="delete-form-2" action="{{ route('reset_all_data') }}" method="POST" style="display: none;">

                            @csrf

                        </form>
                        @else

                        @endif
                        <button class="btn btn-sm btn-registration" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ trans('first_info.edit')}}</button>

                    </div>

                    @include('flash_message')
                    <div class="row mt-4">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>{{ trans('first_info.name')}}</td>
                                            <td>: {{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('first_info.email')}}</td>
                                            <td>: {{ Auth::user()->email }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Password</td>
                                            <td>: **********</td>
                                        </tr> --}}
                                        <tr>
                                            <td>{{ trans('first_info.e_verified')}}</td>
                                            @if(Auth::user()->is_email_verified == 1)
                                            <td>: {{ trans('first_info.yes')}}</td>
                                            @else
                                            <td>: {{ trans('first_info.no')}}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>{{ trans('header.phone_number')}}</td>
                                            <td>:
                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,Auth::user()->phone) }}

                                                @else
                                                {{ Auth::user()->phone}}
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Country</td>
                                            <td>: Bangladesh</td>
                                        </tr> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">{{ trans('first_info.ngo_status')}}</div>
                                <div class="card-body">

                                    <?php


$data_m_one = DB::table('fboneforms')->where('user_id',Auth::user()->id)
                                           ->get();

                                        if(count($data_m_one) == 0){
$count = 11;

                                        }else{

                                    $data = DB::table('fboneforms')->where('user_id',Auth::user()->id)
                                           ->first();

                                           $count = 0;
                foreach ($data   as $a) {
                    if (is_null($a)) {
                        $count++;
                  }
                }

            }


            $data1_m_one = DB::table('ngo_committee_members')->where('user_id',Auth::user()->id)
                                           ->get();


                                           if(count($data1_m_one) == 0){
$count1 = 11;

                                        }else{





                                           $data1 = DB::table('ngo_committee_members')->where('user_id',Auth::user()->id)
                                           ->first();

                                           $count1 = 0;
                foreach ($data1   as $a1) {
                    if (is_null($a1)) {
                        $count1++;
                  }
                }

                                        }

                                        $data2_m_one = DB::table('ngomembers')->where('user_id',Auth::user()->id)
                                           ->get();

                                           if(count($data2_m_one) == 0){
$count2 = 11;

                                        }else{


                                           $data2 = DB::table('ngomembers')->where('user_id',Auth::user()->id)
                                           ->first();

                                           $count2 = 0;
                foreach ($data2   as $a2) {
                    if (is_null($a2)) {
                        $count2++;
                  }
                }
            }

            $data3_m_one = DB::table('ngo_member_docs')->where('user_id',Auth::user()->id)
                                           ->get();

                                           if(count($data3_m_one) == 0){
$count3 = 11;

                                        }else{



                    $data3 = DB::table('ngo_member_docs')->where('user_id',Auth::user()->id)
                                           ->first();


                $count3 = 0;
                foreach ($data3   as $a3) {
                    if (is_null($a3)) {
                        $count3++;
                  }
                }
            }

                                    ?>


                                   <table class="table table-borderless">

                                    @if($count == 0)
                                    <tr>
                                        <td>{{ trans('first_info.fd_one')}}</td>
                                        <td><span class="badge bg-success">{{ trans('first_info.complete')}}</span></td>
                                    </tr>
                                    @else
                                       <tr>
                                           <td>{{ trans('first_info.fd_one')}}</td>
                                           <td><span class="badge bg-danger">{{ trans('first_info.incomplete')}}</span></td>
                                       </tr>
                                       @endif
                                       @if($count1 == 0)
                                       <tr>
                                        <td>{{ trans('first_info.form_eight')}}</td>
                                        <td><span class="badge bg-success">{{ trans('first_info.complete')}}</span></td>
                                    </tr>
                                       @else
                                       <tr>
                                           <td>{{ trans('first_info.form_eight')}}</td>
                                           <td><span class="badge bg-danger">{{ trans('first_info.incomplete')}}</span></td>
                                       </tr>
                                       @endif
                                       @if($count2 == 0)
                                       <tr>
                                        <td>{{ trans('first_info.member_info')}}</td>
                                        <td><span class="badge bg-success">{{ trans('first_info.complete')}}</span></td>
                                       </tr>

                                       @else
                                       <tr>
                                        <td>{{ trans('first_info.member_info')}}</td>
                                        <td><span class="badge bg-danger">{{ trans('first_info.incomplete')}}</span></td>
                                    </tr>
                                       @endif
                                       @if($count3 == 0)
                                       <tr>
                                        <td>{{ trans('first_info.other_info')}}</td>
                                        <td><span class="badge bg-success">{{ trans('first_info.complete')}}</span></td>
                                    </tr>
                                       @else
                                       <tr>
                                           <td>{{ trans('first_info.other_info')}}</td>
                                           <td><span class="badge bg-danger">{{ trans('first_info.incomplete')}}</span></td>
                                       </tr>
                                       @endif
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('first_info.update')}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('register.update') }}">
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
@endsection

@section('script')

@endsection
