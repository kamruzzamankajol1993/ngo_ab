@extends('front.master.master')

@section('title')
{{ trans('form 8_bn.list')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
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
                                <h5>{{ trans('form 8_bn.list')}}</h5>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary btn-custom" type="button"
                                        onclick="location.href = '{{ route('form_8_ngo_committee_member_create') }}';">
                                        {{ trans('form 8_bn.add')}}
                                </button>
                            </div>
                        </div>

                        <?php
                    if(empty($from_date_to)){

                        $newDate1 = date("Y-m-d");
                        $newDate2 = date("Y-m-d");
                        $to_total_year = '';
                    }else{



$from_date_to = DB::table('ngo_committee_members')->where('user_id',Auth::user()->id)->value('form_date');

$newDate1 = date("Y-m-d", strtotime($from_date_to));



$to_date_to = DB::table('ngo_committee_members')->where('user_id',Auth::user()->id)->value('to_date');

$newDate2 = \Carbon\Carbon::createFromFormat('d/m/Y', $to_date_to)
                    ->format('Y-m-d');;

//dd($newDate2);
$to_total_year = DB::table('ngo_committee_members')->where('user_id',Auth::user()->id)->value('total_year');
}
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="get" action="{{ route('form_8_ngo_committee_member_totalview') }}"  id="form" data-parsley-validate="">

                                            <div class="row">
                                                <div class="mb-3 col-xl-4 col-sm-12">
                                                    <label for="" class="form-label">{{ trans('form 8_bn.from')}}</label>
                                                    <input type="date" value="{{ $newDate1 }}" data-parsley-required class="form-control" name="form_date" id="form_date">
                                                </div>
                                                <div class="mb-3 col-xl-4 col-sm-12">
                                                    <label for="" class="form-label">{{ trans('form 8_bn.to')}}</label>
                                                    <input type="date" value="{{ $newDate2 }}"  data-parsley-required class="form-control" name="to_date" id="to_date">
                                                </div>
                                                <div class="mb-3 col-xl-4 col-sm-12">
                                                    <label for="" class="form-label">{{ trans('form 8_bn.total')}}</label>
                                                    <input type="text" value="{{ $to_total_year }}"  class="form-control" name="total_year" id="total_year">
                                                </div>
                                            </div>
                                       <button  class="btn btn-success btn-sm" type="submit">
                                        {{ trans('form 8_bn.submit')}}</button>
                                        </form>
                                    </div>
                                </div>
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
                                                <button type="button" class="btn btn-sm btn-primary" onclick="location.href = '{{ route('form_8_ngo_committee_member_edit',$main_all_data_list->name_slug) }}';"><i
                                                            class="bi bi-pencil-fill"></i></button>



                                                <button type="button" onclick="deleteTag({{ $main_all_data_list->id}})" class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash"></i></button>

                                                            <form id="delete-form-{{ $main_all_data_list->id }}" action="{{ route('form_8_ngo_committee_member_delete',$main_all_data_list->id) }}" method="POST" style="display: none;">

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

         //form date

      $("#form_date").change(function(){

        var form_date = $(this).val();
        var to_date = $('#to_date').val();


         $.ajax({
        url: "{{ route('form_8_ngo_committee_total_year') }}",
        method: 'GET',
        data: {form_date:form_date,to_date:to_date},
        success: function(data) {
          $("#total_year").val('');
          $("#total_year").val(data);
        }
        });


         });
      //end from date


      //to date
       $("#to_date").change(function(){

          var to_date = $(this).val();
        var form_date = $('#form_date').val();

          $.ajax({
        url: "{{ route('form_8_ngo_committee_total_year') }}",
        method: 'GET',
        data: {form_date:form_date,to_date:to_date},
        success: function(data) {
          $("#total_year").val('');
          $("#total_year").val(data);
        }
        });

         });
      //end to date

        //new_cat_n


        $("[id^=member_id]").click(function(){

            //alert(3);

            var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(9);


       $.ajax({
        url: "{{ route('form_8_ngo_committee_member_view') }}",
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
