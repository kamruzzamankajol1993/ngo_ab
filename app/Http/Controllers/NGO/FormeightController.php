<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo_type_and_language;
use App\Models\Ngo_committee_member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
class FormeightController extends Controller
{


    public function form_8_ngo_committee_member_pdf(){

        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

      $file_Name_Custome = 'form_eight';

      $all_partiw = Ngo_committee_member::where('user_id',Auth::user()->id)

      ->get();

      $all_partiw_form_date = Ngo_committee_member::where('user_id',Auth::user()->id)

      ->value('form_date');

      $all_partiw_to_date = Ngo_committee_member::where('user_id',Auth::user()->id)

      ->value('to_date');

      $all_partiw_total_year = Ngo_committee_member::where('user_id',Auth::user()->id)

      ->value('total_year');

      if(session()->get('locale') == 'en'){


      $pdf=PDF::loadView('front.form.form_eight.form_8_ngo_committee_member_pdf',[
        'all_partiw_form_date'=>$all_partiw_form_date,
        'all_partiw_to_date'=>$all_partiw_to_date,
        'all_partiw_total_year'=>$all_partiw_total_year,
        'all_partiw'=>$all_partiw,
        'engDATE'=>$engDATE,
        'bangDATE'=>$bangDATE


    ],[],['format' => 'A4-L','orientation' => 'L']);
return $pdf->stream($file_Name_Custome.''.'.pdf');
      }else{


        $pdf=PDF::loadView('front.form.form_eight.form_8_ngo_committee_member_pdf_english',[
            'all_partiw_form_date'=>$all_partiw_form_date,
            'all_partiw_to_date'=>$all_partiw_to_date,
            'all_partiw_total_year'=>$all_partiw_total_year,
            'all_partiw'=>$all_partiw,
            'engDATE'=>$engDATE,
            'bangDATE'=>$bangDATE


        ],[],['format' => 'A4-L','orientation' => 'L']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');


      }


    }

    public function form_8_ngo_committee_member_totalview(Request $request){




        $start_date_one = date("d/m/Y", strtotime($request->form_date));
        //dd($request->start_date_one);

        $end_date_one = date("d/m/Y", strtotime($request->to_date));

        $startDate = Carbon::createFromFormat('d/m/Y', $start_date_one);
        $endDate = Carbon::createFromFormat('d/m/Y', $end_date_one);





        $all_partiw = Ngo_committee_member::where('user_id',Auth::user()->id)->whereBetween(DB::raw('DATE(created_at)'), [$request->form_date, $request->to_date])->get();


                        if(count($all_partiw) > 0){

                            $users_update = Ngo_committee_member::where('user_id',Auth::user()->id)
                            ->whereNull('form_date')
                            ->update([
                                'form_date' => $start_date_one,
                                'to_date' => $end_date_one,
                                'total_year' => $request->total_year,
                                'complete_status'=>'complete'
                             ]);



                        }

                        //dd($users);






        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );

        $complete_status_fd_eight_id = Ngo_committee_member::where('user_id',Auth::user()->id)->value('id');
        $complete_status_fd_eight = Ngo_committee_member::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_eight_pdf = Ngo_committee_member::where('user_id',Auth::user()->id)->value('s_pdf');

        return view('front.form.form_eight.form_8_ngo_committee_member_totalview',compact('complete_status_fd_eight_id','complete_status_fd_eight','complete_status_fd_eight_pdf','all_partiw','engDATE','bangDATE'));
    }

    public function form_8_ngo_committee_total_year(Request $request){

        $datetime1 = new DateTime($request->form_date);
    $datetime2 = new DateTime($request->to_date);
    $difference = $datetime1->diff($datetime2);

    $vv = ($difference->m)+1;

    $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );

        if(session()->get('locale') == 'en'){

            $data = $difference->y.' বছর '.$vv.' মাস ';
        }else{
       $data = $difference->y.' years '.$vv.' months ';
        }
     return $data;
     }

     public function form_8_ngo_committee_member_view_from_edit(){
        $all_data_list = Ngo_committee_member::where('user_id',Auth::user()->id)->latest()->get();
        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );
        return view('front.form.form_eight.form_8_ngo_committee_member',compact('bangDATE','engDATE','all_data_list'));

     }

    public function form_8_ngo_committee_member(){

        $all_partiw12 = Ngo_committee_member::where('user_id',Auth::user()->id)->value('complete_status');

        if(empty($all_partiw12)){



            $all_data_list = Ngo_committee_member::where('user_id',Auth::user()->id)->latest()->get();
            $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
            'May','June','July','August','September','October','November','December','Saturday','Sunday',
            'Monday','Tuesday','Wednesday','Thursday','Friday');
            $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
            'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
            বুধবার','বৃহস্পতিবার','শুক্রবার'
            );
            if(count($all_data_list) == 0){

                return redirect('/form_8_ngo_committee_member_create');

            }else{

            return view('front.form.form_eight.form_8_ngo_committee_member',compact('bangDATE','engDATE','all_data_list'));
            }
        }else{


            $complete_status_fd_eight_id = Ngo_committee_member::where('user_id',Auth::user()->id)->value('id');
            $complete_status_fd_eight = Ngo_committee_member::where('user_id',Auth::user()->id)->value('complete_status');
            $complete_status_fd_eight_pdf = Ngo_committee_member::where('user_id',Auth::user()->id)->value('s_pdf');


            $all_partiw = Ngo_committee_member::where('user_id',Auth::user()->id)

            ->get();

            $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
            'May','June','July','August','September','October','November','December','Saturday','Sunday',
            'Monday','Tuesday','Wednesday','Thursday','Friday');
            $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
            'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
            বুধবার','বৃহস্পতিবার','শুক্রবার'
            );

            return view('front.form.form_eight.form_8_ngo_committee_member_totalview',compact('complete_status_fd_eight_id','complete_status_fd_eight','complete_status_fd_eight_pdf','all_partiw','engDATE','bangDATE'));


        }


    }


    public function form_8_ngo_committee_member_edit($id){
        $all_data_list = Ngo_committee_member::where('name_slug',$id)->first();

        return view('front.form.form_eight.form_8_ngo_committee_member_edit',compact('all_data_list'));

    }


    public function form_8_ngo_committee_member_create(){

        return view('front.form.form_eight.form_8_ngo_committee_member_create');
    }



    public function upload_from_eight_pdf(Request $request){

        $time_dy = time().date("Ymd");

        $category_list =Ngo_committee_member::find($request->id);
        if ($request->hasfile('s_pdf')) {
            $file = $request->file('s_pdf');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->s_pdf =  'uploads/'.$filename;

        }
        $category_list->save();


        return redirect('/form_8_ngo_committee_member')->with('success','Uploaded Successfully');
    }



    public function form_8_ngo_committee_member_store(Request $request){
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


        return redirect('/form_8_ngo_committee_member')->with('success','Created Successfully');

    }


    public function form_8_ngo_committee_member_update(Request $request){
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


        return redirect('/form_8_ngo_committee_member')->with('info','Updated Successfully');


    }

    public function delete($id)
    {

        $admins = Ngo_committee_member::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function form_8_ngo_committee_member_view(Request $request){

        //dd($request->id_for_pass);

        $all_data_list = Ngo_committee_member::where('id',$request->id_for_pass)->first();

        return view('front.form.form_eight.form_8_ngo_committee_member_view',compact('all_data_list'));


    }
}
