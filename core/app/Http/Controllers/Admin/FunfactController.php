<?php

namespace App\Http\Controllers\Admin;

use App\Funfact;
use App\Models\Counter;
use App\Models\Language;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FunfactController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function index(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $counters = Counter::where('language_id', $lang)->orderBy('id', 'DESC')->get();

        return view('admin.home.counter.index', compact('counters'));
    }

    public function add(){
        return view('admin.home.counter.add');
    }

    public function store(Request $request){

        $c = Counter::all();

        if($c->count() >= 4){
            $notification = array(
                'messege' => 'You Can\'t Add More Than Four',
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }
      
        $request->validate([
            'title' => 'required|max:250',
            'number' => 'required|numeric',
            'icon' => 'required|max:250',
            'text' => 'required|max:250',
            'language_id' => 'required',
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $counter = new Counter();

        

        $counter->language_id = $request->language_id;
        $counter->serial_number = $request->serial_number;
        $counter->title = $request->title;
        $counter->number = $request->number;
        $counter->icon = $request->icon;
        $counter->text = $request->text;
        $counter->status = $request->status;
        $counter->save();

        $notification = array(
            'messege' => 'Counter Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id){

        $counter = Counter::find($id);
        return view('admin.home.counter.edit', compact('counter'));

    }

    public function update(Request $request, $id){


        $counter = Counter::findOrFail($id);

         $request->validate([
            'title' => 'required|max:250',
            'number' => 'required|numeric',
            'icon' => 'required|max:250',
            'text' => 'required|max:250',
            'language_id' => 'required',
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $counter->language_id = $request->language_id;
        $counter->serial_number = $request->serial_number;
        $counter->title = $request->title;
        $counter->number = $request->number;
        $counter->icon = $request->icon;
        $counter->text = $request->text;
        $counter->status = $request->status;
        $counter->save();

        $notification = array(
            'messege' => 'Counter Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.counter.index').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function delete($id){

        $counter = Counter::find($id);
        $counter->delete();

        
        $notification = array(
            'messege' => 'Counter Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function funfactcontent(Request $request, $id){
        
        $request->validate([
            'funfact_bg' => 'mimes:jpeg,jpg,png',
        ]);

        $funfact_title = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('offer_image')){
            @unlink('assets/front/img/'. $funfact_title->funfact_bg);
            $file = $request->file('offer_image');
            $extension = $file->getClientOriginalExtension();
            $funfact_bg = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $funfact_bg);

            $funfact_title->funfact_bg = $funfact_bg;
        }

        $funfact_title->save();

        $notification = array(
            'messege' => 'Funfact Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.funfact').'?language='.$this->lang->code)->with('notification', $notification);
    }

}
