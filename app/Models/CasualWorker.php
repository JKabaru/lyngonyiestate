<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasualWorker extends Model
{
    use HasFactory;
    protected $primaryKey = 'casual_workers_id';
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
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    
   

    

    public function departments()
    {
        // return $this->belongsToMany(Department::class, 'department_user', 'casual_workers_id', 'department_id');
        return $this->belongsToMany(Department::class, 'department_user', 'casualId', 'department_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function expenses()
    {
        return $this->hasMany(CasualWorkerExpense::class, 'casual_worker_id');
    }
}


