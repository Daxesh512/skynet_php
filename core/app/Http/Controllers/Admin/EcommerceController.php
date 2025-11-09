<?php

namespace App\Http\Controllers\Admin;

use App\Models\Eslider;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ebanner;

class EcommerceController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }


    // Slider Functions Start
    public function slider(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
     
        $sliders = Eslider::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        
        return view('admin.ecommerce.slider.index', compact('sliders'));
      
    }

    public function sliderAdd(){
        return view('admin.ecommerce.slider.add');
    }

    public function sliderStore(Request $request){

        $request->validate([
            'title' => 'required|max:250',
            'language_id' => 'required',
            'price' => 'required|numeric|max:250',
            'background_image' => 'required|mimes:jpeg,jpg,png',
            'image' => 'required|mimes:jpeg,jpg,png',
            'serial_number' => 'required|numeric',
            'button_text' => 'required',
            'button_link' => 'required',
            'status' => 'required',
        ]);

        $slider = new Eslider();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/slider', $image);

            $slider->image = $image;
        }

        if($request->hasFile('background_image')){
            $file = $request->file('background_image');
            $extension = $file->getClientOriginalExtension();
            $background_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/slider', $background_image);

            $slider->background_image = $background_image;
        }

        $slider->language_id = $request->language_id;
        $slider->status = $request->status;
        $slider->title = $request->title;
        $slider->price = $request->price;
        $slider->serial_number = $request->serial_number;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();
        

        $notification = array(
            'messege' => 'Slider Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function sliderEdit($id){

        $slider = Eslider::find($id);
        return view('admin.ecommerce.slider.edit', compact('slider'));

    }

    public function sliderUpdate(Request $request, $id){

        // dd($request->background_image->getClientOriginalExtension());

        $id = $request->id;
        $request->validate([
            'background_image' => 'mimes:jpeg,jpg,png',
            'image' => 'mimes:jpeg,jpg,png',
            'title' => 'required|max:250',
            'language_id' => 'required',
            'price' => 'required|numeric|max:250',
            'serial_number' => 'required|numeric',
            'button_text' => 'required',
            'button_link' => 'required',
            'status' => 'required'
        ]);

        $slider = Eslider::find($id);

        if($request->hasFile('image')){
            @unlink('assets/front/img/slider/'. $slider->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/slider/', $image);

            $slider->image = $image;
        }

        if($request->hasFile('background_image')){
            @unlink('assets/front/img/slider/'. $slider->background_image);
            $file = $request->file('background_image');
            $extension = $file->getClientOriginalExtension();
            $background_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/slider/', $background_image);

            $slider->background_image = $background_image;
        }

        $slider->language_id = $request->language_id;
        $slider->status = $request->status;
        $slider->title = $request->title;
        $slider->price = $request->price;
        $slider->serial_number = $request->serial_number;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();

        $notification = array(
            'messege' => 'Slider Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.ecommerce.slider').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function sliderDelete($id){

        $slider = Eslider::find($id);
        @unlink('assets/front/img/slider/'. $slider->image);
        @unlink('assets/front/img/slider/'. $slider->background_image);
        $slider->delete();

        $notification = array(
            'messege' => 'Slider Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }
    // Slider Functions End

    // Banner Functions Start
    public function banner(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
        
        $banners = Ebanner::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        
        return view('admin.ecommerce.banner.index', compact('banners'));
        
    }

    public function bannerAdd(){
        return view('admin.ecommerce.banner.add');
    }

    public function bannerStore(Request $request){


        $checkbnanner = Ebanner::where('language_id', $request->language_id)->get();

        if($checkbnanner->count() == 2){
            $notification = array(
                'messege' => 'You can not add more that two banner',
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }

        $request->validate([
            'title' => 'required|max:250',
            'language_id' => 'required',
            'price' => 'required|max:250',
            'image' => 'required|mimes:jpeg,jpg,png',
            'button_text' => 'required',
            'button_link' => 'required'
        ]);

        $banner = new Ebanner();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img', $image);

            $banner->image = $image;
        }

 
        $banner->language_id = $request->language_id;
        $banner->title = $request->title;
        $banner->price = $request->price;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        $banner->save();
        

        $notification = array(
            'messege' => 'Banner Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function bannerEdit($id){

        $banner = Ebanner::find($id);
        return view('admin.ecommerce.banner.edit', compact('banner'));

    }

    public function bannerUpdate(Request $request, $id){
       
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'title' => 'required|max:250',
            'language_id' => 'required',
            'price' => 'required|max:250',
            'button_text' => 'required',
            'button_link' => 'required'
        ]);

        $slider = Ebanner::find($id);

        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $slider->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $slider->image = $image;
        }


        $slider->language_id = $request->language_id;
        $slider->title = $request->title;
        $slider->price = $request->price;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();

        $notification = array(
            'messege' => 'Banner Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.ecommerce.banner').'?language='.$this->lang->code)->with('notification', $notification);
    }

    // Slider Functions End





}
