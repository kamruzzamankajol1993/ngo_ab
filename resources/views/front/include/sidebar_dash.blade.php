
    <li class="{{ Route::is('dashboard')  ? 'active_link' : '' }}" > <a href="{{ route('dashboard') }}"> <i class="fa fa-home pe-1 dashboard_icon" aria-hidden="true"></i>{{ trans('first_info.dash')}}</a></li>

<?php


$ngo_type = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');



?>
    @if(empty($ngo_type))

    @if(Route::is('ngo_registration_first_info'))
    <li class="{{ Route::is('ngo_registration_first_info')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_registration_first_info') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>

    @elseif(Route::is('ngo_registration_second_info'))
    <li class="{{ Route::is('ngo_registration_second_info')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_registration_second_info') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>

    @elseif(Route::is('ngo_type_and_language'))
    <li class="{{ Route::is('ngo_type_and_language')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_type_and_language') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>

        @elseif(Route::is('dashboard'))


        <li class="{{ Route::is('ngo_type_and_language')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_type_and_language') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
        @elseif(Route::is('ngo_all_registration_form'))
        <li class="{{ Route::is('ngo_all_registration_form')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_all_registration_form') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>

    @elseif(Route::is('reg_submit_list'))


    <li class=""> <a href="{{ route('ngo_all_registration_form') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
    @endif


    @else

    @if(Route::is('ngo_registration_first_info'))
    <li class="{{ Route::is('ngo_registration_first_info')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_registration_first_info') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
    @elseif(Route::is('ngo_registration_second_info'))
    <li class="{{ Route::is('ngo_registration_second_info')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_registration_second_info') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
    @elseif(Route::is('ngo_all_registration_form'))
    <li class="{{ Route::is('ngo_all_registration_form')  ? 'active_link' : '' }}"> <a href="{{ route('ngo_all_registration_form') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
   @else

   @if(Route::is('dashboard'))
   <li class=""> <a href="{{ route('ngo_all_registration_form') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
   @elseif(Route::is('reg_submit_list'))

<li class=""> <a href="{{ route('ngo_all_registration_form') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
   @else

   <li class="active_link"> <a href="{{ route('ngo_all_registration_form') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.apply_for_dash')}}</a></li>
    @endif
    @endif



@endif

<?php

$get_reg_id = DB::table('ngostatuses')->where('user_id',Auth::user()->id)->value('status');


?>
@if(empty($get_reg_id))
<li class="{{ Route::is('reg_submit_list')  ? 'active_link' : '' }}"> <a href="{{ route('reg_submit_list') }}"> <i class="fa fa-file-excel-o pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('reg_sub.reg_sub')}}</a></li>
@else


@endif

    <li class="{{ Route::is('logout')  ? 'active_link' : '' }}"> <a href="{{ route('logout') }}"> <i class="fa fa-sign-out pe-1 dashboard_icon" aria-hidden="true"></i> {{ trans('first_info.logout')}}</a></li>

    {{-- <li class="{{ Route::is('reset_all_data')  ? 'active_link' : '' }}"> <a href="{{ route('reset_all_data') }}"> <i class="fa fa-trash pe-1 dashboard_icon" aria-hidden="true"></i>Reset</a></li> --}}

