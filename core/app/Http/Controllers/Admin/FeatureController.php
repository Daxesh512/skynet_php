<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }
    public function index(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
     
        $features = Feature::where('language_id', $lang)->orderBy('id', 'DESC')->get();
     
        return view('admin.home.feature.index', compact('features'));
    }

    // Add Feature
    public function add(){
        return view('admin.home.feature.add');
    }

    // Store Feature
    public function store(Request $request){

      
        $request->validate([
            'title' => 'required|max:250',
            'icon' => 'required|max:250',
            'text' => 'required|max:250',
            'serial_number' => 'required|numeric',
            'status' => 'required',
            'language_id' => 'required',
        ]);

        $feature = new Feature();

        $feature->language_id = $request->language_id;
        $feature->title = $request->title;
        $feature->icon = $request->icon;
        $feature->text = $request->text;
        $feature->serial_number = $request->serial_number;
        $feature->status = $request->status;
        $feature->save();

        $notification = array(
            'messege' => 'Feature Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Feature Delete
    public function delete($id){

        $feature = Feature::find($id);
        $feature->delete();

        $notification = array(
            'messege' => 'Feature Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Feature Edit
    public function edit($id){

        $feature = Feature::find($id);
        return view('admin.home.feature.edit', compact('feature'));

    }

    // Update Feature
    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|max:250',
            'icon' => 'required|max:250',
            'text' => 'required|max:250',
            'serial_number' => 'required|numeric',
            'status' => 'required',
            'language_id' => 'required',
        ]);


        $feature = Feature::findOrFail($id);

        $feature->language_id = $request->language_id;
        $feature->title = $request->title;
        $feature->icon = $request->icon;
        $feature->text = $request->text;
        $feature->serial_number = $request->serial_number;
        $feature->status = $request->status;
        $feature->save();

        $notification = array(
            'messege' => 'Feature Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.feature.index').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
