<?php

namespace App\Http\Controllers\User;

use App\Models\Setting;
use App\Models\Language;
use App\Models\Visibility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
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

  public function showLoginForm()
  {

    $url = url()->previous();
    $url = (explode('/', $url));
    if (in_array('checkout', $url)) {
      session(['link' => url()->previous()]);
    }

    return view('user.login');
  }

  public function login(Request $request)
  {

    if (Session::has('link')) {
      $redirectUrl = Session::get('link');
      Session::forget('link');
    } else {
      $redirectUrl = route('user.dashboard');
    }


    //--- Validation Section
    if (session()->has('lang')) {
      $currentLang = Language::where('code', session()->get('lang'))->first();
    } else {
      $currentLang = Language::where('is_default', 1)->first();
    }


    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
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




    // Attempt to log the user in
    if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
      // if successful, then redirect to their intended location

      // Check If Email is verified or not
      if (Auth::guard('web')->user()->email_verified == 'NO') {
        Auth::guard('web')->logout();
        return back()->with('error', __('Your Email is not Verified!'));
      }

      if (Auth::guard('web')->user()->status == '0') {
        Auth::guard('web')->logout();
        return back()->with('error', __('Your account has been banned'));
      }

      return redirect($redirectUrl);
    }
    return back()->with('error', __("Credentials Doesn't Match !"));
  }

  public function logout()
  {
    Auth::guard('web')->logout();
    return redirect('/');
  }

}