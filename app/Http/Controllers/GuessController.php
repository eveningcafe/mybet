<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use View;
use Session;
use Carbon;
use App\User;
class GuessController extends Controller
{
    //
    public function show($matchID=null)
    {	
    	$matchs = Match::all();
        $matchnow=array();
        foreach($matchs as $mat){
          if($mat->end_time > Carbon\Carbon::now()&&$mat->start_bet_time < Carbon\Carbon::now()&&$mat->state=='public')
            array_push($matchnow,$mat);
        }
    	$matchSelected='null';
    	$matchSelected=Match::find($matchID);
        
    	return View::make('use.guess.guessfootballnow')->with(
    		'matchs',$matchnow)
    	->with(
    		'matchSelected',$matchSelected);
    }
    
     public function showAllFB($matchID=null)
    {
        $matchs = Match::all();
        $matchSelected='null';
        $matchSelected=Match::find($matchID);
        return View::make('use.guess.guess_all_football')->with(
            'matchs',$matchs)
        ->with(
            'matchSelected',$matchSelected);
     }
}
