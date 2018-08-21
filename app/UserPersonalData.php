<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class UserPersonalData extends Model
{
    protected $table = 'user_personal_data';

    public function user() {
        return $this->belongsToOne('App\User');
    }
}
