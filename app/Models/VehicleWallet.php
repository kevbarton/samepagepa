<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleWallet extends Model
{
    use HasFactory;
    protected $table = 'vehiclewallets';
    protected $fillable = ['user_id', 'vehicle_type_id', 'vehicle_type_name', 'vehicle_registration', 'vehicle_make', 'vehicle_model', 'vehicle_photo', 'mot_renewal_date', 'mot_reminder_date', 'service_garage', 'service_telephone_number', 'service_last_date', 'service_cost', 'service_next_Date', 'service_reminder_date', 'roadside_assistance_company_name', 'roadside_assistance_amount', 'roadside_assistance_telephone_number', 'roadside_assistance_policy_number', 'roadside_assistance_renewal_date', 'roadside_assistance_reminder_date'];

    function insurance(){
        return $this->hasOne('App\Models\InsuranceWallet','wallet_id');
    }
    function loan(){
        return $this->hasOne('App\Models\LoanWallet','wallet_id');
    }
}
