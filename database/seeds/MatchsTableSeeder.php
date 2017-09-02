<?php

use Illuminate\Database\Seeder;

class MatchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//  id	int(50)	PK 
// name	varchar(50)	tên trận đấu
// home_team	varchar(50)	tên đội nhà
// away_team	varchar(50)	tên đội khách
// season	varchar(50)	giải đấu
// start_time	datetime	thời điểm bắt đầu trận
// end_time	datetime	thời điểm kết thúc trận
// win_team	varchar(50)	3 giá trị :home,away, và draw
// home_score	varchar(50)	số bàn đội nhà ghi được
// away_score	varchar(50)	số bàn đội khách ghi được
// State	varchar(50)	public and private
// start_bet_time	datetime	thời điểm bắt đầu bet
// end_bet_time	datetime	thời điểm kết thúc bet
// home_winrate	float	tỉ lệ bet cho đội nhà
// away_winrate	float	tỉ lệ bet cho đội khách
// draw_winrate	float	tỉ lệ bet cho hòa
         DB::table('matchs')->insert([
    		'name' 	=> 'Lao vs VietNam',
    		'home_team' => 'VietNam',
    		'away_team' => 'Lao',
    		'season' => 'AFF suzuki cup',
    		'start_time' => '2017-07-05 16:39:00',
    		'end_time' => '2017-07-05 18:39:00',
    		'win_team' => 'home',
    		'home_score'=> '5',
    		'away_score' =>'4',
    		'State' => 'public',
    		'start_bet_time' => '2017-07-05 16:30:00',
    		'end_bet_time' => '2017-07-05 16:35:00',
    		'home_winrate' => '0.5',
    		'draw_winrate' => '3.5',
    		'away_winrate' => '5.5',
    	]);
    }
}
