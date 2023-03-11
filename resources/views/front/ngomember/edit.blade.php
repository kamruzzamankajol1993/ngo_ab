@extends('front.master.master')

@section('title')
{{ trans('ngo_member.ngo_member')}} | {{ trans('header.ngo_ab')}}
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
                            <form method="post" action="{{ route('ngo_member_update') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf

                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name')}}</label>
                                    <input type="text" name="name" value="{{ $all_data_list->name }}"  class="form-control" id="">

                                    <input type="hidden" name="id" value="{{ $all_data_list->id }}"  class="form-control" id="">

                                </div>
                               <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.designation')}}</label>
                                    <input type="text" name="desi" value="{{ $all_data_list->desi }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}}</label>
                                    <input type="date" name="dob" value="{{ $all_data_list->dob }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}}</label>
                                    <input type="text" name="nid_no" value="{{ $all_data_list->nid_no }}"  class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}}</label>
                                    <input type="text" name="phone" value="{{ $all_data_list->phone }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}}</label>
                                    <input type="text" name="father_name" value="{{ $all_data_list->father_name }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.present_address')}}</label>
                                    <textarea class="form-control"  name="present_address" id="exampleFormControlTextarea1"
                                              rows="2">
                                            {{ $all_data_list->present_address }}

                                            </textarea>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}}</label>
                                    <textarea class="form-control" name="permanent_address"   id="exampleFormControlTextarea1"
                                              rows="2">
                                          {{ $all_data_list->permanent_address }}
                                            </textarea>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}}</label>
                                    <input type="text" name="name_supouse" value="{{ $all_data_list->name_supouse }}" class="form-control" id="">
                                </div>
                                {{-- <div class=" mb-3">
                                    <label for="" class="form-label">Educational Qualification</label>
                                    <input type="text" name="edu_quali" value="{{ $all_data_list->edu_quali }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">Profession</label>
                                    <select class="form-control" name="profession"  id="">
                                        <option value="Govt./Semi Govt./Govt Autonomous" {{ $all_data_list->profession == 'Govt./Semi Govt./Govt Autonomous' ? 'selected':'' }}>Govt./Semi Govt./Govt Autonomous</option>
                                        <option value="Private Service" {{ $all_data_list->profession == 'Private Service' ? 'selected':'' }}>Private Service</option>
                                        <option value="Self Service"{{ $all_data_list->profession == 'Self Service' ? 'selected':'' }}>Self Service</option>
                                    </select>
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">Description of Job</label>
                                    <input type="text" name="job_des" value="{{ $all_data_list->job_des }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">Member of Service Holder of Any Other
                                        NGO</label>
                                    <select class="form-control" name="service_status" id="">
                                        <option value="YES" {{ $all_data_list->profession == 'YES' ? 'selected':'' }}>YES</option>
                                        <option value="NO" {{ $all_data_list->profession == 'NO' ? 'selected':'' }}>NO</option>
                                    </select>
                                </div> --}}
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.remarks')}}</label>
                                    <input type="text" name="remarks" value="{{ $all_data_list->remarks }}" class="form-control" id="">
                                </div>
                                {{-- <div class=" mb-3">
                                    <label for="" class="form-label">Signature</label>
                                    <input type="file" accept=".jpg,.jpeg,.png" name="image" class="form-control" id="">

                                    <img src="{{ asset('/') }}{{ $all_data_list->image  }}" style="height:50px;" />
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" name="main_date" value="{{ $all_data_list->main_date }}" class="form-control" id="">
                                </div> --}}
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.update')}}
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
