<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',        
        'first_name',
        'middle_name',
        'last_name',
        'level',
        'phone',
        'address',
        'dob',
        'mat_no',
        'profile_pic',
        'employment_no',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getFullNameAttribute(){
        return $this->first_name. " ". $this->last_name;
    }

}
