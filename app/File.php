<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'filename',
        'extension',
        'description',
        'course_code'
    ];

    public function users(){
        $this->belongsToMany('App\User');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
