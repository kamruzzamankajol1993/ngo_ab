@extends('front.master.master')

@section('title')
{{ trans('other_doc.reg')}} | {{ trans('header.ngo_ab')}}
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
                        <h5 class="mb-4">{{ trans('other_doc.reg')}}</h5>
                        <form method="post" action="{{ route('ngo_document_store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.list_of_authorized_executive_committee')}}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.attested_copy_of_constitution')}}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf"  name="primary_portal[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.activity_report_of_the_organization')}}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.donors_receipt_attested_by_head_of_institution')}}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.general_meeting_regarding')}}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
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
