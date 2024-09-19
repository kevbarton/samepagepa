<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table='tasks';
    protected $fillable = ['user_id', 'wallet_id', 'title', 'date', 'repeat', 'time1', 'time2', 'location', 'description','place_id','lat','long','active'];

    function wallet(){
        return $this->belongsTo('App\Models\UserWallet','wallet_id');
    }
    function members(){
        return $this->belongsToMany('App\Models\User','taskmembers','task_id','user_id');
    }
}
