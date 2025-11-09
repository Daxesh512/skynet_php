<?php

namespace App\Http\Controllers\Admin;

use App\Models\History;
use App\Models\Language;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function index(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $histories = History::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $static = Sectiontitle::where('language_id', $lang)->orderBy('id', 'DESC')->first();

        return view('admin.home.history.index', compact('histories', 'static'));
    }

    public function add(){
        return view('admin.home.history.add');
    }

    public function store(Request $request){

      
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'title' => 'required|max:250',
            'date' => 'required|max:250',
            'position' => 'required|max:250',
            'status' => 'required',
            'language_id' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $history = new History();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/history/', $image);

            $history->image = $image;
        }

        $history->language_id = $request->language_id;
        $history->serial_number = $request->serial_number;
        $history->title = $request->title;
        $history->date = $request->date;
        $history->position = $request->position;
        $history->status = $request->status;
        $history->save();

        $notification = array(
            'messege' => 'History Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id){

        $history = History::find($id);
        return view('admin.home.history.edit', compact('history'));

    }

    public function update(Request $request, $id){

        

        $history = History::findOrFail($id);

         $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'title' => 'required|max:250',
            'date' => 'required|max:250',
            'position' => 'required|max:250',
            'status' => 'required',
            'language_id' => 'required',
            'serial_number' => 'required|numeric',
        ]);
    

        if($request->hasFile('image')){
            @unlink('assets/front/img/history/'. $history->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/history/', $image);
            $history->image = $image;
        }

        $history->language_id = $request->language_id;
        $history->serial_number = $request->serial_number;
        $history->title = $request->title;
        $history->date = $request->date;
        $history->position = $request->position;
        $history->status = $request->status;
        $history->save();


        $notification = array(
            'messege' => 'History Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.history.index').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function delete($id){

        $history = History::find($id);
        @unlink('assets/front/img/history/'. $history->image);
        $history->delete();

        
        $notification = array(
            'messege' => 'History Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }


    public function historycontent(Request $request, $id){
       
        $request->validate([
            'our_history_title' => 'required',
            'our_history_text' => 'required',
        ]);

        $history_title = Sectiontitle::where('language_id', $id)->first();

        $history_title->our_history_title = $request->our_history_title;
        $history_title->our_history_text = $request->our_history_text;
        $history_title->save();

        $notification = array(
            'messege' => 'History Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.history.index').'?language='.$this->lang->code)->with('notification', $notification);
    }


}
