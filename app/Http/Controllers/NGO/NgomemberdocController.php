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
use App\Models\Ngodoc;
use App\Models\Ngo_member_doc;
use Response;
use DateTime;
use DateTimezone;
class NgomemberdocController extends Controller
{
    public function ngo_member_document(){

        $all_ngo_member_doc = Ngo_member_doc::where('user_id',Auth::user()->id)->latest()->get();

        if(count($all_ngo_member_doc) == 0){

            return redirect('/ngo_member_document_create');

        }else{

        return view('front.ngo_member_doc.index',compact('all_ngo_member_doc'));
        }
    }


    public function ngo_member_document_create(){


        return view('front.ngo_member_doc.create');


    }


    public function ngo_member_document_store(Request $request){
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

       return redirect('/ngo_member_document')->with('success','Created Successfully');

    }


    public function ngo_member_document_update(Request $request){


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

            return redirect('/ngo_member_document')->with('info','Updated Successfully');


    }


    public function delete($id)
    {

        $admins = Ngo_member_doc::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function ngo_member_document_download($id){

        $get_file_data = Ngo_member_doc::where('id',$id)->value('person_nid_copy');

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
}
