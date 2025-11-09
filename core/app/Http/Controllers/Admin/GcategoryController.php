<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Language;
use App\Models\Gcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GcategoryController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default', 1)->first();
    }

    public function gcategory(Request $request)
    {
        $lang = Language::where('code', $request->language)->first()->id;

        $gcategories = Gcategory::where('language_id', $lang)->orderBy('id', 'desc')->get();

        return view('admin.gallery.gallery-category.index', compact('gcategories'));
    }

    // Add Blog Category
    public function add()
    {
        return view('admin.gallery.gallery-category.add');
    }

    // Store Blog Category
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => [
                'required',
                'unique:gcategories,name',
                'max:150',
            ],
            'language_id' => 'required',
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $bcategory = new Gcategory();

        $bcategory->language_id = $request->language_id;
        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->serial_number = $request->serial_number;
        $bcategory->save();


        $notification = array(
            'messege' => 'Gallery Category Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Blog Category Delete
    public function delete($id)
    {

        $bcategory = Gcategory::find($id);
        $blogs = Gallery::where('category_id', $id)->get();
     
        if($blogs->count() >= 1){
            $notification = array(
                'messege' => 'First Delete Galleries Under This Category !',
                'alert' => 'success'
            );
            return redirect()->back()->with('notification', $notification);
        }
        
        $bcategory->delete();


        $notification = array(
            'messege' => 'Gallery Category Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    // Blog Category Edit
    public function edit($id)
    {

        $gcategory = Gcategory::find($id);
        return view('admin.gallery.gallery-category.edit', compact('gcategory'));
    }

    // Blog Skill Category
    public function update(Request $request, $id)
    {
     
   
        $bcategory = Gcategory::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'max:150',
                'unique:gcategories,name,'.$id
            ],
            'language_id' => 'required',
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);

    
        $bcategory->language_id = $request->language_id;
        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->serial_number = $request->serial_number;
        $bcategory->save();

        $notification = array(
            'messege' => 'Gallery Category Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.gcategory').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
