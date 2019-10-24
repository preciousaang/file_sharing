<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',        
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'level',
        'mat_no',
        'employment_no',
        'profile_pic',
    ];

    public function user(){
        $this->belongsTo('App\User');
    }

}
