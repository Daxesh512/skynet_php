<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Setting;
use App\Models\Language;
use App\Helpers\MailSend;
use App\Models\Visibility;
use App\Models\Emailsetting;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class RegisterController extends Controller
{
    public $lang_id;
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $this->lang_id = $currlang->id;

        $setting = Setting::first();
        Config::set('captcha.sitekey', $setting->google_recaptcha_site_key);
        Config::set('captcha.secret', $setting->google_recaptcha_secret_key);

    }

    public function showRegisterForm()
    {
       
        return view('user.register');
    }

    public function register(Request $request)
    {
       
        $emailsetting = Emailsetting::first();

        $request->validate([
            'name' => 'required:string|max:90',
            'username' => 'required:string|max:25|unique:users,username',
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $visibility = Visibility::first();

        if ($visibility->is_recaptcha == 1) {
            $messages = [
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
                'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            ];
        }

        if ($visibility->is_recaptcha == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
            $request->validate($rules, $messages);
        }

        


            $user = new User;

            $user->username = $request->username;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $token = md5(time().$request->username.$request->email);
            $user->email_verify_token = $token ;
            $user->save();

            if($emailsetting->is_verification_email == 1)
            {
          
                $mail = new PHPMailer(true);
                $em = Emailsetting::first();
                if ($em->is_smtp == 1) {
                    try {
                        $mail->isSMTP();
                        $mail->Host       = $em->smtp_host;
                        $mail->SMTPAuth   = true;
                        $mail->Username   = $em->smtp_user;
                        $mail->Password   = $em->smtp_pass;
                        $mail->SMTPSecure = $em->email_encryption;
                        $mail->Port       = $em->smtp_port;
        
                        //Recipients
                        $mail->setFrom($em->from_email, $em->from_name);
                        $mail->addAddress($request->email);
        
                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = "Verify your email address.";
                        $mail->Body    = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".route('user.register.token',$token).">Simply click here to verify. </a>";
        
                        $mail->send();

                        return redirect(route('user.login'))->with('success',__('We need to verify your email address. We have sent an email to'). ' '.$request->email. ' '  .__('to verify your email address. Please click link in that email to continue.'));

                    } catch (Exception $e) {
                        // die($e->getMessage());
                    }
                } else {
                    try {
                        //Recipients
                        $mail->setFrom($em->from_email, $em->from_name);
                        $mail->addAddress($request->email);
        
        
                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = "Verify your email address.";
                        $mail->Body    = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".route('user.register.token',$token).">Simply click here to verify. </a>";
        
                        $mail->send();

                        return redirect(route('user.login'))->with('success',__('We need to verify your email address. We have sent an email to'). ' '.$request->email. ' '  .__('to verify your email address. Please click link in that email to continue.'));

                    } catch (Exception $e) {
                        // die($e->getMessage());
                    }
                }
            }
    }

    public function token($token)
    {


       $emailsetting = Emailsetting::first();

    if($emailsetting->is_verification_email == 1)
    {
        $user = User::where('email_verify_token',$token)->first();
        if(isset($user))
        {
            $user->email_verified = 'Yes';
            $user->update();
            Auth::guard('web')->login($user);
            
            $notification = array(
            'messege' => 'Email Verified Successfully',
            'alert' => 'success'
        );
        return redirect(route('user.dashboard'))->with('notification', $notification);
        }
        
        }else {
                return redirect()->back();
        }
    }
}