<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMatch extends Model
{
    //
    protected $table='user_matchs';
    public function scopeGetIdMatchsUserBet($query,$user)
    {
        return $query->where('user_id', $user->id)->value('match_id')->get();
    }
    public function scopeFindBetByUser($query,$user)
    {
    	return $query->where('user_id', $user->id)->get();
    }
    public function scopeFindBetOfMatch($query,$match_id)
    {
        return $query->where('match_id',$match_id)->get();    
    }
    public function scopeFindIdUserbetInMatch($query,$match_id)
    {
        return $query->where('match_id',$match_id)->pluck('user_id')->all();
    }
    public function scopeFindBetNotPayedByMatchId($query,$match_id)
    {
        //tim cac tran chua duoc thanh toan tien
        $isPayed='no';
        $conditional = ['match_id' => $match_id, 'isPayed' => $isPayed];

        return $query->where($conditional)->get();
    }
     // public function user()
     // {
     // 	return $this->hasOne('Match');
     // }

     // public function match()
     // {
     // 	return $this->hasOne('User');    	
     // }

}