<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo_type_and_language;
use App\Models\Ngo_committee_member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Ngomember;
use DateTime;
use DateTimezone;
class NgomemberController extends Controller
{
    public function ngo_member(){

        $all_data_list = Ngomember::where('user_id',Auth::user()->id)->latest()->get();

        if(count($all_data_list) == 0){

            return redirect('/ngo_member_create');

        }else{

        return view('front.ngomember.index',compact('all_data_list'));
        }
    }

    public function ngo_member_create(){
        return view('front.ngomember.create');

    }

    public function ngo_member_edit($id){
        $all_data_list = Ngomember::where('name_slug',$id)->first();

        return view('front.ngomember.edit',compact('all_data_list'));

    }

    public function ngo_member_store(Request $request){
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


        return redirect('/ngo_member')->with('success','Created Successfully');
    }


    public function ngo_member_update(Request $request){
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


        return redirect('/ngo_member')->with('success','Created Successfully');


    }


    public function delete($id)
    {

        $admins = Ngomember::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function ngo_member_view(Request $request){

        //dd($request->id_for_pass);

        $all_data_list = Ngomember::where('id',$request->id_for_pass)->first();

        return view('front.ngomember.view',compact('all_data_list'));


    }
}
