<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    //
    //view for showing all the employees 
    public function AllEmployees()
    {
        $employees = User::latest()->get();
        return view('backend.employees.all_employees', compact('employees'));
    }

    

    // view for adding employee
    public function AddEmployee()
    {
        $employees = User::latest()->get();
        $allRoles = Role::all(); // Fetch all roles from the database
        $allDepartments = Department::all(); // Fetch all departments from the database
        $departments = Department::all(); // Fetch all departments from the database
        $roles = Role::all(); // Fetch all roles from the database
        return view('backend.employees.add_employee', compact('employees', 'allRoles', 'allDepartments', 'departments', 'roles'));
    }

    // // storing a employee
    // public function StoreEmployee(Request $request)
    // {

    //     $request->validate([
    //         'idNumber' => 'required|string|max:255',
    //         'accountNo' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'hireDate' => 'required|date',
    //         'dateOfBirth' => 'required|date',
    //         'gender' => 'required|string|in:male,female,other|max:10',
    //         'status' => 'required|string|in:active,inactive,onLeave',
    //         'contactInformation' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //     ]);
        

        
    //             // Create an array with user data
    //     $userData = [
    //         'idNumber' => $request->idNumber,
    //         'accountNo' => $request->accountNo,
    //         'name' => $request->name,
    //         'hireDate' => $request->hireDate,
    //         'dateOfBirth' => $request->dateOfBirth,
    //         'gender' => $request->gender,
    //         'status' => $request->status,
    //         'contactInformation' => $request->contactInformation,
    //         'email' => $request->email,
    //         'address' => $request->address,
    //     ];

        

    //             // Retrieve the received role names from the request
    //     $receivedRoleNames = $request->input('roleName');

    //     // Initialize an array to store the role IDs
    //     $selectedRoleIds = [];

    //     // Map role names to role IDs
    //     foreach ($receivedRoleNames as $roleName) {
    //         $role = Role::where('roleName', $roleName)->first();
    //         if ($role) {
    //             $selectedRoleIds[] = $role->id; // Use role_id instead of id
    //         } else {
    //             // Handle the case where the role isn't found
    //             // You may log an error or take other appropriate action
    //         }
    //     }

    //     // Sync roles for the new user
    //     $user = User::orderBy('created_at', 'desc')->first(); // Retrieve the newly created user
    //     $user->roles()->sync($selectedRoleIds);

    //     // Retrieve the received department names from the request
    //     $receivedDepartmentNames = $request->input('departmentName');

    //     // Initialize an array to store the department IDs
    //     $selectedDepartmentIds = [];

    //     // Map department names to department IDs
    //     foreach ($receivedDepartmentNames as $departmentName) {
    //         $department = Department::where('departmentName', $departmentName)->first();
    //         if ($department) {
    //             $selectedDepartmentIds[] = $department->id; // Use department_id instead of id
    //         } else {
    //             // Handle the case where the department isn't found
    //             // You may log an error or take other appropriate action
    //         }
    //     }

    //     // Sync departments for the new user
    //     $user->departments()->sync($selectedDepartmentIds);


    //     // Handle other fields and operations for the new user
    //     if ($request->file('photo')) {
    //         $file = $request->file('photo');
    //         // Delete the existing photo if it exists
    //         @unlink(public_path('upload/employee_images/'.$user->photo));
    //         // Move the new photo to the desired location
    //         $fileName = date('YmdHi').$file->getClientOriginalName();
    //         $file->move(public_path('upload/employee_images/'), $fileName);
    //         // Update the user's photo field
    //         $user->photo = $fileName;
    //     }


    //     // Save the changes to the user
    //     $user->save();
    //     // Insert the user data into the users table
    //     User::insert($userData,user);


    //     $notification = array(
    //         'message' => 'Employee added Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('all.employees')->with($notification);


    // }

    // storing a employee
public function StoreEmployee(Request $request)
{
    $request->validate([
        'idNumber' => 'required|string|max:255',
        'accountNo' => 'required|string|max:255',
        'name1' => 'required|string|max:255',
        'hireDate' => 'required|date',
        'dateOfBirth' => 'required|date',
        'gender' => 'required|string|in:male,female,other|max:10',
        'status' => 'required|string|in:active,inactive,onLeave',
        'contactInformation' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'new_password' => 'required|confirmed'

    ]);

    
    // Create an array with user data
    $userData = [
        'idNumber' => $request->idNumber,
        'accountNo' => $request->accountNo,
        'name' => $request->name1,
        'hireDate' => $request->hireDate,
        'dateOfBirth' => $request->dateOfBirth,
        'gender' => $request->gender,
        'status' => $request->status,
        'contactInformation' => $request->contactInformation,
        'role' => $request->role,
        'email' => $request->email,
        'address' => $request->address,
        'password' => Hash::make($request->new_password)    ];

    // Retrieve the newly created user after inserting the user data
    User::insert($userData);

    $notification = [
        'message' => 'Employee added Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.employees')->with($notification);
}



    // for edit 
    public function EditEmployee($id){

        $employees = User::findOrFail($id);
        $allRoles = Role::all(); // Fetch all roles from the database
        $allDepartments = Department::all(); // Fetch all departments from the database
        $departments = Department::all(); // Fetch all departments from the database
        $roles = Role::all(); // Fetch all roles from the database
        return view('backend.employees.edit_employee', compact('employees', 'allRoles', 'allDepartments', 'departments', 'roles'));
        

    }


    // updating  a employee
    public function UpdateEmployee(Request $request)
    {

        // dd($request);
        $employeeId = $request->employeeId;
        
        // use the update laravel 
        User::findOrFail($employeeId)->update([
            

            'idNumber' => $request->idNumber,
            'accountNo' => $request->accountNo,
            'name' => $request->name1,
            'hireDate' => $request->hireDate,
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
            'status' => $request->status,
            'role' => $request->role,
            'contactInformation' => $request->contactInformation,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->new_password)  

        ]);

        

        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        

        return redirect()->route('all.employees')->with($notification);


    }

    
    // Deleting a employee
    public function DeleteEmployee($id){

        User::findOrFail($id)->delete();
        
        return redirect()->back();
    }
}
