<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public $lang_id;
    public function __construct()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }
        $this->lang_id = $currlang->id;
    }


    public function index(Request $request)
    {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }
     
        // $data['products'] = Product::where('status', 1)->where('language_id', $currlang->id)->paginate(6);
        $data['categories'] = ProductCategory::where('status', 1)->where('language_id', $currlang->id )->get();

        $search = $request->search;

        $minprice = $request->min;
        $maxprice = $request->max;
        $category = $request->category;
        $category = ProductCategory::where('slug',$request->category)->exists();
        if($category){
            $category_id = ProductCategory::where('slug',$request->category)->first()->id;
        }else{
            $category_id = '';
        }

        if($request->type){
            $type = $request->type;
        }else{
            $type = 'new';
        }


        $reviewcheck = $request->rating;


        $data['products'] =
            Product::when($category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->when($currlang->id, function ($query, $lang_id) {
                return $query->where('language_id', $lang_id);
            })
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('current_price', '>=', $minprice);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('current_price', '<=', $maxprice);
            })

            ->when($reviewcheck, function ($query, $reviewcheck) {
                return $query->where('rating', '>=', $reviewcheck);
            })

            ->when($type, function ($query, $type) {
                if ($type == 'new') {
                    return $query->orderBy('id', 'DESC');
                } elseif ($type == 'old') {
                    return $query->orderBy('id', 'ASC');
                } elseif ($type == 'high_low') {
                    return $query->orderBy('current_price', 'DESC');
                } elseif ($type == 'low_high') {
                    return $query->orderBy('current_price', 'ASC');
                }
            })

        ->where('status', 1)->paginate(9);
        return view('front.product.index',$data);
    }


    public function product_load($category_id)
    {

        $category_id = Productcategory::findOrFail($category_id);

        $products = Product::where('category_id', $category_id->id)->limit(4)->get();

         return view('front.load.product',compact('products', 'category_id'));
    }


    public function product_details($slug)
    {
        $data['product'] = Product::where('slug',$slug)->first();
        $data['related_products'] = Product::where('category_id',$data['product']->category_id)->where('id','!=',$data['product']->id)->get();
        return view('front.product.details',$data);
    }

    public function cart()
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
        }
        return view('front.product.cart', compact('cart'));
    }


    // add to cart

    public function addToCart($id)
    {

        $cart = Session::get('cart');

        if (strpos($id, ',,,') == true) {
            $data = explode(',,,', $id);
            $id = $data[0];
            $qty = $data[1];

            $product = Product::findOrFail($id);

            if(!empty($cart) && array_key_exists($id, $cart)){
                if($product->stock < $cart[$id]['qty'] + $qty){
                    return response()->json(['error' => 'Product Out of Stock']);
                }
            }else{
                if($product->stock < $qty){
                    return response()->json(['error' => 'Product Out of Stock']);
                }
            }

            if (!$product) {
                abort(404);
            }
            $cart = Session::get('cart');
            // if cart is empty then this the first product
            if (!$cart) {

                $cart = [
                    $id => [
                        "id" => $product->id,
                        "title" => $product->title,
                        "qty" => $qty,
                        "price" => $product->current_price,
                        "downloadable_file" => $product->downloadable_file == null ? '' : $product->downloadable_file,
                        "image" => $product->image
                    ]
                ];

                Session::put('cart', $cart);
                return response()->json(['message' => 'Product added to cart successfully!']);
            }

            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$id])) {
                if($product->is_downloadable){
                    return response()->json(['message' => 'Product Allready Added']);
                }
                $cart[$id]['qty'] +=  $qty;
                Session::put('cart', $cart);
                return response()->json(['message' => 'Product added to cart successfully!']);
            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "id" => $product->id,
                "title" => $product->title,
                "qty" => $qty,
                "price" => $product->current_price,
                "downloadable_file" => $product->downloadable_file == null ? '' : $product->downloadable_file,
                "image" => $product->image
            ];
        } else {

            $id = $id;
            $product = Product::findOrFail($id);
            if (!$product) {
                abort(404);
            }
            if(!empty($cart) && array_key_exists($id, $cart)){
                if($product->stock < $cart[$id]['qty'] + 1){
                    return response()->json(['error' => 'Product Out of Stock']);
                }
            }else{
                if($product->stock < 1){
                    return response()->json(['error' => 'Product Out of Stock']);
                }
            }


            $cart = Session::get('cart');
            // if cart is empty then this the first product
            if (!$cart) {

                $cart = [
                    $id => [
                        "id" => $product->id,
                        "title" => $product->title,
                        "qty" => 1,
                        "price" => $product->current_price,
                        "downloadable_file" => $product->downloadable_file == null ? '' : $product->downloadable_file,
                        "image" => $product->image
                    ]
                ];

                Session::put('cart', $cart);
                return response()->json(['message' => 'Product added to cart successfully!']);
            }

            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$id])) {
                if($product->is_downloadable){
                    return response()->json(['message' => 'Product Allready Added']);
                }
                $cart[$id]['qty']++;
                Session::put('cart', $cart);
                return response()->json(['message' => 'Product added to cart successfully!']);
            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "id" => $product->id,
                "title" => $product->title,
                "qty" => 1,
                "price" => $product->current_price,
                "downloadable_file" => $product->downloadable_file == null ? '' : $product->downloadable_file,
                "image" => $product->image
            ];
        }

        Session::put('cart', $cart);
        return response()->json(['message' => 'Product added to cart successfully!']);
    }


    public function Prdouctcheckout(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            abort(404);
        }

        if ($request->qty) {
            $qty = $request->qty;
        } else {
            $qty = 1;
        }


        $cart = Session::get('cart');
        $id = $product->id;
        // if cart is empty then this the first product
        if (!($cart)) {
            if($product->stock <  $qty){
                Session::flash('warning','Product Out of stock');
                return back();
            }

            $cart = [
                $id => [
                    "id" => $product->id,
                    "title" => $product->title,
                    "qty" => $qty,
                    "price" => $product->current_price,
                    "downloadable_file" => $product->downloadable_file == null ? '' : $product->downloadable_file,
                    "image" => $product->image
                ]
            ];

            Session::put('cart', $cart);
            if (!Auth::user()) {
                Session::put('link', url()->current());
                return redirect(route('user.login'));
            }
            return redirect(route('front.checkout'));
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            if($product->is_downloadable){
                return response()->json(['message' => 'Product Allready Added']);
            }
            if($product->stock < $cart[$id]['qty'] + $qty){
                Session::flash('warning','Product Out of stock');
                return back();
            }
            $qt = $cart[$id]['qty'];
            $cart[$id]['qty'] = $qt + $qty;

            Session::put('cart', $cart);
                if (!Auth::user()) {
                Session::put('link', url()->current());
                return redirect(route('user.login'));
            }
            return redirect(route('front.checkout'));
        }

        if($product->stock <  $qty){
            Session::flash('warning','Product Out of stock');
            return back();
        }


        $cart[$id] = [
            "id" => $product->id,
            "title" => $product->title,
            "qty" => $qty,
            "price" => $product->current_price,
            "downloadable_file" => $product->downloadable_file == null ? '' : $product->downloadable_file,
            "image" => $product->image
        ];
        Session::put('cart', $cart);

        if (!Auth::user()) {
            Session::put('link', url()->current());
            return redirect(route('user.login'));
        }
        return redirect(route('front.checkout'));
    }


    public function checkout()
    {
        if (!Session::get('cart')) {
            Session::flash('warning', 'Your cart is empty.');
            return redirect(route('front.cart'));
        }

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $user = Auth::user();

        if ($user) {
            if (Session::has('cart')) {
                $data['cart'] = Session::get('cart');
            } else {
                $data['cart'] = null;
            }
            // $data['shippings'] = ShippingCharge::where('language_id',$currentLang->id)->get();
            $data['user'] = Auth::user();
            return view('front.product.checkout', $data);
        } else {
            Session::put('link', url()->current());
            return redirect(route('user.login'));
        }
    }

    // header cart load

    public function headerCartLoad()
    {
        if(Session::has('cart')){
            $cart = Session::get('cart');
        }else{
            $cart = [];
        }
        return view('front.load.header_cart',compact('cart'));
    }


    // cart qty get
    public function cartQtyGet()
    {
        if(Session::has('cart')){
            $qty = count(Session::get('cart'));
            return $qty;
        }
    }


    public function cartitemremove($id)
    {
        if ($id) {
            $cart = Session::get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                Session::put('cart', $cart);
            }

            $total = 0;
            $count = 0;
            foreach ($cart as $i) {
                $total += $i['price'] * $i['qty'];
                $count += $i['qty'];
            }
            $total = round($total, 2);

            return response()->json(['message' => 'Product removed successfully', 'count' => $count, 'total' => $total]);
        }
    }


    public function updatecart(Request $request)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            foreach ($request->product_id as $key => $id) {
            $product = Product::findOrFail($id);
                if($product->stock < $request->qty[$key]){
                    return response()->json(['error' => $product->title .' stock not available']);
                }
                if (isset($cart[$id])) {
                    if($product->is_downloadable){
                        $cart[$id]['qty'] =  1;
                    }else{
                        $cart[$id]['qty'] =  $request->qty[$key];
                    }

                    Session::put('cart', $cart);
                }
            }
        }
        $total = 0;
        $count = 0;
        foreach ($cart as $i) {
            $total += $i['price'] * $i['qty'];
            $count += $i['qty'];
        }

        $total = round($total, 2);

        return response()->json(['message' => 'Cart Update Successfully.', 'total' => $total, 'count' => $count]);
    }

}
