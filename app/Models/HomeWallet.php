<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWallet extends Model
{
    use HasFactory;
    protected $table = 'homewallets';
    protected $fillable = ['user_id', 'home_address_label', 'home_address_1', 'home_address_2', 'home_address_town', 'home_address_city', 'home_address_postc0de', 'home_mortgage_company_name', 'home_mortgage_amount', 'home_mortgage_policy_number', 'home_mortgage_telephone_number', 'home_mortgage_renewal_date', 'home_mortgage_reminder_date'];
    function insurance(){
        return $this->hasOne('App\Models\InsuranceWallet','wallet_id');
    }
    function others(){
        return $this->hasMany('App\Models\HomeOtherWallet','wallet_id');
    }
}
