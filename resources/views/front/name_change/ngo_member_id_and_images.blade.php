@extends('front.master.master')

@section('title')
Name Change | {{ trans('header.ngo_ab')}}
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


<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if(empty(Auth::user()->image))
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @else
                                     <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @endif
                                <div class="mt-3">
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>User Profile</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('name_change_page') }}">
                                <p class="{{ Route::is('ngo_member_id_and_images') || Route::is('committee_ngo_member') || Route::is('view_form_8_for_change') || Route::is('name_change_page') || Route::is('send_name_change_page')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>NGO Name Change</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew_page') }}">
                                <p class="{{ Route::is('renew_page')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>Renew Application</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>Logout</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-9 col-md-6 col-sm-12">
                @include('flash_message')
                <div class="card">
                    <div class="card-body">
                        <div class="step_box">
                            <ul class="process-model more-icon-preocess">
                                <li class="active visited">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <p>New Name</p>

                                </li>
                                <li class="active visited">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    <p>Form-08</p>

                                </li>
                                <li class="active visited">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    <p>Committee Member</p>

                                </li>
                                <li class="active visited">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <p>ID Card & Images</p>

                                </li>
                                <li>
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>Documents</p>

                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="d-flex justify-content-between mb-4">
                                <div class="p-2">
                                    <h5>NID & Images</h5>
                                </div>
                                <div class="p-2">
                                    <button class="btn btn-primary btn-custom" type="button" onclick="location.href = '{{ route('ngo_member_id_and_images_add') }}';">
                                        Add Document
                                    </button>
                                </div>
                            </div>
                            <div class="file-content">
                                <div class="card">
                                    <div class="card-body file-manager">
                                        <div class="files">
                                            @foreach($form_eight_list as $all_all_ngo_member_doc)


<?php

                                $file_path = url($all_all_ngo_member_doc->person_nid_copy);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);






                                ?>

                                    <div class="file-box-image">
                                        <div class="file-top">
                                            <img class="file-top-img" src="{{ asset('/') }}{{ $all_all_ngo_member_doc->person_image }}"
                                                 alt="Card image cap">
                                        </div>
                                        <div class="mt-2">
                                            <h6>{{ $all_all_ngo_member_doc->person_name  }}</h6>
                                            <p class="mb-1">{{ $filename }}</p>
                                            <p>{{ $all_all_ngo_member_doc->person_nid_copy_size }} {{ trans('other_doc.m_b')}}</p>


                                            <a class="btn btn-sm btn-registration" target="_blank" href = '{{ route('ngo_member_document_download',$all_all_ngo_member_doc->id) }}'><i class="fa fa-download"></i>
                                            </a>

                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $all_all_ngo_member_doc->id  }}"><i class="fa fa-pencil"></i></button>

                                            <button class="btn btn-sm btn-danger" onclick="deleteTag({{ $all_all_ngo_member_doc->id}})"><i class="fa fa-trash"></i></button>

                                            <form id="delete-form-{{ $all_all_ngo_member_doc->id }}" action="{{ route('ngo_member_document_delete',$all_all_ngo_member_doc->id) }}" method="POST" style="display: none;">

                                                @csrf

                                            </form>


                                </div>
                            </div>

                            <!--ddd-->
                            <div class="modal fade" id="exampleModal{{ $all_all_ngo_member_doc->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('form 8_bn.personal_info')}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('ngo_member_id_and_images_update') }}" enctype="multipart/form-data">

                                                @csrf
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('ngo_member_doc.person_name')}}</label>
                                                    <input type="text" name="person_name" value="{{ $all_all_ngo_member_doc->person_name  }}" class="form-control" id="">

                                                    <input type="hidden" name="id" value="{{ $all_all_ngo_member_doc->id  }}" class="form-control" id="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('ngo_member_doc.image')}}</label>
                                                    <input type="file" name="person_image" class="form-control" id="">

                                                    <img src="{{ asset('/') }}{{ $all_all_ngo_member_doc->person_image  }}" height="30" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('ngo_member_doc.nid_copy')}}</label>
                                                    <input type="file" name="person_nid_copy" class="form-control" id="">

                                                    <iframe src="{{ asset('/') }}{{'public/'. $all_all_ngo_member_doc->person_nid_copy  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">{{ trans('form 8_bn.update')}}</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>







                                    @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end mt-2">
                                <button type="button" class="btn btn-danger me-3"
                                        onclick="location.href = '{{ route('committee_ngo_member') }}';">Previous
                                </button>
                                <button type="button" class="btn btn-registration"
                                        onclick="location.href = '{{ route('all_ngo_related_document') }}';">next
                                </button>
                            </div>
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
