<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
// use App\Models\Role;
use Illuminate\Http\Request;

use App\Models\CasualWorkerExpense;


use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;



use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    //
    public function AdminDashboard(Request $request)
    {
        // Define start and end dates based on the selected timeframe
        $timeframe = $request->input( 'daily');   
        $startDate = $this->getStartDate($timeframe);
        $endDate = now(); // End date is today by default

        // Fetch the data from the database based on the specified timeframes
        $data = $this->fetchData($startDate, $endDate);

        // Organize the data for visualization (e.g., group by payment date)
        $formattedData = $this->formatDataForChart($data);

        $result = DB::select("
        SELECT YEAR(payment_date) AS year, SUM(amount) AS total_amount 
        FROM casual_worker_expenses 
        GROUP BY YEAR(payment_date);
        ");

        $result2 = DB::select("
        SELECT DAYNAME(payment_date) AS day_name, DAY(payment_date) AS day_number, 
       SUM(amount) AS total_amount 
FROM casual_worker_expenses 
GROUP BY DAY(payment_date), DAYNAME(payment_date);

 

        ");

        $result3 = DB::select("
        SELECT MONTHNAME(payment_date) AS month_name, MONTH(payment_date) AS MONTH, 
       SUM(amount) AS total_amount 
FROM casual_worker_expenses 
GROUP BY MONTH(payment_date), MONTHNAME(payment_date);


        ");

       
    

        $data = [];
        foreach ($result as $value) {
            $data[] = [$value->year, (float) $value->total_amount]; // Cast total_amount to float if it's a numeric value
        }

        $dailydata = [];
        foreach ($result2 as $value) {
            $dailydata[] = [$value->day_name, (float) $value->total_amount]; // Cast total_amount to float if it's a numeric value
        }

        $monthlydata = [];
        foreach ($result3 as $value) {
            $monthlydata[] = [$value->month_name, (float) $value->total_amount]; // Cast total_amount to float if it's a numeric value
        }


        // Pass the formatted data to the view for rendering the line graph
        return view('admin.index', compact('data', 'dailydata', 'monthlydata'));
    }

    // Method to fetch data based on the specified timeframe
    private function fetchData($startDate, $endDate)
    {
        return CasualWorkerExpense::whereBetween('payment_date', [$startDate, $endDate])
            ->select(DB::raw('DATE(payment_date) as payment_date'), DB::raw('SUM(amount) as total_amount'))
            ->groupBy('payment_date')
            ->get();
    }

    // Method to format the data for visualization (e.g., group by payment date)
    private function formatDataForChart($data)
    {
        $formattedData = [];
        foreach ($data as $payment) {
            $formattedData[$payment->payment_date] = $payment->total_amount;
        }
        return $formattedData;
    }

    // Method to get the start date based on the selected timeframe
    private function getStartDate($timeframe)
    {
        switch ($timeframe) {
            case 'daily':
                return now()->startOfDay();
            case 'weekly':
                return now()->startOfWeek();
            case 'yearly':
                return now()->startOfYear();
            default: // Default to today
                return now()->startOfDay();
        }
    }

    // for logout
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }//end method

    //
    public function AdminLogin(){

        return view('admin.admin_login');

    }// end method

    // Profile
    public function AdminProfile(){

        $id = Auth::user()->employeeId;
        $profileData = User::find($id);
        $allRoles = Role::all(); // Fetch all roles from the database
        $allDepartments = Department::all(); // Fetch all departments from the database
        return view('admin.admin_profile_view', compact('profileData', 'allRoles', 'allDepartments'));
        
    }


    // storing the profile changes 
    public function AdminProfileStore(Request $request){

        $id = Auth::user()->employeeId;
        // $data = User::find($id);
        $data = User::find($id);
        $data->idNumber = $request->idNumber;
        $data->accountNo = $request->accountNo;
        $data->name = $request->name;
        $data->hireDate = $request->hireDate;
        $data->dateOfBirth = $request->dateOfBirth;
        $data->gender = $request->gender;
        $data->status = $request->status;
        $data->contactInformation = $request->contactInformation;
        $data->email = $request->email;
        $data->role = $request->roleName;
        
       
        

        // Sync departments
        $selectedDepartmentIds = is_array($request->input('departmentName')) ? array_map('intval', $request->input('departmentName')) : [];
        $data->departments()->sync($selectedDepartmentIds);

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
    
        // // Retrieve user's roles after syncing
        // $updatedRoles = $data->roles;



        if ($request->file('photo'))
        {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $fileName);
            $data['photo'] = $fileName;

        }

        $data->address = $request->address;


        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated sucessfully',
            'alert-type' => 'success'
        );
        

        return redirect()->back()->with($notification);

    }

    public function AdminChangePassword(){

        $id = Auth::user()->employeeId;
        $profileData = User::find($id);
        $allRoles = Role::all(); // Fetch all roles from the database
        $allDepartments = Department::all(); // Fetch all departments from the database
        return view('admin.admin_change_password', compact('profileData', 'allRoles', 'allDepartments'));
    }

    // New Password 
    public function AdminUpdatePassword(Request $request){

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'

        ]);

        // Match Old Password
        // dump($request->old_password);
        // dd(!Hash::check($request->old_password, auth::user()->password));
        if (!Hash::check($request->old_password, auth::user()->password)){

            $notification = array(
                'message' => 'Old Password Does not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        }
        
        // Update The New Password 
        $user = User::findOrFail(auth()->user()->employeeId);
        if($user->update(['password' => Hash::make($request->new_password)])){

            $notification = array(
                'message' => 'Password Changed Successfully  ',
                'alert-type' => 'success'
            );


            return redirect()->back()->with($notification);

        }

        

        

    }// end method


    // all admin 
    public function AllAdmin()
    {
        $alladmin = User::where('role', 'admin')->get();  
        // $alladmin = User::all();  

        return view('backend.pages.admin.all_admin', compact('alladmin'));

    }

      // add admin 
    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));

    }


          // Store admin 
    public function StoreAdmin(Request $request)
    {

            // Validate the request data, including unique email validation
        $request->validate([
            // Other validation rules...
            'email' => 'required|string|email|max:255|unique:users,email', // Ensure email is unique
        ]);

        // $roles = Role::all();
        $user = new User();
        $user->name = $request->name1;
        $user->contactInformation = $request->contactInformation;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            // Convert to array if $request->roles is a string
            $roleIds = is_array($request->roles) ? $request->roles : [$request->roles];
        
            foreach ($roleIds as $roleId) {
                $role = Role::find($roleId);
                if ($role) {
                    $user->assignRole($role);
                }
            }
        }
        
        


        $notification = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.admin')->with($notification);

    }


    // Edit Admin 
    public function EditAdmin($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $allDepartments = Department::all(); // Fetch all departments from the database
        $departments = Department::all(); // Fetch all departments from the database

        return view('backend.pages.admin.edit_admin', compact('roles', 'user', 'departments','allDepartments'));

    }

       // Update admin 
       public function UpdateAdmin(Request $request, $id)
       {
   
               
   
           // $roles = Role::all();
           $user = User::findOrFail($id);
           $user->name = $request->name1;
           $user->contactInformation = $request->contactInformation;
           $user->email = $request->email;
           $user->email = $request->email;
           $user->role = 'admin';
           $user->status = 'active';
           $user->save();

           $user->roles()->detach();
   
           if ($request->roles) {
               // Convert to array if $request->roles is a string
               $roleIds = is_array($request->roles) ? $request->roles : [$request->roles];
           
               foreach ($roleIds as $roleId) {
                   $role = Role::find($roleId);
                   if ($role) {
                       $user->assignRole($role);
                   }
               }
           }
           

           $data = User::find($id);

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
               'message' => 'Admin User Updated Successfully',
               'alert-type' => 'success'
           );
   
   
           return redirect()->route('all.admin')->with($notification);
   
       }

}
