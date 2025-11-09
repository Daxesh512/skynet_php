<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QuoteController extends Controller
{


    public function all()
    {
        $data['quotes'] = Quote::orderBy('id', 'DESC')->get();
        return view('admin.quote.quote', $data);
    }

    public function pending()
    {
        $data['quotes'] = Quote::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('admin.quote.quote', $data);
    }

    public function processing()
    {
        $data['quotes'] = Quote::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.quote.quote', $data);
    }

    public function completed()
    {
        $data['quotes'] = Quote::where('status', 2)->orderBy('id', 'DESC')->get();
        return view('admin.quote.quote', $data);
    }

    public function rejected()
    {
        $data['quotes'] = Quote::where('status', 3)->orderBy('id', 'DESC')->get();
        return view('admin.quote.quote', $data);
    }

    public function status(Request $request)
    {
        $quote = Quote::find($request->quote_id);
        $quote->status = $request->status;
        $quote->save();

        
        $notification = array(
            'messege' => 'Status changed successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function details($id){
        $quote = Quote::find($id);
        return view('admin.quote.details', compact('quote'));
    }

    public function delete($id)
    {

        $quote = Quote::findOrFail($id);
        @unlink('assets/front/quote/'.$quote->file);
        $quote->delete();

        $notification = array(
            'messege' => 'Quote Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }


}
