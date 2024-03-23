<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Model
{

    use HasApiTokens, HasFactory, Notifiable;


    protected $primaryKey = 'roleID';

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentID');
    }
}
