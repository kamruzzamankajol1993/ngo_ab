
@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_four.o_info')}} | {{ trans('header.ngo_ab')}}
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
                        <h3>{{ trans('fd_one_step_four.step_4')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li >{{ trans('fd_one_step_one.Particulars_of_Organisation')}}</li>
                        <li >{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</li>
                        <li>{{ trans('fd_one_step_three.All_staff_details_information')}} </li>
                        <li class="active">{{ trans('fd_one_step_four.o_info')}}</li>
                    </ul>

                </div>
                <div class="right-side">
                    <?php

                    $get_all_data_1 = DB::table('fboneforms')->where('user_id',Auth::user()->id)
                           ->first();


                    ?>
                    @if(count($all_parti) == 0)


                @else







                <form action="{{ route('others_information_update') }}" method="post" enctype="multipart/form-data" id="form" id="form"  data-parsley-validate="">
                    @csrf

                    <input type="hidden" class="form-control" value="{{ $get_all_data_1->id }}" name="id"  id="">

                <div class="main active">
                    <div class="text">
                        <h2>{{ trans('fd_one_step_four.o_info')}}</h2>
                        {{-- <p>Enter your information to get closer to Registration.</p> --}}
                    </div>

                    <div class="mt-3">

                            <div class="mb-3">
                                <label class="form-label" for="">{{ trans('fd_one_step_four.treasury_number')}}</label>
                                <input class="form-control" required value="{{ $get_all_data_1->treasury_number }}" name="treasury_number" type="text" id="">
                            </div>

                            @if(empty($get_all_data_1->attach_the__supporting_papers))
                            <div class="mb-3">
                                <label class="form-label"  for="">{{ trans('fd_one_step_four.attach_the_supporting_papers')}}</label>
                                <input class="form-control" required  name="attach_the__supporting_papers" accept=".pdf" type="file" id="">
                            </div>
                            @else


                            <?php

$file_path = url($get_all_data_1->attach_the__supporting_papers);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);




?>

                            <div class="mb-3">
                                <label class="form-label"  for="">{{ trans('fd_one_step_four.attach_the_supporting_papers')}}</label>
                                <input class="form-control"   name="attach_the__supporting_papers" accept=".pdf" type="file" id="">
                            </div>
                            <b>{{ $filename.'.'.$extension }}</b>
                            @endif


                            <div class="mb-3">
                                <label class="form-label" for="">{{ trans('fd_one_step_four.treasury_invoice_number_for_payment_of_vAT')}}</label>
                                <input class="form-control" required name="vat_invoice_number" value="{{ $get_all_data_1->vat_invoice_number }}" type="text" id="">
                            </div>

                            @if(empty($get_all_data_1->board_of_revenue_on_fees))
                            <div class="mb-3">
                                <label class="form-label" for="">
                                    {{ trans('fd_one_step_four.15_VAT')}}</label>
                                <input class="form-control"  name="board_of_revenue_on_fees" required accept=".pdf" type="file" id="">
                            </div>
                            @else

                            <?php

$file_path = url($get_all_data_1->board_of_revenue_on_fees);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);




?>

                            <div class="mb-3">
                                <label class="form-label" for="">
                                    {{ trans('fd_one_step_four.15_VAT')}}</label>
                                <input class="form-control"  name="board_of_revenue_on_fees"  accept=".pdf" type="file" id="">
                            </div>
                            <b>{{ $filename.'.'.$extension }}</b>
                            @endif
                            <div class="mb-3">
                                <h5 class="form_middle_text">
                                    {{ trans('fd_one_step_four.tt')}}
                                </h5>

                            </div>

                        <?php


$get_all_data_adviser = DB::table('fdoneformadvisers')->where('user_id',Auth::user()->id)
       ->get();


                            ?>


<div class="row">
    @foreach($get_all_data_adviser as $key=>$all_get_all_data_other)
    <div class="col-md-4 mt-2">

        <div class="card">

            <div class="card-body">


                <p><b>{{ trans('fd_one_step_four.advisor_name')}}: {{ $all_get_all_data_other->name }}</b> </p>
                <p><b>{{ trans('fd_one_step_four.advisor_information')}}: {{ $all_get_all_data_other->information }}</b> </p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-custom next_button btn-sm" data-bs-toggle="modal" data-bs-target="#mmmexampleModal{{ $key+1 }}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>

                  </button>

                  <div class="modal fade" id="mmmexampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="mb-3">
                                <label  class="form-label">{{ trans('fd_one_step_four.advisor_name')}}:</label>
                                <input type="text" value="{{ $all_get_all_data_other->name }}" name="sname" id="sname{{ $all_get_all_data_other->id }}" class="form-control"  >
                                <input type="hidden" value="{{ $all_get_all_data_other->id }}" name="sid" id="sid{{ $all_get_all_data_other->id }}" class="form-control"  >

                              </div>

                              <div class="mb-3">
                                <label  class="form-label">{{ trans('fd_one_step_four.advisor_information')}}:</label>
                                <input type="text" value="{{ $all_get_all_data_other->information }}"  name="sinformation" id="sinformation{{ $all_get_all_data_other->id }}" placeholder=""
                                class="form-control"/>

                              </div>


                            <button id="final_b_get{{ $all_get_all_data_other->id }}" data-id="{{ $all_get_all_data_other->id }}" class="btn btn-custom next_button btn-sm">Update</button>

                        </div>

                      </div>
                    </div>
                  </div>

                  <button id="adeleteRecord{{ $all_get_all_data_other->id }}" class="btn btn-danger btn-sm" data-id="{{ $all_get_all_data_other->id }}" type="button" name="deleting">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>



            </div>

        </div>

    </div>
    @endforeach
</div>

@if(count($get_all_data_adviser) == 0)
<div class="mb-3">
    <table class="table table-light" id="dynamicAddRemoveAdvisor">
        <tr>
            <th>{{ trans('fd_one_step_four.advisor_name')}}</th>
            <th>{{ trans('fd_one_step_four.advisor_information')}}</th>
            <th></th>
        </tr>
        <tr>
            <td>
                <input type="text" required  name="name[]" placeholder="পরামর্শকের নাম"
                       class="form-control"/>
            </td>
            <td>
                <input type="text"  required name="information[]" placeholder="পরামর্শকের ঠিকানা"
                       class="form-control"/>
            </td>
            <td></td>
        </tr>
    </table>
    <button type="button" name="add" id="dynamic-advisor"
            class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_advisor_information')}}
    </button>
</div>
@else


                            <div class="mb-3">
                                <table class="table table-light" id="dynamicAddRemoveAdvisor">
                                    <tr>
                                        <th>{{ trans('fd_one_step_four.advisor_name')}}</th>
                                        <th>{{ trans('fd_one_step_four.advisor_information')}}</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"  name="name[]" placeholder="পরামর্শকের নাম"
                                                   class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text"  name="information[]" placeholder="পরামর্শকের ঠিকানা"
                                                   class="form-control"/>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                                <button type="button" name="add" id="dynamic-advisor"
                                        class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_advisor_information')}}
                                </button>
                            </div>
                            @endif

                            <div class="mb-3">
                                <h5 class="form_middle_text">
                                    {{ trans('fd_one_step_four.Main_Account_Details')}}
                                </h5>
                            </div>


                            <?php


                            $get_all_data_adviser_bank = DB::table('bankaccounts')->where('user_id',Auth::user()->id)
                                   ->first();


                            $get_all_data_adviser_bank_all = DB::table('bankaccounts')->where('user_id',Auth::user()->id)
                             ->get();


                                                        ?>

                                                      @if(count($get_all_data_adviser_bank_all) == 0)


                                                      <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.account_number')}}</label>
                                                                    <input type="text" required name="account_number" class="form-control" id="">
                                                                    <input type="hidden" value="p" required name="bank_id" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.account_type')}}</label>
                                                                    <input type="text" required name="account_type" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}</label>
                                                                    <input type="text"  required name="name_of_bank" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}</label>
                                                                    <input type="text" required  name="branch_name_of_bank" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address')}}</label>
                                                                    <input type="text" required  name="bank_address" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                      @else



                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('fd_one_step_four.account_number')}}</label>
                                            <input type="text" value="{{ $get_all_data_adviser_bank->account_number }}" required name="account_number" class="form-control" id="">

                                            <input type="hidden" value="{{ $get_all_data_adviser_bank->id }}" required name="bank_id" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('fd_one_step_four.account_type')}}</label>
                                            <input type="text" required name="account_type" value="{{ $get_all_data_adviser_bank->account_type }}" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}</label>
                                            <input type="text"  required name="name_of_bank" value="{{ $get_all_data_adviser_bank->name_of_bank }}" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}</label>
                                            <input type="text" required  name="branch_name_of_bank" value="{{ $get_all_data_adviser_bank->branch_name_of_bank }}" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address')}}</label>
                                            <input type="text" required  name="bank_address" value="{{ $get_all_data_adviser_bank->bank_address }}" class="form-control" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif


             <?php


                            $get_all_data_other= DB::table('acounntotherinfos')->where('user_id',Auth::user()->id)
                                   ->get();


                 ?>

<div class="row">
    @foreach($get_all_data_other as $key=>$all_get_all_data_other)
    <div class="col-md-3 mt-2">

        <div class="card">

            <div class="card-body">


                <p><b>{{ trans('fd_one_step_four.information_pdf')}}:</b> <a target="_blank" href="{{ route('other_info_from_one_download',$all_get_all_data_other->id) }}" class="btn btn-custom next_button btn-sm" >
                    <i class="fa fa-download" aria-hidden="true"></i>
                </a></p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-custom next_button btn-sm" data-bs-toggle="modal" data-bs-target="#mmexampleModal{{ $key+1 }}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>

                  </button>

                  <button id="deleteRecord{{ $all_get_all_data_other->id }}" class="btn btn-danger btn-sm" data-id="{{ $all_get_all_data_other->id }}" type="button" name="deleting">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>


                 {{-- <button type="button"  onclick="deleteTag({{ $all_get_all_source_of_fund_data->id}})"class="btn btn-danger btn-sm" >
                    <i class="fa fa-trash-o" aria-hidden="true"></i>

                  </button>
                  <form id="delete-form-{{ $all_get_all_source_of_fund_data->id }}" action="{{ route('source_of_fund_delete',$all_get_all_source_of_fund_data->id) }}" method="POST" >

                    @csrf

                </form> --}}


                  <!-- Modal -->
<div class="modal fade" id="mmexampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form method="post" action="{{ route('other_information_a_update') }}">
@csrf


<input type="hidden" name="mid" value="{{ $all_get_all_data_other->id }}" class="form-control" id="exampleFormControlInput1" >




<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">{{ trans('fd_one_step_four.information_pdf')}}</label>
<input type="file" accept=".pdf" name="information_type" class="form-control" id="exampleFormControlInput1">
</div>

<button type="submit" class="btn btn-custom next_button btn-sm">
Update
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

@if(count($get_all_data_other) == 0)

                            <div class="mb-3">
                                <table class="table table-light" id="dynamicAddRemoveInformation">
                                    <tr>
                                        <th>{{ trans('fd_one_step_four.information_pdf')}}</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" required accept=".pdf"  name="information_type[]" class="form-control"/>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                                <button type="button" name="add" id="dynamic-information"
                                        class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_information')}}
                                </button>
                            </div>
                            @else
                            <div class="mb-3">
                                <table class="table table-light" id="dynamicAddRemoveInformation">
                                    <tr>
                                        <th>{{ trans('fd_one_step_four.information_pdf')}}</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file"  accept=".pdf"  name="information_type[]" class="form-control"/>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                                <button type="button" name="add" id="dynamic-information"
                                        class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_information')}}
                                </button>
                            </div>


                            @endif

                    </div>

                    <div class="buttons d-flex justify-content-end mt-4">
                        <a href="{{ route('all_staff_details_information') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                        <button class="btn btn-custom submit_button" name="submit_value" value="all_complete" type="submit" >{{ trans('fd_one_step_four.Submit')}}</button>
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




$("[id^=final_b_get]").click(function () {

    var id = $(this).data("id");
    var name = $('#sname'+id).val();
    var information = $('#sinformation'+id).val();


    $.ajax({
                url: "{{ route('adviser_data_update') }}",
                type: 'get',
                data: {
                    "name": name,
                    "information": information,
                    "id": id,

                },
                success: function (data) {
                    //alert('success');
                    location.reload(true);
                }
            });

});
    $("[id^=adeleteRecord]").click(function () {

        var x = confirm("Are you sure you want to delete?");
        if (x) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "{{ route('adviser_data_delete') }}",
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
    $("[id^=deleteRecord]").click(function () {

        var x = confirm("Are you sure you want to delete?");
        if (x) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "{{ route('other_information_a_delete') }}",
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
            '<input type="text" name="" placeholder="দাতা সংস্থার নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input class="form-control" type="file" accept=".pdf" id="">' +
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
            '<input type="text" name="name[]" required placeholder="পরামর্শকের নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="information[]" required placeholder="পরামর্শকের ঠিকানা" class="form-control" />' +
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
            '<input type="file" accept=".pdf" name="information_type[]" required placeholder="" class="form-control" />' +
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
