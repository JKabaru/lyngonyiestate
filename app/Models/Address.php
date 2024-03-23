<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Address extends Model
{

    use HasFactory;

    protected $primaryKey = 'addressID';

    protected $guarded = [];

    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class, 'addressID');
    }
}
