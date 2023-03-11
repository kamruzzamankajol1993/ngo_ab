@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_two.Field_of_proposed_activities')}} | {{ trans('header.ngo_ab')}}
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
                        <h3>{{ trans('fd_one_step_two.Step_2')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li >{{ trans('fd_one_step_one.Particulars_of_Organisation')}}</li>
                        <li class="active">{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</li>
                        <li>{{ trans('fd_one_step_three.All_staff_details_information')}} </li>
                        <li>{{ trans('fd_one_step_four.o_info')}}</li>
                    </ul>

                </div>
                <div class="right-side">

                    <?php

                    $get_all_data_1 = DB::table('fboneforms')->where('user_id',Auth::user()->id)
           ->first();


                                    ?>

                    @if(count($all_parti) == 0)


                @else

                <form action="{{ route('field_of_proposed_activities_update') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <input type="hidden" class="form-control" value="{{ $get_all_data_1->id }}" name="mid"  id="">
                <div class="main active">
                    <div class="text">
                        <h2>{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</h2>
                        {{-- <p>Enter your information to get closer to Registration.</p> --}}
                    </div>

                    <div class="mt-3">

                        @if(empty($get_all_data_1->plan_of_operation))

                            <div class="mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_two.Plan_of_Operation')}}</label>
                                <input type="file" data-parsley-required accept=".pdf" name="plan_of_operation" class="form-control" id="">
                            </div>
@else

<?php

$file_path = url($get_all_data_1->plan_of_operation);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);




?>
<div class="mb-3">
    <label for="" class="form-label">{{ trans('fd_one_step_two.Plan_of_Operation')}}</label>
    <input type="file" accept=".pdf" name="plan_of_operation" class="form-control" id="">
</div>
<b>{{ $filename.'.'.$extension }}</b>
                        @endif



                            <div class="mb-3 mt-4">
                                <label for="" class="form-label">{{ trans('fd_one_step_two.Project_District')}}</label>
                                <select required class="distinct-single form-control custom-form-control" name="district" data-parsley-required>
                                    <option value="Dhaka" {{'Dhaka' == $get_all_data_1->district ? 'selected':'' }}>Dhaka</option>
                                    <option value="Sylhet" {{'Sylhet' == $get_all_data_1->district ? 'selected':'' }}>Sylhet</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_two.Project_Sub_District')}}</label>
                                <select required class="sub-distinct-single form-control custom-form-control" name="sub_district" data-parsley-required>
                                    <option value="Tangial" {{'Tangial' == $get_all_data_1->sub_district ? 'selected':'' }}>Tangial</option>
                                    <option value="Demra"  {{'Demra' == $get_all_data_1->sub_district ? 'selected':'' }}>Demra</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <h5 class="form_middle_text">
                                    {{ trans('fd_one_step_two.Source_of_Fund')}}
                                </h5>
                            </div>



<?php

$get_all_source_of_fund_data = DB::table('sourceoffunds')->where('user_id',Auth::user()->id)
->Where('ngo_id',$get_all_data_1->id)->get();


                ?>

                <div class="row">
                    @foreach($get_all_source_of_fund_data as $key=>$all_get_all_source_of_fund_data)
                    <div class="col-md-6 mt-2">

                        <div class="card">

                            <div class="card-body">
                                <p><b>{{ trans('fd_one_step_two.Name_of_donor_organization')}}:</b> {{ $all_get_all_source_of_fund_data->name }}</p>
                                <p><b>{{ trans('fd_one_step_two.Address_of_donor_organization')}}:</b> {{ $all_get_all_source_of_fund_data->address }}</p>

                                <p><b>{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}}:</b> <a target="_blank" href="{{ route('source_of_fund_doc_download',$all_get_all_source_of_fund_data->id) }}" class="btn btn-custom next_button btn-sm" >
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a></p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-custom next_button btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>

                                  </button>

                                  <button id="deleteRecord{{ $all_get_all_source_of_fund_data->id }}" class="btn btn-danger btn-sm" data-id="{{ $all_get_all_source_of_fund_data->id }}" type="button" name="deleting">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>


                                 {{-- <button type="button"  onclick="deleteTag({{ $all_get_all_source_of_fund_data->id}})"class="btn btn-danger btn-sm" >
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>

                                  </button>
                                  <form id="delete-form-{{ $all_get_all_source_of_fund_data->id }}" action="{{ route('source_of_fund_delete',$all_get_all_source_of_fund_data->id) }}" method="POST" >

                                    @csrf

                                </form> --}}


                                  <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> {{ trans('form 8_bn.update')}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('source_of_fund_update') }}">
                @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{ trans('fd_one_step_two.Name_of_donor_organization')}}</label>
                <input type="text" name="name_sour" value="{{ $all_get_all_source_of_fund_data->name }}" class="form-control" id="exampleFormControlInput1" >

                <input type="hidden" name="id" value="{{ $all_get_all_source_of_fund_data->id }}" class="form-control" id="exampleFormControlInput1" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{ trans('fd_one_step_two.Address_of_donor_organization')}}</label>
                <input type="text" name="address" value="{{ $all_get_all_source_of_fund_data->address }}" class="form-control" id="exampleFormControlInput1" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}}</label>
                <input type="file" name="letter_file" accept=".pdf" class="form-control" id="exampleFormControlInput1">
              </div>

              <button type="submit" class="btn btn-custom next_button btn-sm">
                {{ trans('form 8_bn.update')}}
              </button>
            </form>

        </div>

      </div>
    </div>
  </div>
                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>




@if(count($get_all_source_of_fund_data) == 0)

<div class="mb-3 mt-2">
    <table class="table table-light" id="dynamicAddRemove">
        <tr>
            <th>{{ trans('fd_one_step_two.Name_of_donor_organization')}}</th>
            <th>{{ trans('fd_one_step_two.Address_of_donor_organization')}}</th>
            <th>{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}}</th>
            <th></th>
        </tr>

        <tr>
            <td>
                <input type="text" required  name="name[]" placeholder="দাতা সংস্থার নাম"
                       class="form-control"/>
            </td>
            <td>
                <input type="text" required  name="address[]" placeholder="দাতা সংস্থার ঠিকানা"
                       class="form-control"/>
            </td>
            <td>
                <input class="form-control" required accept=".pdf"  name="letter_file[]" type="file" id="">
            </td>
            <td></td>
        </tr>

    </table>
    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">{{ trans('fd_one_step_two.Add_New_Donor_Information')}}
    </button>
</div>

@else
<div class="mb-3 mt-2">
    <table class="table table-light" id="dynamicAddRemove">
        <tr>
            <th>{{ trans('fd_one_step_two.Name_of_donor_organization')}}</th>
            <th>{{ trans('fd_one_step_two.Address_of_donor_organization')}}</th>
            <th>{{ trans('fd_one_step_two.Letter_of_Commitment_from_Prospective_donor')}}</th>
            <th></th>
        </tr>

        <tr>
            <td>
                <input type="text"   name="name[]" placeholder="দাতা সংস্থার নাম"
                       class="form-control"/>
            </td>
            <td>
                <input type="text"   name="address[]" placeholder="দাতা সংস্থার ঠিকানা"
                       class="form-control"/>
            </td>
            <td>
                <input class="form-control" accept=".pdf"  name="letter_file[]" type="file" id="">
            </td>
            <td></td>
        </tr>

    </table>
    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">
        {{ trans('fd_one_step_two.Add_New_Donor_Information')}}
    </button>
</div>
@endif



                            <div class="mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_two.What_is_Your_Expected_Annual_Budget_Foreign_Currency_or_Bangladeshi_Taka')}}</label>
                                <input type="text" name="annual_budget" value="{{ $get_all_data_1->annual_budget }}" data-parsley-required class="form-control" id="">
                            </div>


                    </div>


                    <div class="buttons d-flex justify-content-end mt-4">
                        <a href="{{ route('back_from_step_two') }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                        <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_two" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                        <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_two" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
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
    $('#form1').validate({ // initialize the plugin
        rules: {


            district: {
                required: true
            },
            sub_district: {
                required: true
            },
            name: {
                required: true
            },

            address: {
                required: true
            },


            annual_budget: {
                required: true
            }


        },


               messages:
 {




            district: {
                required: " district Field is required"
            },
            sub_district: {
                required: " sub_district Field is required"
            },
            name: {
                required: " name Field is required"
            },
            address: {
                required: " address Field is required"
            },
            annual_budget: {
                required: " annual_budget Field is required"
            }





 }
    });
});
</script>

<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {


            district: {
                required: true
            },
            sub_district: {
                required: true
            },
            name: {
                required: true
            },

            address: {
                required: true
            },
            letter_file: {
                required: true
            },
            annual_budget: {
                required: true
            }


        },


               messages:
 {




            district: {
                required: " district Field is required"
            },
            sub_district: {
                required: " sub_district Field is required"
            },
            name: {
                required: " name Field is required"
            },
            address: {
                required: " address Field is required"
            },
            letter_file: {
                required: " letter_file Field is required"
            },
            annual_budget: {
                required: " annual_budget Field is required"
            }





 }
    });
});
</script>

<script>
    $("[id^=deleteRecord]").click(function () {

        var x = confirm("Are you sure you want to delete?");
        if (x) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "{{ route('source_of_fund_delete') }}",
                type: 'get',
                data: {
                    "id": id,

                },
                success: function (data) {
                    alert('success');
                    location.reload(true);
                }
            });
        } else {
            return false;
        }

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
            '<input type="text" name="name[]" required placeholder="দাতা সংস্থার নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="address[]" required placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input class="form-control" accept=".pdf" required name="letter_file[]" type="file" id="">' +
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
            '<input type="file" accept=".pdf" name="" placeholder="" class="form-control" />' +
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
