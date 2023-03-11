<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo_type_and_language;
use App\Models\Ngo_committee_member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Response;
use App\Models\Ngomember;
use App\Models\Ngodoc;
use DateTime;
use DateTimezone;
class NgodocumentController extends Controller
{
    public function ngo_document(){

        $ngo_list_all = Ngodoc::where('user_id',Auth::user()->id)->latest()->get();

        if(count($ngo_list_all) == 0){

            return redirect('/ngo_document_create');

        }else{

        return view('front.ngo_doc.index',compact('ngo_list_all'));
        }
    }


    public function ngo_document_create(){

        return view('front.ngo_doc.create');

    }


    public function ngo_document_store(Request $request){
        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');
        //dd($request->all());

        // $this->validate($request,[
        //     'primary_portal'=>'required|mimes:pdf|max:10000',
        //     'attested_copy_of_constitution'=>'required|mimes:pdf|max:10000',
        //     'activity_report_of_the_organization'=>'required|mimes:pdf|max:10000',
        //     'receipt_of_donor'=>'required|mimes:pdf|max:10000',
        //     'attested_copy_of_minutes_of_general_meeting'=>'required|mimes:pdf|max:10000',

        //  ]);

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




         return redirect('/ngo_document')->with('success','Created Successfully');


    }


    public function ngo_document_download($id){

        $get_file_data = Ngodoc::where('id',$id)->value('primary_portal');

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


    public function delete($id)
    {

        $admins = Ngodoc::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function ngo_document_update(Request $request){
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


        return redirect('/ngo_document')->with('success','Created Successfully');


    }
}
