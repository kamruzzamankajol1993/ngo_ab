<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use App\Models\Namechange;
use App\Models\Renew;
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
class AuthController extends Controller
{

    public function password_change_confirmed(Request $request){

        $get_all_data = User::find($request->id);

        $get_all_data->password = Hash::make($request->password);

        $get_all_data->save();

          return redirect('/login')->with('success','Password Successfully Changed!');


    }

    public function password_reset_page($id){

$id = $id;

        return view('front.password_reset_page',compact('id'));


    }

    public function check_mail_from_list(Request $request){

        $type_email = $request->type_email;
        $data = User::where('email',$type_email)->value('email');



    // $data = view('backend.product.main_search_button_product',compact('product_list','total_serial_number','search'))->render();
     return response()->json($data);
     }


     public function send_mail_get_from_list(Request $request){

        $useremail = $request->email;

        $main_data = User::where('email',$useremail)->first();

        $id = $main_data->id;

        $email = $main_data->email;

        //dd($main_data->email);

        Mail::send('emails.passwordResetEmail', ['id' => $id], function($message) use($request){
            $message->to($request->email);
            $message->subject('Password Reset Email');
        });


        return redirect('/login')->with('success','Email Sent Successfully!');

}

    public function showLinkRequestForm(){

        return view('front.showLinkRequestForm');
    }
    public function index(){

        return view('front.login');
    }

    public function registration(){

        return view('front.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('success','You have Successfully logged in');
        }

        return redirect("login")->with('error','Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $data = $request->all();
        $createUser = $this->create($data);

        $token = Str::random(10);

        UserVerify::create([
              'user_id' => $createUser->id,
              'token' => $token
            ]);

        Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });


          return redirect("email_verify_page");



        //return redirect("dashboard")->with('success','Great! You have Successfully loggedin');
    }


    public function updateRegistration(Request $request){

        //dd($request->is_email_verified);
        $time_dy = time().date("Ymd");
        $get_previous_email_all = User::where('id',$request->id)->value('email');

        if($get_previous_email_all == $request->email){

            $get_all_data = User::find($request->id);
            $get_all_data->name = $request->name;
            $get_all_data->email = $request->email;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $time_dy.$file->getClientOriginalName();
                $filename = $extension;
                $file->move('public/uploads/', $filename);
                $get_all_data->image =  'public/uploads/'.$filename;

            }

            if ($request->password) {
                $get_all_data->password = Hash::make($request->password);
            }
          $get_all_data->save();

          if ($request->password) {

          Auth::logout();

          return Redirect('login')->with('success','Password Changed Login Again');
          }else{
            return Redirect()->back()->with('success','updated Successfully');
          }

        }else{


        $get_all_data = User::find($request->id);
        $get_all_data->name = $request->name;
        $get_all_data->email = $request->email;
        $get_all_data->is_email_verified = 0;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $get_all_data->image =  'public/uploads/'.$filename;

        }
        if ($request->password) {
            $get_all_data->password = Hash::make($request->password);
        }
      $get_all_data->save();

      $token = Str::random(10);

      UserVerify::where('user_id',$request->id)->delete();

      UserVerify::create([
        'user_id' => $request->id,
        'token' => $token
      ]);

  Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
        $message->to($request->email);
        $message->subject('Email Verification Mail');
    });

    Session::flush();
    Auth::logout();

    return Redirect('login')->with('success','Please Check Mail For Varification');;


        }




    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){

            $ngo_status_list = DB::table('ngostatuses')->where('user_id',Auth::user()->id)->value('status');

            if(empty($ngo_status_list) || $ngo_status_list == 'Ongoing'){


            return view('front.dashboard');

            }else{
                $name_change_list_r = Renew::where('user_id',Auth::user()->id)->get();
                $name_change_list = Namechange::where('user_id',Auth::user()->id)->get();

                $ngo_list_all_form_eight = Ngo_committee_member::where('user_id',Auth::user()->id)->first();

$ngo_list_all = Fboneform::where('user_id',Auth::user()->id)->first();
$form_member_data_doc = Ngo_member_doc::where('user_id',$ngo_list_all->user_id)->get();
$form_ngo_data_doc = Ngodoc::where('user_id',$ngo_list_all->user_id)->get();
$all_source_of_fund = Sourceoffund::where('user_id',$ngo_list_all->user_id)->get();
$get_all_data_other= Acounntotherinfo::where('user_id',$ngo_list_all->user_id)
            ->get();

                return view('front.accept_dashboard',compact('name_change_list_r','name_change_list','get_all_data_other','all_source_of_fund','form_ngo_data_doc','ngo_list_all_form_eight','ngo_list_all','form_member_data_doc'));
            }
        }

        return redirect("login")->with('error','Opps! You do not have access');
    }

    public function logout() {
        //Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect("email_verified_page");

      //return redirect()->route('login')->with('info', $message);
    }
}
