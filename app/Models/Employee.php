<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'employeeID';
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

    public function contactInformation()
    {
        return $this->belongsTo(ContactInformation::class, 'contactInformationID');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'addressID');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentID');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleID');
    }
}



