<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Department extends Model
{

    use  HasFactory;


    protected $primaryKey = 'department_id';

    protected $guarded = [];


    

    public function users()
    {
        return $this->belongsToMany(User::class, 'permanent_worker_departments', 'department_id', 'permanent_worker_id');
    }

    public function casuals()
    {
        return $this->belongsToMany(CasualWorker::class, 'department_user', 'department_id', 'casualId');
    }



    
}
