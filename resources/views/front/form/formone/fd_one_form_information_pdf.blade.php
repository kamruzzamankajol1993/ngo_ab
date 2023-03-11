<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('fd_one_step_one.f_form')}}</title>

    <style>




        body {
            font-family: 'bangla', sans-serif;
            font-size: 14px;
            height: 11in;
            width: 8.5in;
        }
        table
        {
            width: 100%;
        }

      table td
      {
        vertical-align: top;
      }
        .first_table
        {
            text-align: center;
            margin-bottom: 30px;
        }
        .bt
      	{
			font-family: 'banglabold', sans-serif;
		}

        .number_section
        {
            width: 15px !important;
        }

      .padding-left
      {
        padding-left: 18px;
      }
    </style>
</head>
<body>
<table class="first_table">
    <tr>
        <td style="font-size:26px; font-weight: bold;">{{ trans('fd_one_step_one.f_form')}}</td>
    </tr>
  <!-- bangla dekhabe na and English dekhabe -->
  <tr>
    <td>[Under act 4(1) of the Foreign Donations (Voluntary Activities) Regulation Act, 2016]</td>
  </tr>
    <tr>
        <td>{{ trans('fd_one_step_one.n_r')}}</td>
    </tr>
</table>
<table>
    <tbody>
        <tr>
            <td>{{ trans('fd_one_step_one.one')}}.</td>
            <td colspan="4">{{ trans('fd_one_step_one.Particulars_of_Organisation')}} :</td>
        </tr>

        <tr>
            <td></td>
            <td class="number_section">(i)</td>
            <td>{{ trans('fd_one_step_one.Organization_Name_Organization_address')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->organization_name }} <br> {{ trans('fd_one_step_one.Organization_address')}}: {{ $get_complete_status->organization_address }}</td>
        </tr>
        <!-- <tr>
            <td></td>
            <td class="number_section">(ii)</td>
            <td>{{ trans('fd_one_step_one.Organization_address')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->organization_address }}</td>
        </tr>-->
        <tr>
            <td></td>
            <td class="number_section">(iii)</td>
            <td>{{ trans('fd_one_step_one.reg_num')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->registration_number }}</td>
        </tr>
        <tr>
            <td></td>
            <td class="number_section">(iv)</td>
            <td>{{ trans('fd_one_step_one.Country_of_Origin')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->country_of_origin }}</td>
        </tr>
        <tr>
            <td></td>
            <td class="number_section">(v)</td>
            <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->address_of_head_office }}</td>
        </tr>
        <tr>
            <td></td>
            <td >(vi)</td>
            <td>{{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{{ trans('form 8_bn.a')}}) {{ trans('fd_one_step_one.name')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->name_of_head_in_bd }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{{ trans('form 8_bn.b')}}) {{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->job_type }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{{ trans('form 8_bn.c')}}) {{ trans('fd_one_step_one.Address_Mobile_Number_Email')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->address }}, {{ $get_complete_status->phone }}, {{ $get_complete_status->email }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{{ trans('form 8_bn.d')}}) {{ trans('fd_one_step_one.Citizenship')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->citizenship }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{{ trans('form 8_bn.e')}}) {{ trans('fd_one_step_one.Profession')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->profession }}</td>
        </tr>
        <tr>
            <td>{{ trans('fd_one_step_one.two')}}.</td>
            <td colspan="4">{{ trans('fd_one_step_two.Field_of_proposed_activities')}} ({{ trans('fd_one_step_two.des')}})
            </td>
        </tr>
        <tr>
            <td></td>
            <td>{{ trans('form 8_bn.a')}}</td>
            <td>(i) {{ trans('fd_one_step_two.Plan_of_Operation')}} </td>
            <td style="width:4px">:</td>
            <td>@if(empty($get_complete_status->plan_of_operation))

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
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->district }},{{ $get_complete_status->sub_district }}</td>
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
            <td style="width:4px">:</td>
            <td>{{ $all_get_all_source_of_fund_data->name }},{{ $all_get_all_source_of_fund_data->address }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>(ii) {{ trans('fd_one_step_two.copy')}}</td>
            <td style="width:4px">:</td>
            <td> @if(empty($all_get_all_source_of_fund_data->letter_file))

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
            <td style="width:4px">:</td>
            <td>{{ $get_complete_status->annual_budget }}</td>
        </tr>
        <tr>
            <td>{{ trans('fd_one_step_one.four')}}.</td>
            <td colspan="4">{{ trans('fd_one_step_three.staff_position')}}
            </td>
        </tr>
        @foreach($all_partiw as $key=>$all_all_parti)
        <tr>

            @if(session()->get('locale') == 'en')
            <td></td>

            <td colspan="4">{{ str_replace($engDATE, $bangDATE, $key+1 )}}. কর্মকর্তা {{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>

            @else
            <td></td>

            <td colspan="4">{{ $key+1}}. Staff {{$key+1 }}</td>

            @endif
        </tr>
        <tr>
            <td></td>
            <td colspan="2" class="padding-left">({{ trans('form 8_bn.a')}}) {{ trans('fd_one_step_three.name')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $all_all_parti->name }}</td>
        </tr>
        <tr>
            <td></td>

            <td colspan="2" class="padding-left">({{ trans('form 8_bn.b')}}) {{ trans('fd_one_step_three.desi')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $all_all_parti->position }}</td>
        </tr>
        <tr>
            <td></td>

            <td colspan="2" class="padding-left">({{ trans('form 8_bn.c')}}) {{ trans('fd_one_step_three.address')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $all_all_parti->address }}</td>
        </tr>
        <tr>
            <td></td>

            <td colspan="2" class="padding-left">({{ trans('form 8_bn.d')}}) {{ trans('fd_one_step_three.citizenship')}}</td>
            <td style="width:4px">:</td>
            <td> {{ $all_all_parti->citizenship }}</td>
        </tr>
        <tr>
            <td></td>

            <td colspan="2" class="padding-left">({{ trans('form 8_bn.e')}}) {{ trans('fd_one_step_three.date_of_joining')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $all_all_parti->date_of_join }}</td>
        </tr>
        <tr>
            <td></td>

            <td colspan="2" class="padding-left">({{ trans('form 8_bn.f')}}) {{ trans('fd_one_step_three.s_statement')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $all_all_parti->salary_statement }}</td>
        </tr>
        <tr>
            <td></td>

            <td colspan="2" class="padding-left">({{ trans('form 8_bn.g')}}) {{ trans('fd_one_step_three.detail')}}</td>
            <td style="width:4px">:</td>
            <td> {{ $all_all_parti->other_occupation }}</td>
        </tr>
        @endforeach

        <tr>
            <td>{{ trans('fd_one_step_one.five')}}.</td>
            <td colspan="2">{{ trans('fd_one_step_four.tt1')}}
            </td>
            <td style="width:4px">:</td>
            <td>
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
            <td colspan="4">{{ trans('fd_one_step_four.tt')}}
            </td>
        </tr>
        @foreach($get_all_data_adviser as $key=>$all_get_all_data_adviser)
        <tr>
            @if(session()->get('locale') == 'en')
            <td></td>

            <td colspan="3">{{ str_replace($engDATE, $bangDATE, $key+1 )}}. পরামর্শক {{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>
            <td></td>
            @else
            <td></td>

            <td colspan="3">{{ $key+1 }}. Adviser {{ $key+1 }}</td>
            <td></td>

            @endif
        </tr>
        <tr>
            <td></td>

            <td class="padding-left" colspan="2">({{ trans('form 8_bn.a')}}) {{ trans('fd_one_step_four.advisor_name')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $all_get_all_data_adviser->name }}</td>
        </tr>
        <tr>
            <td></td>

            <td class="padding-left" colspan="2">({{ trans('form 8_bn.b')}}) {{ trans('fd_one_step_four.tt2')}}</td>
            <td style="width:4px">:</td>
            <td> {{ $all_get_all_data_adviser->information	 }}</td>
        </tr>
        @endforeach
        <tr>
            <td>{{ trans('fd_one_step_one.seven')}}.</td>
            <td colspan="4">{{ trans('fd_one_step_four.main_account_details')}}({{ trans('fd_one_step_four.tt3')}})
            </td>
        </tr>
        <tr>
            <td></td>
            <td>({{ trans('form 8_bn.a')}})</td>
            <td>{{ trans('fd_one_step_four.account_number')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_all_data_adviser_bank->account_number }}</td>
        </tr>
        <tr>
            <td></td>
            <td>({{ trans('form 8_bn.b')}})</td>
            <td>{{ trans('fd_one_step_four.account_type')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_all_data_adviser_bank->account_type }}</td>
        </tr>
        <tr>
            <td></td>
            <td>({{ trans('form 8_bn.c')}})</td>
            <td>{{ trans('fd_one_step_four.name_of_bank')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_all_data_adviser_bank->name_of_bank }}</td>
        </tr>
        <tr>
            <td></td>
            <td>({{ trans('form 8_bn.d')}})</td>
            <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
        </tr>
        <tr>
            <td></td>
            <td>({{ trans('form 8_bn.e')}})</td>
            <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
            <td style="width:4px">:</td>
            <td>{{ $get_all_data_adviser_bank->bank_address }}</td>
        </tr>
        <tr>
            <td>{{ trans('fd_one_step_one.eight')}}.</td>
            <td colspan="2">{{ trans('fd_one_step_four.tt4')}}
            </td>
            <td style="width:4px">:</td>
            <td>
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
<h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
<p>{{ trans('fd_one_step_one.tt_2')}},{{ trans('fd_one_step_one.tt_3')}}</p>
<table style="text-align: right; margin-top: 100px">
    <tr>
        <td colspan="2">{{ trans('fd_one_step_one.tt_4')}}</td>
    </tr>
    <tr>
        <td>{{ trans('fd_one_step_one.tt_5')}}</td>
        <td style="width:35%">: ...................................................</td>
    </tr>
    <tr>
        <td>{{ trans('fd_one_step_one.tt_6')}}</td>
        <td>: ...................................................</td>
    </tr>
    @if(session()->get('locale') == 'en')

    @else

    <tr>
        <td>Place</td>
        <td>: ...................................................</td>
    </tr>
    @endif
    <tr>
        <td>{{ trans('fd_one_step_one.tt_7')}}</td>
        <td>: ...................................................</td>
    </tr>
</table>

<ul style="margin-top:25px">
    <li>{{ trans('fd_one_step_one.tt_8')}}, {{ trans('fd_one_step_one.tt_9')}}, {{ trans('fd_one_step_one.tt_10')}} </li>
    <li>{{ trans('fd_one_step_one.tt_11')}}</li>
    <li>{{ trans('fd_one_step_one.tt_12')}}</li>
</ul>
</body>
</html>
