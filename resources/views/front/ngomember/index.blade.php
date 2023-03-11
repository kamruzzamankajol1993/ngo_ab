@extends('front.master.master')

@section('title')
{{ trans('ngo_member.ngo_member')}} | {{ trans('header.ngo_ab')}}
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
                    <div class="committee_container">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('ngo_member.ngo_member_list')}}</h5>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary btn-custom" type="button"
                                        onclick="location.href = '{{ route('ngo_member_create') }}';">
                                        {{ trans('form 8_bn.add')}}
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <table class="table table-bordered mt-4 custom_table">
                                    <tr>
                                        <th>{{ trans('form 8_bn.sl')}}</th>
                                        <th>{{ trans('form 8_bn.name')}} & {{ trans('form 8_bn.designation')}}</th>
                                        <th>{{ trans('form 8_bn.date_of_birth')}}</th>
                                        <th>{{ trans('form 8_bn.address')}}</th>

                                        <th>{{ trans('form 8_bn.action')}}</th>
                                    </tr>
                                   @foreach($all_data_list as $key=>$main_all_data_list)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $main_all_data_list->name }} <br> <span class="text-success">{{ trans('form 8_bn.designation')}}:</span>
                                            {{ $main_all_data_list->desi }}
                                        </td>
                                        <td>
                                            <?php

                                            $newDate12 = date("d-m-Y", strtotime($main_all_data_list->dob ));

                                                                                            ?>


@if(session()->get('locale') == 'en')


{{ str_replace($engDATE, $bangDATE, $newDate12)}}


@else

    {{ $newDate12 }}
@endif




                                        </td>
                                        <td><span>{{ trans('form 8_bn.present_address')}}:</span>  {{ $main_all_data_list->present_address }} <br>
                                            <span>{{ trans('form 8_bn.permanent_address')}}:</span>  {{ $main_all_data_list->permanent_address }}
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-primary" onclick="location.href = '{{ route('ngo_member_edit',$main_all_data_list->name_slug) }}';"><i
                                                            class="bi bi-pencil-fill"></i></button>



                                                <button type="button" onclick="deleteTag({{ $main_all_data_list->id}})" class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash"></i></button>

                                                            <form id="delete-form-{{ $main_all_data_list->id }}" action="{{ route('ngo_member_delete',$main_all_data_list->id) }}" method="POST" style="display: none;">

                                                                @csrf

                                                            </form>


                                                <button id="member_id{{ $main_all_data_list->id }}" class="btn btn-success btn-sm" type="button"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasWithBothOptions"
                                                        aria-controls="offcanvasWithBothOptions"><i
                                                            class="bi bi-eye-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class=" offcanvas offcanvas-end" style="width:40vw !important" data-bs-scroll="true" tabindex="-1"
     id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{ trans('form 8_bn.personal_info')}}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="committee_profile" id="main_content_table">

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){

        //new_cat_n


        $("[id^=member_id]").click(function(){

            //alert(3);

            var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(9);


       $.ajax({
        url: "{{ route('ngo_member_view') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });

        });
        });



</script>
@endsection
