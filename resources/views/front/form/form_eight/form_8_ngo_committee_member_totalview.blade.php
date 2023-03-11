@extends('front.master.master')

@section('title')
{{ trans('form 8_bn.list')}} | {{ trans('header.ngo_ab')}}
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
                        <h4>{{ trans('first_info.form_eight')}} </h4>
                    </div>

                    <div class="card-body mt-3 mb-3">
                        <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('form_8_ngo_committee_member_view_from_edit') }}';">
                            {{ trans('form 8_bn.update_eight')}}
                        </button>

                        <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('form_8_ngo_committee_member_pdf') }}">
                            {{ trans('form 8_bn.download_pdf')}}
                        </a>

                        @if($complete_status_fd_eight == 'complete')

                        @if($complete_status_fd_eight_pdf == 0)
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            {{ trans('form 8_bn.upload_pdf')}}
                        </button>
                        @else

                        <?php

                        $file_path = url($complete_status_fd_eight_pdf);
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
            <form method="post" action="{{ route('upload_from_eight_pdf') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                @csrf

                <div class=" mb-3">
                    <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
                    <input type="file" data-parsley-required accept=".pdf" name="s_pdf"  class="form-control" id="">
                    <input type="hidden" data-parsley-required  name="id"  value="{{ $complete_status_fd_eight_id }}" class="form-control" id="">
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

                    $data = DB::table('ngo_committee_members')->where('user_id',Auth::user()->id)
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

                                @foreach($all_partiw as $key=>$all_all_parti)
                                <tr>
                                    <td></td>
                                    @if(session()->get('locale') == 'en')
                                    <td>{{ str_replace($engDATE, $bangDATE, $key+1 )}}.</td>
                                    <td>{{ trans('form 8_bn.member')}} {{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>
                                    @else
                                    <td>{{ $key+1}}.</td>
                                    <td>{{ trans('form 8_bn.member')}}  {{$key+1}}</td>
                                    @endif
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}} )</td>
                                    <td>{{ trans('form 8_bn.name')}}</td>
                                    <td>: {{ $all_all_parti->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('form 8_bn.designation')}}</td>
                                    <td>: {{ $all_all_parti->desi }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('form 8_bn.date_of_birth')}}</td>
                                    <td>:

                                        @if(session()->get('locale') == 'en')

                                        <?php

                                        $newDate12 = date("d-m-Y", strtotime($all_all_parti->dob));

                                                                                        ?>


                                                                                    {{ str_replace($engDATE, $bangDATE, $newDate12)}}

@else

<?php

                                        $newDate12 = date("d-m-Y", strtotime($all_all_parti->dob));

                                                                                        ?>
{{ $newDate12 }}

@endif

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('form 8_bn.present_address')}}</td>
                                    <td>: {{ $all_all_parti->present_address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('form 8_bn.permanent_address')}}</td>
                                    <td>: {{ $all_all_parti->permanent_address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.f')}})</td>
                                    <td>{{ trans('form 8_bn.nid_no')}}</td>
                                    <td>:
                                        @if(session()->get('locale') == 'en')
                                        {{ str_replace($engDATE, $bangDATE,$all_all_parti->nid_no) }}
                                        @else
                                        {{ $all_all_parti->nid_no }}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.g')}})</td>
                                    <td>{{ trans('form 8_bn.mobile_no')}}</td>
                                    <td>: {{ $all_all_parti->phone }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.h')}})</td>
                                    <td>{{ trans('form 8_bn.fathers_name')}}</td>
                                    <td>: {{ $all_all_parti->father_name }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.i')}})</td>
                                    <td>{{ trans('form 8_bn.name_of_spouse')}} </td>
                                    <td>: {{ $all_all_parti->name_supouse }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.j')}})</td>
                                    <td>{{ trans('form 8_bn.Educational_Qualification')}}</td>
                                    <td>: {{ $all_all_parti->edu_quali }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.k')}})</td>
                                    <td>{{ trans('form 8_bn.profession')}} </td>
                                    <td>: {{ $all_all_parti->profession }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.l')}})</td>
                                    <td>{{ trans('form 8_bn.description_of_job')}}</td>
                                    <td>: {{ $all_all_parti->job_des }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.m')}})</td>
                                    <td>{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}}</td>
                                    <td>: {{ $all_all_parti->service_status }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.n')}})</td>
                                    <td>{{ trans('form 8_bn.remarks')}}</td>
                                    <td>: {{ $all_all_parti->remarks }}</td>
                                </tr>

                                {{-- <tr>
                                    <td></td>
                                    <td>(ণ)</td>
                                    <td>স্বাক্ষর</td>
                                    <td>:  <img src="{{ asset('/') }}{{ $all_all_parti->image  }}" style="height:50px;" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>(ত)</td>
                                    <td>তারিখ</td>
                                    <td>: {{ $all_all_parti->main_date }}</td>
                                </tr> --}}
                                @endforeach



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
