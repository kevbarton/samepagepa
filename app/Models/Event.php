<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table='events';
    protected $fillable = ['user_id', 'wallet_id', 'title', 'date', 'repeat', 'time1', 'time2', 'location', 'description','place_id','lat','long','google_event_id','date2','google_calendar_id','active'];
    function wallet(){
        return $this->belongsTo('App\Models\UserWallet','wallet_id');
    }
    function members(){
        return $this->belongsToMany('App\Models\User','eventmembers','event_id','user_id');
    }
}
