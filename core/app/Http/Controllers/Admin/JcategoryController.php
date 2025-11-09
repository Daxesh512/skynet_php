<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Jcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JcategoryController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }


    public function jcategory (Request $request){

        $lang = Language::where('code', $request->language)->first()->id;
        $jcategories  = Jcategory::where('language_id',$lang)->orderBy('id', 'desc')->get();
        return view('admin.job.job-category.index', compact('jcategories'));
    }


    public function add(){

        return view('admin.job.job-category.add');
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:jcategories|max:150',
            'language_id' => 'required',
            'status' => 'required',
        ]);

        $jcategory = new Jcategory();

        $jcategory->language_id = $request->language_id;
        $jcategory->name = $request->name;
        $jcategory->slug = Str::slug($request->name, "-");
        $jcategory->status = $request->status;
        $jcategory->save();

        
        $notification = array(
            'messege' => 'Job Category Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }


    public function delete($id){

        $jcategory = Jcategory::findOrFail($id);
        if($jcategory->jobs->count() > 0){
            foreach($jcategory->events as $data){
                $data->delete();
            }
        }

        $jcategory->delete();

        $notification = array(
            'messege' => 'Job Category Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }


    public function edit($id){

        $jcategory = jcategory::find($id);
        return view('admin.job.job-category.edit', compact('jcategory'));

    }

    public function update(Request $request, $id){

        $id = $request->id;
        $request->validate([
            'name' => 'required|unique:jcategories,name,'.$id,
            'status' => 'required',
        ]);

        $jcategory = Jcategory::find($id);
        $jcategory->language_id = $request->language_id;
        $jcategory->name = $request->name;
        $jcategory->slug = Str::slug($request->name, "-");
        $jcategory->status = $request->status;
        $jcategory->save();


        
        $notification = array(
            'messege' => 'Job Category Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.jcategory').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
