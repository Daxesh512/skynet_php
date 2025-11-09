<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Language;
use App\Models\Gcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default', 1)->first();
    }

    public function index(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $galleries = Gallery::where('language_id', $lang)->orderBy('id', 'DESC')->get();

        return view('admin.gallery.index', compact('galleries'));
    }

    public function gallery_get_category($id){

        $galleries = Gcategory::where('status', 1)->where('language_id', $id)->get();
        $output = '';

        foreach($galleries as $gallery){
            $output .= '<option value="'.$gallery->id.'">'.$gallery->name.'</option>';
        }
        return $output;
    }

    // Add Gallery 
    public function add(){
        return view('admin.gallery.add');
    }


    // Store Gallery 
    public function store(Request $request){


        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'title' => 'required|max:255',
            'status' => 'required',
            'category_id' => 'required',
            'video_link' => 'max:250',
            'serial_number' => 'required',
            'language_id' => 'required',
        ]);


        $gallery = new Gallery();

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/gallery/', $image);

            $gallery->image = $image;
        }


        $gallery->title = $request->title;
        $gallery->language_id = $request->language_id;
        $gallery->status = $request->status;
        $gallery->category_id = $request->category_id;
        $gallery->video_link = $request->video_link;
        $gallery->serial_number = $request->serial_number;
        $gallery->save();

  
        $notification = array(
            'messege' => 'Gallery Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    // Gallery  Delete
    public function delete($id){


        $gallery = Gallery::find($id);

        @unlink('assets/front/img/gallery/'. $gallery->image);

        $gallery->delete();

        
        $notification = array(
            'messege' => 'Gallery  Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Gallery  Edit
    public function edit($id){
       
        $gallery = Gallery::findOrFail($id);
        $gallery_lan = $gallery->language_id;
       
        
        $gcategories = Gcategory::where('status', 1)->where('language_id', $gallery_lan)->get();
        
        return view('admin.gallery.edit', compact('gallery', 'gcategories'));

    }

    // Gallery Update
    public function update(Request $request, $id){



        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'title' => 'required|max:255',
            'status' => 'required',
            'category_id' => 'required',
            'video_link' => 'max:250',
            'serial_number' => 'required',
            'language_id' => 'required',

        ]);

        if($request->hasFile('image')){
            @unlink('assets/front/img/gallery/'. $gallery->image);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/gallery/', $image);

            $gallery->image = $image;
            
        }

        $gallery->title = $request->title;
        $gallery->language_id = $request->language_id;
        $gallery->status = $request->status;
        $gallery->category_id = $request->category_id;
        $gallery->video_link = $request->video_link;
        $gallery->serial_number = $request->serial_number;
        $gallery->save();

     


        $notification = array(
            'messege' => 'Gallery Updated successfully!',
            'alert' => 'success'
        );

        return redirect(route('admin.gallery.index').'?language='.$this->lang->code)->with('notification', $notification);

    }

}
