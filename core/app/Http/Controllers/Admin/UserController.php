<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
      public function index() {
          $data['users'] = Admin::orderBy('id', 'DESC')->get();

        
          return view('admin.user.index', $data);
        }
    
      public function add(){
          $data['roles'] = Role::all();
          return view('admin.user.add', $data);
      }

      public function edit($id) {
        $data['user'] = Admin::findOrFail($id);
        $data['roles'] = Role::all();
        return view('admin.user.edit', $data);
      }
  

      public function store(Request $request) {
  
  
        $request->validate([
            'username' => 'required|max:255|unique:admins,username',
            'email' => 'required|email|max:255|unique:admins,email',
            'name' => 'required|max:255',
            'password' => 'required|confirmed',
            'role' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
          ]);
  
        $user = new Admin();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/admin/img/admin-user/', $image);

            $user->image = $image;
        }


        $user->role_id = $request->role;
        $user->status = $request->status;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
  
        $notification = array(
            'messege' => 'User created successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
      }
  
  
      public function uploadUpdate(Request $request, $id) {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg');
  
        $rules = [
          'file' => [
            function($attribute, $value, $fail) use ($img, $allowedExts) {
              if (!empty($img)) {
                $ext = $img->getClientOriginalExtension();
                if(!in_array($ext, $allowedExts)) {
                    return $fail("Only png, jpg, jpeg image is allowed");
                }
              }
            },
          ],
        ];
  
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          $validator->getMessageBag()->add('error', 'true');
          return response()->json(['errors' => $validator->errors(), 'id' => 'user']);
        }
  
        $user = Admin::findOrFail($id);
        if ($request->hasFile('file')) {
          $filename = time() . '.' . $img->getClientOriginalExtension();
          $request->file('file')->move('assets/admin/img/propics/', $filename);
          @unlink('assets/admin/img/propics/'. $user->image);
          $user->image = $filename;
          $user->save();
        }
  
        return response()->json(['status' => "success", "image" => "User image", 'user' => $user]);
      }
  
  
      public function update(Request $request, $id) {
  
        $user = Admin::findOrFail($id);
  
        $request->validate([
            'username' => 'required|max:255|unique:admins,username,'.$id,
            'email' => 'required|email|max:255|unique:admins,email,'.$id,
            'name' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
  
    
        
        if($request->hasFile('image')){
            @unlink('assets/admin/img/admin-user/'. $user->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/admin/img/admin-user/', $image);

            $user->image = $image;
        }
 
  
        $user->role_id = $request->role;
        $user->status = $request->status;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();
  
        $notification = array(
            'messege' => 'User updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.user.index'))->with('notification', $notification);
      }
  
      public function delete($id) {

        if ($id == 1) {
          Session::flash('warning', 'You cannot delete the owner!');
          return back();
        }
  
        $user = Admin::findOrFail($id);
        @unlink('assets/admin/img/admin-user/'. $user->image);
        $user->delete();
  
        $notification = array(
            'messege' => 'User deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
      }
  
}
