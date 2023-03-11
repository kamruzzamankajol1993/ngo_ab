@extends('front.master.master')

@section('title')
{{ trans('ngo_member.ngo_member')}}  | {{ trans('header.ngo_ab')}}
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
                    <div class="card">
                        <div class="card-header">
                            {{ trans('ngo_member.ngo_member')}}
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('ngo_member_store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.name')}}</label>
                                    <input type="text" data-parsley-required name="name"  class="form-control" id="">
                                </div>
                               <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.designation')}}</label>
                                    <input type="text" data-parsley-required name="desi" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.date_of_birth')}}</label>
                                    <input type="date" data-parsley-required name="dob" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.nid_no')}}</label>
                                    <input type="text" data-parsley-required name="nid_no"  class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.mobile_no')}}</label>
                                    <input type="text" data-parsley-required name="phone" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.fathers_name')}}</label>
                                    <input type="text" data-parsley-required name="father_name" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.present_address')}}</label>
                                    <textarea class="form-control"  data-parsley-required name="present_address" id="exampleFormControlTextarea1"
                                              rows="2"></textarea>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.permanent_address')}}</label>
                                    <textarea class="form-control" data-parsley-required  name="permanent_address"  id="exampleFormControlTextarea1"
                                              rows="2"></textarea>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.name_of_spouse')}}</label>
                                    <input type="text" data-parsley-required name="name_supouse" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('ngo_member.remarks')}}</label>
                                    <input type="text" data-parsley-required name="remarks" class="form-control" id="">
                                </div>
                                {{-- <div class=" mb-3">
                                    <label for="" class="form-label">Signature</label>
                                    <input type="file" data-parsley-required accept=".jpg,.jpeg,.png" name="image" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" data-parsley-required name="main_date" class="form-control" id="">
                                </div> --}}
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration"
                                           >{{ trans('form 8_bn.add')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
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

    });
});
</script>
@endsection
