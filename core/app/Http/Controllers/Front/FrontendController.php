<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use App\Models\Job;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Quote;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Archive;
use App\Models\Counter;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\History;
use App\Models\Package;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Bcategory;
use App\Models\Gcategory;
use App\Models\Jcategory;
use App\Models\Portfolio;
use App\Models\WhySelect;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use App\Models\Daynamicpage;
use App\Models\Emailsetting;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\PortfolioImage;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use App\Models\Ebanner;
use App\Models\Eslider;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Visibility;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;

class FrontendController extends Controller
{

    public function __construct()
    {
        $commonsetting = Setting::where('id', 1)->first();


        Config::set('captcha.sitekey', $commonsetting->google_recaptcha_site_key);
        Config::set('captcha.secret', $commonsetting->google_recaptcha_secret_key);


    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        Session::flash('success', 'Cache, route, view, config cleared successfully!');
        return back();

    }

    // Home Page Funtions
    public function index()
    {


        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }




        $setting = Setting::where('language_id', $currlang->id)->first();

        if ($setting->theme_version == 'theme9') {
            $data['esliders'] = Eslider::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'desc')->get();
            $data['products'] = Product::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'desc')->limit(8)->get();
            $data['ebanners'] = Ebanner::where('language_id', $currlang->id)->orderBy('id', 'desc')->limit(2)->get();
            $data['popularCategories'] = ProductCategory::where('status', 1)->where('is_popular', 1)->where('language_id', $currlang->id)->orderBy('id', 'desc')->get();
            $data['featuredCategories'] = ProductCategory::with('products')->where('status', 1)->where('is_feature', 1)->where('language_id', $currlang->id)->orderBy('id', 'desc')->get();
        } else {
            $data['sliders'] = Slider::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
            $data['features'] = Feature::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
            $data['services'] = Service::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->limit(6)->get();
            $data['why_selects'] = WhySelect::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
            $data['portfolios'] = Portfolio::with('service')->where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->limit(8)->get();
            $data['teams'] = Team::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->limit(8)->get();
            $data['faqs'] = Faq::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
            $data['counters'] = Counter::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
            $data['blogs'] = Blog::where('status', 1)->where('language_id', $currlang->id)->limit(3)->get();
            $data['clients'] = Client::where('status', 1)->where('language_id', $currlang->id)->get();
            $data['testimonials'] = Testimonial::where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
        }

        return view('front.index', $data);
    }


    //Faq page
    public function faq()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $faqs = Faq::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
        return view('front.faq', compact('faqs'));
    }

    //About page
    public function about()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['features'] = Feature::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
        $data['why_selects'] = WhySelect::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
        $data['histories'] = History::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();

        return view('front.about', $data);
    }

    //service page
    public function service()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['services'] = Service::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();

        return view('front.service', $data);
    }

    public function service_details($slug)
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['service'] = Service::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $data['all_services'] = Service::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();

        return view('front.service-details', $data);
    }

    //Portfolio page
    public function portfolio(Request $request)
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $category = $request->category;
        $catid = null;
        if (!empty($category)) {
            $data['category'] = Service::where('slug', $category)->firstOrFail();
            $catid = $data['category']->id;
        }
        $data['all_services'] = Service::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();


        $data['portfolios'] = Portfolio::where('status', 1)->where('language_id', $currlang->id)
            ->when($catid, function ($query, $catid) {
                return $query->where('service_id', $catid);
            })
            ->orderBy('serial_number', 'asc')->paginate(8);

        return view('front.portfolio', $data);
    }

    public function portfolio_details($slug)
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['portfolio'] = Portfolio::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $data['portfolio_images'] = PortfolioImage::where('portfolio_id', $data['portfolio']->id)->get();

        return view('front.portfolio-details', $data);
    }

    // Gallery Page
    public function gallery(Request $request)
    {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['gcategories'] = Gcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();
        $data['galleries'] = Gallery::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();




        return view('front.gallery', $data);
    }


    // Career Page    
    public function career(Request $request)
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $category = $request->category;
        $catid = null;
        if (!empty($category)) {
            $data['category'] = Jcategory::where('slug', $category)->firstOrFail();
            $catid = $data['category']->id;
        }
        $term = $request->term;

        $data['jcategories'] = Jcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'desc')->get();

        $data['alljobs'] = Job::where('status', 1)->where('language_id', $currlang->id)->get();

        $data['jobs'] = Job::where('status', 1)->where('language_id', $currlang->id)
            ->when($catid, function ($query, $catid) {
                return $query->where('jcategory_id', $catid);
            })
            ->when($term, function ($query, $term) {
                return $query->where('title', 'like', '%' . $term . '%');
            })
            ->orderBy('id', 'desc')->paginate(10);

        return view('front.job', $data);
    }


    // Career  Details Page   
    public function careerdetails($slug)
    {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $alljobs = Job::where('status', 1)->where('language_id', $currlang->id)->get();
        $job = Job::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $jcategories = Jcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();

        return view('front.jobdetails', compact('job', 'jcategories', 'alljobs'));
    }

    // Job Apply Route
    public function job_apply(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'file' => 'required|mimes:pdf,PDF',
        ]);

        if (JobApplication::where('email', $request->email)->exists()) {
            Session::flash('warning', __('Job Apply Allready Submitted'));
            return back();
        }

        $application = new JobApplication();


        $file = $request->file('file');
        $pdf = Str::random() . $request->name . '.' . $file->getClientOriginalExtension();

        $file->move('assets/front/application/', $pdf);

        $job = Job::findOrFail($request->job_id);


        $application->status = '0';
        $application->job_title = $job->title;
        $application->type = $job->position;
        $application->phone = $request->phone;
        $application->file = $pdf;
        $application->name = $request->name;
        $application->email = $request->email;
        $application->message = $request->message;
        $application->expected_salary = $request->expected_salary;
        $application->save();


        Session::flash('success', 'Job Apply Submit Successfully');
        return back();

    }

    //package page
    public function package()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['plans'] = Package::where('status', 1)->where('language_id', $currlang->id)->orderBy('serial_number', 'asc')->get();

        return view('front.package', $data);
    }



    //team page
    public function team()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['teams'] = Team::where('language_id', $currlang->id)->where('status', 1)->orderBy('serial_number', 'asc')->paginate(6);

        return view('front.team', $data);
    }

    public function team_details($id)
    {

        $team = Team::find($id);

        return view('front.team-details', compact('team'));
    }

    //contact page
    public function contact()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['sectionInfo'] = Sectiontitle::where('language_id', $currlang->id)->first();
        $data['socials'] = Social::all();

        return view('front.contact', $data);
    }
    public function contactSubmit(Request $request)
    {



        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
            'subject' => 'required|string',
        ]);

        $visibility = Visibility::first();


        if ($visibility->is_recaptcha == 1) {
            $messages = [
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
                'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            ];
            $rules['g-recaptcha-response'] = 'required|captcha';

            $request->validate($rules, $messages);
        }


        // Login Section
        $cs = Setting::first();
        $contactemail = $cs->contactemail;
        $name = $request->name;
        $fromemail = $request->email;
        $number = $request->phone;
        $subject = $request->subject;
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
                $mail->setFrom($fromemail, $name);
                $mail->addAddress($contactemail);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = "Name: " . $name . "<br> Email: " . $fromemail . "<br> Phone: " . $number . "<br> Message: " . $request->message;

                $mail->send();
            } catch (Exception $e) {
                // die($e->getMessage());
            }
        } else {
            try {
                //Recipients
                $mail->setFrom($fromemail, $name);
                $mail->addAddress($contactemail);


                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = "Name: " . $name . "<br> Email: " . $fromemail . "<br> Phone: " . $number . "<br> Message: " . $request->message;

                $mail->send();
            } catch (Exception $e) {
                // die($e->getMessage());
            }
        }

        Session::flash('success', 'Mail send successfully');
        return redirect()->back();

    }

    // Blog Page  Funtion
    public function blogs(Request $request)
    {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }


        $category = $request->category;
        $catid = null;
        if (!empty($category)) {
            $data['category'] = Bcategory::where('slug', $category)->firstOrFail();
            $catid = $data['category']->id;
        }

        $term = $request->term;
        $month = $request->month;
        $year = $request->year;

        if (!empty($month) && !empty($year)) {
            $archive = true;
        } else {
            $archive = false;
        }

        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();

        $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(4)->get();
        $archives = Archive::orderBy('id', 'DESC')->get();

        $blogs = Blog::where('status', 1)->where('language_id', $currlang->id)
            ->when($catid, function ($query, $catid) {
                return $query->where('bcategory_id', $catid);
            })
            ->when($term, function ($query, $term) {
                return $query->where('title', 'like', '%' . $term . '%');
            })
            ->when($archive, function ($query) use ($month, $year) {
                return $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
            })
            ->orderBy('serial_number', 'asc')->paginate(5);

        return view('front.blogs', compact('blogs', 'bcategories', 'latestblogs', 'archives'));
    }

    // Blog Details  Funtion
    public function blogdetails($slug)
    {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $blog = Blog::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(4)->get();
        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        $archives = Archive::orderBy('id', 'DESC')->get();

        return view('front.blogdetails', compact('blog', 'bcategories', 'latestblogs', 'archives'));
    }

    // Front Daynamic Page Function
    public function front_dynamic_page($slug)
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $front_daynamic_page = Daynamicpage::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();

        return view('front.daynamicpage', compact('front_daynamic_page'));
    }

    // Front Quote Page Function
    public function quote()
    {
        return view('front.quote');
    }

    public function quote_submit(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string',
            'description' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,zip',
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




        $quote = new Quote();

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $newfile = time() . rand() . '.' . $extension;
            $file->move('assets/front/quote/', $newfile);

            $quote->file = $newfile;
        }

        $quote->name = $request->name;
        $quote->email = $request->email;
        $quote->phone = $request->phone;
        $quote->skypenumber = $request->skypenumber;
        $quote->country = $request->country;
        $quote->budget = $request->budget;
        $quote->subject = $request->subject;
        $quote->description = $request->description;
        $quote->save();

        Session::flash('success', 'Quote send successfully');
        return redirect()->back();

    }

    public function slider_overlay()
    {
        return view('front.slider');
    }

    // Change Language
    public function changeLanguage($lang)
    {

        session()->put('lang', $lang);

        app()->setLocale($lang);

        return redirect()->route('front.index');
    }

    // Change Currency
    public function changeCurrency($currency)
    {


        session()->put('currency', $currency);


        return redirect()->back();
    }

}