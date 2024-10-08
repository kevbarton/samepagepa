<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceType extends Model
{
    use HasFactory;
    protected $table = 'insurancetypes';
    protected $fillable = ['name'.'description'];
}
