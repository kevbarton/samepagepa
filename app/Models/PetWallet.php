<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetWallet extends Model
{
    use HasFactory;
    protected $table = 'petwallets';
    protected $fillable = ['user_id', 'name', 'date_of_birth', 'photo', 'checkup', 'chip_number', 'pedigree_certificate', 'vet_name', 'vet_telephone_number','medications'];
    function insurance(){
        return $this->hasOne('App\Models\InsuranceWallet','wallet_id');
    }
}
