<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo_type_and_language;
use App\Models\Fboneform;
use App\Models\Ngo_committee_member;
use App\Models\Ngomember;
use App\Models\Ngodoc;
use App\Models\Ngostatus;
use App\Models\Ngo_member_doc;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\App;
use Hash;
use Illuminate\Support\Str;
use Mail;
class OtherformController extends Controller
{


    public function frequently_ask_question(){

        return view('front.frequently_ask_question');
    }

    public function change_language(Request $request){


        $get_lang =  session()->get('locale');

        if($get_lang == 'en'){
            App::setLocale('sp');
            session()->put('locale','sp');

        }else{
            App::setLocale('en');
            session()->put('locale','en');

        }

        return redirect()->back();

    }


    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function reset_all_data(){
        $all_ngo_member_doc = Ngo_member_doc::where('user_id',Auth::user()->id)
       ->count();
        $all_data_list = Ngomember::where('user_id',Auth::user()->id)
      ->count();
        $ngo_list_all = Ngodoc::where('user_id',Auth::user()->id)
        ->count();
        $all_data_list1 = Ngo_committee_member::where('user_id',Auth::user()->id)
        ->count();
        $all_parti = Fboneform::where('user_id',Auth::user()->id)
        ->count();
        $first_form_check = Ngo_type_and_language::where('user_id',Auth::user()->id)
        ->count();

       $first_form_check_adviser = DB::table('fdoneformadvisers')->where('user_id',Auth::user()->id)
        ->count();

       $first_form_check_staff = DB::table('fdoneform_staffs')->where('user_id',Auth::user()->id)
        ->count();

      $first_form_check_account = DB::table('bankaccounts')->where('user_id',Auth::user()->id)
        ->count();

        $first_form_check_account_info = DB::table('acounntotherinfos')->where('user_id',Auth::user()->id)
        ->count();

       $first_form_check_sourceoffunds = DB::table('sourceoffunds')->where('user_id',Auth::user()->id)
        ->count();


        $get_final_result = $first_form_check_sourceoffunds+$first_form_check_account_info+$first_form_check_account+$first_form_check_staff+$first_form_check_adviser+$all_ngo_member_doc + $all_data_list + $ngo_list_all + $all_data_list + $all_parti + $first_form_check;


        if($get_final_result == 0){



            return redirect('/dashboard')->with('error','You did not add any information');


        }else{
          //e//

          session()->forget('locale');

          if($first_form_check_adviser == 0){



            }else{
                $all_ngo_member_doc = DB::table('fdoneformadvisers')->where('user_id',Auth::user()->id)
        ->delete();

            }



           if($first_form_check_staff == 0){



            }else{
                $all_ngo_member_doc = DB::table('fdoneform_staffs')->where('user_id',Auth::user()->id)
        ->delete();

            }



           if($first_form_check_account == 0){



            }else{
                $all_ngo_member_doc = DB::table('bankaccounts')->where('user_id',Auth::user()->id)
        ->delete();

            }

                     if($first_form_check_account_info == 0){



            }else{
                $all_ngo_member_doc = DB::table('acounntotherinfos')->where('user_id',Auth::user()->id)
        ->delete();

            }



           if($first_form_check_sourceoffunds == 0){



            }else{
                $all_ngo_member_doc = DB::table('sourceoffunds')->where('user_id',Auth::user()->id)
        ->delete();

            }



            if($all_ngo_member_doc == 0){



            }else{
                $all_ngo_member_doc = Ngo_member_doc::where('user_id',Auth::user()->id)
                ->delete();

            }


            if($all_data_list1 == 0){



            }else{
                $all_data_list1 = Ngo_committee_member::where('user_id',Auth::user()->id)
                ->delete();

            }


            if($all_data_list == 0){



            }else{
                $all_data_list = Ngomember::where('user_id',Auth::user()->id)
                ->delete();

            }

            if($ngo_list_all == 0){


            }else{
                $ngo_list_all = Ngodoc::where('user_id',Auth::user()->id)
                ->delete();

            }



            if($all_parti == 0){


            }else{

                $all_parti = Fboneform::where('user_id',Auth::user()->id)
                ->delete();
            }


            if($first_form_check == 0){


            }else{
                $first_form_check = Ngo_type_and_language::where('user_id',Auth::user()->id)
                ->delete();

            }





            return redirect('/dashboard')->with('error','Successfully Deleted');




        }

    }
    public function ngo_type_and_language(){

        return view('front.ngo_type_and_language');
    }


    public function ngo_type_and_language_post(Request $request){


    //dd($request->input_language);

        $category_list = new Ngo_type_and_language();
        $category_list->ngo_type = $request->ngo_origin;
        $category_list->ngo_language = $request->input_language;
        $category_list->user_id =Auth::user()->id;
        $category_list->save();

        App::setLocale($request->input_language);
        session()->put('locale', $request->input_language);

        $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_form_check_status');


        if($first_form_check == 1){

            return redirect('ngo_registration_second_info');

        }else{

            return redirect('ngo_registration_first_info');


        }


    }

    public function ngo_registration_first_info(){


        return view('front.ngo_registration_first_info');


    }


    public function ngo_registration_first_info_post(Request $request){

        DB::table('ngo_type_and_languages')
->where('user_id',Auth::user()->id)
->update(['first_form_check_status'=>1]);

return redirect('ngo_registration_second_info');

    }

    public function ngo_registration_second_info(){

        return view('front.ngo_registration_second_info');

    }


    public function ngo_registration_second_info_post(Request $request){


        DB::table('ngo_type_and_languages')
->where('user_id',Auth::user()->id)
->update(['second_form_check_status'=>1]);

return redirect('ngo_all_registration_form');

    }

    public function ngo_all_registration_form(){

        //dd(1);


        $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_form_check_status');

        $second_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('second_form_check_status');



        if($first_form_check == 1 && $second_form_check == 1){

            return view('front.ngo_all_registration_form');

        }elseif($first_form_check == 1){

            return redirect('ngo_registration_second_info');

        }elseif($second_form_check == 1){

          return redirect('ngo_registration_first_info');
        }else{
            return view('front.ngo_type_and_language');

        }


    }


    //////3 march ///////////

    public function ngo_instruction_page(){

        return view('front.instruction_page.ngo_instruction_page');
    }


    public function ngo_registration_fee_list(){


        return view('front.ngo_registration_fee.ngo_registration_fee_list');
    }


    public function final_submit_reg_form(Request $request){



        $get_reg_id = Fboneform::where('user_id',Auth::user()->id)->value('registration_number');


        $category_list = new Ngostatus();
        $category_list->user_id = Auth::user()->id;
        $category_list->reg_id = $get_reg_id;
        $category_list->reg_type = $request->reg_type;
        $category_list->status = 'Ongoing';
        $category_list->email = Auth::user()->email;
        $category_list->save();

            $get_v_email = Auth::user()->email;

        Mail::send('emails.reg_number_list', ['token' => $get_reg_id], function($message) use($get_v_email){
            $message->to($get_v_email);
            $message->subject('Ngo Registration Mail');
        });


        return redirect()->back();


    }


    public function status_page(){

        return view('front.status_page.status_page');

    }


    public function check_status_reg_from(Request $request){


        $get_all_the_data_reg = Ngostatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('reg_id');


        $get_all_the_data_status = Ngostatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('status');


        if(empty($get_all_the_data_reg)){

            return view('front.status_page.check_status_reg_from_empty');

        }else{

            return view('front.status_page.check_status_reg_from_full',compact('get_all_the_data_reg','get_all_the_data_status'));

        }
    }


    public function email_verify_page(){



        return view('front.auth_page.err_msg_all');


    }

    public function email_verified_page(){
        return view('front.auth_page.first_reg_mail');

    }
}
