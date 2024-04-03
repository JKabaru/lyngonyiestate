<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

use App\Models\CasualWorker;
use App\Models\User;

class DepartmentsController extends Controller
{
    //view for showing all the departments 
    public function AllDepartments()
    {
        $departments = Department::latest()->get();
        return view('backend.departments.all_departments', compact('departments'));
    }

    // view for adding department
    public function AddDepartment()
    {
        $departments = Department::latest()->get();
        return view('backend.departments.add_department', compact('departments'));
    }

    // storing a department
    public function StoreDepartment(Request $request)
    {

        $request->validate([
            'departmentName' => 'required|unique:departments|max:200',
            'description' => 'required'

        ]);

        Department::insert([
            'departmentName' => $request->departmentName,
            // 'status' => $request->status,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Department added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.departments')->with($notification);


    }


    // for edit 
    public function EditDepartment($id){

        $departments = Department::findOrFail($id);
        return view('backend.departments.edit_department', compact('departments'));

    }


    // updating  a department
    public function UpdateDepartment(Request $request)
    {

        
        $department_id = $request->department_id;
        
        // use the update laravel 
        Department::findOrFail($department_id)->update([
            'departmentName' => $request->departmentName,
            // 'status' => $request->status,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Department Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.departments')->with($notification);


    }

    
    // Deleting a department
    public function DeleteDepartment($id){


        $notification = array(
            'message' => 'Department Updated Successfully',
            'alert-type' => 'danger'
        );

        Department::findOrFail($id)->delete()->with($notification);
        
        return redirect()->back();
    }


    // All Department users 
    public function DepartmentView()
    {
        // // Retrieve managers with their departments
        // $alladmin = User::where('role', 'admin')->get();      
        // $casualemployees = CasualWorker::latest()->get();
        // $allDepartments = Department::all(); // Fetch all departments from the database


            // Retrieve all departments
        $allDepartments = Department::all();

        // Loop through each department to retrieve associated managers and casual employees
        foreach ($allDepartments as $department) {
            // Retrieve managers for this department
            $managers = User::where('role', 'admin')->whereIn('employeeId', $department->users()->pluck('permanent_worker_id'))->get();

            // Retrieve casual employees for this department
            $casualEmployees = CasualWorker::whereIn('casual_workers_id', $department->casuals()->pluck('casualId'))->get();

            // Assign managers and casual employees to the department
            $department->managers = $managers;
            $department->casualEmployees = $casualEmployees;

        }
        // Pass grouped data to the view
        return view('backend.departments.department_view', compact('allDepartments'));
    }


}
