<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanWallet extends Model
{
    use HasFactory;
    protected $table = 'loanwallets';
    protected $fillable = ['user_id', 'wallet_id', 'loan_type_id', 'loan_type_name', 'company_name', 'amount', 'policy_number', 'telephone_number', 'renewal_date', 'reminder_date'];
}
