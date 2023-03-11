
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
                        <h3>{{ trans('fd_one_step_three.Step_3')}}</h3>
                    </div>
                    <ul class="progress-bar">

                        <li >{{ trans('fd_one_step_two.Field_of_proposed_activities')}}</li>
                        <li >{{ trans('fd_one_step_three.All_staff_details_information')}} </li>
                        <li  class="active">{{ trans('fd_one_step_four.o_info')}}</li>
                    </ul>

                </div>
                <div class="right-side">

                    <form action="{{ route('other_information_for_renew_get') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                        @csrf

                    <div class="main active">
                        <div class="text">
                            <h2>Others information </h2>
                            <p>Enter your information to get closer to Registration.</p>
                        </div>

                        <div class="mt-3">

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Whether registration fee and VAT have been paid (copy of invoice to be attached)(নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)</label>
                                    <input class="form-control" name="copy_of_chalan" data-parsley-required accept=".pdf" type="file" id="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Whether VAT due, if any, on any fees mentioned in Schedule-1 has been paid (copy of invoice to be attached): (তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)</label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <h5 class="form_middle_text">
                                        Main Account Details (মাদার একাউন্ট এর বিস্তারিত বিবরণ)
                                    </h5>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Account Number (হিসাব নম্বর)</label>
                                                <input type="text" data-parsley-required name="main_account_number" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Account Type (ধরণ)</label>
                                                <input type="text" data-parsley-required name="main_account_type" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name of Bank (ব্যাংকের নাম)</label>
                                                <input type="text" data-parsley-required name="name_of_bank" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Branch Name of Bank(ব্যাংকের শাখা)</label>
                                                <input type="text" data-parsley-required name="main_account_name_of_branch" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Bank Address (ব্যাংকের ঠিকানা)</label>
                                                <input type="text" data-parsley-required name="bank_address_main" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">In case of change of bank account number, copy of approval letter from Bureau should be attached: (ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমদনপত্রের কপি সংযুক্ত করতে হবে)</label>
                                    <input class="form-control" name="change_ac_number" data-parsley-required accept=".pdf"  type="file" id="">
                                </div>

                            </form>
                        </div>

                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-dark back_button me-2" onclick="location.href = '{{ route('all_staff_information_for_renew') }}';">Back</button>
                            <button class="btn btn-custom submit_button" type="submit" >Submit</button>
                        </div>
                    </div>
<form>


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

            staff_name: {
                required: true
            },
            staff_position: {
                required: true
            },
            staff_address: {
                required: true
            },
            date_of_join: {
                required: true
            },

            citizenship: {
                required: true
            },
            salary_statement: {
                required: true
            },
            other_occupation: {
                required: true
            },
            citizenship2: {
                required: true
            },
            citizenship1: {
                required: true
            },
            citizenship3: {
                required: true
            },
            citizenship4: {
                required: true
            },
            citizenship5: {
                required: true
            }

        },


               messages:
 {



    staff_name: {
                required: " staff_name Field is required"
            },
            staff_position: {
                required: " staff_position Field is required"
            },
            staff_address: {
                required: " staff_address Field is required"
            },
            date_of_join: {
                required: " date_of_join Field is required"
            },

            citizenship: {
                required: " citizenship Field is required"
            },
            salary_statement: {
                required: " salary_statement Field is required"
            },
            other_occupation: {
                required: " other_occupation Field is required"
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
