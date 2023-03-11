@extends('front.master.master')

@section('title')
{{ trans('main.info_one')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<section>
    <div class="container">
        <div class="form-card">
            <form method="post" action="{{ route('ngo_registration_first_info_post') }}">
                @csrf
            <div class="dashboard_box">
                <div class="dashboard_left">


                            <ul>
                                @include('front.include.sidebar_dash')
                            </ul>


                </div>
                <div class="dashboard_right">

                    <div class="tofsil2_box mt-3">
                        <h1>{{ trans('first_info.title_one')}}</h1>
                        <div class="tofsil2_list">
                            <h3>{{ trans('first_info.title_two')}}</h3>
                            <ul class="rectangle-list">

                                @if(session()->get('locale') == 'en')

                                <li>পূরণকৃত এফডি-১ ফরম গত</li>
                                <li>ফরম-৮ অনুযায়ী সংস্থার কার্যনির্বাহী কমিটির সদস্যদের তালিকা</li>
                                <li>নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবি ও জাতীয় পরিচয়পত্রের সত্যায়িত অনুলিপি</li>
                                <li>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</li>
                                <li>গঠনতন্ত্রের (প্রাথমিক নিবন্ধন কর্তৃপক্ষ কর্তৃক অনুমোদিত) সত্যায়িত অনুলিপি</li>
                                <li>সংস্থার কার্যক্রম প্রতিবেদন</li>
                                <li>প্ল্যান অব অপারেশন (কর্ম পদ্ধতি, অর্গানোগ্রাম, সভাপতি কর্তৃক স্বাক্ষরিত)</li>
                                <li>দাতা সংস্হার প্রতিশুতিপত্র (সংস্থা প্রধান কর্তৃক সত্যায়িত)</li>
                                <li>কোড নং- ১-০৩২৩-০০০০-১৮৩৬-এ তফসিল-১ এ নির্ধারিত ফি জমা প্রদান করে ট্রেজারি চালানের মূল কপিসহ</li>
                                <li>প্রদেয় ফি এর উপর জাতীয় রাজস্ব বোর্ডের নির্ধারিত কোড নং- ১-১১৩৩-০০৩৫-০৩১১ এ ১৫% ভ্যাট বাবদ অর্থ জমা প্রদান করে ট্রেজারি চালানের মূলকপিসহ</li>
                                <li>সংস্থার নির্বাহী কমিটি গঠন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি (উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ)</li>
                                <li>সংস্থার সাধারণ সদস্যদের নামের তালিকা প্রত্যেক সদস্যের স্বাক্ষরসহ নাম, পিতা/মাতা, স্বামী/স্ত্রী'র নাম ও ঠিকানা, জাতীয় পরিচয়পত্র নম্বর</li>
                                @else
                                <li>FD-1 Form (Signed by Chief Executive in Bangladesh)</li>
                                <li>Certificate of Incorporation in the Country of Origin</li>
                                <li>Constitution</li>
                                <li>Activities Report</li>
                                <li>Plan of Operation (Work/Organogram)</li>
                                <li>Decision of the Committee/ Board to open office in Bangladesh</li>
                                <li>Letter of Appointment of the Country Representative</li>
                                <li>Copy of Treasury Chalan in support of depositing US$ 9,000 or Equivalent TK amount
                                    in the Code 1-0323-0000- 1836 and 15% Vat Code No (1-1133-0035-0311)
                                </li>
                                <li>Deed of agreement Stamp of TK.300/-with the landlord in Support of opening the
                                    office in Bangladesh
                                </li>
                                <li>List of Executive Committee (foreign)</li>
                                <li>Letter of Intent</li>
                                @endif
                            </ul>
                            <p>{{ trans('first_info.title_three')}}</p>
                            <div class="tacbox">
                                <input id="f_agree" name="f_agree" type="checkbox" value="1" />
                                <label for="f_agree">{{ trans('first_info.check_button')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                        <button id="final_button" type="submit" class="btn btn-registration" disabled>{{ trans('first_info.next_button')}}
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')

<script>

$("#f_agree").click(function() {
   // alert(33);
  $("#final_button").attr("disabled", !this.checked);
});

</script>

@endsection
