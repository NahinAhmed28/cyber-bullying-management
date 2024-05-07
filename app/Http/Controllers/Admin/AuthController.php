<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;
    public function __construct()
    {

    }

    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email'
        ]);
        return $request->all();
    }


    public function login()
    {
        // $otp = random_int(100000, 999999);
        // $message = "Your otp is {$otp}";
        // $respose = self::get_course_data("01712616057", $message);
        // dd($respose);
        return view('admin.auth.login');
    }

    public function otp_update($request)
    {
        //dd($request);
        $admin = Admin::where(['email'=>$request['email']])->orWhere(['username'=>$request['email']])->first();
        if ($admin->is_otp) {
            $otp = random_int(100000, 999999);
            $message = "Your otp is {$otp}";
            $respose = self::get_course_data($admin->contact, $message);
            //dd($respose);
            $otps = true;
            Session::put(['otp'=>$otp, 'otps'=>$otps, 'email'=>$request['email'], 'password'=>$request['password']]);
            DB::table('admins')->where(['email'=>$request['email']])->update(['otp'=>$otp]);
            self::logout($request);
            //return redirect()->route('admin.login');
        }


    }

    public function loginotpStore(Request $request)
    {
        
        $email = Session::get('email');
        $password = Session::get('password');
        //dd($request->all());
        $count = Admin::where(['email'=>$email])->where(['otp'=>$request['otp']])->count();
        //dd($count);
        if ($count == 0) {
            //Session::forget(['otps','otp','email','password']);
            $message = (app()->getLocale() == 'en') ? "OTP does not match" : "ওটিপি মেলে না";
            Session::flash('error', $message);
            if(!Session::get('check_count')){
                Session::put(['check_count'=> 1]);
            }elseif(Session::get('check_count') == 1){
                Session::put(['check_count'=> 2]);
            }
            return redirect()->route('admin.login');
        }

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $request->get('remember'))) {
            Session::forget(['otps','otp','email','password']);
            return redirect()->intended('/admin/dashboard');
        }elseif (Auth::guard('admin')->attempt(['username' => $email, 'password' => $password], $request->get('remember'))) {
            Session::forget(['otps','otp','email','password']);
            return redirect()->intended('/admin/dashboard');
        }
    }

    public function loginStore(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
        ]);

        $admin = Admin::where(['email'=>$request['email']])->orWhere(['username'=>$request['email']])->first();

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            //Cache::forget('locWiseAuthUserInfo');
            if ($admin->is_otp) {
                self::otp_update($request);
                $message = (app()->getLocale() == 'en') ? "Check OTP on your contact number and use this OTP to login" : "আপনার যোগাযোগ নম্বরে ওটিপি চেক করুন এবং লগইন করতে এই ওটিপি ব্যবহার করুন";
                Session::flash('success', $message);
            }
            return redirect()->intended('/admin/dashboard');
            //return Redirect::route('admin.dashboard');
        }elseif (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            //Cache::forget('locWiseAuthUserInfo');
            if ($admin->is_otp) {
                self::otp_update($request);
                $message = (app()->getLocale() == 'en') ? "Check OTP on your contact number and use this OTP to login" : "আপনার যোগাযোগ নম্বরে ওটিপি চেক করুন এবং লগইন করতে এই ওটিপি ব্যবহার করুন";
                Session::flash('success', $message);
            }
            return redirect()->intended('/admin/dashboard');
        }
        $message = (app()->getLocale() == 'en') ? "email or password does not match" : "ইমেইল বা পাসওয়ার্ড মেলে না";
        Session::flash('error', $message);
        return back()->withInput($request->only('email', 'remember'));
    }

    public function changePassword(Request $request, $id)
    {
        //$this->authorize('change_password',Admin::class);
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        
        try {
            $data['password'] = Hash::make($request->password);
            Admin::findOrFail($id)->update($data);
        } catch (\Throwable $exception) {
            return back()->with([
                //'error' => __('admin.common.error'),
                'error' => $exception->getMessage(),
                'alert-type' => 'error'
              ]);
        }

        return back()->with([
            'message' => __('admin.common.success'),
            'alert-type' => 'success'
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        //return "Hello";
        //Auth::guard('web')->logout();
        //Session::forget(['otps','otp']);
        $this->guard('admin')->logout();
        //$request->session()->invalidate();
        //$request->session()->regenerateToken();
        return redirect('admin/login');
    }

    public function get_course_data($to_user, $message){
        // https://smpp.ajuratech.com:7790/sendtext?apikey=3b53259926ded3cc&secretkey=621b1f91
        // &callerID=1234&toUser=01712616057&messageContent=Hello-Ringku-This-is-for-testing-purpose
        //$url = "https://smpp.ajuratech.com:7790/sendtext";
    
        //$url = http://api.greenweb.com.bd/api.php?token=170012292216974377621bb05a00377291fa7a45d5cf322fff3b&to=01712616057&message=this is test message
    
        $url = env('SMS_URL');
        $curl = curl_init();
        $fields = array(
          //'apikey' => env('API_KEY'),
          //'secretkey' => env('SECRET_KEY'),
          //'callerID' => env('CALLER_ID'),
          'token' => env('TOKEN'),
          //'token' => "170012292216974377621bb05a00377291fa7a45d5cf322fff3b",
          'to' => $to_user,
          'message' => $message
        );
    
        $fields_string = http_build_query($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $course_data = curl_exec($curl);
        curl_close($curl);
        return $jsonArrayResponse = $course_data;
        return $jsonArrayResponse = json_decode($course_data);
      }

    

}
