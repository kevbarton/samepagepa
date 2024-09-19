<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalWallet extends Model
{
    use HasFactory;
    protected $table = 'personalwallets';
    protected $fillable = ['user_id', 'passport_number', 'passport_expire_date', 'passport_start_date', 'passport_issued_location', 'passport_reminder_date', 'driving_license_number', 'driving_license_start_date', 'driving_license_expire_date'];
    function insurance(){
        return $this->hasOne('App\Models\InsuranceWallet','wallet_id');
    }
    function loans(){
        return $this->hasMany('App\Models\LoanWallet','wallet_id');
    }
    function others(){
        return $this->hasMany('App\Models\PersonalOtherWallet','wallet_id');
    }
}
