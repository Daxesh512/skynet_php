<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function index(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $clients = Client::where('language_id', $lang)->orderBy('id', 'DESC')->get();

        return view('admin.home.client.index', compact('clients'));
    }

    public function add(){
        return view('admin.home.client.add');
    }

    public function store(Request $request){

      
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'name' => 'required|max:250',
            'link' => 'required|max:250',
            'status' => 'required',
            'serial_number' => 'required|numeric',
        ]);

        $client = new Client();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/client/', $image);

            $client->image = $image;
        }

        $client->language_id = $request->language_id;
        $client->serial_number = $request->serial_number;
        $client->name = $request->name;
        $client->link = $request->link;
        $client->status = $request->status;
        $client->save();

        $notification = array(
            'messege' => 'Client Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id){

        $client = Client::find($id);
        return view('admin.home.client.edit', compact('client'));

    }

    public function update(Request $request, $id){

        

        $client = Client::findOrFail($id);

         $request->validate([
            'name' => 'required|max:250',
            'link' => 'required|max:250',
            'status' => 'required',
            'serial_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
    

        if($request->hasFile('image')){
            @unlink('assets/front/img/client/'. $client->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/client/', $image);
            $client->image = $image;
        }

        $client->language_id = $request->language_id;
        $client->serial_number = $request->serial_number;
        $client->name = $request->name;
        $client->link = $request->link;
        $client->status = $request->status;
        $client->save();

        $notification = array(
            'messege' => 'Client Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.client.index').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function delete($id){

        $client = Client::find($id);
        @unlink('assets/front/img/client/'. $client->image);
        $client->delete();

        
        $notification = array(
            'messege' => 'Client Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

 
}
