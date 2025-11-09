<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Language;
use App\Models\Testimonial;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function testimonial(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
        
        $testimonials = Testimonial::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();

        return view('admin.home.testimonial.index', compact('testimonials', 'saectiontitle'));
    }

    //Add Testimonial
    public function add(){
        return view('admin.home.testimonial.add');
    }

    // Store Testimonial
    public function store(Request $request){
        
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'name' => 'required|max:100',
            'position' => 'required|max:100',
            'rating' => 'required',
            'serial_number' => 'required',
            'message' => 'required|max:300',
        ]);

        $testimonial = new Testimonial();

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $testimonial->image = $image;
        }

        $testimonial->name = $request->name;
        $testimonial->language_id = $request->language_id;
        $testimonial->position = $request->position;
        $testimonial->rating = $request->rating;
        $testimonial->message = $request->message;
        $testimonial->serial_number = $request->serial_number;
        $testimonial->save();


        $notification = array(
            'messege' => 'Testimonial Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    //Testimonial Delete
    public function delete($id){
       
        $testimonial = Testimonial::find($id);
        @unlink('assets/front/img/'. $testimonial->featured_image);
        $testimonial->delete();

        return back();
    }

    //Service Delete
    public function edit($id){
       
        $testimonial = Testimonial::find($id);
        return view('admin.home.testimonial.edit', compact('testimonial'));
    
    }

    // Testimonial Update
    public function update(Request $request, $id){

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:100',
            'position' => 'required|max:100',
            'rating' => 'required',
            'serial_number' => 'required',
            'message' => 'required|max:300',
        ]);

        $testimonial = Testimonial::find($id);
        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $testimonial->image);
             
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $testimonial->image = $image;
        }
        $testimonial->name = $request->name;
        $testimonial->language_id = $request->language_id;
        $testimonial->position = $request->position;
        $testimonial->rating = $request->rating;
        $testimonial->message = $request->message;
        $testimonial->serial_number = $request->serial_number;
        $testimonial->save();

        $notification = array(
            'messege' => 'Testimonial Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.testimonial').'?language='.$this->lang->code)->with('notification', $notification);


    }

    public function testimonialcontent(Request $request, $id){
        
        $request->validate([
            'testimonial_title' => 'required',
            'testimonial_subtitle' => 'required'
        ]);

        $testimonial_title = Sectiontitle::where('language_id', $id)->first();

        $testimonial_title->testimonial_title = $request->testimonial_title;
        $testimonial_title->testimonial_subtitle = $request->testimonial_subtitle;
        $testimonial_title->save();

        $notification = array(
            'messege' => 'Testimonial Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.testimonial').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
