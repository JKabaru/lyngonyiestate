<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\CasualWorker;
use App\Models\User;
use App\Models\Role;
use App\Models\CasualWorkerExpense;

class CasualEmployeesController extends Controller
{
    //
    //view for showing all the employees 
    public function AllCasualEmployees()
    {
        $casualemployees = CasualWorker::latest()->get();
        return view('backend.casuals.all_casuals_employees', compact('casualemployees'));
    }

    

    // view for adding employee
    public function AddCasualEmployee()
    {
        $casualemployees = CasualWorker::latest()->get();
        $allRoles = Role::all(); // Fetch all roles from the database
        $allDepartments = Department::all(); // Fetch all departments from the database
        $departments = Department::all(); // Fetch all departments from the database
        $roles = Role::all(); // Fetch all roles from the database
        return view('backend.casuals.add_casual_employee', compact('casualemployees', 'allRoles', 'allDepartments', 'departments', 'roles'));
    }

    
    public function StoreCasualEmployee(Request $request)
    {
        $request->validate([
            'name1' => 'required|string|max:255',
            'hireDate' => 'required|date',
            'dateOfBirth' => 'date',
            'status' => 'required|string|in:active,inactive,onLeave',
            

        ]);

        // dd($request);
        
        // Create an array with casual data
        $userData = [
            'name' => $request->name1,
            'hireDate' => $request->hireDate,
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
            'status' => $request->status,
            'contactInformation' => $request->contactInformation,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,


               ];
        // dd($userData);
        // Retrieve the newly created user after inserting the user data


        $casualWorker = CasualWorker::create($userData);

        // Retrieve the ID of the inserted record
        $insertedId = $casualWorker->casual_workers_id;
        
        $data = CasualWorker::find($insertedId);

        // // Sync departments
        // $selectedDepartmentIds = is_array($request->input('departmentName')) ? array_map('intval', $request->input('departmentName')) : [];
        // $data->departments()->sync($selectedDepartmentIds);

        // Debug: Dump received role names
        $receivedDepartmentNames = $request->input('departmentName');
        if (!is_array($receivedDepartmentNames)) {
            $receivedDepartmentNames = [$receivedDepartmentNames]; // Convert to array if it's a single value
        }
    
        // Map role names to role IDs
        $selectedDepartmentIds = [];
        foreach ($receivedDepartmentNames as $departmentName) {
            $department = Department::where('departmentName', $departmentName)->first();
            if ($department) {
                $selectedDepartmentIds[] = $department->department_id; // Use role_id instead of id
            } else {
                // Log or handle the case where the role isn't found
                // Optionally, you can add a fallback action, such as creating the role
            }
        }
        
        // Sync roles
        $data->departments()->sync($selectedDepartmentIds);











        $notification = [
            'message' => 'Casual added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.casual.employees')->with($notification);
    }



    // for edit 
    public function EditCasualEmployee($id){

        $casualemployees = CasualWorker::findOrFail($id);
        $allRoles = Role::all(); // Fetch all roles from the database
        $allDepartments = Department::all(); // Fetch all departments from the database
        $departments = Department::all(); // Fetch all departments from the database
        $roles = Role::all(); // Fetch all roles from the database
        return view('backend.casuals.edit_casual_employee', compact('casualemployees', 'allRoles', 'allDepartments', 'departments', 'roles'));
        

    }


    // updating  a casual
    public function UpdateCasualEmployee(Request $request)
    {

        // dd($request);
        $casual_workers_id = $request->casual_workers_id;
        
        // use the update laravel 
        CasualWorker::findOrFail($casual_workers_id)->update([
            

            'name' => $request->name1,
            'hireDate' => $request->hireDate,
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
            'status' => $request->status,
            'contactInformation' => $request->contactInformation,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,

        ]);

        $data = CasualWorker::find($casual_workers_id);

        // // Sync departments
        // $selectedDepartmentIds = is_array($request->input('departmentName')) ? array_map('intval', $request->input('departmentName')) : [];
        // $data->departments()->sync($selectedDepartmentIds);

        // Debug: Dump received role names
        $receivedDepartmentNames = $request->input('departmentName');
        if (!is_array($receivedDepartmentNames)) {
            $receivedDepartmentNames = [$receivedDepartmentNames]; // Convert to array if it's a single value
        }
    
        // Map role names to role IDs
        $selectedDepartmentIds = [];
        foreach ($receivedDepartmentNames as $departmentName) {
            $department = Department::where('departmentName', $departmentName)->first();
            if ($department) {
                $selectedDepartmentIds[] = $department->department_id; // Use role_id instead of id
            } else {
                // Log or handle the case where the role isn't found
                // Optionally, you can add a fallback action, such as creating the role
            }
        }
        
        // Sync roles
        $data->departments()->sync($selectedDepartmentIds);

        

        $notification = array(
            'message' => 'Casual Updated Successfully',
            'alert-type' => 'success'
        );

        

        return redirect()->route('all.casual.employees')->with($notification);


    }

    
    // Deleting a casual
    public function DeleteCasualEmployee($id){

        CasualWorker::findOrFail($id)->delete();
        
        return redirect()->back();
    }

    // for adding payment 
    public function AddCasualPayment($id){

        $casualemployees = CasualWorker::findOrFail($id);
        $allRoles = Role::all(); // Fetch all roles from the database
        $allDepartments = Department::all(); // Fetch all departments from the database
        $departments = Department::all(); // Fetch all departments from the database
        $roles = Role::all(); // Fetch all roles from the database
        $departments = $casualemployees->departments; // Retrieve all departments associated with the casual worker

        foreach ($departments as $department) {
            $departmentName = $department->departmentName;
            // Use $departmentName as needed
            if ($departmentName === null) {

                $notification = [
                    'message' => 'Select The users department',
                    'alert-type' => 'danger'
                ];
        
                $casualemployees = CasualWorker::latest()->get();
                return view('backend.casuals.all_casuals_employees', compact('casualemployees'))->with($notification);
        
            } else {
                
                return view('backend.casuals.add_casual_payment', compact('casualemployees', 'allRoles', 'allDepartments', 'departments', 'roles', 'departmentName'));

            }
        }


    }


    // store casual payment 
    public function StoreCasualPayment(Request $request)
    {

        
        // Validate the incoming request data
        // Validate the incoming request data
        $request->validate([
            'payment_date' => 'required|date',
            'date' => 'required|date',
            'rate' => 'required|numeric',
            'number_of_days' => 'required|integer|min:1',
        ]);

        // Calculate the amount
        $rate = $request->rate;
        $numberOfDays = $request->number_of_days;
        $amount = $rate * $numberOfDays;
        $payment_date = $request->payment_date;


        // dd($request->department_id);

        // Insert data into the casual_worker_expenses table
        $casualWorkerExpense = new CasualWorkerExpense();
        $casualWorkerExpense->casual_worker_id = $request->casual_workers_id;
        $casualWorkerExpense->department_id = $request->department_id;
        $casualWorkerExpense->date = $request->date;
        $casualWorkerExpense->rate = $rate;
        $casualWorkerExpense->number_of_days = $numberOfDays;
        $casualWorkerExpense->amount = $amount;
        $casualWorkerExpense->payment_status = 'done'; // Default payment status
        $casualWorkerExpense->payment_date = $payment_date; // No payment date initially
        $casualWorkerExpense->save();

        

        

        $notification = array(
            'message' => 'Casual payment Created Successfully',
            'alert-type' => 'success'
        );

        

        return redirect()->route('all.casual.payments')->with($notification);



    }


    //view for showing all the payments 
    public function AllCasualPayments()
    {
        $casualpayments = CasualWorkerExpense::latest()->get();
        return view('backend.casuals.all_casuals_payments', compact('casualpayments'));
    }


    // for editing payment 
    public function EditCasualPayment($id, $casual_worker_id, $department_id ){

        // dd($casual_workers_id);


        $allRoles = Role::all(); // Fetch all roles from the database
        $departments = Department::all(); // Fetch all departments from the database
        $roles = Role::all(); // Fetch all roles from the database
        $casualemployees = CasualWorker::all();
        // $departments = $casualemployees->departments; // Retrieve all departments associated with the casual worker
        // $casualemployees = CasualWorker::findOrFail($request->casual_workers_id);
        $casualemployees = CasualWorker::findOrFail($casual_worker_id);
        $departments = Department::findOrFail($department_id);
        $casualpayments = CasualWorkerExpense::findOrFail($id);
        $department_id = $department_id;
        
        $departmentName = $departments->departmentName;
        // Use $departmentName as needed



        return view('backend.casuals.edit_casual_payment', compact('casualemployees', 'allRoles', 'department_id',
                                                                     'departments', 'roles', 'departmentName', 'casualpayments'));
        

    }

    // store casual payment 
    public function UpdateCasualPayment(Request $request)
    {

        
        // dd($request);
        $rate = $request->rate;
        $numberOfDays = $request->number_of_days;
        $amount = $rate * $numberOfDays;
        $payment_date = $request->payment_date;

        $casualWorkerExpenseId = $request->casualpayments_id;

        // Insert data into the casual_worker_expenses table
        CasualWorkerExpense::findOrFail($casualWorkerExpenseId)->update([

        'date' => $request->date,
        'rate' => $rate,
        'number_of_days' => $numberOfDays,
        'amount' => $amount,
        'payment_status' => $request->payment_status,
        'payment_date' => $payment_date,
                
        ]);
        

        $notification = array(
            'message' => 'Casual paymennt Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.casual.payments')->with($notification);



    }
    
}
