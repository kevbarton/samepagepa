<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalOtherType extends Model
{
    use HasFactory;
    protected $table = 'personalothertypes';
    protected $fillable = ['name'.'description'];
}
