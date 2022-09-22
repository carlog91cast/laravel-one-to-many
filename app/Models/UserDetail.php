<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $timeStamps = false;
    public function userDetails(){
        return $this->belongsTo('App\User');
    }
    
}
