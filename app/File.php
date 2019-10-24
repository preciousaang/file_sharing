<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name',
        'filename',
        'extension',
    ];

    public function users(){
        $this->belongsToMany('App\User');
    }
}
