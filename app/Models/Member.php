<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable= ['name', 'lastname' , 'email' , 'phone' , 'address' , 'city' , 'country'];
    public function courses(){
        return $this->belongsToMany(Course::class,'courses_members')->withPivot('paid');
    }
}
