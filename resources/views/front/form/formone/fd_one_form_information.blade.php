@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_one.all_info')}} | {{ trans('header.ngo_ab')}}
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
                    @include('flash_message')
                    <div class="user_dashboard_right">
                        <h4>{{ trans('fd_one_step_one.f_form')}} </h4>
                    </div>

                    <div class="card-body mt-3 mb-3">
                        <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('fd_one_form_edit') }}';">
                            {{ trans('fd_one_step_four.fd_update')}}
                        </button>

                        <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('fd_one_form_information_pdf') }}">
                            {{ trans('form 8_bn.download_pdf')}}
                        </a>

                        @if($get_complete_status->complete_status == 'all_complete')

                        @if($get_complete_status->s_pdf == 0)
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            {{ trans('form 8_bn.upload_pdf')}}
                        </button>
                        @else

                        <?php

                        $file_path = url($get_complete_status->s_pdf);
                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                        ?>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            @if(session()->get('locale') == 'en')
                            পুনরায় আপলোড করুন
                            @else
                            Re-upload
                            @endif
                        </button><br>
                        <p class="badge bg-success rounded">{{ $filename.'.'.$extension }}</p>
                        @endif
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('upload_from_one_pdf') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                @csrf

                <div class=" mb-3">
                    <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
                    <input type="file" data-parsley-required accept=".pdf" name="s_pdf"  class="form-control" id="">
                    <input type="hidden" data-parsley-required  name="id"  value="{{ $get_complete_status->id }}" class="form-control" id="">
                </div>

                <button class="btn btn-sm btn-success" type="submit">
                    {{ trans('form 8_bn.upload_pdf')}}
                </button>
            </form>
        </div>

      </div>
    </div>
  </div>
                        @else


                        @endif

                        <br>

                        <?php

                    $data = DB::table('fboneforms')->where('user_id',Auth::user()->id)
                           ->first();




$count = 0;
foreach ($data   as $a) {
    if (is_null($a)) {
        $count++;
  }
}
//dd($count);


                    ?>

                    @if($count == 0)
                    <p class="badge bg-success rounded">{{ trans('form 8_bn.complete_status')}}</p>

                            @else

                            <p class="badge bg-danger rounded">{{ trans('form 8_bn.un_complete_status')}}</p>

                            @endif

                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.one')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_one.Particulars_of_Organisation')}} :</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>(i)</td>
                                    <td>{{ trans('fd_one_step_one.Organization_Name')}}</td>
                                    <td>: {{ $get_complete_status->organization_name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(ii)</td>
                                    <td>{{ trans('fd_one_step_one.Organization_address')}}</td>
                                    <td>: {{ $get_complete_status->organization_address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(iii)</td>
                                    <td>{{ trans('fd_one_step_one.reg_num')}}</td>
                                    <td>: {{ $get_complete_status->registration_number }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(iv)</td>
                                    <td>{{ trans('fd_one_step_one.Country_of_Origin')}}</td>
                                    <td>: {{ $get_complete_status->country_of_origin }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(v)</td>
                                    <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                                    <td>: {{ $get_complete_status->address_of_head_office }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(vi)</td>
                                    <td>{{ trans('fd_one_step_one.hh')}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.a')}}) {{ trans('fd_one_step_one.name')}}</td>
                                    <td>: {{ $get_complete_status->name_of_head_in_bd }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.b')}}) {{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</td>
                                    <td>: {{ $get_complete_status->job_type }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.c')}}) {{ trans('fd_one_step_one.Address')}}, {{ trans('fd_one_step_one.Mobile_Number')}}, {{ trans('fd_one_step_one.Email')}}</td>
                                    <td>: {{ $get_complete_status->address }}, {{ $get_complete_status->phone }}, {{ $get_complete_status->email }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.d')}}) {{ trans('fd_one_step_one.Citizenship')}}</td>
                                    <td>: {{ $get_complete_status->citizenship }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.e')}}) {{ trans('fd_one_step_one.Profession')}}</td>
                                    <td>: {{ $get_complete_status->profession }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.two')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_two.Field_of_proposed_activities')}} ({{ trans('fd_one_step_two.des')}}):
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.a')}}</td>
                                    <td>(i) {{ trans('fd_one_step_two.Plan_of_Operation')}} </td>
                                    <td>: @if(empty($get_complete_status->plan_of_operation))

                                        @else


                                        @if(session()->get('locale') == 'en')

                                        সংযুক্ত
                                        @else
                                        attached

                                        @endif
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(ii) {{ trans('fd_one_step_two.pp')}}</td>
                                    <td>: {{ $get_complete_status->district }},{{ $get_complete_status->sub_district }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.b')}}</td>
                                    <td>{{ trans('fd_one_step_two.Source_of_Fund')}}</td>
                                    <td></td>
                                </tr>
                                @foreach($get_all_source_of_fund_data as $all_get_all_source_of_fund_data)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(i) {{ trans('fd_one_step_two.dd')}}</td>
                                    <td>: {{ $all_get_all_source_of_fund_data->name }},{{ $all_get_all_source_of_fund_data->address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(ii) {{ trans('fd_one_step_two.copy')}}</td>
                                    <td>: @if(empty($all_get_all_source_of_fund_data->letter_file))

                                        @else

                                        @if(session()->get('locale') == 'en')

                                        সংযুক্ত
                                        @else
                                        attached

                                        @endif
                                        @endif</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>{{ trans('fd_one_step_one.three')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_two.money')}}</td>
                                    <td>: {{ $get_complete_status->annual_budget }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.four')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_three.staff_position')}}
                                    </td>
                                </tr>
                                @foreach($all_partiw as $key=>$all_all_parti)
                                <tr>

                                    @if(session()->get('locale') == 'en')
                                    <td></td>
                                    <td>{{ str_replace($engDATE, $bangDATE, $key+1 )}}.</td>
                                    <td>কর্মকর্তা {{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>
                                    <td></td>
                                    @else
                                    <td></td>
                                    <td>{{ $key+1}}.</td>
                                    <td>Staff {{$key+1 }}</td>
                                    <td></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_three.name')}}</td>
                                    <td>: {{ $all_all_parti->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_three.desi')}}</td>
                                    <td>: {{ $all_all_parti->position }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('fd_one_step_three.address')}}</td>
                                    <td>: {{ $all_all_parti->address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('fd_one_step_three.citizenship')}}</td>
                                    <td>: {{ $all_all_parti->citizenship }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('fd_one_step_three.date_of_joining')}}</td>
                                    <td>: {{ $all_all_parti->date_of_join }}</td>
                                </tr>

                                
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.f')}})</td>
                                    <td>{{ trans('fd_one_step_three.s_statement')}}</td>
                                    <td>: {{ $all_all_parti->salary_statement }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.g')}})</td>
                                    <td>{{ trans('fd_one_step_three.detail')}}</td>
                                    <td>: {{ $all_all_parti->other_occupation }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td>{{ trans('fd_one_step_one.five')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_four.tt1')}}
                                    </td>
                                    <td>:
                                        @if(empty($get_complete_status->attach_the__supporting_papers))

                                        @else

                                        @if(session()->get('locale') == 'en')

                                        সংযুক্ত
                                        @else
                                        attached

                                        @endif
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.six')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_four.tt')}}
                                    </td>
                                </tr>
                                @foreach($get_all_data_adviser as $key=>$all_get_all_data_adviser)
                                <tr>
                                    @if(session()->get('locale') == 'en')
                                    <td></td>
                                    <td>{{ str_replace($engDATE, $bangDATE, $key+1 )}}.</td>
                                    <td>পরামর্শক {{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>
                                    <td></td>
                                    @else
                                    <td></td>
                                    <td>{{ $key+1 }}.</td>
                                    <td>Adviser {{ $key+1 }}</td>
                                    <td></td>

                                    @endif
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_four.advisor_name')}}</td>
                                    <td>:{{ $all_get_all_data_adviser->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_four.tt2')}}</td>
                                    <td>: {{ $all_get_all_data_adviser->information	 }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>{{ trans('fd_one_step_one.seven')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_four.main_account_details')}}({{ trans('fd_one_step_four.tt3')}})
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_four.account_number')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->account_number }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_four.account_type')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->account_type }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('fd_one_step_four.name_of_bank')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->name_of_bank }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
                                    <td>: {{ $get_all_data_adviser_bank->bank_address }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.eight')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_four.tt4')}}
                                    </td>
                                    <td>:
@foreach($get_all_data_other as $all_get_all_data_other)

@if(empty($all_get_all_data_other->information_type))

@else

@if(session()->get('locale') == 'en')

সংযুক্ত,
@else
attached,

@endif
@endif

                                        @endforeach


                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection
