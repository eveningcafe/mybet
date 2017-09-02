<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('home_team');
            $table->string('away_team');
            $table->string('season')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->string('win_team')->nullable();
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->string('state')->nullable()->nullable();   
            $table->dateTime('start_bet_time')->nullable();
            $table->dateTime('end_bet_time')->nullable();
            $table->float('home_winrate')->nullable();
            $table->float('away_winrate')->nullable();
            $table->float('draw_winrate')->nullable();
            $table->timestamps();
        });
// id int(50) PK 
// name    varchar(50) tên trận đấu
// home_team   varchar(50) tên đội nhà
// away_team   varchar(50) tên đội khách
// season  varchar(50) giải đấu
// start_time  datetime    thời điểm bắt đầu trận
// end_time    datetime    thời điểm kết thúc trận
// win_team    varchar(50) 3 giá trị :home,away, và draw
// home_score  varchar(50) số bàn đội nhà ghi được
// away_score  varchar(50) số bàn đội khách ghi được
// State   varchar(50) public and private
// start_bet_time  datetime    thời điểm bắt đầu bet
// end_bet_time    datetime    thời điểm kết thúc bet
// home_winrate    float   tỉ lệ bet cho đội nhà
// away_winrate    float   tỉ lệ bet cho đội khách
// draw_winrate    float   tỉ lệ bet cho hòa
// create_at   timestamp   thời gian khởi tạo
// updata_at   timestamp   thời gian update
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('matchs');
    }
}
