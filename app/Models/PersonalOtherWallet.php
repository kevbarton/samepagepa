<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalOtherWallet extends Model
{
    use HasFactory;
    protected $table = 'personalotherwallets';
    protected $fillable = ['user_id', 'wallet_id', 'personalother_type_id', 'personalother_type_name', 'label', 'company_name', 'telephone_number', 'renewal_date', 'contact', 'reminder_date'];
}
