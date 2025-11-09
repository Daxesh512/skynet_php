<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Language;
use App\Models\Permalink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermalinkController extends Controller
{



    public function permalinks(Request $request) {
     
        $permalink = Permalink::first();
        return view('admin.settings.permalink', compact('permalink'));
    }

    public function permalinksUpdate(Request $request) {

        $request->validate([
            'about_slug' => 'required|max:150',
            'service_slug' => 'required|max:150',
            'portfolio_slug' => 'required|max:150',
            'package_slug' => 'required|max:150',
            'team_slug' => 'required|max:150',
            'faq_slug' => 'required|max:150',
            'gallery_slug' => 'required|max:150',
            'career_slug' => 'required|max:150',
            'blog_slug' => 'required|max:150',
            'product_slug' => 'required|max:150',
            'contact_slug' => 'required|max:150',
            'quote_slug' => 'required|max:150',
            'cart_slug' => 'required|max:150',
            'checkout_slug' => 'required|max:150',
        ]);

        $permalink = Permalink::first();
        $permalink->about_slug  = Helper::make_slug($request->about_slug);
        $permalink->service_slug  =  Helper::make_slug($request->service_slug);
        $permalink->portfolio_slug  =  Helper::make_slug($request->portfolio_slug);
        $permalink->package_slug  =  Helper::make_slug($request->package_slug);
        $permalink->team_slug  =  Helper::make_slug($request->team_slug);
        $permalink->faq_slug  =  Helper::make_slug($request->faq_slug);
        $permalink->gallery_slug  =  Helper::make_slug($request->gallery_slug);
        $permalink->career_slug  =  Helper::make_slug($request->career_slug);
        $permalink->blog_slug  =  Helper::make_slug($request->blog_slug);
        $permalink->product_slug  =  Helper::make_slug($request->product_slug);
        $permalink->contact_slug  =  Helper::make_slug($request->contact_slug);
        $permalink->quote_slug  =  Helper::make_slug($request->quote_slug);
        $permalink->cart_slug  =  Helper::make_slug($request->cart_slug);
        $permalink->checkout_slug  =  Helper::make_slug($request->checkout_slug);

        $permalink->save();

  

        $notification = array(
            'messege' => 'Permalinks updated successfully',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }
}
