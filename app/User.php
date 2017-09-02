<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table='users';
    public function scopeFindUserByUsername($query,$user_name)
    {
        return $query->where('user_name', $user_name)->first();
    }
    
    public function scopeFindAdmin($query)
    {
        return $query->where('level', 1)->first();
    }
    public function scopeFindLevelFromUserName($query,$user_name)
    {
        return $query->where('user_name', $user_name)->pluck('level')->first();
    }
}