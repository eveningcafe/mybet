<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\User;
use App\UserMatch;
use View;
use Carbon;
class AdminController extends Controller
{
    //
    public function show()
    {     
     return Redirect::to('admin/home');
    }
    //
    public function showHome()
    {
      return View::make('admin.adminhome');
    }
    //
    public function showManagement()
    {
        $matchs = Match::all();
        return View::make('admin.admin_management')->with(
            'matchs',$matchs);
    }

    public function showManagementOneMatch($matchId)
    {
        
        $matchSelected=Match::find($matchId);
        return View::make('admin.admin_management_one')->with(
            'matchSelected',$matchSelected);
    }

    public function showFormaddMatch()
    {
        $isSuccess='false';
        return View::make('admin.form-addmatch')->with('isSuccess',$isSuccess);
    }

    public function checkAddMatch(Request $request)
    {
        $this->validate($request,[
               'name' => 'required|unique:matchs',
               'season' => 'required',
               'home_team' => 'required',
               'away_team' => 'required',
               'end_bet_time' => 'before:start_time',
               'start_time' => 'before:end_time',
               'home_winrate' => 'required',
               'draw_winrate' => 'required',
               'away_winrate' => 'required',
          ],[
               // 'user_name.required' => ' The user name field is required.',
          ]);
        $match = new Match;
        $match->name=$request->name;
        $match->season=$request->season;
        $match->home_team=$request->home_team;
        $match->away_team=$request->away_team;
        $match->start_time=$request->start_time;
        $match->end_time=$request->end_time;
        if (isset($request->isPublic)) 
          $match->state='public';
        else $match->state='private';
        $match->home_winrate=$request->home_winrate;
        $match->away_winrate=$request->away_winrate;
        $match->draw_winrate=$request->draw_winrate;
        $match->end_bet_time=$request->end_bet_time;
        $match->save(); 
        $isSuccess='true';
        return View::make('admin.form-addmatch')->with('isSuccess',$isSuccess);
    }
    public function showMatchEdit($matchId)
    {
      $matchSelected=Match::find($matchId);
      //chi sua cac tran chua cong bo: => state = private dc sua
      if($matchSelected->state=='private'){
      $isSuccess=false;
      $canEdit=true;
      return View::make('admin.admin_match_edit')->with('isSuccess',$isSuccess)
              ->with('matchSelected',$matchSelected)
              ->with('isSuccess',$canEdit);
      }else{
        $isSuccess=false;
        $canEdit=false;
        return View::make('admin.admin_match_edit')
        ->with('matchSelected',$matchSelected)
        ->with('canEdit',$canEdit)
        ->with('isSuccess',$isSuccess);
         }
    }

    public function checkMatchEdit(Request $request,$matchId)
    {
        $this->validate($request,[
               'name' => 'required|unique:matchs',
               'season' => 'required',
               'home_team' => 'required',
               'away_team' => 'required',
               'end_bet_time' => 'before:end_time',
               'start_time' => 'before:end_time',
               'home_winrate' => 'required',
               'draw_winrate' => 'required',
               'away_winrate' => 'required',
          ],[
               // 'user_name.required' => ' The user name field is required.',          
          ]);
        $match=Match::find($matchId);
        $match->name=$request->name;
        $match->season=$request->season;
        $match->home_team=$request->home_team;
        $match->away_team=$request->away_team;
        $match->start_time=$request->start_time;
        $match->end_time=$request->end_time;
        $match->home_winrate=$request->home_winrate;
        $match->away_winrate=$request->away_winrate;
        $match->draw_winrate=$request->draw_winrate;
        $match->end_bet_time=$request->end_bet_time;
        $match->save(); 
        $isSuccess=true;
        $canEdit=true;
        return View::make('admin.admin_match_edit')
        ->with('isSuccess',$isSuccess)
        ->with('canEdit',$canEdit)
        ->with('matchSelected',$match);
    }

    public function seeBetUserInMatch($matchId)
    {
        $bets=UserMatch::findBetOfMatch($matchId);
        $betOfMatch_Table= array();
        foreach ($bets as $bet) {
          $user = User::find($bet->user_id);
          $match= Match::findMatchByMatchId($bet->match_id);
          if($match->win_team!=null){
              if($bet->bet_result==$match->win_team)
                {//bet thang
                if($match->win_team=='home') $change_money=$bet->money*(1+$match->home_winrate);
                if($match->win_team=='away') $change_money=$bet->money*(1+$match->away_winrate);
                if($match->win_team=='draw') $change_money=$bet->money*(1+$match->draw_winrate);
                } 
              else $change_money=$bet->money*(-1);//bet thua
            }else $change_money=0;
          $match_Table_Row=array (
                "user" => $user->user_name,
                "du_doan" => $bet->bet_result,
                "ket_qua_tran"  => $match->win_team,
                "so_tien_bet"=>$bet->money,
                "thu_ve"=> -$change_money,
            );
          array_push($betOfMatch_Table,$match_Table_Row);
        }
        dd($betOfMatch_Table);
        return View::make('admin.admin_see_bet_user');
    }

    public function showUpResult($matchId)
    {
        $matchSelected=Match::find($matchId);
        if($matchSelected->state=='public'){
        $canUpdate='true';
        }else $canUpdate='false';   
        $isSuccess='false';
        return View::make('admin.admin_upresult')->with('isSuccess',$isSuccess)
              ->with('matchSelected',$matchSelected)
              ->with('canUpdate',$canUpdate);
    }
    public function caculatorMoney($matchId)
    {
        $ad= User::findAdmin();
        $oldADMoney=$ad->acc_money;
         # tim cac tran chua tra tien
        $bets=UserMatch::findBetNotPayedByMatchId($matchId);
        foreach ($bets as $bet) {
          # tra cho moi user
          $user= User::find($bet->user_id);
          # lay ket qua cua tran
          $match=Match::findMatchByMatchId($bet->match_id);
          if($match->win_team!=null){
            if($bet->bet_result==$match->win_team)
                {//bet thang
                if($match->win_team=='home') $change_money=$bet->money*(1+$match->home_winrate);
                if($match->win_team=='away') $change_money=$bet->money*(1+$match->away_winrate);
                if($match->win_team=='draw') $change_money=$bet->money*(1+$match->draw_winrate);
                } 
            else $change_money=$bet->money*(-1);//bet thua
          }else $change_money=0;
          $user->acc_money=$user->acc_money+$change_money;
          $user->save;
          $bet->isPayed='yes';
          $bet->save();
          //tinh tien cho admin
          $ad->acc_money=$ad->acc_money-$change_money;
          };
          
          $ad->save();
          return $ad->acc_money-$oldADMoney;
    }
  
    public function checkUpResult(Request $request,$matchId)
    {

          $this->validate($request,[
               'home_score' => 'required|integer',
               'away_score' => 'required|integer',
          ],[
               // 'user_name.required' => ' The user name field is required.',           
          ]);

        $match=Match::find($matchId);
        //cap nhat tran.
        //chi dc cap nhat khi het thoi gian tran dau.
          if($match->end_time < Carbon\Carbon::now()) {
          $match->home_score=$request->home_score;
          $match->away_score=$request->away_score;
          if($match->home_score> $match->away_score)
            $match->win_team='home';
          else if(($match->home_score< $match->away_score))
            $match->win_team='away';
          else $match->win_team='draw';
          $match->save();
          //tra tien
          $moneyMake=-1;
          $moneyMake=$this->caculatorMoney($matchId); 
          
          //tao view
          $canUpdate=true;
          return View::make('admin.admin_upresult')
              ->with('isSuccess','true')
              ->with('matchSelected',$match)
              ->with('canUpdate',$canUpdate)
              ->with('moneyMake',$moneyMake);
            }
        else {
            $canUpdate=false;
            return View::make('admin.admin_upresult')
              ->with('isSuccess','true')
              ->with('matchSelected',$match)
              ->with('canUpdate',$canUpdate);
            }
    }

    public function publicMatch($matchID)
    {
      //public tran dau, lay thoi diem bat dau bet la now
      $match=Match::find($matchID);
      $match->state='public';
      $match->start_bet_time=Carbon\Carbon::now();
      $match->save();
      return redirect('/admin/management');
    }

    public function deleteMatch($matchID)
    {
        $match=Match::find($matchID);
        //tim nguoi da bet tran do
        $idUsers=UserMatch::findIdUserbetInMatch($matchID);
        $users=array();
        foreach($idUsers as $id){
          $userBet=User::find($idUsers);
          array_push($users,$userBet);
        }
        if($match->state=='private'||!(count($users)>0)) $match->delete();
        return redirect('/admin/management');
    }
} 