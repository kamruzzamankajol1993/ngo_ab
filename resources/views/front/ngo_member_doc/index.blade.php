
@extends('front.master.master')

@section('title')
{{ trans('ngo_member_doc.nid_and_images')}} | {{ trans('header.ngo_ab')}}
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
                    <div class="d-flex justify-content-between mb-4">
                        <div class="p-2">
                            <h5>{{ trans('ngo_member_doc.nid_and_images')}}</h5>
                        </div>
                        <div class="p-2">
                            <button class="btn btn-primary btn-custom" type="button"
                                    onclick="location.href = '{{ route('ngo_member_document_create') }}';">
                                    {{ trans('ngo_member_doc.add_new_nid')}}
                            </button>
                        </div>
                    </div>
                    <div class="file-content">

                        <div class="card">
                            <div class="card-body file-manager">
                                <div class="files">
@foreach($all_ngo_member_doc as $all_all_ngo_member_doc)


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
                                                    <form method="post" action="{{ route('ngo_member_document_update') }}" enctype="multipart/form-data">

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
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

@section('script')

@endsection
