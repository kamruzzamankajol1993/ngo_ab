@extends('front.master.master')

@section('title')
{{ trans('reg_sub.reg_sub')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<?php
 $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

?>
<?php

$get_reg_id = DB::table('ngostatuses')->where('user_id',Auth::user()->id)->value('status');


?>

@if(empty($get_reg_id))


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
                    <div class="user_dashboard_right">
                        <h4>{{ trans('reg_sub.ff')}}</h4>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>{{ trans('reg_sub.ll')}}</th>
                                            <th>{{ trans('reg_sub.fe')}}</th>
                                            <th>{{ trans('reg_sub.status')}}</th>

                                        </tr>
                                        <tr>
                                            <td>

                                                @if(empty($get_date_lan_one))

                                                @else

                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_lan_one->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_lan_one->format('d-m-Y') }}

                                                @endif
                                                @endif


                                                </td>
                                            <td>{{ trans('reg_sub.e_check')}}</td>
                                            <td style="position:relative">

                                                @if($get_value_fd_one_one == 1)
                                                <input id="chk" type="checkbox" onclick="return false;" checked class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;"  class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                @if(empty($get_date_lan_one))

                                                @else

                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_lan_one->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_lan_one->format('d-m-Y') }}

                                                @endif
@endif

                                            </td>
                                            <td>{{ trans('reg_sub.t_check')}}</td>
                                            <td style="position:relative">
                                                @if($get_value_fd_one_one == 1)
                                                <input id="chk" type="checkbox" onclick="return false;" checked class="custom_checkbox" />
                                               @else

                                               <input id="chk" type="checkbox" onclick="return false;"  class="custom_checkbox" />
                                               @endif

                                                <label for="chk" readonly></label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                @if(empty($get_date_fd_one))

                                                @else
                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_fd_one->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_one->format('d-m-Y') }}

                                                @endif
@endif
                                            </td>
                                            <td>{{ trans('reg_sub.f_fd')}}</td>
                                            <td style="position:relative">

                                                @if($complete_status_fd_one == 'all_complete')

                                                <input id="chk" type="checkbox" onclick="return false;" checked  class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;"   class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>

                                                @if(empty($get_date_fd_one))


                                                @else

                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_fd_one->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_one->format('d-m-Y') }}

                                                @endif
                                                @endif

                                            </td>
                                            <td>{{ trans('reg_sub.f_fd_s')}}</td>
                                            <td style="position:relative">

                                                @if($complete_status_fd_one_pdf == 0)
                                                <input id="chk" type="checkbox" onclick="return false;"   class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;" checked class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>

                                                @if(empty($get_date_fd_eight))


                                                @else

                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_fd_eight->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_eight->format('d-m-Y') }}

                                                @endif

                                                @endif

                                            </td>
                                            <td>{{ trans('reg_sub.fd_eight')}}</td>
                                            <td style="position:relative">
                                                @if($complete_status_fd_eight == 'complete' && $complete_status_fd_eight_pdf != 0 )
                                                <input id="chk" type="checkbox" onclick="return false;" checked  class="custom_checkbox" />

                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;"  class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>


                                                @if(empty($get_date_fd_ngomember))


                                                @else

                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_fd_ngomember->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_ngomember->format('d-m-Y') }}

                                                @endif
@endif

                                            </td>
                                            <td>{{ trans('reg_sub.member_info')}}</td>
                                            <td style="position:relative">

@if(empty($get_date_fd_ngomember))
<input id="chk" type="checkbox" onclick="return false;"  class="custom_checkbox" />
@else
                                                <input id="chk" type="checkbox" onclick="return false;" checked class="custom_checkbox" />
                                                @endif


                                                <label for="chk"></label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>


                                                @if(empty($get_date_fd_ngodoc))






                                                @else


                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_fd_ngodoc->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_ngodoc->format('d-m-Y') }}

                                                @endif
@endif

                                            </td>
                                            <td>{{ trans('reg_sub.doc')}}</td>
                                            <td style="position:relative">
                                                @if(empty($get_date_fd_ngodoc))
                                                <input id="chk" type="checkbox" onclick="return false;"   class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;" checked  class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>

                                                @if(empty($get_date_fd_ngodoc_mem))

@else
                                                @if(session()->get('locale') == 'en')
                                                {{ str_replace($engDATE, $bangDATE,$get_date_fd_ngodoc_mem->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_ngodoc_mem->format('d-m-Y') }}

                                                @endif
                                                @endif


                                            </td>
                                            <td>{{ trans('reg_sub.nid_image')}}</td>
                                            <td style="position:relative">
                                                @if(empty($get_date_fd_ngodoc_mem))
                                                <input id="chk" type="checkbox" onclick="return false;"  class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;" checked  class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>
                                    </table>
                                    <p class="fst-italic text-danger">
                                        {{ trans('reg_sub.last')}}
                                    </p>
                                    <form action="{{ route('final_submit_reg_form') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="NGO Registration" name="reg_type" />
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit"  id="bb3" class="btn btn-registration" disabled>{{ trans('reg_sub.submit')}}</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@else
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
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-center">
                                <i class="fa fa-check-circle confirmation_icon"></i>
                            </div>
                            <div class="text-center">
                                <h1>Application Submitted!</h1>
                                <p>Your NGO Application Has Been Submitted Into NGOAB</p>
                                <p>When your application will be accepted you will get confirmation message </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

@endsection

@section('script')

<script>


$(document).ready(function(){

    var all = $('input[type="checkbox"]:checked').length;

    if(all < 8){
        $('#bb3').attr('disabled',true);

    }else{
        $('#bb3').attr('disabled',false);

    }


});

</script>

@endsection
