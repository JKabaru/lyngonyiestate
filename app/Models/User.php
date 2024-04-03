<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;


use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
        
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $primaryKey = 'employeeId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
                'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
//    Grouping the permission from the DB permission table 

    public static function getPermissionGroup()
    {

        $permissionGroups = DB::table('permissions')->select('group_name')->
                            groupBy('group_name')->get();
        return $permissionGroups;
    }//End Method 


    public static function getPermissionByGroupName($group_name)
    {

        $permission = DB::table('permissions')
                                    ->select('name', 'id')
                                    ->where('group_name', $group_name )
                                    ->get();
                                    
        return $permission;
    }//End Method 


    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach($permissions as $permission)
        {
            
            if (!$role->hasPermissionTo($permission->name))
            {
                $hasPermission = false;

            }
            return $hasPermission;
        }
    }// End Method





    // 
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'permanent_worker_roles', 'permanent_worker_id', 'id');
    // }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'permanent_worker_departments', 'permanent_worker_id', 'department_id');
    }


}
