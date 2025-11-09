<?php

namespace App\Http\Controllers\User;


use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
        public function index()
    {
        $data['orders'] = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('user.dashboard', $data);
    }

    public function editprofile(){
        return view('user.editprofile');
    }

    public function updateprofile(Request $request, $id){
     

        $user = User::where('id', $id)->first();
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required:string|max:60',
            'phone'=> 'required|numeric',
            'zipcode'=> 'required|numeric',
            'address'=> 'required|max:150',
            'country'=> 'required|max:50',
            'state'=> 'required|max:50',
            'email'=> 'required|max:50',
        ]);

        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $user->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $user->image = $image;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->zipcode = $request->zipcode;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->email = $request->email;
        $user->save();


        Session::flash('success', 'Profile updated successfully!');
        return redirect()->back();

    }


    public function change_password(){
        return view('user.change-password');
    }

    public function update_password(Request $request, $id){

        $user = User::where('id', $id)->first();

     

        $messages = [
            'password.required' => 'The new password field is required',
            'password.confirmed' => "Password does'nt match"
        ];
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ], $messages);

        if(Hash::check($request->old_password, $user->password)) {
            $oldPassMatch = 'matched';
        } else {
            $oldPassMatch = 'not_matched';
        }
        if ($validator->fails() || $oldPassMatch=='not_matched') {
            if($oldPassMatch == 'not_matched') {
              $validator->errors()->add('oldPassMatch', true);
            }
            return redirect()->route('user.change_password')
                        ->withErrors($validator);
        }


        $user->password = bcrypt($request->password);
        $user->save();


     
        Session::flash('success', 'User password updated successfully!');
        return redirect()->back();

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.index');
    }


    public function orderDetails($id)
    {
        $order = Order::findOrFail($id);
        return view('user.order.details',compact('order'));
    }

    public function product_order(){

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

        return view('user.order.index', compact('orders'));
    }

    public function downloadable(){

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

        return view('user.downloadable', compact('orders'));
    }

}
