<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ContactInformation extends Model
{

    use HasFactory;


    protected $primaryKey = 'contactInformationID';

    protected $guarded = [];

    public $timestamps = false;
    // public $timestamps = false; for disabling the timestamos

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeID');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'addressID');
    }

    public function emergencyContact()
    {
        return $this->belongsTo(EmergencyContact::class, 'emergencyContactID');
    }
}
