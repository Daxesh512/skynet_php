<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\WhySelect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyChooseController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }


    // Add Why Choose
    public function add(){
       
        return view('admin.home.why-choose-us.add');
    }

    // Store Why Choose
    public function store(Request $request){

        $wcu = WhySelect::all();

        $request->validate([
            'title' => 'required|max:250',
            'language_id' => 'required',
            'text' => 'required|max:250',
            'icon' => 'required|max:250',
            'serial_number' => 'required|numeric',
            'status' => 'required',
        ]);

     

        $ws = new WhySelect();

       
        $ws->language_id = $request->language_id;
        $ws->status = $request->status;
        $ws->title = $request->title;
        $ws->icon = $request->icon;
        $ws->text = $request->text;
        $ws->serial_number = $request->serial_number;
        $ws->save();
        

        $notification = array(
            'messege' => 'Why Choose Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Why Choose Delete
    public function delete($id){

        $ws = WhySelect::find($id);
        $ws->delete();

        $notification = array(
            'messege' => 'Why Choose Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Why Choose Edit
    public function edit($id){

        $wc = WhySelect::find($id);

        return view('admin.home.why-choose-us.edit', compact('wc'));

    }

    // Update Why Choose
    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|max:250',
            'language_id' => 'required',
            'text' => 'required|max:250',
            'icon' => 'required|max:250',
            'serial_number' => 'required|numeric',
            'status' => 'required',
        ]);

        $ws = WhySelect::find($id);



        $ws->language_id = $request->language_id;
        $ws->status = $request->status;
        $ws->title = $request->title;
        $ws->icon = $request->icon;
        $ws->text = $request->text;
        $ws->serial_number = $request->serial_number;
        $ws->save();
        

        $notification = array(
            'messege' => 'Why Choose Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.why_chooseus').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
