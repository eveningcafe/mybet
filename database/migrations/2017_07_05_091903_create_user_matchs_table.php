<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
//         bet_result  varchar(50) 3 giá trị :home,away, và draw
// money   int(50) số tiền user bet
// create_at   timestamp   thời gian khởi tạo
// updata_at   timestamp   thời gian update

        Schema::create('user_matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bet_result');
            $table->integer('money')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('matchs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user_matchs');
    }
}
