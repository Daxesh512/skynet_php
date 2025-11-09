<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class ContactController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function contact_page(Request $request){

        $lang = Language::where('code', $request->language)->first()->id;

        $contact_setting = Setting::where('language_id', $lang)->first();
        
        return view('admin.contact.index', compact('contact_setting'));
    }

    public function contact_page_update(Request $request, $id){

        $request->validate([
            'number' => 'required|max:250',
            'email' => 'required|max:250',
            'address' => 'required|max:250',
            'whatsapp' => 'required|max:250',
            'opening_hours' => 'required|max:250',
        ]);

        $setting = Setting::where('language_id', $id)->first();

        $setting->number = $request->number;
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->whatsapp = $request->whatsapp;
        $setting->opening_hours = $request->opening_hours;
        $setting->save();

        $notification = array(
            'messege' => 'Contact Info Updated successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }
}
