<!DOCTYPE html>
<html>
<head>
    <title>কার্যনির্বাহী কমিটির সদস্যদের তালিকা</title>

    <style>
        body {
            font-family: 'bangla', sans-serif;
            font-size: 12px;
            width: 11in;
            height: 8.5in;
            text-align: center;
        }
        table
        {
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    <h2 style="color:green;font-weight:900;">ফরম নং - ৮</h2>
<h3>কার্যনির্বাহী কমিটির সদস্যদের তালিকা</h3>
<p>কার্যনির্বাহী কমিটির সদস্য/অফিস হোল্ডারদের বিবরণ</p>
   <p> নোট: 1) কলাম 10 এবং 11 এর জন্য অনুগ্রহ করে পেশার বিশদ বিবরণ যেমন: পদবী, অফিস/প্রতিষ্ঠানের নাম ইত্যাদি পূরণ করুন</p>
<h4>সময়কাল: {{str_replace($engDATE, $bangDATE, $all_partiw_form_date) }} হইতে {{ str_replace($engDATE, $bangDATE,$all_partiw_to_date) }} , {{ $all_partiw_total_year }} </h4>

<table>
    <tr>
        <th rowspan="2">ক্রঃ নং</th>
        <th rowspan="2">নাম ও পদবী</th>
        <th rowspan="2">জন্ম তারিখ</th>
        <th rowspan="2">এনএইডি এবং মোবাইল নং</th>
        <th rowspan="2">বাবার নাম</th>
        <th colspan="2">ঠিকানা</th>
        <th rowspan="2">স্বামী/স্ত্রীর নাম</th>
        <th rowspan="2">শিক্ষাগত যোগ্যতা</th>
        <th colspan="3">পেশা</th>
        <th rowspan="2">তিনি কি অন্য কোন এনজিওর সদস্য বা পরিষেবাধারী ছিলেন (যদি তা হয় তবে অনুগ্রহ করে চিহ্নিত করুন)</th>
        <th rowspan="2">মন্তব্য</th>
        <th rowspan="2">স্বাক্ষর এবং তারিখ</th>
    </tr>
    <tr>
        <th>বর্তমান ঠিকানা</th>
        <th>স্থায়ী ঠিকানা</th>
        <th>সরকারী/আধা সরকারী/সরকারি স্বায়ত্তশাসিত</th>
        <th>ব্যক্তিগত সেবা</th>
        <th>স্ব সেবা</th>
    </tr>
    @foreach($all_partiw as $key=>$all_all_parti)
    <tr>
        <td>{{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>
        <td>{{ $all_all_parti->name }} & {{ $all_all_parti->desi }}</td>
        <td>

         <?php   $start_date_one = date("d/m/Y", strtotime($all_all_parti->dob)); ?>


         {{ str_replace($engDATE, $bangDATE, $start_date_one )}}


        </td>
        <td>{{ str_replace($engDATE, $bangDATE,$all_all_parti->nid_no) }} & {{ $all_all_parti->phone }}</td>
        <td>{{ $all_all_parti->father_name }}</td>
        <td>{{ $all_all_parti->present_address }}</td>
        <td>{{ $all_all_parti->permanent_address }}</td>
        <td>{{ $all_all_parti->name_supouse }}</td>
        <td>{{ $all_all_parti->edu_quali }}</td>
        <td>

            @if($all_all_parti->profession  == 'Govt./Semi Govt./Govt Autonomous')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif


        </td>
        <td>@if($all_all_parti->profession  == 'Private Service')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>@if($all_all_parti->profession  == 'Self Service')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>{{ $all_all_parti->service_status }}</td>
        <td>{{ $all_all_parti->remarks }}</td>
        <td>


        </td>

    </tr>
    @endforeach
</table>
</body>
</html>
