<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Fboneform;
use App\Models\Acounntotherinfo;
use App\Models\Bankaccount;
use App\Models\Fdoneformadviser;
use App\Models\Sourceoffund;
use App\Models\Fdoneform_staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Response;
use App\Models\Ngo_type_and_language;
use App\Models\Ngo_committee_member;
class FdoneformController extends Controller
{


    public function back_from_step_two(){
        $all_parti = Fboneform::where('user_id',Auth::user()->id)

        ->get();

        return view('front.form.formone.particulars_of_Organisation',compact('all_parti'));

    }

    public function other_info_from_one_download($id){

        $get_file_data = Acounntotherinfo::where('id',$id)->value('information_type');

        $file_path = url('public/'.$get_file_data);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $file= public_path('/'). $get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }

    public function source_of_fund_doc_download($id){

        $get_file_data = Sourceoffund::where('id',$id)->value('letter_file');

        $file_path = url('public/'.$get_file_data);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $file= public_path('/'). $get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }

    public function fd_one_form_edit(){
        $all_parti = Fboneform::where('user_id',Auth::user()->id)

            ->get();

            return view('front.form.formone.particulars_of_Organisation',compact('all_parti'));

    }

    public function particulars_of_Organisation(){


        $get_complete_status = Fboneform::where('user_id',Auth::user()->id)->value('complete_status');

//dd($get_complete_status);

if(empty($get_complete_status)){



    $all_parti = Fboneform::where('user_id',Auth::user()->id)

    ->get();

    return view('front.form.formone.particulars_of_Organisation',compact('all_parti'));

}elseif($get_complete_status == 'all_complete'){

            return $this->fd_one_form_information();




        }elseif($get_complete_status == 'save_and_exit_from_one'){

            //return redirect('/particulars_of_Organisation');

            $all_parti = Fboneform::where('user_id',Auth::user()->id)

            ->get();

            return view('front.form.formone.particulars_of_Organisation',compact('all_parti'));



        }elseif($get_complete_status == 'next_step_from_one'){

            $all_parti = Fboneform::where('user_id',Auth::user()->id)

            ->get();

            return view('front.form.formone.field_of_proposed_activities',compact('all_parti'));





        }elseif($get_complete_status == 'save_and_exit_from_two'){

            $all_parti = Fboneform::where('user_id',Auth::user()->id)

            ->get();

            return view('front.form.formone.field_of_proposed_activities',compact('all_parti'));





        }elseif($get_complete_status == 'next_step_from_two'){

            $all_parti = Fboneform::where('user_id',Auth::user()->id)
            ->get();


               $all_partiw = Fdoneform_staff::where('user_id',Auth::user()->id)->get();

               //dd($all_partiw);


               return view('front.form.formone.all_staff_details_information',compact('all_parti','all_partiw'));





        }elseif($get_complete_status == 'next_step_from_three'){

            $all_parti = Fboneform::where('user_id',Auth::user()->id)
            ->get();

            return view('front.form.formone.others_information',compact('all_parti'));





        }elseif($get_complete_status == 'save_and_exit_from_three'){

            $all_parti = Fboneform::where('user_id',Auth::user()->id)
            ->get();


               $all_partiw = Fdoneform_staff::where('user_id',Auth::user()->id)->get();

               //dd($all_partiw);


               return view('front.form.formone.all_staff_details_information',compact('all_parti','all_partiw'));







        }



    }


    public function field_of_proposed_activities(){


        $all_parti = Fboneform::where('user_id',Auth::user()->id)

        ->get();

        return view('front.form.formone.field_of_proposed_activities',compact('all_parti'));

    }

    public function all_staff_details_information(){

        $all_parti = Fboneform::where('user_id',Auth::user()->id)
     ->get();


        $all_partiw = Fdoneform_staff::where('user_id',Auth::user()->id)->get();

        //dd($all_partiw);


        return view('front.form.formone.all_staff_details_information',compact('all_parti','all_partiw'));

    }

    public function others_information(){

        $all_parti = Fboneform::where('user_id',Auth::user()->id)
        ->get();

        return view('front.form.formone.others_information',compact('all_parti'));

    }


    public function fd_one_form_information(){

        $get_complete_status = Fboneform::where('user_id',Auth::user()->id)->first();




        $get_all_data_adviser_bank = DB::table('bankaccounts')->where('user_id',Auth::user()->id)
               ->first();


               $get_all_data_other= DB::table('acounntotherinfos')->where('user_id',Auth::user()->id)
               ->get();

               $get_all_data_adviser = DB::table('fdoneformadvisers')->where('user_id',Auth::user()->id)
       ->get();

       $all_partiw = Fdoneform_staff::where('user_id',Auth::user()->id)->get();


       $get_all_source_of_fund_data = DB::table('sourceoffunds')
       ->where('user_id',Auth::user()->id)->get();

       $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

        return view('front.form.formone.fd_one_form_information',compact('bangDATE','engDATE','get_all_source_of_fund_data','all_partiw','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','get_complete_status'));


    }


    public function particulars_of_Organisation_post(Request $request){


         $r_number = mt_rand(1000000000000000, 9999999999999999);

         $arr_all = implode(",",$request->citizenship);

         //dd($arr_all);




        $category_list = new Fboneform();
        $category_list->user_id = Auth::user()->id;
        $category_list->registration_number = $r_number;
        $category_list->organization_name = $request->organization_name;
        $category_list->organization_name_ban = $request->organization_name_ban;

        $category_list->organization_address = $request->organization_address;
        $category_list->address_of_head_office = $request->address_of_head_office;
        $category_list->country_of_origin = $request->country_of_origin;
        $category_list->name_of_head_in_bd = $request->name_of_head_in_bd;
        $category_list->job_type = $request->job_type;
        $category_list->address = $request->address;
        $category_list->phone = $request->phone;
        $category_list->email = $request->email;
        $category_list->profession = $request->profession;
        $category_list->citizenship = $arr_all;
        $category_list->complete_status = $request->submit_value;
        $category_list->save();


        $mm_id = $category_list->id;








        Session::put('mm_id',$mm_id);


        //Session::put('user_main_id', Auth::user()->id);


        if($request->submit_value == 'save_and_exit_from_one'){



            return redirect('/fd_one_form_information');


        }else{




            return redirect('/field_of_proposed_activities');


        }

       // dd($request->all());
    }


    public function particulars_of_Organisation_update(Request $request){





        $arr_all = implode(",",$request->citizenship);

        //dd($arr_all);




       $category_list = Fboneform::find($request->id);
       $category_list->user_id = Auth::user()->id;
       $category_list->organization_name_ban = $request->organization_name_ban;
      $category_list->organization_name = $request->organization_name;
       $category_list->organization_address = $request->organization_address;
       $category_list->address_of_head_office = $request->address_of_head_office;
       $category_list->country_of_origin = $request->country_of_origin;
       $category_list->name_of_head_in_bd = $request->name_of_head_in_bd;
       $category_list->job_type = $request->job_type;
       $category_list->address = $request->address;
       $category_list->phone = $request->phone;
       $category_list->email = $request->email;
       $category_list->profession = $request->profession;
       $category_list->citizenship = $arr_all;
       $category_list->complete_status = $request->submit_value;
       $category_list->save();


       $mm_id = $category_list->id;








       Session::put('mm_id',$mm_id);


       //Session::put('user_main_id', Auth::user()->id);


       if($request->submit_value == 'save_and_exit_from_one'){



           return redirect('/fd_one_form_information');


       }else{




           return redirect('/field_of_proposed_activities');


       }



    }


    public function upload_from_one_pdf(Request $request){

         $time_dy = time().date("Ymd");

        $category_list = Fboneform::find($request->id);
        if ($request->hasfile('s_pdf')) {
            $file = $request->file('s_pdf');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->s_pdf = 'uploads/'.$filename;

        }
        $category_list->save();

        return redirect()->back()->with('success','Uploaded successfully!');;
    }


    public function field_of_proposed_activities_post(Request $request){

        //dd();
        $time_dy = time().date("Ymd");

       // dd($request->all());


        $category_list = Fboneform::find(Session::get('mm_id'));
        $category_list->user_id = Auth::user()->id;

       $category_list->district = $request->district;
        $category_list->sub_district = $request->sub_district;
        $category_list->annual_budget = $request->annual_budget;
        if ($request->hasfile('plan_of_operation')) {
            $file = $request->file('plan_of_operation');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->plan_of_operation = 'uploads/'.$filename;

        }
        $category_list->complete_status = $request->submit_value;
        $category_list->save();


        $mm_id = $category_list->id;


        $input = $request->all();



    $new_cat_dec = $input['name'];



        if (array_key_exists("name", $input)){

            foreach($new_cat_dec as $key => $new_cat_dec){
             $form= new Sourceoffund();
             $form->name=$input['name'][$key];
             $form->address=$input['address'][$key];
             $file=$input['letter_file'][$key];
             $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
             $file->move('public/uploads/', $name);
             $form->letter_file='uploads/'.$name;
             $form->user_id =  Auth::user()->id;
             $form->ngo_id = $mm_id;
             $form->save();





         }
            }








        Session::put('mm_id',$mm_id);


        if($request->submit_value == 'save_and_exit_from_two'){



            return redirect('/fd_one_form_information');


        }else{




            return redirect('/all_staff_details_information');


        }



    }


    public function source_of_fund_update(Request $request){

        $time_dy = time().date("Ymd");


        $category_list = Sourceoffund::find($request->id);
        $category_list->name = $request->name_sour;
        $category_list->address = $request->address;
        if ($request->hasfile('letter_file')) {
            $file = $request->file('letter_file');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->letter_file =  'uploads/'.$filename;

        }
        $category_list->save();

        return redirect()->back();

    }

    public function adviser_data_update(Request $request){
        $category_list = Fdoneformadviser::find($request->id);
        $category_list->name = $request->name;
        $category_list->information = $request->information;

        $category_list->save();

        return redirect()->back();

    }

    public function other_information_a_update(Request $request){
        $time_dy = time().date("Ymd");
        $category_list = Acounntotherinfo::find($request->mid);

        if ($request->hasfile('letter_file')) {
            $file = $request->file('letter_file');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->letter_file =  'uploads/'.$filename;

        }
        $category_list->save();

        return redirect()->back();

    }


    public function source_of_fund_delete(Request $request)
    {

        $admins = Sourceoffund::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function adviser_data_delete(Request $request)
    {

        $admins = Fdoneformadviser::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function other_information_a_delete(Request $request)
    {

        $admins = Acounntotherinfo::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function field_of_proposed_activities_update(Request $request){

        //dd($request->id);
        $time_dy = time().date("Ymd");
        $category_list = Fboneform::find($request->mid);
        $category_list->user_id = Auth::user()->id;

       $category_list->district = $request->district;
        $category_list->sub_district = $request->sub_district;
        $category_list->annual_budget = $request->annual_budget;
        if ($request->hasfile('plan_of_operation')) {
            $file = $request->file('plan_of_operation');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->plan_of_operation ='uploads/'.$filename;

        }
        $category_list->complete_status = $request->submit_value;
        $category_list->save();


        $mm_id = $category_list->id;


        $input = $request->all();

       // dd($input);



    $new_cat_dec = $input['name'];








    if (array_key_exists("letter_file", $input)){


        $delete_data = Sourceoffund::where('user_id',Auth::user()->id)
        ->where('ngo_id',$mm_id)->delete();

        foreach($new_cat_dec as $key => $new_cat_dec){
         $form= new Sourceoffund();
         $form->name=$input['name'][$key];
         $form->address=$input['address'][$key];
         $file=$input['letter_file'][$key];
         $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
         $file->move('public/uploads/', $name);
         $form->letter_file='uploads/'.$name;
         $form->user_id =  Auth::user()->id;
         $form->ngo_id = $mm_id;
         $form->save();





     }
        }









        Session::put('mm_id',$mm_id);


        if($request->submit_value == 'save_and_exit_from_two'){



            return redirect('/fd_one_form_information');


        }else{




            return redirect('/all_staff_details_information');


        }


    }



    public function all_staff_details_information_post(Request $request){

       // dd($request->all());


        $category_list = Fboneform::find($request->id);
        $category_list->user_id = Auth::user()->id;
        $category_list->complete_status = $request->submit_value;
        $category_list->save();


        $input = $request->all();
        $new_cat_dec = $input['staff_name'];


        if (array_key_exists("now_working_at", $input)){

            foreach($new_cat_dec as $key => $new_cat_dec){

                if($key == 0){
                    $arr_all = implode(",",$request->citizenship1);
                }elseif($key == 1){

                    $arr_all = implode(",",$request->citizenship2);

                }elseif($key == 2){
                    $arr_all = implode(",",$request->citizenship3);
                }
                elseif($key == 3){
                    $arr_all = implode(",",$request->citizenship4);
                }elseif($key == 4){
                    $arr_all = implode(",",$request->citizenship5);
                }

                $form= new Fdoneform_staff();
                $form->name=$input['staff_name'][$key];
                $form->now_working_at=$input['now_working_at'][$key];
                $form->position=$input['staff_position'][$key];
                $form->address=$input['staff_address'][$key];
                $form->date_of_join=$input['date_of_join'][$key];
                $form->citizenship=$arr_all;
                $form->salary_statement=$input['salary_statement'][$key];
                $form->other_occupation	=$input['other_occupation'][$key];
                $form->user_id =  Auth::user()->id;
                $form->ngo_id = Session::get('mm_id');
                $form->save();
            }


        }else{

        foreach($new_cat_dec as $key => $new_cat_dec){

            if($key == 0){
                $arr_all = implode(",",$request->citizenship1);
            }elseif($key == 1){

                $arr_all = implode(",",$request->citizenship2);

            }elseif($key == 2){
                $arr_all = implode(",",$request->citizenship3);
            }
            elseif($key == 3){
                $arr_all = implode(",",$request->citizenship4);
            }elseif($key == 4){
                $arr_all = implode(",",$request->citizenship5);
            }

            $form= new Fdoneform_staff();
            $form->name=$input['staff_name'][$key];
            $form->position=$input['staff_position'][$key];
            $form->address=$input['staff_address'][$key];
            $form->date_of_join=$input['date_of_join'][$key];
            $form->citizenship=$arr_all;
            $form->salary_statement=$input['salary_statement'][$key];
            $form->other_occupation	=$input['other_occupation'][$key];
            $form->user_id =  Auth::user()->id;
            $form->ngo_id = Session::get('mm_id');
            $form->save();
        }

    }


        if($request->submit_value == 'save_and_exit_from_three'){



            return redirect('/fd_one_form_information');


        }else{




            return redirect('/others_information');


        }



    }


    public function all_staff_details_information_update(Request $request){

        //dd($request->all());

        $delete_all_the_data = Fdoneform_staff::where('user_id',Auth::user()->id)->delete();


        $category_list = Fboneform::find($request->id);
        $category_list->user_id = Auth::user()->id;
        $category_list->complete_status = $request->submit_value;
        $category_list->save();


        $input = $request->all();
        $new_cat_dec = $input['staff_name'];


        if (array_key_exists("now_working_at", $input)){


            foreach($new_cat_dec as $key => $new_cat_dec){

                if($key == 0){
                    $arr_all = implode(",",$request->citizenship1);
                }elseif($key == 1){

                    $arr_all = implode(",",$request->citizenship2);

                }elseif($key == 2){
                    $arr_all = implode(",",$request->citizenship3);
                }
                elseif($key == 3){
                    $arr_all = implode(",",$request->citizenship4);
                }elseif($key == 4){
                    $arr_all = implode(",",$request->citizenship5);
                }

                $form= new Fdoneform_staff();
                $form->name=$input['staff_name'][$key];
                $form->position=$input['staff_position'][$key];
                $form->now_working_at=$input['now_working_at'][$key];
                $form->address=$input['staff_address'][$key];
                $form->date_of_join=$input['date_of_join'][$key];
                $form->citizenship=$arr_all;
                $form->salary_statement=$input['salary_statement'][$key];
                $form->other_occupation	=$input['other_occupation'][$key];
                $form->user_id =  Auth::user()->id;
                $form->ngo_id = Session::get('mm_id');
                $form->save();
            }


        }else{

        foreach($new_cat_dec as $key => $new_cat_dec){

            if($key == 0){
                $arr_all = implode(",",$request->citizenship1);
            }elseif($key == 1){

                $arr_all = implode(",",$request->citizenship2);

            }elseif($key == 2){
                $arr_all = implode(",",$request->citizenship3);
            }
            elseif($key == 3){
                $arr_all = implode(",",$request->citizenship4);
            }elseif($key == 4){
                $arr_all = implode(",",$request->citizenship5);
            }

            $form= new Fdoneform_staff();
            $form->name=$input['staff_name'][$key];
            $form->position=$input['staff_position'][$key];
            $form->address=$input['staff_address'][$key];
            $form->date_of_join=$input['date_of_join'][$key];
            $form->citizenship=$arr_all;
            $form->salary_statement=$input['salary_statement'][$key];
            $form->other_occupation	=$input['other_occupation'][$key];
            $form->user_id =  Auth::user()->id;
            $form->ngo_id = Session::get('mm_id');
            $form->save();
        }

    }


        if($request->submit_value == 'save_and_exit_from_three'){



            return redirect('/fd_one_form_information');


        }else{




            return redirect('/others_information');


        }

    }




    public function others_information_post(Request $request){
        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');
     //dd($request->all());


     $category_list = Fboneform::find($request->id);
     $category_list->user_id = Auth::user()->id;
     $category_list->main_time = $main_time;
    $category_list->treasury_number = $request->treasury_number;
     $category_list->vat_invoice_number = $request->vat_invoice_number;

     if ($request->hasfile('attach_the__supporting_papers')) {
         $file = $request->file('attach_the__supporting_papers');
         $extension = $time_dy.$file->getClientOriginalName();
         $filename = $extension;
         $file->move('public/uploads/', $filename);
         $category_list->attach_the__supporting_papers ='uploads/'.$filename;

     }


     if ($request->hasfile('board_of_revenue_on_fees')) {
        $file = $request->file('board_of_revenue_on_fees');
        $extension = $time_dy.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $category_list->board_of_revenue_on_fees = 'uploads/'.$filename;

    }

     $category_list->complete_status = $request->submit_value;
     $category_list->save();


     $mm_id = $category_list->id;



     $form= new Bankaccount();
     $form->account_number=$request->account_number;
     $form->account_type=$request->account_type;
     $form->name_of_bank=$request->name_of_bank;
     $form->branch_name_of_bank=$request->branch_name_of_bank;
     $form->bank_address=$request->bank_address;
     $form->user_id =  Auth::user()->id;
     $form->ngo_id = $mm_id;
     $form->save();


     $input = $request->all();





     if (array_key_exists("name", $input)){

        $new_cat_dec = $input['name'];
     foreach($new_cat_dec as $key => $new_cat_dec){

        $form1= new Fdoneformadviser();
        $form1->name=$input['name'][$key];
        $form1->information=$input['information'][$key];
        $form1->user_id =  Auth::user()->id;
        $form1->ngo_id = $mm_id;
        $form1->save();

     }

    }

    if (array_key_exists("information_type", $input)){

        $new_cat_dec_new = $input['information_type'];


     foreach($new_cat_dec_new as $key => $new_cat_dec_new){


        $form2= new Acounntotherinfo();

        $file=$input['information_type'][$key];
        $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
        $file->move('public/uploads/', $name);
        $form2->information_type='uploads/'.$name;
        $form2->user_id =  Auth::user()->id;
        $form2->ngo_id = $mm_id;
        $form2->save();

     }

    }


    if($request->submit_value == 'all_complete'){



        return redirect('/fd_one_form_information');


    }else{




        return redirect('/others_information');


    }


    }


    public function others_information_update(Request $request){

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');

    //dd(Session::get('mm_id'));
    $time_dy = time().date("Ymd");

    $category_list = Fboneform::find($request->id);
    $category_list->user_id = Auth::user()->id;
    $category_list->main_time = $main_time;
   $category_list->treasury_number = $request->treasury_number;
    $category_list->vat_invoice_number = $request->vat_invoice_number;

    if ($request->hasfile('attach_the__supporting_papers')) {
        $file = $request->file('attach_the__supporting_papers');
        $extension = $time_dy.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $category_list->attach_the__supporting_papers = 'uploads/'.$filename;

    }


    if ($request->hasfile('board_of_revenue_on_fees')) {
       $file = $request->file('board_of_revenue_on_fees');
       $extension = $time_dy.$file->getClientOriginalName();
       $filename = $extension;
       $file->move('public/uploads/', $filename);
       $category_list->board_of_revenue_on_fees = 'uploads/'.$filename;

   }

    $category_list->complete_status = $request->submit_value;
    $category_list->save();


    $mm_id = $category_list->id;

    if($request->bank_id == 'p'){

        $form= new Bankaccount();
        $form->account_number=$request->account_number;
        $form->account_type=$request->account_type;
        $form->name_of_bank=$request->name_of_bank;
        $form->branch_name_of_bank=$request->branch_name_of_bank;
        $form->bank_address=$request->bank_address;
        $form->user_id =  Auth::user()->id;
        $form->ngo_id = $mm_id;
        $form->save();

    }else{






    $form= Bankaccount::find($request->bank_id);
    $form->account_number=$request->account_number;
    $form->account_type=$request->account_type;
    $form->name_of_bank=$request->name_of_bank;
    $form->branch_name_of_bank=$request->branch_name_of_bank;
    $form->bank_address=$request->bank_address;
    $form->user_id =  Auth::user()->id;
    $form->ngo_id = $mm_id;
    $form->save();
}

    $input = $request->all();




if(in_array(null, $input['name'])){

}else{




    if (array_key_exists("name", $input)){

       $new_cat_dec = $input['name'];
    foreach($new_cat_dec as $key => $new_cat_dec){

       $form1= new Fdoneformadviser();
       $form1->name=$input['name'][$key];
       $form1->information=$input['information'][$key];
       $form1->user_id =  Auth::user()->id;
       $form1->ngo_id = $mm_id;
       $form1->save();

    }

   }

}

   if (array_key_exists("information_type", $input)){

       $new_cat_dec_new = $input['information_type'];


    foreach($new_cat_dec_new as $key => $new_cat_dec_new){


       $form2= new Acounntotherinfo();

       $file=$input['information_type'][$key];
       $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
       $file->move('public/uploads/', $name);
       $form2->information_type='uploads/'.$name;
       $form2->user_id =  Auth::user()->id;
       $form2->ngo_id = $mm_id;
       $form2->save();

    }

   }


   if($request->submit_value == 'all_complete'){



       return redirect('/fd_one_form_information');


   }else{




       return redirect('/others_information');


   }



    }


    public function fd_one_form_information_pdf(){

        $get_complete_status = Fboneform::where('user_id',Auth::user()->id)->first();




        $get_all_data_adviser_bank = DB::table('bankaccounts')->where('user_id',Auth::user()->id)
               ->first();


               $get_all_data_other= DB::table('acounntotherinfos')->where('user_id',Auth::user()->id)
               ->get();

               $get_all_data_adviser = DB::table('fdoneformadvisers')->where('user_id',Auth::user()->id)
       ->get();

       $all_partiw = Fdoneform_staff::where('user_id',Auth::user()->id)->get();


       $get_all_source_of_fund_data = DB::table('sourceoffunds')
       ->where('user_id',Auth::user()->id)->get();


        $file_Name_Custome = 'fd_one_form';

        $payment_detail = 11;

        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );


        $pdf=PDF::loadView('front.form.formone.fd_one_form_information_pdf',[
            'engDATE'=>$engDATE,
            'bangDATE'=>$bangDATE,
            'get_all_source_of_fund_data'=>$get_all_source_of_fund_data,
            'all_partiw'=>$all_partiw,
            'get_all_data_adviser'=>$get_all_data_adviser,
            'get_all_data_other'=>$get_all_data_other,
            'get_all_data_adviser_bank'=>$get_all_data_adviser_bank,
            'get_complete_status'=>$get_complete_status

        ],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');


    }


}
