<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flink;

class FlinkController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function index(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $flinks = Flink::where('language_id', $lang)->orderBy('id', 'DESC')->get();

        return view('admin.footer.link.index', compact('flinks'));
    }

    public function add(){
        return view('admin.footer.link.add');
    }

    public function store(Request $request){

  
        $request->validate([
            'name' => 'required|max:250',
            'url' => 'required|max:250',
            'language_id' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $flink = new Flink();

        

        $flink->language_id = $request->language_id;
        $flink->serial_number = $request->serial_number;
        $flink->name = $request->name;
        $flink->url = $request->url;
        $flink->save();

        $notification = array(
            'messege' => 'Footer Link Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id){

        $flink = Flink::find($id);
        return view('admin.footer.link.edit', compact('flink'));

    }

    public function update(Request $request, $id){


        $flink = Flink::findOrFail($id);

         $request->validate([
            'name' => 'required|max:250',
            'url' => 'required|max:250',
            'language_id' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $flink->language_id = $request->language_id;
        $flink->serial_number = $request->serial_number;
        $flink->name = $request->name;
        $flink->url = $request->url;
        $flink->save();

        $notification = array(
            'messege' => 'Footer Link Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.flink.index').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function delete($id){

        $flink = Flink::find($id);
        $flink->delete();

        
        $notification = array(
            'messege' => 'Footer Link Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

}
