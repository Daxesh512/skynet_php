<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all();
        return view('admin.role.index', $data);
    }

    public function add()
    {
        return view('admin.role.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:250',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        $notification = array(
            'messege' => 'Role Added Successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.role.index'))->with('notification', $notification);
    }

    public function edit($id)
    {

        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:250',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $notification = array(
            'messege' => 'Role Updated Successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.role.index'))->with('notification', $notification);
    }

    public function managePermissions($id)
    {
        $data['role'] = Role::find($id);
        return view('admin.role.permission', $data);
    }

    public function updatePermissions(Request $request, $id)
    {

        $permissions = json_encode($request->permissions);
        $role = Role::find($id);
        $role->permissions = $permissions;
        $role->save();

        $notification = array(
            'messege' => "Permissions Updated Successfully for '$role->name' role",
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function delete(Request $request, $id)
    {

        $role = Role::findOrFail($id);
        if ($role->admins()->count() > 0) {
            $notification = array(
                'messege' => "Please delete the users under this role first.",
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }
        $role->delete();

        $notification = array(
            'messege' => "Role deleted successfully!",
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

}
