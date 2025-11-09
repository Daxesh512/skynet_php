<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{

    public $lang;
   public function __construct()
    {
        $this->middleware('auth:admin');
        $this->lang = Language::where('is_default',1)->first();
    }


    //*** GET Request
    public function currency()
    {
        $currency = Currency::all();
        return view('admin.currency.index',compact('currency'));
    }

    //*** GET Request
    public function add()
    {
        return view('admin.currency.add');
    }

    //*** POST Request
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:currencies',
            'sign' => 'unique:currencies'
        ]);
        //--- Logic Section
        $data = new Currency();
        $data->name = $request->name;
        $data->sign = $request->sign;
        $data->value = $request->value;
        $data->is_default = '0';
        //--- Logic Section Ends
        $data->save();


        $notification = array(
            'messege' => 'Currency Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

      
    }

    //*** GET Request
    public function edit($id)
    {
        $currency  = Currency::findOrFail($id);
        return view('admin.currency.edit',compact('currency'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $request->validate([
            'name' => 'unique:currencies,name,'.$id,
            'sign' => 'unique:currencies,sign,'.$id
        ]);


        //--- Logic Section
        $data = Currency::findOrFail($id);
        $data->name = $request->name;
        $data->sign = $request->sign;
        $data->value = $request->value;
       
        //--- Logic Section Ends

        $data->save();
        //--- Logic Section Ends

        $notification = array(
            'messege' => 'Currency Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.currency').'?language='.$this->lang->code)->with('notification', $notification);
    }


    public function status($id1)
        {
            $data = Currency::findOrFail($id1);
            $data->is_default = 1;
            $data->update();
            $data = Currency::where('id','!=',$id1)->update(['is_default' => 0]);
            //--- Redirect Section

            $notification = array(
                'messege' => 'Currency Updated successfully!',
                'alert' => 'success'
            );
            return redirect()->back()->with('notification', $notification);

            //--- Redirect Section Ends
        }



    //*** GET Request Delete
    public function delete($id)
    {
        if($id == 1)
        {
            Session::flash('success', "You cant't remove the main currency.");
            return back();
        }

        $data = Currency::findOrFail($id);
        if($data->is_default == 1) {
        Currency::where('id','=',1)->update(['is_default' => 1]);
        }
        $data->delete();


        $notification = array(
            'messege' => 'Currency Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }
}
