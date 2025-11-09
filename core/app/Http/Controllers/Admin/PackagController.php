<?php

namespace App\Http\Controllers\Admin;


use App\Models\Package;
use App\Models\Language;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagController extends Controller
{
   public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function package(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
     
        $packages = Package::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
        return view('admin.package.index', compact('packages', 'saectiontitle'));
    }

    // Add slider Category
    public function add(){
        return view('admin.package.add');
    }

    // Store slider Category
    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:150',
            'language_id' => 'required',
            'feature' => 'required',
            'serial_number' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        Package::create($request->all());

        $notification = array(
            'messege' => 'Package Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // slider Category Delete
    public function delete($id){

        $Package = Package::find($id);
        $Package->delete();

        return back();
    }

    // slider Category Edit
    public function edit($id){

        $package = Package::find($id);
        return view('admin.package.edit', compact('package'));

    }

    // Update slider Category
    public function update(Request $request, $id){

        $id = $request->id;
        $request->validate([
            'title' => 'required|max:150',
            'language_id' => 'required',
            'feature' => 'required',
            'serial_number' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        $package = Package::find($id);
        $package->update($request->all());

        $notification = array(
            'messege' => 'Package Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.package').'?language='.$this->lang->code)->with('notification', $notification);;
    }

    public function plancontent(Request $request, $id){
        
        $request->validate([
            'package_title' => 'required',
            'package_sub_title' => 'required',
        ]);
      
        $plan_title = Sectiontitle::where('language_id', $id)->first();


        $plan_title->package_title = $request->package_title;
        $plan_title->package_sub_title = $request->package_sub_title;
        $plan_title->save();
        

        $notification = array(
            'messege' => 'Pricing Plan Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.package').'?language='.$this->lang->code)->with('notification', $notification);
    }

}
