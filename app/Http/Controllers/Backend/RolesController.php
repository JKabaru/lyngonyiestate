<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
use App\Models\User;
use PhpParser\Node\Expr\Cast\Array_;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    //view for showing all the roles 
    public function AllRoles()
    {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }

    // view for adding role
    public function AddRole()
    {
        $roles = Role::all();
       
        return view('backend.pages.roles.add_role', compact('roles'));
    }

    // storing a role
    public function StoreRole(Request $request)
    {

        

        Role::create([
            'name' => $request->name1,
           
        ]);

        

        $notification = array(
            'message' => 'Role added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);


    }


    // for edit 
    public function EditRole($id){

        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_role', compact('roles'));

    }


    // updating  a role
    public function UpdateRole(Request $request)
    {

        
        $role_id = $request->id;
        
        // use the update laravel 
        Role::findOrFail($role_id)->update([
            'name' => $request->name1,
           
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);


    }

    
    // Deleting a role
    public function DeleteRole($id){

        Role::findOrFail($id)->delete();
        
        $notification = array(

            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );

        
        return redirect()->back()->with($notification);
    }



    // Add role Permision Method 

    public function AddRolesPermission()
    {

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('backend.pages.rolesetup.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function StoreRolesPermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item )
        {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

// we are using this because the table has no model 
            DB::table('role_has_permissions')->insert($data);

        }//end for each 


        $notification = array(

            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );

        
        return redirect()->back()->with($notification);

    }


    // viewing all roles permissions 
    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));

    }

    // Editing all roles permissions 
    public function EditRolesPermission($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('backend.pages.rolesetup.edit_role_permission', compact('role', 'permissions', 'permission_groups'));

    }

    // Updating all roles permissions 
    public function UpdateRolesPermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;
        $permissions = Permission::whereIn('id', $permissions)->pluck('name');

        if (!empty($permissions))
        {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);



    }



    // Deleting all roles permissions 
    public function DeleteRolesPermission($id)
    {

        $role = Role::findOrFail($id);

        if (!is_null($role))
        {
            $role->Delete(); 

            $notification = array(
                'message' => 'Permission Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.roles.permission')->with($notification);
        }
    }

    

}
