<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\User;
use DateTime;
use App\Match;
use App\UserMatch;
use View;
use Session;
use DB;
use Carbon;
class UserController extends Controller
{
    //
    public function showHome($user_name)
    {
      Session::put('key', 'value');
    	$user=User::findUserByUsername($user_name);
      $bets=UserMatch::findBetByUser($user);
    	$user_Table= array();
    	foreach ($bets as $bet) {
    		$match=Match::findMatchByMatchID($bet->match_id);
    		if($match->win_team!=null){
	    		if($bet->bet_result==$match->win_team)
	    		{//bet thang
	    			if($match->win_team=='home') $change_money=$bet->money*(1+$match->home_winrate);
	    			if($match->win_team=='away') $change_money=$bet->money*(1+$match->away_winrate);
	    			if($match->win_team=='draw') $change_money=$bet->money*(1+$match->draw_winrate);
	    		}
	    		else $change_money=$bet->money*(-1);//bet thua
    		}else $change_money=null;
    		$user_Table_Row=array (
    			"match" => $match->name, 
               	"season"  => $match->season,
                "bet_result" =>$bet->bet_result,
                "bet_money" =>$bet->money,
               	"win_team"  => $match->win_team, 
               	"time_your_bet" => $bet->created_at,
               	"your_money"=>$change_money,
                "is_Payed" => $bet->isPayed
               );
    		array_push($user_Table,$user_Table_Row);
    		}
    	return View::make('use.users.userhome')
    	->with('user',$user)
    	->with('history_table',$user_Table);
    }
    public function showAllFB($user_name,$matchID=null)
    {
        $matchs = Match::all();
        $matchSelected='null';
        $matchSelected=Match::find($matchID);
        $user=User::findUserByUsername($user_name);
        return View::make('use.users.userallmatch')
        ->with('user',$user)
        ->with('matchs',$matchs)
        ->with('matchSelected',$matchSelected);
    }

    public function showFootballNow($user_name,$matchID=null)
    {
      //chi show cac tran co thoi gian bet chua het(start bet< now) va thoi gian ket thuc tran chua den (>luc nay) va cac tran do phai dc public roi
        $matchs = Match::all();
        $matchnow=array();
        foreach($matchs as $mat){
          if($mat->end_time > Carbon\Carbon::now()&&$mat->start_bet_time < Carbon\Carbon::now()&&$mat->state=='public')
            array_push($matchnow,$mat);
        }
        $matchSelected='null';
        $matchSelected=Match::find($matchID);
        $user=User::findUserByUsername($user_name);
        return View::make('use.users.userfootballnow')
        ->with('user',$user)
        ->with('matchs',$matchnow)
        ->with('matchSelected',$matchSelected);
    }
    public function showMatchDetail($user_name,$matchID)
    {
        $matchSelected=Match::find($matchID);
        $user=User::findUserByUsername($user_name);
        return View::make('use.users.user_match_detail')
        ->with('user',$user)
        ->with('matchSelected',$matchSelected);
    }
    public function checkBet(Request $request,$user_name,$matchID)
    {
        $this->validate($request,[
               'money' => 'required|integer|min:1',
               'chosebet' => 'required',
          ],[
               // 'user_name.required' => ' The user name field is required.',       
          ]);
        $matchSelected=Match::find($matchID);
        $user=User::findUserByUsername($user_name);
        if($user->acc_money>$request->money)
        {
        //luu keo
        $bet= new UserMatch;
        $bet->bet_result=$request->chosebet;
        $bet->money=$request->money;
        $bet->user_id=$user->id;
        $bet->match_id=$matchID;
        $bet->isPayed='no';
        $bet->save();
        //tru tien
         $user->acc_money=$user->acc_money-$request->money;
         $user->save();

        return View::make('use.users.usermakeBetOk')->with('user',$user)
        ->with('matchSelected',$matchSelected);
        }else
        return View::make('use.users.usermakeBetFail')->with('user',$user)
        ->with('matchSelected',$matchSelected);
    }
    public function deleteBet($user_name,$matchName)
    {
        
        $user= User::findUserByUsername($user_name);
        $match=Match::findMatchByMatchName($matchName);
        //chi duoc delete truoc khi ket thuc bet (now<end bet time)
        if($match->end_bet_time>Carbon\Carbon::now()){
          $conditional = ['user_id' => $user->id, 'match_id' => $match->id];
          $bet=DB::table('user_matchs')->where($conditional)->first();
          //tra lai tien
          $user->acc_money=$user->acc_money+$bet->money;
          $user->save();
          //xoa keo
          $bet=DB::table('user_matchs')->where($conditional)->delete();
          $url="/".$user_name."/home";
        }
        return redirect($url);
    }
}