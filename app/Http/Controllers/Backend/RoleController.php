<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //

    public function AllPermissions()
    {

        $permissions = Permission::all();
        return view('backend.pages.permissions.all_permissions', compact('permissions'));
    }

    public function AddPermission()
    {

        $permissions = Permission::all();
        return view('backend.pages.permissions.add_permissions', compact('permissions'));
    }

    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name1,
            'group_name' => $request->group_name,

        
        ]);

        $notification = array(
            'message' => 'Permission added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);

        
    }

    public function EditPermission($id)
    {
        $permissions = Permission::findOrFail($id);
        return view('backend.pages.permissions.edit_permissions', compact('permissions'));


    }

    public function UpdatePermission(Request $request)
    {

        $Permission_id = $request->id;

        Permission::findOrFail($Permission_id)->update([
            'name' => $request->name1,
            'group_name' => $request->group_name,

        
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);

        
    }


    public function DeletePermission($id)
    {

        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        
        return redirect()->back()->with($notification);


        
    }

}
