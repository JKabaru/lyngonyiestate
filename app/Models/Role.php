<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Model
{

    use HasApiTokens, HasFactory, Notifiable;


    protected $primaryKey = 'role_id';

    protected $guarded = [];

    // public function department()
    // {
    //     return $this->belongsTo(Department::class, 'departmentID');
    // }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permanent_worker_roles', 'role_id', 'permanent_worker_id');
    }
    
    
}
