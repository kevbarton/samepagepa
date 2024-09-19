<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeOtherWallet extends Model
{
    use HasFactory;
    protected $table = 'homeotherwallets';
    protected $fillable = ['user_id', 'wallet_id', 'homeother_type_id', 'homeother_type_name', 'label', 'company_name', 'telephone_number', 'renewal_date', 'contact', 'reminder_date'];
}
