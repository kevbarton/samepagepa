<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'role',
        'business_id',
        'active',
        'gender',
        'google_access_token',
        'invite_code',
        'invite_accepted'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    function familymembers(){
        return $this->hasMany('App\Models\User','business_id');
    }
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl(asset('app-assets/img/avatar.svg'))
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }
    function wallets(){
        return $this->hasMany('App\Models\UserWallet','user_id');
    }
    function lifeadmins(){
        return $this->hasMany('App\Models\PersonalWallet','user_id');
    }
    function homes(){
        return $this->hasMany('App\Models\HomeWallet','user_id');
    }
    function vehicles(){
        return $this->hasMany('App\Models\VehicleWallet','user_id');
    }
    function pets(){
        return $this->hasMany('App\Models\PetWallet','user_id');
    }
    function insurances(){
        return $this->hasMany('App\Models\InsuranceWallet','user_id');
    }
    function tasks(){
        return $this->belongsToMany('App\Models\Task','taskmembers','user_id','task_id');
      //  return $this->hasMany('App\Models\Task','user_id');
    }
    function events(){
        return $this->belongsToMany('App\Models\Event','eventmembers','user_id','event_id');
       // return $this->hasMany('App\Models\Event','user_id');
    }
    function googlecalendars(){
        return $this->hasMany('App\Models\GoogleCalendar','user_id');
    }
}
