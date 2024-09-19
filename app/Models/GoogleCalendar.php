<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleCalendar extends Model
{
    use HasFactory;
    protected $table='googlecalendars';
    protected $fillable=['user_id', 'email', 'token','active'];

    function events(){
        return $this->hasMany('App\Models\Event','google_calendar_id','id');
    }

}
