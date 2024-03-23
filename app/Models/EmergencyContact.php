<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class EmergencyContact extends Model
{

    use  HasFactory;


    protected $primaryKey = 'emergencyContactID';

    protected $guarded = [];

}
