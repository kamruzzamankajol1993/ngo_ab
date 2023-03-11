<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\Ngo_committee_member;
use App\Models\Fboneform;
use App\Models\Acounntotherinfo;
use App\Models\Bankaccount;
use App\Models\Fdoneformadviser;
use App\Models\Sourceoffund;
use App\Models\Fdoneform_staff;
use App\Models\Ngomember;
use App\Models\Ngodoc;
use App\Models\Ngo_member_doc;
use Auth;
use Session;
use DateTime;
use DateTimezone;
use App\Models\Namechange;
class NamechangeController extends Controller
{
    public function name_change_page(){
        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $name_change_list_all =  Namechange::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.name_change.name_change',compact('ngo_list_all','name_change_list_all'));
    }


    public function send_name_change_page(){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        return view('front.name_change.send_name_change_page',compact('ngo_list_all'));
    }


    public function view_form_8_for_change(Request $request){


        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();

             Session::put('previous_name',$request->previous_name);
             Session::put('previous_name_ban',$request->previous_name_ban);
             Session::put('new_name',$request->new_name);
             Session::put('new_name_ban',$request->new_name_ban);


        $form_eight_list = Ngo_committee_member::where('user_id',Auth::user()->id)->get();

        return view('front.name_change.view_form_8_for_change',compact('ngo_list_all','form_eight_list'));

    }


    public function view_form_8_for_change_add(Request $request){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $form_eight_list = Ngo_committee_member::where('user_id',Auth::user()->id)->get();
        return view('front.name_change.view_form_8_for_change_add',compact('ngo_list_all','form_eight_list'));


    }


    public function committee_ngo_member_add(Request $request){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $form_eight_list = Ngomember::where('user_id',Auth::user()->id)->get();
        return view('front.name_change.committee_ngo_member_add',compact('ngo_list_all','form_eight_list'));


    }


    public function committee_ngo_member_edit($id){
        $all_data_list = Ngomember::where('name_slug',$id)->first();
        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        return view('front.name_change.committee_ngo_member_edit',compact('all_data_list','ngo_list_all'));

    }


    public function committee_ngo_member_store(Request $request){

        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

        $category_list = new Ngomember();
        $category_list->name = $request->name;
        $category_list->name_slug = Str::slug($request->name,"_");
        $category_list->desi = $request->desi;
        $category_list->dob = $request->dob;
        $category_list->main_time = $main_time;
        $category_list->phone = $request->phone;
        $category_list->nid_no = $request->nid_no;
        $category_list->father_name = $request->father_name;
        $category_list->present_address = $request->present_address;
        $category_list->permanent_address = $request->permanent_address;
        $category_list->name_supouse = $request->name_supouse;
        // $category_list->edu_quali = $request->edu_quali;
        // $category_list->profession = $request->profession;
        // $category_list->job_des = $request->job_des;
        // $category_list->service_status = $request->service_status;
        $category_list->remarks = $request->remarks;
        $category_list->ngo_id = '';
        $category_list->user_id = Auth::user()->id;

        $category_list->main_date = $request->main_date;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        return redirect('/committee_ngo_member')->with('success','Created Successfully');
    }



    public function committee_ngo_member_update(Request $request){
        $time_dy = time().date("Ymd");

        $category_list = Ngomember::find($request->id);
        $category_list->name = $request->name;
        $category_list->name_slug = Str::slug($request->name,"_");
        $category_list->desi = $request->desi;
        $category_list->dob = $request->dob;
        $category_list->phone = $request->phone;
        $category_list->nid_no = $request->nid_no;
        $category_list->father_name = $request->father_name;
        $category_list->present_address = $request->present_address;
        $category_list->permanent_address = $request->permanent_address;
        $category_list->name_supouse = $request->name_supouse;
        // $category_list->edu_quali = $request->edu_quali;
        // $category_list->profession = $request->profession;
        // $category_list->job_des = $request->job_des;
        // $category_list->service_status = $request->service_status;
        $category_list->remarks = $request->remarks;
        $category_list->ngo_id = '';
        $category_list->user_id = Auth::user()->id;

        $category_list->main_date = $request->main_date;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        return redirect('/committee_ngo_member')->with('success','Created Successfully');


    }


    public function view_form_8_for_change_store(Request $request){

        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');


        $category_list = new Ngo_committee_member();
        $category_list->name = $request->name;
        $category_list->name_slug = Str::slug($request->name,"_");
        $category_list->desi = $request->desi;
        $category_list->dob = $request->dob;
        $category_list->main_time = $main_time;
        $category_list->phone = $request->phone;
        $category_list->nid_no = $request->nid_no;
        $category_list->father_name = $request->father_name;
        $category_list->present_address = $request->present_address;
        $category_list->permanent_address = $request->permanent_address;
        $category_list->name_supouse = $request->name_supouse;
        $category_list->edu_quali = $request->edu_quali;
        $category_list->profession = $request->profession;
        $category_list->job_des = $request->job_des;
        $category_list->service_status = $request->service_status;
        $category_list->remarks = $request->remarks;
        $category_list->ngo_id = '';
        $category_list->user_id = Auth::user()->id;

       // $category_list->main_date = $request->main_date;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        return redirect('/view_form_8_for_change')->with('success','Created Successfully');
    }


    public function view_form_8_for_change_edit($id){


 $all_data_list = Ngo_committee_member::where('name_slug',$id)->first();
 $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        return view('front.name_change.view_form_8_for_change_edit',compact('ngo_list_all','all_data_list'));
    }



    public function view_form_8_for_change_update(Request $request){
        $time_dy = time().date("Ymd");

        $category_list =Ngo_committee_member::find($request->id);
        $category_list->name = $request->name;
        $category_list->name_slug = Str::slug($request->name,"_");
        $category_list->desi = $request->desi;
        $category_list->dob = $request->dob;
        $category_list->phone = $request->phone;
        $category_list->nid_no = $request->nid_no;
        $category_list->father_name = $request->father_name;
        $category_list->present_address = $request->present_address;
        $category_list->permanent_address = $request->permanent_address;
        $category_list->name_supouse = $request->name_supouse;
        $category_list->edu_quali = $request->edu_quali;
        $category_list->profession = $request->profession;
        $category_list->job_des = $request->job_des;
        $category_list->service_status = $request->service_status;
        $category_list->remarks = $request->remarks;
        $category_list->ngo_id = '';
        $category_list->user_id = Auth::user()->id;

       // $category_list->main_date = $request->main_date;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        return redirect('/view_form_8_for_change')->with('info','Updated Successfully');


    }


    public function committee_ngo_member(Request $request){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $form_eight_list = Ngomember::where('user_id',Auth::user()->id)->get();
        return view('front.name_change.committee_ngo_member',compact('ngo_list_all','form_eight_list'));
    }



    public function ngo_member_id_and_images(Request $request){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $form_eight_list = Ngo_member_doc::where('user_id',Auth::user()->id)->get();
        return view('front.name_change.ngo_member_id_and_images',compact('ngo_list_all','form_eight_list'));
    }


    public function ngo_member_id_and_images_add(){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $form_eight_list = Ngo_member_doc::where('user_id',Auth::user()->id)->get();
        return view('front.name_change.ngo_member_id_and_images_add',compact('ngo_list_all','form_eight_list'));

    }


    public function ngo_member_id_and_images_store(Request $request){


        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

        $input = $request->all();


        $condition_main_image = $input['person_name'];


        foreach($condition_main_image as $key => $all_condition_main_image){

            $file_size = number_format($input['person_nid_copy'][$key]->getSize() / 1048576,2);

            $form= new Ngo_member_doc();

            $file=$input['person_nid_copy'][$key];
            $file_image=$input['person_image'][$key];

            $name=$time_dy.$file->getClientOriginalName();
            $name_image=$time_dy.$file_image->getClientOriginalName();

            $file->move('public/uploads/', $name);
            $file_image->move('public/uploads/', $name_image);

            $form->person_image='public/uploads/'.$name_image;
            $form->person_nid_copy='uploads/'.$name;
            $form->person_name=$input['person_name'][$key];
            $form->main_time = $main_time;
            $form->ngo_id = '';
            $form->user_id = Auth::user()->id;
            $form->person_nid_copy_size =$file_size;
            $form->save();
       }

       return redirect('/ngo_member_id_and_images')->with('success','Created Successfully');
    }



    public function ngo_member_id_and_images_update(Request $request){

        $time_dy = time().date("Ymd");


        $form= Ngo_member_doc::find($request->id);

        if ($request->hasfile('person_nid_copy')) {
            $file = $request->file('person_nid_copy');
            $file_size = number_format($file->getSize() / 1048576,2);
            $extension = $time_dy.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $form->person_nid_copy =  'uploads/'.$filename;
        $form->person_nid_copy_size =$file_size;

        }
        if ($request->hasfile('person_image')) {
            $file1 = $request->file('person_image');
          $extension1 = $time_dy.$file1->getClientOriginalName();
        $filename1 = $extension1;
        $file->move('public/uploads/', $filename1);
        $form->person_image =  'public/uploads/'.$filename1;

        }
        $form->person_name=$request->person_name;
        $form->ngo_id = '';
        $form->user_id = Auth::user()->id;

        $form->save();

        return redirect('/ngo_member_id_and_images')->with('info','Updated Successfully');
    }



    public function all_ngo_related_document(Request $request){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $form_eight_list = Ngodoc::where('user_id',Auth::user()->id)->get();
        return view('front.name_change.all_ngo_related_document',compact('ngo_list_all','form_eight_list'));

    }


    public function add_other_doc(){

        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $form_eight_list = Ngodoc::where('user_id',Auth::user()->id)->get();
        return view('front.name_change.add_other_doc',compact('ngo_list_all','form_eight_list'));

    }




    public function store_other_doc(Request $request){

        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');


        $input = $request->all();


        $condition_main_image = $input['primary_portal'];

        foreach($condition_main_image as $key => $all_condition_main_image){

            $file_size = number_format($input['primary_portal'][$key]->getSize() / 1048576,2);

            $form= new Ngodoc();
            $file=$input['primary_portal'][$key];
            $name=$time_dy.$file->getClientOriginalName();
            $file->move('public/uploads/', $name);
            $form->primary_portal='uploads/'.$name;
            $form->main_time = $main_time;
            $form->ngo_id = '';
            $form->user_id = Auth::user()->id;
            $form->primary_portal_size =$file_size;
            $form->save();
       }




         return redirect('/all_ngo_related_document')->with('success','Uploaded Successfully');


    }


    public function update_other_doc(Request $request){
        $time_dy = time().date("Ymd");

        $category_list =Ngodoc::find($request->id);
        $category_list->ngo_id = '';
        $category_list->user_id = Auth::user()->id;
      if ($request->hasfile('primary_portal')) {
        $file_size = number_format($request->primary_portal->getSize() / 1048576,2);
            $file = $request->file('primary_portal');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->primary_portal =  'uploads/'.$filename;
            $category_list->primary_portal_size =$file_size;

        }
        if ($request->hasfile('attested_copy_of_constitution')) {
            $file_size1 = number_format($request->attested_copy_of_constitution->getSize() / 1048576,2);
           $file = $request->file('attested_copy_of_constitution');
           $extension = $time_dy.$file->getClientOriginalName();
           $filename = $extension;
           $file->move('public/uploads/', $filename);
           $category_list->attested_copy_of_constitution =  'uploads/'.$filename;
           $category_list->attested_copy_of_constitution_size = $file_size1;

       }
       if ($request->hasfile('activity_report_of_the_organization')) {
        $file_size2 = number_format($request->activity_report_of_the_organization->getSize() / 1048576,2);

           $file = $request->file('activity_report_of_the_organization');
           $extension = $time_dy.$file->getClientOriginalName();
           $filename = $extension;
           $file->move('public/uploads/', $filename);
           $category_list->activity_report_of_the_organization =  'uploads/'.$filename;
           $category_list->activity_report_of_the_organization_size = $file_size2;

       }
       if ($request->hasfile('receipt_of_donor')) {
        $file_size3 = number_format($request->receipt_of_donor->getSize() / 1048576,2);
           $file = $request->file('receipt_of_donor');
           $extension = $time_dy.$file->getClientOriginalName();
           $filename = $extension;
           $file->move('public/uploads/', $filename);
           $category_list->receipt_of_donor =  'uploads/'.$filename;
           $category_list->receipt_of_donor_size = $file_size3;
       }
       if ($request->hasfile('attested_copy_of_minutes_of_general_meeting')) {
        $file_size4 = number_format($request->attested_copy_of_minutes_of_general_meeting->getSize() / 1048576,2);
           $file = $request->file('attested_copy_of_minutes_of_general_meeting');
           $extension = $time_dy.$file->getClientOriginalName();
           $filename = $extension;
           $file->move('public/uploads/', $filename);
           $category_list->attested_copy_of_minutes_of_general_meeting =  'uploads/'.$filename;
           $category_list->general_meeting_size = $file_size4;
       }
        $category_list->save();


        return redirect('/all_ngo_related_document')->with('success','Created Successfully');


    }



    public function final_submit_name_change(Request $request){


       // dd(44);

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');

        $new_data_add = new Namechange();
        $new_data_add->user_id = Auth::user()->id;
        $new_data_add->previous_name_eng =  Session::get('previous_name');
        $new_data_add->previous_name_ban = Session::get('previous_name_ban');
        $new_data_add->present_name_eng = Session::get('new_name');
        $new_data_add->present_ban = Session::get('new_name_ban');
        $new_data_add->status = 'Ongoing';
        $new_data_add->main_time = $main_time;
        $new_data_add->save();


        return redirect('/name_change_page')->with('success','Request Send Successfully');

    }



    public function form_one_pdf($main_id,$id){

        if($id = 'plan'){

            $form_one_data = DB::table('fboneforms')->where('user_id',$main_id)->value('plan_of_operation');

        }elseif($id = 'invoice'){

            $form_one_data = DB::table('fboneforms')->where('user_id',$main_id)->value('attach_the__supporting_papers');

        }elseif($id = 'treasury_bill'){

            $form_one_data = DB::table('fboneforms')->where('user_id',$main_id)->value('board_of_revenue_on_fees');

        }elseif($id = 'final_pdf'){
            $form_one_data = DB::table('fboneforms')->where('user_id',$main_id)->value('s_pdf');
        }

        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }


    public function form_eight_pdf($main_id){

        $form_one_data = DB::table('ngo_committee_members')->where('user_id',$main_id)->value('s_pdf');

        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }

    public function source_of_fund($id){

        $form_one_data = DB::table('sourceoffunds')->where('id',$id)->value('letter_file');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }

    public function other_pdf_view($id){

        $form_one_data = DB::table('acounntotherinfos')->where('id',$id)->value('information_type');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }



    public function ngo_doc($id){

        $form_one_data = DB::table('ngodocs')->where('id',$id)->value('primary_portal');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }



    public function ngo_member_doc($id){

        $form_one_data = DB::table('ngo_member_docs')->where('id',$id)->value('person_nid_copy');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }
}
