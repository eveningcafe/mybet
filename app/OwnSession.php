<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnSession extends Model
{
    //
    protected $table='sessions';
    public function scopePutLog($query,$ip_adress,$user_name,$level)
    {

    	return $query->insert(['ip_adress' =>$ip_adress , 'user_name' => $user_name]
    );
    }
}
