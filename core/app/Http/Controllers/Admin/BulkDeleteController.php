<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Quote;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Bcategory;
use App\Models\Gcategory;
use App\Models\Jcategory;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class BulkDeleteController extends Controller
{
    public function bulkDelete(Request $request)
    {


        $ids = array_filter($request->ids);
        if (!$ids) {
            $notification = array(
                'messege' => 'Please Select Item First',
                'alert' => 'success'
            );
            return redirect()->back()->with('notification', $notification);
        }

        $ids = explode(',', $ids[0]);

        if ($request->table == 'product') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $product = Product::findOrFail($id);
                foreach ($product->product_images as $key => $image) {
                    @unlink('assets/front/img/' . $image->image);
                    $image->delete();
                }
                @unlink('assets/front/img/' . $product->image);
                $product->delete();
            }
        }
        if ($request->table == 'order') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $order = Order::findOrFail($id);
                @unlink('assets/front/invoices/product/' . $order->invoice_number);
                $order->delete();
            }
        }
        if ($request->table == 'product-category') {
            foreach ($ids as $id) {
                $id = (int) $id;

                $category = ProductCategory::findOrFail($id);
                $products = Product::where('category_id', $id)->get();
                if ($products->count() >= 1) {
                    $notification = array(
                        'messege' => 'First Delete Products Under This Category !',
                        'alert' => 'warning'
                    );
                    return redirect()->back()->with('notification', $notification);
                }
                $category->delete();
            }
        }

        if ($request->table == 'quote') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $quote = Quote::findOrFail($id);
                @unlink('assets/front/quote/' . $quote->file);
                $quote->delete();
            }
        }
        if ($request->table == 'gallery') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $gallery = Gallery::find($id);
                @unlink('assets/front/img/gallery/' . $gallery->image);
                $gallery->delete();
            }
        }

        if ($request->table == 'gcategory') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $gcategory = Gcategory::find($id);
                $gallery = Gallery::where('category_id', $id)->get();

                if ($gallery->count() >= 1) {
                    $notification = array(
                        'messege' => 'First Delete Galleries Under This Category !',
                        'alert' => 'success'
                    );
                    return redirect()->back()->with('notification', $notification);
                }

                $gcategory->delete();
            }
        }

        if ($request->table == 'jcategory') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $jcategory = Jcategory::findOrFail($id);
                if ($jcategory->jobs->count() > 0) {
                    foreach ($jcategory->events as $data) {
                        $data->delete();
                    }
                }
                $jcategory->delete();
            }
        }
        if ($request->table == 'job') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $job = Job::findOrFail($id);
                $job->delete();
            }
        }
        if ($request->table == 'applicant') {
            foreach ($ids as $id) {
                $id = (int) $id;

                $data = JobApplication::findOrFail($id);
                @unlink('assets/front/application/' . $data->file);
                $data->delete();
            }
        }
        if ($request->table == 'bcategory') {
            foreach ($ids as $id) {
                $id = (int) $id;

                $bcategory = Bcategory::find($id);
                $blogs = Blog::where('bcategory_id', $id)->get();

                if ($blogs->count() >= 1) {
                    $notification = array(
                        'messege' => 'First Delete Blogs Under This Category !',
                        'alert' => 'success'
                    );
                    return redirect()->back()->with('notification', $notification);
                }

                $bcategory->delete();
            }
        }
        if ($request->table == 'blog') {
            foreach ($ids as $id) {
                $id = (int) $id;

                $blog = Blog::find($id);
                @unlink('assets/front/img/blog/' . $blog->main_image);
                $blog->delete();
            }
        }
        if ($request->table == 'newsletter') {
            foreach ($ids as $id) {
                $id = (int) $id;
                $newsletter = Newsletter::find($id);
                $newsletter->delete();
            }
        }


        $notification = array(
            'messege' => 'Data Deleted Successfully.',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }
}
