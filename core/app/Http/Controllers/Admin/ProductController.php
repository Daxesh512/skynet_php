<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Language;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function products(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
        $data['products'] = Product::where('language_id',$lang)->orderBy('id', 'DESC')->get();
        return view('admin.product.index',$data);
    }


    public function add(){
        $categoryies = ProductCategory::where('status', 1)->get();
        return view('admin.product.add', compact('categoryies'));
    }

    public function store(Request $request){


        $request->validate([
            'attributes_title' => 'nullable|array',
            'attributes_description' => 'nullable|array',
            'language_id' => 'required',
            'title' => 'required|string|unique:products,title',
            'category_id' => 'required',
            'description' => 'nullable|string',
            'short_description' => 'nullable',
            'current_price' => 'nullable|numeric',
            'previous_price' => 'nullable|numeric',
            'sku' => 'nullable|string|max:191|unique:products,sku',
            'stock' => 'required|numeric',
            'is_downloadable' => 'nullable',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
            'image' => 'required|mimes:jpeg,jpg,png',
            'gallery[]' => 'mimes:jpeg,jpg,png',
            'status' => 'nullable|string|max:191',
            'downloadable_file' => 'nullable|mimes:zip|max:10650',
        ]);


        $product = new Product();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);
            $product->image = $image;
        }

        if ($request->hasFile('downloadable_file')){
            $file_extenstion = $request->downloadable_file->getClientOriginalExtension();
            if ($file_extenstion == 'zip'){
                $file_name_with_ext = $request->downloadable_file->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $file_name = strtolower(Str::slug($file_name));
                $file_db = $file_name . time() . '.' . $file_extenstion;
                $request->downloadable_file->move('assets/front/downloadable/', $file_db);
               $product->downloadable_file = $file_db;
            }
        }

   
        $product->stock = $request->stock;
        $product->attributes_title = implode(',,,',$request->attributes_title);
        $product->attributes_description = implode(',,,',$request->attributes_description);
        $product->language_id = $request->language_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->current_price = Helper::storePrice($request->current_price);
        $product->previous_price = Helper::storePrice($request->previous_price);
        $product->sku = $request->sku;
        $product->is_downloadable = $request->is_downloadable;
        $product->tags = $request->tags;
        $product->is_downloadable = $request->is_downloadable;
        $product->status = $request->status;
        $product->meta_tags = $request->meta_tags;
        $product->meta_description = $request->meta_description;
        $product->save();


        $id = $product->id;

        if($request->gallery){
            foreach($request->gallery as $gallery){
            $file = $gallery;
            $extension = $file->getClientOriginalExtension();
            $gimage = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $gimage);
                $gallery_image = new ProductImage;
                $gallery_image->product_id = $id;
                $gallery_image->image = $gimage;
                $gallery_image->save();
            }
        }

        $product->save();

        $notification = array(
            'messege' => 'Product Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    public function delete($id){

        $product = Product::findOrFail($id);

        foreach ($product->product_images as $key => $image) {
            @unlink('assets/front/img/' . $image->image);
            $image->delete();
        }

        @unlink('assets/front/img/' . $product->image);
        $product->delete();


        $notification = array(
            'messege' => 'Product deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);


    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categoryies = ProductCategory::where('status', 1)->get();
        return view('admin.product.edit', compact('product', 'categoryies'));

    }

    public function update(Request $request, $id){

        $product = Product::findOrFail($id);

        $request->validate([
            'attributes_title' => 'nullable|array',
            'attributes_description' => 'nullable|array',
            'language_id' => 'required',
            'title' => 'required|string|unique:products,title,'.$id,
            'category_id' => 'required',
            'description' => 'nullable|string',
            'short_description' => 'nullable',
            'current_price' => 'nullable|numeric',
            'previous_price' => 'nullable|numeric',
            'sku' => 'nullable|string|max:191|unique:products,sku,'.$id,
            'stock' => 'required|numeric',
            'is_downloadable' => 'nullable',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
            'image' => 'mimes:jpeg,jpg,png',
            'gallery[]' => 'mimes:jpeg,jpg,png',
            'status' => 'nullable|string|max:191',
            'downloadable_file' => 'nullable|mimes:zip|max:10650',
        ]);



        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $product->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);
            $product->image = $image;
        }

        if ($request->hasFile('downloadable_file')){
            $file_extenstion = $request->downloadable_file->getClientOriginalExtension();
            if ($file_extenstion == 'zip'){
                @unlink('assets/front/img/'. $product->downloadable_file);
                $file_name_with_ext = $request->downloadable_file->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $file_name = strtolower(Str::slug($file_name));
                $file_db = $file_name . time() . '.' . $file_extenstion;
                $request->downloadable_file->move('assets/front/downloadable/', $file_db);
               $product->downloadable_file = $file_db;
            }

        }

   
        $product->stock = $request->stock;
        $product->attributes_title = implode(',,,',$request->attributes_title);
        $product->attributes_description = implode(',,,',$request->attributes_description);
        $product->language_id = $request->language_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->current_price = Helper::storePrice($request->current_price);
        $product->previous_price = Helper::storePrice($request->previous_price);
        $product->sku = $request->sku;
        $product->is_downloadable = $request->is_downloadable;
        $product->tags = $request->tags;
        $product->is_downloadable = $request->is_downloadable;
        $product->status = $request->status;
        $product->meta_tags = $request->meta_tags;
        $product->meta_description = $request->meta_description;
        $product->save();


        $id = $product->id;



        if($request->gallery){
            foreach($product->product_images as $img){
                @unlink('assets/front/img/'. $img->image);
                $img->delete();
            }

            foreach($request->gallery as $gallery){

            $file = $gallery;
            $extension = $file->getClientOriginalExtension();
            $gimage = 'product_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $gimage);
                $gallery_image = new ProductImage;
                $gallery_image->product_id = $id;
                $gallery_image->image = $gimage;
                $gallery_image->save();
            }
        }

        $product->update();

        $notification = array(
            'messege' => 'Product Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.product').'?language='.$this->lang->code)->with('notification', $notification);

    }


    public function galleryremvoe($id)
    {
        $gallery = ProductImage::findOrFail($id);
        @unlink('assets/front/img/'. $gallery->image);
        $gallery->delete();
        $mgs = __('Image remove successfully.');
        return response()->json($mgs);
    }
}
