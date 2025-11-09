<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\WhySelect;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{   
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    // Who we are section
    public function w_w_a(Request $request){
        
        $lang = Language::where('code', $request->language)->first()->id;
     
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.who-we-are.index', compact('static'));
    }

    // Who we are section update
    public function w_w_a_update(Request $request, $id){

        $request->validate([
            'w_we_are_title' => 'required|max:250',
            'w_we_are_sub_title' => 'required|max:250',
            'w_we_are_text' => 'required',
        ]);
        $st = Sectiontitle::where('language_id', $id)->first();

        $st->w_we_are_title = $request->w_we_are_title;
        $st->w_we_are_sub_title = $request->w_we_are_sub_title;
        $st->w_we_are_text = $request->w_we_are_text;
        $st->save();

        $notification = array(
            'messege' => 'Who We Are Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.w_w_a').'?language='.$this->lang->code)->with('notification', $notification);

    }

    // About Section
    public function about_section(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
     
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.about.index', compact('static'));
    }

    // About section update
    public function about_section_update(Request $request, $id){

        $request->validate([
            'about_title' => 'required|max:250',
            'about_sub_title' => 'required|max:250',
            'about_intro_video' => 'required|max:250',
            'about_experince_yers' => 'required|numeric',
            'about_text' => 'required',
            'about_image' => 'mimes:jpeg,jpg,png',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('about_image')){
            @unlink('assets/front/img/'. $st->about_image);
            $file = $request->file('about_image');
            $extension = $file->getClientOriginalExtension();
            $about_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $about_image);

            $st->about_image = $about_image;
        }

        $st->about_title = $request->about_title;
        $st->about_sub_title = $request->about_sub_title;
        $st->about_intro_video = $request->about_intro_video;
        $st->about_experince_yers = $request->about_experince_yers;
        $st->about_text = $request->about_text;
        $st->about_text = $request->about_text;
        $st->save();

        $notification = array(
            'messege' => 'About Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.about_section').'?language='.$this->lang->code)->with('notification', $notification);

    }

    // Intro Video Section
    public function intro_video(Request $request){
        
        $lang = Language::where('code', $request->language)->first()->id;
     
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.intro-video.index', compact('static'));
    }

    // Intro Video Section Update
    public function intro_video_update(Request $request, $id){

        $request->validate([
            'video_title' => 'required|max:250',
            'video_sub_title' => 'required|max:250',
            'video_text' => 'required|max:250',
            'video_link' => 'required',
            'video_content' => 'required',
            'video_bg_image' => 'mimes:jpeg,jpg,png',
            'video_image_left' => 'mimes:jpeg,jpg,png',
            'video_image_right' => 'mimes:jpeg,jpg,png',
            'video_image' => 'mimes:jpeg,jpg,png',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('video_bg_image')){
            @unlink('assets/front/img/'. $st->video_bg_image);
            $file = $request->file('video_bg_image');
            $extension = $file->getClientOriginalExtension();
            $video_bg_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $video_bg_image);

            $st->video_bg_image = $video_bg_image;
        }

        if($request->hasFile('video_image_left')){
            @unlink('assets/front/img/'. $st->video_image_left);
            $file = $request->file('video_image_left');
            $extension = $file->getClientOriginalExtension();
            $video_image_left = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $video_image_left);

            $st->video_image_left = $video_image_left;
        }

        if($request->hasFile('video_image_right')){
            @unlink('assets/front/img/'. $st->video_image_right);
            $file = $request->file('video_image_right');
            $extension = $file->getClientOriginalExtension();
            $video_image_right = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $video_image_right);

            $st->video_image_right = $video_image_right;
        }

        if($request->hasFile('video_image')){
            @unlink('assets/front/img/'. $st->video_image);
            $file = $request->file('video_image');
            $extension = $file->getClientOriginalExtension();
            $video_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $video_image);

            $st->video_image = $video_image;
        }

        $st->video_title = $request->video_title;
        $st->video_sub_title = $request->video_sub_title;
        $st->video_text = $request->video_text;
        $st->video_link = $request->video_link;
        $st->video_content = $request->video_content;
        $st->save();

        $notification = array(
            'messege' => 'Intor Video Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.intro_video').'?language='.$this->lang->code)->with('notification', $notification);
    }


    // Why Choose us Section
    public function why_chooseus(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
     
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();
        $why_selects = WhySelect::where('language_id', $lang)->orderBy('id', 'DESC')->get();

        return view('admin.home.why-choose-us.index', compact('static', 'why_selects'));
    }

    // Why Choose us Update
    public function why_chooseus_update(Request $request, $id){
        $request->validate([
            'w_c_us_title' => 'required|max:250',
            'w_c_us_sub_title' => 'required|max:250',
            'w_c_us_image1' => 'mimes:jpeg,jpg,png',
            'w_c_us_image2' => 'mimes:jpeg,jpg,png',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('w_c_us_image1')){
            @unlink('assets/front/img/'. $st->w_c_us_image1);
            $file = $request->file('w_c_us_image1');
            $extension = $file->getClientOriginalExtension();
            $w_c_us_image1 = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $w_c_us_image1);

            $st->w_c_us_image1 = $w_c_us_image1;
        }

        if($request->hasFile('w_c_us_image2')){
            @unlink('assets/front/img/'. $st->w_c_us_image2);
            $file = $request->file('w_c_us_image2');
            $extension = $file->getClientOriginalExtension();
            $w_c_us_image2 = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $w_c_us_image2);

            $st->w_c_us_image2 = $w_c_us_image2;
        }

        $st->w_c_us_title = $request->w_c_us_title;
        $st->w_c_us_sub_title = $request->w_c_us_sub_title;
        $st->save();

        $notification = array(
            'messege' => 'Why Choose Us Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.why_chooseus').'?language='.$this->lang->code)->with('notification', $notification);
    }

    // Service Section
    public function service_section(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
     
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.service.index', compact('static'));
    }

    // Service Update
    public function service_section_update(Request $request, $id){

        $request->validate([
            'service_title' => 'required|max:250',
            'service_sub_title' => 'required|max:250',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();


        $st->service_title = $request->service_title;
        $st->service_sub_title = $request->service_sub_title;
        $st->save();

        $notification = array(
            'messege' => 'Service Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.service_section').'?language='.$this->lang->code)->with('notification', $notification);
    }

    // Project Section
    public function project_section(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
     
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.project.index', compact('static'));
    }

    // Project Update
    public function project_section_update(Request $request, $id){

        $request->validate([
            'portfolio_title' => 'required|max:250',
            'portfolio_sub_title' => 'required|max:250',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();


        $st->portfolio_title = $request->portfolio_title;
        $st->portfolio_sub_title = $request->portfolio_sub_title;
        $st->save();

        $notification = array(
            'messege' => 'Project Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.project_section').'?language='.$this->lang->code)->with('notification', $notification);
    }

    // Team Update
    public function team_section_update(Request $request, $id){

        $request->validate([
            'team_title' => 'required|max:250',
            'team_sub_title' => 'required|max:250',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();


        $st->team_title = $request->team_title;
        $st->team_sub_title = $request->team_sub_title;
        $st->save();

        $notification = array(
            'messege' => 'Team Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.team').'?language='.$this->lang->code)->with('notification', $notification);
    }


    // Contact Section
    public function contact_section(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
     
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.contact.index', compact('static'));
    }


    // Contact Section Update
    public function contact_section_update(Request $request, $id){

        $request->validate([
            'contact_title' => 'required|max:250',
            'contact_sub_title' => 'required|max:250',
            'contact_form_title' => 'required|max:250',
            'contact_map' => 'required',
            'contact_form_image' => 'mimes:jpeg,jpg,png',
            'contact_section_bg_image' => 'mimes:jpeg,jpg,png',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('contact_form_image')){
            @unlink('assets/front/img/'. $st->contact_form_image);
            $file = $request->file('contact_form_image');
            $extension = $file->getClientOriginalExtension();
            $contact_form_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $contact_form_image);

            $st->contact_form_image = $contact_form_image;
        }

        if($request->hasFile('contact_section_bg_image')){
            @unlink('assets/front/img/'. $st->contact_section_bg_image);
            $file = $request->file('contact_section_bg_image');
            $extension = $file->getClientOriginalExtension();
            $contact_section_bg_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $contact_section_bg_image);

            $st->contact_section_bg_image = $contact_section_bg_image;
        }

        $st->contact_title = $request->contact_title;
        $st->contact_sub_title = $request->contact_sub_title;
        $st->contact_form_title = $request->contact_form_title;
        $st->contact_map = $request->contact_map;
        $st->save();

        $notification = array(
            'messege' => 'Contact Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.contact_section').'?language='.$this->lang->code)->with('notification', $notification);
    }


    // FAQ Section Update
    public function faq_section_update(Request $request, $id){

        $request->validate([
            'faq_title' => 'required|max:250',
            'faq_sub_title' => 'required|max:250',
            'faq_bg_image' => 'mimes:jpeg,jpg,png',
            'faq_image1' => 'mimes:jpeg,jpg,png',
            'faq_image2' => 'mimes:jpeg,jpg,png',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('faq_bg_image')){
            @unlink('assets/front/img/'. $st->faq_bg_image);
            $file = $request->file('faq_bg_image');
            $extension = $file->getClientOriginalExtension();
            $faq_bg_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $faq_bg_image);

            $st->faq_bg_image = $faq_bg_image;
        }

        if($request->hasFile('faq_image1')){
            @unlink('assets/front/img/'. $st->faq_image1);
            $file = $request->file('faq_image1');
            $extension = $file->getClientOriginalExtension();
            $faq_image1 = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $faq_image1);

            $st->faq_image1 = $faq_image1;
        }

        if($request->hasFile('faq_image2')){
            @unlink('assets/front/img/'. $st->faq_image2);
            $file = $request->file('faq_image2');
            $extension = $file->getClientOriginalExtension();
            $faq_image2 = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $faq_image2);

            $st->faq_image2 = $faq_image2;
        }

        $st->faq_title = $request->faq_title;
        $st->faq_sub_title = $request->faq_sub_title;
        $st->save();

        $notification = array(
            'messege' => 'FAQ Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.faq').'?language='.$this->lang->code)->with('notification', $notification);
    }

    
    // Blog Section
    public function blog_section(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
        
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.blog.index', compact('static'));
    }

    // Blog Section Update
    public function blog_section_update(Request $request, $id){

        $request->validate([
            'blog_title' => 'required|max:250',
            'blog_sub_title' => 'required|max:250',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();


        $st->blog_title = $request->blog_title;
        $st->blog_sub_title = $request->blog_sub_title;
        $st->save();

        $notification = array(
            'messege' => 'Blog Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.blog_section').'?language='.$this->lang->code)->with('notification', $notification);
    }


    // Meet us Section
    public function meet_section(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
        
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.meet.index', compact('static'));
    }

    // Meet us section update
    public function meet_section_update(Request $request, $id){

        $request->validate([
            'meeet_us_text' => 'required|max:250',
            'meeet_us_button_text' => 'required|max:250',
            'meeet_us_button_link' => 'required|max:250',
            'meeet_us_bg_image' => 'mimes:jpeg,jpg,png',
        ]);

        $st = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('meeet_us_bg_image')){
            @unlink('assets/front/img/'. $st->meeet_us_bg_image);
            $file = $request->file('meeet_us_bg_image');
            $extension = $file->getClientOriginalExtension();
            $meeet_us_bg_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $meeet_us_bg_image);

            $st->meeet_us_bg_image = $meeet_us_bg_image;
        }

        $st->meeet_us_text = $request->meeet_us_text;
        $st->meeet_us_button_text = $request->meeet_us_button_text;
        $st->meeet_us_button_link = $request->meeet_us_button_link;
        $st->save();

        $notification = array(
            'messege' => 'Meet With Us Section Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.meet_section').'?language='.$this->lang->code)->with('notification', $notification);

    }
    

}
