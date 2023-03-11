@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_one.Particulars_of_Organisation')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_one.Step_1')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">{{ trans('fd_one_step_one.Particulars_of_Organisation')}} </li>
                        <li>{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</li>
                        <li>{{ trans('fd_one_step_three.All_staff_details_information')}} </li>
                        <li>{{ trans('fd_one_step_four.o_info')}}</li>
                    </ul>

                </div>
                <div class="right-side">



                        @if(count($all_parti) == 0)



                    <form action="{{ route('particulars_of_Organisation_post') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                        @csrf
                    <div class="main active">
                        <div class="text">
                            <h2>{{ trans('fd_one_step_one.Particulars_of_Organisation')}} </h2>
                            {{-- <p>Enter your personal information to get closer to copanies.</p> --}}
                        </div>

                        <div class="mt-3">

                            {{-- <div class="mb-3">
                                <label for="" class="form-label">Registration Number (নিবন্ধন নম্বর)</label>
                                <input required="" name="registration_number" value="{{ Session::get('registration_number') }}" type="text" class="form-control" id="">
                            </div> --}}

                            <div class="mb-3">
                                @if(session()->get('locale') == 'en')
                                <label for="" class="form-label">সংস্থার নাম (বাংলা) </label>
                                @else
                                <label for="" class="form-label">Organization Name (Bangla)</label>
                                @endif
                                <input type="text" class="form-control" value="" name="organization_name_ban" data-parsley-required  id="">
                            </div>

                                <div class="mb-3">
                                    @if(session()->get('locale') == 'en')
                                    <label for="" class="form-label">সংস্থার নাম (English) </label>
                                    @else
                                    <label for="" class="form-label">Organization Name (English)</label>
                                    @endif
                                    <input type="text" class="form-control" value="" name="organization_name" data-parsley-required  id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_address')}}</label>
                                    <input type="text" class="form-control" value="{{ Session::get('organization_address') }}" name="organization_address" data-parsley-required  id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</label>
                                    <input type="text" class="form-control" value="{{ Session::get('address_of_head_office') }}" name="address_of_head_office" data-parsley-required  id="">
                                </div>

                                <?php

$query_to_get_data = DB::table('country')->where('id','!=',18)->orderBy('id','asc')->get();

$get_country_type = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');


$get_cityzenship_data = DB::table('country')->whereNotNull('city_eng')
            ->whereNotNull('city_bangla')->orderBy('id','asc')->get();
                                ?>

                                @if($get_country_type == 'দেশিও')
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}}</label>
                                <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">
                                    @if(session()->get('locale') == 'en')
                                    <option value="বাংলাদেশ" >বাংলাদেশ</option>
                                    @else
                                    <option value="Bangladesh">Bangladesh</option>
                                    @endif
                                </select>


                                @else
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}}</label>
                                    <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">

                                        @foreach($query_to_get_data as $all_query_to_get_data)
                                        @if(session()->get('locale') == 'en')
                                        <option value="{{ $all_query_to_get_data->name_bn }}">{{ $all_query_to_get_data->name_bn }}</option>
                                        @else
                                        <option value="{{ $all_query_to_get_data->name }}">{{ $all_query_to_get_data->name }}</option>
                                        @endif
@endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="mb-3">
                                    <h5 class="form_middle_text">
                                        {{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}
                                    </h5>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.name')}}</label>
                                    <input type="text" required name="name_of_head_in_bd" value="{{ Session::get('name_of_head_in_bd') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</label>
                                    <div class="mt-2 mb-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                                   value="{{  trans('fd_one_step_one.Part_Time') }}" {{ 'খণ্ডকালীন/Part-Time' == Session::get('job_type') ? 'checked':'' }}>
                                            <label class="form-check-label" for="inlineRadio1">{{  trans('fd_one_step_one.Part_Time') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                                   value="{{ trans('fd_one_step_one.Full_Time')}}" {{ 'পূর্ণকালীন/Full-Time' == Session::get('job_type') ? 'checked':'' }}>
                                            <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Address')}}</label>
                                    <input type="text" required name="address" value="{{ Session::get('address') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}}</label>
                                    <input type="number" data-parsley-required minlength="11" data-parsley-trigger=“keyup” name="phone" value="{{ Session::get('phone') }}"  class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}}</label>
                                    <input type="email" data-parsley-required name="email" value="{{ Session::get('email') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Citizenship')}}</label>



                                    <select class="js-example-basic-multiple form-control" data-parsley-required name="citizenship[]"
                                    multiple="multiple">

                                    @foreach($get_cityzenship_data as $all_get_cityzenship_data)
                                    @if(session()->get('locale') == 'en')
                                    <option value="{{ $all_get_cityzenship_data->city_bangla }}" >{{ $all_get_cityzenship_data->city_bangla }}</option>
                                    @else
                                <option value="{{ $all_get_cityzenship_data->city_eng }}" >{{ $all_get_cityzenship_data->city_eng }}</option>
                                @endif
                                @endforeach

                            </select>

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Profession')}}</label>
                                    <input type="text" data-parsley-required value="{{ Session::get('profession') }}" name="profession" class="form-control" id="">
                                </div>

                        </div>
                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_one" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                            <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_one" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
                        </div>
                    </div>
                </form>

                @else

                <?php

$get_all_data_1 = DB::table('fboneforms')->where('user_id',Auth::user()->id)->first();


                ?>

<form action="{{ route('particulars_of_Organisation_update') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf
<div class="main active">
    <div class="text">
        <h2>{{ trans('fd_one_step_one.Particulars_of_Organisation')}} </h2>
        {{-- <p>Enter your personal information to get closer to copanies.</p> --}}
    </div>

    <div class="mt-3">

        {{-- <div class="mb-3">
            <label for="" class="form-label">Registration Number (নিবন্ধন নম্বর)</label>
            <input required="" name="registration_number" value="{{ Session::get('registration_number') }}" type="text" class="form-control" id="">
        </div> --}}


        <div class="mb-3">
            @if(session()->get('locale') == 'en')
            <label for="" class="form-label">সংস্থার নাম (বাংলা) </label>
            @else
            <label for="" class="form-label">Organization Name (Bangla)</label>
            @endif
            <input type="text" class="form-control" value="{{ $get_all_data_1->organization_name_ban }}" name="organization_name_ban" data-parsley-required  id="">
        </div>

            <div class="mb-3">
                @if(session()->get('locale') == 'en')
                <label for="" class="form-label">সংস্থার নাম (English) </label>
                @else
                <label for="" class="form-label">Organization Name (English)</label>
                @endif
                <input type="text" class="form-control" value="{{ $get_all_data_1->organization_name }}" name="organization_name" data-parsley-required  id="">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_address')}}</label>
                <input type="text" class="form-control" value="{{ $get_all_data_1->organization_address }}" name="organization_address" data-parsley-required  id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}
                    </label>
                <input type="text" class="form-control" value="{{ $get_all_data_1->address_of_head_office }}" name="address_of_head_office" data-parsley-required  id="">
            </div>



            <?php

            $query_to_get_data = DB::table('country')->where('id','!=',18)->orderBy('id','asc')->get();


            $get_cityzenship_data = DB::table('country')->whereNotNull('city_eng')
            ->whereNotNull('city_bangla')->orderBy('id','asc')->get();

            $get_country_type = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                                            ?>

                                            @if($get_country_type == 'দেশিও')

                                            <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">
                                                @if(session()->get('locale') == 'en')
                                                <option value="বাংলাদেশ" {{ 'বাংলাদেশ' == $get_all_data_1->country_of_origin ? 'selected':'' }}>বাংলাদেশ</option>
                                                @else
                                                <option value="Bangladesh" {{ 'Bangladesh' == $get_all_data_1->country_of_origin ? 'selected':'' }}>Bangladesh</option>
                                                @endif
                                            </select>


                                            @else
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}}</label>
                                                <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">

                                                    @foreach($query_to_get_data as $all_query_to_get_data)
                                                    @if(session()->get('locale') == 'en')
                                                    <option value="{{ $all_query_to_get_data->name_bn }}" {{ $all_query_to_get_data->name_bn  == $get_all_data_1->country_of_origin ? 'selected':'' }}>{{ $all_query_to_get_data->name_bn }}</option>
                                                    @else
                                                    <option value="{{ $all_query_to_get_data->name }}" {{ $all_query_to_get_data->name == $get_all_data_1->country_of_origin ? 'selected':'' }}>{{ $all_query_to_get_data->name }}</option>
                                                    @endif
            @endforeach
                                                </select>
                                            </div>
                                            @endif






            <div class="mb-3">
                <h5 class="form_middle_text">
                    {{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}
                </h5>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.name')}}</label>
                <input type="text" data-parsley-required name="name_of_head_in_bd" value="{{ $get_all_data_1->name_of_head_in_bd }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</label>
                <div class="mt-2 mb-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="{{ trans('fd_one_step_one.Part_Time')}}" {{ trans('fd_one_step_one.Part_Time') == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio1">{{ trans('fd_one_step_one.Part_Time')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                               value="{{ trans('fd_one_step_one.Full_Time')}}" {{  trans('fd_one_step_one.Full_Time') == $get_all_data_1->job_type ? 'checked':'' }}>
                        <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Address')}}</label>
                <input type="text" data-parsley-required name="address" value="{{ $get_all_data_1->address }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}}</label>
                <input type="number" data-parsley-required minlength="11" name="phone" value="{{ $get_all_data_1->phone }}"  class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}}</label>
                <input type="text" data-parsley-required name="email" value="{{ $get_all_data_1->email }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Citizenship')}}</label>

                    <?php
 $convert_new_ass_cat  = explode(",",$get_all_data_1->citizenship);

                    ?>






                <select class="js-example-basic-multiple form-control" data-parsley-required name="citizenship[]"
                multiple="multiple">

                @foreach($get_cityzenship_data as $all_get_cityzenship_data)
                @if(session()->get('locale') == 'en')
                <option value="{{ $all_get_cityzenship_data->city_bangla }}" {{ (in_array($all_get_cityzenship_data->city_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->city_bangla }}</option>
                @else
            <option value="{{ $all_get_cityzenship_data->city_eng }}" {{ (in_array($all_get_cityzenship_data->city_eng,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->city_eng }}</option>
            @endif
            @endforeach

        </select>

            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Profession')}}</label>
                <input type="text" data-parsley-required value="{{ $get_all_data_1->profession }}" name="profession" class="form-control" id="">
            </div>

    </div>
    <div class="buttons d-flex justify-content-end mt-4">
        <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_one" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
        <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_one" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
    </div>
</div>
</form>



                @endif

                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')

<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {


            phone: {
                required: true
            }


        },


               messages:
 {




            phone: {
                required: "Phone Field is required"
            }




 }
    });
});
</script>


<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple, .distinct-single, .sub-distinct-single').select2();
    });
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
</script>


<!--//add new row-->

<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input type="text" name="" placeholder="দাতা সংস্থার নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input class="form-control" type="file" id="">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    var i = 0;
    $("#dynamic-advisor").click(function () {
        ++i;
        $("#dynamicAddRemoveAdvisor").append('<tr>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-advisor"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-advisor', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    var i = 0;
    $("#dynamic-information").click(function () {
        ++i;
        $("#dynamicAddRemoveInformation").append('<tr>' +
            '<td>' +
            '<input type="file" name="" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-information', function () {
        $(this).parents('tr').remove();
    });

</script>
@endsection
