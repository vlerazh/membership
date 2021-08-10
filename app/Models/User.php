<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable; 
use Course;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Billable ;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'trial_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'trial_until'
    ];

    
    public function getFreeTrialDaysLeftAttribute()
    {
   
        if ($this->plan_until) { 
            return 0;
        }

        return now()->diffInDays($this->trial_until, false);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
