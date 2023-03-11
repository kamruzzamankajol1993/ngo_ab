<!-- =======================================================
* Template Name: Plato - NGO Digital Management
* Author: MusaTechnology limited
* License: v1.1
======================================================== -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ResNova App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}public/front/assets/img/logo/logo.png">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('/') }}public/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/assets/vendor/slick-slider/slick.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/assets/vendor/select2/css/select2.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('/') }}public/front/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}public/front/assets/vendor/fontawesome4.7.0/css/font-awesome.min.css">


    <style>

.swal2-confirm{

    margin-left: 20px;
}

        </style>
<script src="{{ asset('/') }}public/front/assets/js/jquery_3.2.1.js"></script>
@yield('css')

<link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
@if(session()->get('locale') == 'en')
<script src="{{ asset('/')}}public/front/assets/parsely.js"></script>
@else
<script src="{{ asset('/')}}public/front/assets/parsely1.js"></script>
@endif
<style>

    .parsley-required{

        margin-top:10px;
    }

    .box

    {

     width:100%;

     max-width:600px;

     background-color:#f9f9f9;

     border:1px solid #ccc;

     border-radius:5px;

     padding:16px;

     margin:0 auto;

    }

    input.parsley-success,

    select.parsley-success,

    textarea.parsley-success {

      color: #468847;

      background-color: #DFF0D8;

      border: 1px solid #D6E9C6;

    }

    input.parsley-error,

    select.parsley-error,

    textarea.parsley-error {

      color: #B94A48;

      background-color: #F2DEDE;

      border: 1px solid #EED3D7;

    }


    .parsley-errors-list {

      margin: 2px 0 3px;

      padding: 0;

      list-style-type: none;

      font-size: 0.9em;

      line-height: 0.9em;

      opacity: 0;


      transition: all .3s ease-in;

      -o-transition: all .3s ease-in;

      -moz-transition: all .3s ease-in;

      -webkit-transition: all .3s ease-in;

    }


    .parsley-errors-list.filled {

      opacity: 1;

    }



    .error,.parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{

     color:#ff0000;

    }



    </style>
</head>

<body>

<!-- ======= Hero Section ======= -->


@include('front.include.header')

<!-- ======= Slider Section ======= -->

@if(Route::is('login') || Route::is('email_verify_page')  || Route::is('email_verified_page')  || Route::is('check_status_reg_from')  || Route::is('status_page') || Route::is('register') || Route::is('ngo_instruction_page') || Route::is('ngo_registration_fee_list'))

@if(Route::is('login'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			এনজিও লগ ইন
		@else
        	NGO Log In 
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>
@elseif(Route::is('register'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			এনজিও রেজিস্ট্রেশান
		@else
        	NGO Log Registration 
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>

@elseif(Route::is('email_verify_page'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			ইমেল যাচাইকরণ
		@else
        	Email Verification Page
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>
  
@elseif(Route::is('email_verified_page'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			ইমেল যাচাই সম্পন্ন
		@else
        	Email Verified
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>
  
@elseif(Route::is('check_status_reg_from'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			আবেদনের অবস্থান পর্যবেক্ষণ
		@else
        	Application Status Check
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>
  
@elseif(Route::is('status_page'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			আবেদনের অবস্থান ফলাফল
		@else
        	Application Status Result
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>
  
@elseif(Route::is('ngo_instruction_page'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			এনজিওর সকল কার্যাবলীর নির্দেশনা
		@else
        	NGO Instruction
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>
  
@elseif(Route::is('ngo_registration_fee_list'))
<div class="faq_header_box">
	<div class="container">
      <h1>
		@if(session()->get('locale') == 'en')
			এনজিওর নিবন্ধন ফি তালিকা
		@else
        	NGO Registration Fee List
		@endif
	  </h1>
      <h4>
        @if(session()->get('locale') == 'en')
			এনজিও বিষয়ক ব্যুরো ডিজিটাল প্ল্যাটফর্ম
		@else
        	NGO Affairs Bureau Digital Platform
		@endif
      </h4>
	</div>
</div>
  
@endif
  
@elseif(Route::is('index'))
@include('front.include.banner')
@elseif(Route::is('frequently_ask_question'))

<div class="faq_header_box">
    <div class="container">
        <h1>Help Center</h1>
        <h4>Everything you need to know about the NGO Registration or others information</h4>
    </div>
</div>
@else

<div class="faq_header_box">
    <div class="container">
        <h1>{{ trans('first_info.user_dash')}}</h1>
        {{-- <h4>User History</h4> --}}
    </div>
</div>

@endif

<!-- End Slider -->

<!-- ======= Header Section ======= -->


@include('front.include.header_desk')

<!-- End Header -->

@yield('body')

<!-- Footer Section-->



@include('front.include.footer')


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->

<script src="{{ asset('/') }}public/front/assets/vendor/aos/aos.js"></script>
<script src="{{ asset('/') }}public/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}public/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('/') }}public/front/assets/vendor/slick-slider/slick.js"></script>
<script src="{{ asset('/') }}public/front/assets/vendor/select2/js/select2.min.js"></script>
<!-- Template Main JS File -->
<script src="{{ asset('/') }}public/front/assets/js/main.js"></script>
{{-- <script src="{{ asset('/') }}public/front/assets/js/custom_js.js"></script> --}}
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: '{{ trans('notification.success_one')}}',
            text: "{{ trans('notification.success_two')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ trans('notification.success_three')}}',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    '{{ trans('notification.success_six')}} :)',
                    'error'
                )
            }
        })
    }
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> --}}

@yield('script')

<script>

    $(".slideshow").slick({
        infinite: true,
        autoplay: true,
        dots: false,
        arrows: false,
        autoplaySpeed: 4000
    });

</script>
<script type="text/javascript">

    var url = "{{ route('changeLang') }}";

    $(".changeLang1").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

</script>
<script type="text/javascript">
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 3 secs

});
</script>
</body>

</html>
