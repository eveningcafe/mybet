<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    protected $table='matchs';
    public function scopeFindMatchByMatchId($query,$match_id)
    {
    	return $query->where('id', $match_id)->first();
    }
    public function scopeFindMatchByMatchName($query,$match_name)
    {
    	return $query->where('name', $match_name)->first();
    }
}
