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
use Session;
use App\Models\Fboneform;
use App\Models\Acounntotherinfo;
use App\Models\Bankaccount;
use App\Models\Fdoneformadviser;
use App\Models\Sourceoffund;
use App\Models\Fdoneform_staff;
use Response;
use App\Models\Ngomember;
use App\Models\Ngodoc;
use App\Models\Ngo_member_doc;
class RegsubmitController extends Controller
{
    public function reg_submit_list(){
        $get_date_fd_ngodoc_mem = Ngo_member_doc::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_ngodoc = Ngodoc::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_ngomember = Ngomember::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_eight = Ngo_committee_member::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_one = Fboneform::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_lan_one = Ngo_type_and_language::where('user_id',Auth::user()->id)->value('updated_at');
        $get_value_fd_one_one = Ngo_type_and_language::where('user_id',Auth::user()->id)->value('first_form_check_status');
        $get_value_fd_one_two = Ngo_type_and_language::where('user_id',Auth::user()->id)->value('second_form_check_status');


        $complete_status_fd_one = Fboneform::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_one_pdf = Fboneform::where('user_id',Auth::user()->id)->value('s_pdf');

        $complete_status_fd_eight = Ngo_committee_member::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_eight_pdf = Ngo_committee_member::where('user_id',Auth::user()->id)->value('s_pdf');


        return view('front.reg_submit_list',compact('complete_status_fd_eight_pdf','complete_status_fd_eight','complete_status_fd_one_pdf','complete_status_fd_one','get_value_fd_one_one','get_date_lan_one','get_date_fd_eight','get_date_fd_one','get_date_fd_ngodoc_mem','get_date_fd_ngodoc','get_date_fd_ngomember'));
    }
}
