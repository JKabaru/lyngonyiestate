<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Department extends Model
{

    use  HasFactory;


    protected $primaryKey = 'departmentID';

    protected $guarded = [];


    public function manager()
    {
        return $this->belongsTo(Employee::class, 'managerID');
    }
}
