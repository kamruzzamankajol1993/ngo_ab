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
use App\Models\Renew;
use App\Models\Ngorenewinfo;
class RenewController extends Controller
{
    public function renew_page(){
        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $name_change_list_all =  Renew::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.renew.renew',compact('ngo_list_all','name_change_list_all'));
    }



    public function ngo_renew_list_new(){

        $get_all_data_new = Ngorenewinfo::where('user_id',Auth::user()->id)->latest()->get();
         $all_parti = Fboneform::where('user_id',Auth::user()->id)->get();
        $ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
        $name_change_list_all =  Renew::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.renew.ngo_renew_list_new',compact('get_all_data_new','ngo_list_all','name_change_list_all','all_parti'));

    }



    public function update_renew_information_list(Request $request){



        $time_dy = time().date("Ymd");



        $category_list = Ngorenewinfo::find($request->id);
        $category_list->user_id = Auth::user()->id;
        $category_list->registration_number = $request->registration_number;
        $category_list->organization_name = $request->organization_name;
        $category_list->organization_address = $request->organization_address;
        $category_list->address_of_head_office = $request->address_of_head_office;
        $category_list->country_of_origin = $request->country_of_origin;
        $category_list->name_of_head_in_bd = $request->name_of_head_in_bd;
        $category_list->job_type = $request->job_type;
        $category_list->address = $request->address;
        $category_list->phone = $request->phone;
        $category_list->email = $request->email;
        $category_list->mobile = $request->mobile;
        $category_list->web_site_name = $request->web_site_name;
        $category_list->mobile_new = $request->mobile_new;
        $category_list->email_new = $request->email_new;
        $category_list->phone_new = $request->phone_new;
        $category_list->profession = $request->profession;
        if ($request->hasfile('foregin_pdf')) {
         $file = $request->file('foregin_pdf');
         $extension = $time_dy.$file->getClientOriginalName();
         $filename = $extension;
         $file->move('public/uploads/', $filename);
         $category_list->foregin_pdf = 'uploads/'.$filename;

     }


     if ($request->hasfile('yearly_budget')) {
         $file = $request->file('yearly_budget');
         $extension = $time_dy.$file->getClientOriginalName();
         $filename = $extension;
         $file->move('public/uploads/', $filename);
         $category_list->yearly_budget = 'uploads/'.$filename;

     }



        $category_list->save();


        $mm_id = $category_list->id;









            return redirect('/all_staff_information_for_renew');



    }


    public function store_renew_information_list(Request $request){




        $time_dy = time().date("Ymd");



       $category_list = new Ngorenewinfo();
       $category_list->ngo_id = $request->id;
       $category_list->user_id = Auth::user()->id;
       $category_list->registration_number = $request->registration_number;
       $category_list->organization_name = $request->organization_name;
       $category_list->organization_address = $request->organization_address;
       $category_list->address_of_head_office = $request->address_of_head_office;
       $category_list->country_of_origin = $request->country_of_origin;
       $category_list->name_of_head_in_bd = $request->name_of_head_in_bd;
       $category_list->job_type = $request->job_type;
       $category_list->address = $request->address;
       $category_list->phone = $request->phone;
       $category_list->email = $request->email;
       $category_list->mobile = $request->mobile;
       $category_list->web_site_name = $request->web_site_name;
       $category_list->mobile_new = $request->mobile_new;
       $category_list->email_new = $request->email_new;
       $category_list->phone_new = $request->phone_new;
       $category_list->profession = $request->profession;

       if ($request->hasfile('foregin_pdf')) {
        $file = $request->file('foregin_pdf');
        $extension = $time_dy.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $category_list->foregin_pdf = 'uploads/'.$filename;

    }


    if ($request->hasfile('yearly_budget')) {
        $file = $request->file('yearly_budget');
        $extension = $time_dy.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $category_list->yearly_budget = 'uploads/'.$filename;

    }



       $category_list->save();


       $mm_id = $category_list->id;









           return redirect('/all_staff_information_for_renew');



    }


    public function all_staff_information_for_renew(){
        $all_partiw = Fdoneform_staff::where('user_id',Auth::user()->id)->get();

        return view('front.renew.all_staff_information_for_renew',compact('all_partiw'));
    }

    public function other_information_for_renew(){

        return view('front.renew.other_information_for_renew');
    }


    public function other_information_for_renew_get(Request $request){

        $time_dy = time().date("Ymd");

       $Ngorenewinfo_get_id = Ngorenewinfo::where('user_id',Auth::user()->id)->orderBy('id','desc')->value('id');


        $category_list = Ngorenewinfo::find($Ngorenewinfo_get_id);
        $category_list->main_account_number = $request->main_account_number;
        $category_list->main_account_type = $request->main_account_type;
        $category_list->name_of_bank = $request->name_of_bank;
        $category_list->main_account_name_of_branch = $request->main_account_name_of_branch;
        $category_list->bank_address_main = $request->bank_address_main;

        if ($request->hasfile('change_ac_number')) {
            $file = $request->file('change_ac_number');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->change_ac_number = 'uploads/'.$filename;

        }

        if ($request->hasfile('copy_of_chalan')) {
            $file = $request->file('copy_of_chalan');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->copy_of_chalan = 'uploads/'.$filename;

        }

        if ($request->hasfile('due_vat_pdf')) {
            $file = $request->file('due_vat_pdf');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->due_vat_pdf = 'uploads/'.$filename;

        }
        $category_list->save();



        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');



        $add_renew_request = new Renew();
        $add_renew_request->ngo_id = $Ngorenewinfo_get_id;
        $add_renew_request->user_id = Auth::user()->id;
        $add_renew_request->main_time =$main_time;
        $add_renew_request->status = 'Ongoing';
        $add_renew_request->save();

        return redirect('/renew_page')->with('success','Renew Request Send Successfully');

    }
}
