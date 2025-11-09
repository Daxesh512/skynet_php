<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Setting;
use App\Models\Language;
use App\Helpers\MailSend;
use Illuminate\Support\Str;
use App\Models\Emailsetting;
use Illuminate\Http\Request;
use App\Classes\GeniusMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class ForgotController extends Controller
{

    public $lang_id;
    public function __construct()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }
        $this->lang_id = $currlang->id;
        $this->middleware('guest');
    }


    public function showForgotForm()
    {
        return view('user.forgot');
    }

    public function forgot(Request $request)
    {


        if (User::where('email', '=', $request->email)->count() > 0) {
            // user found
            $admin = User::where('email', '=', $request->email)->firstOrFail();
            $autopass = Str::random(8);
            $password = bcrypt($autopass);
            $admin->update([
                'password' => $password
            ]);



            $mail = new PHPMailer(true);
            $em = Emailsetting::first();
            if ($em->is_smtp == 1) {
                try {
                    $mail->isSMTP();
                    $mail->Host = $em->smtp_host;
                    $mail->SMTPAuth = true;
                    $mail->Username = $em->smtp_user;
                    $mail->Password = $em->smtp_pass;
                    $mail->SMTPSecure = $em->email_encryption;
                    $mail->Port = $em->smtp_port;

                    //Recipients
                    $mail->setFrom($em->from_email, $em->from_name);
                    $mail->addAddress($request->email);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Reset Password Request";
                    $mail->Body = "Your New Password is : " . $autopass;

                    $mail->send();

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
                    $mail->Subject = "Reset Password Request";
                    $mail->Body = "Your New Password is : " . $autopass;

                    $mail->send();

                } catch (Exception $e) {
                    // die($e->getMessage());
                }
            }


            Session::flash('mailsuccess', __('Your Password Reseted Successfully. Please Check your email for new Password.'));
            return back();
        } else {
            // user not found
            Session::flash('mailsuccess', 'No Account Found With This Email.');
            return back();
        }
    }


}
