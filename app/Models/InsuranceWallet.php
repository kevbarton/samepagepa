<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceWallet extends Model
{
    use HasFactory;
    protected $table = 'insurancewallets';
    protected $fillable = ['user_id', 'wallet_id', 'insurance_type_id', 'insurance_type_name', 'company_name', 'telephone_number', 'policy_number', 'cost', 'renewable_date', 'claim_number', 'reminder_date'];
}
