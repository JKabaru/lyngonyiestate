<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
// use App\Http\Controllers\DepartmentsController;
USE App\Http\Controllers\Backend\DepartmentsController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\CasualEmployeesController;

use App\Http\Controllers\Backend\RoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// 

    

// Group Admin Middleware
Route::middleware(['auth'])->group(function(){

    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');



}); //  End Group Admin Middleware


Route::middleware(['auth','role:manager'])->group(function(){

    Route::get('manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
}); //  End Group Mnager Middleware


Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


// Group Admin Middleware and the controller 
Route::middleware(['auth', 'role:admin'])->group(function(){

    // Group for the Department controller
    Route::controller(DepartmentsController::class)->group(function()
    {
        Route::get('all/departments',  'AllDepartments')->name('all.departments');
        Route::get('add/department',  'AddDepartment')->name('add.department');
        Route::post('store/department',  'StoreDepartment')->name('store.department');
        Route::get('edit/department/{department_id}',  'EditDepartment')->name('edit.department');
        Route::post('update/department',  'UpdateDepartment')->name('update.department');
        Route::get('delete/department/{department_id}',  'DeleteDepartment')->name('delete.department');

        // department view 
        Route::get('view/departments',  'DepartmentView')->name('view.departments');


    });

    

    // Group for the Employee controller
    Route::controller(EmployeesController::class)->group(function()
    {
        Route::get('all/employees',  'AllEmployees')->name('all.employees');
        Route::get('add/employee',  'AddEmployee')->name('add.employee');
        Route::post('store/employee',  'StoreEmployee')->name('store.employee');
        Route::get('edit/employee/{employeeId}',  'EditEmployee')->name('edit.employee');
        Route::post('update/employee',  'UpdateEmployee')->name('update.employee');
        Route::get('delete/employee/{employeeId}',  'DeleteEmployee')->name('delete.employee');
    });

    // Group for the Employee controller
    Route::controller(CasualEmployeesController::class)->group(function()
    {
        Route::get('all/casual/employees',  'AllCasualEmployees')->name('all.casual.employees');
        Route::get('add/casual/employee',  'AddCasualEmployee')->name('add.casual.employee');
        Route::post('store/casual/employee',  'StoreCasualEmployee')->name('store.casual.employee');
        Route::get('edit/casual/employee/{casual_workers_id}',  'EditCasualEmployee')->name('edit.casual.employee');
        Route::post('update/casual/employee',  'UpdateCasualEmployee')->name('update.casual.employee');
        Route::get('delete/casual/employee/{casual_workers_id}',  'DeleteCasualEmployee')->name('delete.casual.employee');

        // for expenses 
        Route::get('add/casual/payment/{casual_workers_id}',  'AddCasualPayment')->name('add.casual.payment');
        Route::post('store/casual/payment',  'StoreCasualPayment')->name('store.casual.payment');
        Route::get('all/casual/payments',  'AllCasualPayments')->name('all.casual.payments');
        Route::get('edit/casual/payment/{id}/{casual_workers_id}/{department_id}',  'EditCasualPayment')->name('edit.casual.payment');
        Route::post('update/casual/payment',  'UpdateCasualPayment')->name('update.casual.payment');


    });



    // Permissions controller
    Route::controller(RoleController::class)->group(function()
    {
        Route::get('all/permissions',  'AllPermissions')->name('all.permissions');
        Route::get('add/permission',  'AddPermission')->name('add.permission');
        Route::post('store/permission',  'StorePermission')->name('store.permission');
        Route::get('edit/permission/{id}',  'EditPermission')->name('edit.permission');
        Route::post('update/permission',  'UpdatePermission')->name('update.permission');
        Route::get('delete/permission/{id}',  'DeletePermission')->name('delete.permission');
    });

    // Group for the Role controller
    Route::controller(RolesController::class)->group(function()
    {
        Route::get('all/roles',  'AllRoles')->name('all.roles');
        Route::get('add/role',  'AddRole')->name('add.role');
        Route::post('store/role',  'StoreRole')->name('store.role');
        Route::get('edit/role/{id}',  'EditRole')->name('edit.role');
        Route::post('update/role',  'UpdateRole')->name('update.role');
        Route::get('delete/role/{id}',  'DeleteRole')->name('delete.role');

        // adding permissions to roles
        Route::get('add/roles/permissions',  'AddRolesPermission')->name('add.roles.permission');
        Route::post('store/roles/permissions',  'StoreRolesPermission')->name('role.permission.store');
        Route::get('all/roles/permissions',  'AllRolesPermission')->name('all.roles.permission');

        Route::get('edit/roles/permissions/{id}',  'EditRolesPermission')->name('admin.edit.role');
        Route::post('update/roles/permissions/{id}',  'UpdateRolesPermission')->name('admin.roles.update');
        Route::get('delete/roles/permissions/{id}',  'DeleteRolesPermission')->name('admin.delete.role');

    });
    
    // Admin User all route
    Route::controller(AdminController::class)->group(function()
    {
        Route::get('all/admin',  'AllAdmin')->name('all.admin');
        Route::get('add/admin',  'AddAdmin')->name('add.admin');
        Route::post('store/admin',  'StoreAdmin')->name('store.admin');
        Route::get('edit/admin/{employeeId}',  'EditAdmin')->name('edit.admin');
        Route::post('update/admin/{employeeId}',  'UpdateAdmin')->name('update.admin');
        Route::get('delete/department/{department_id}',  'DeleteDepartment')->name('delete.department');
    });

    


}); //  End Group Admin Middleware