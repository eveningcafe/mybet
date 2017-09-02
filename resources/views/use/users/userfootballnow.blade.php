<!doctype html>
<style type="text/css">
	#center{
		width: 1150px;
		height: 517px;
		margin:40px;
		border: 1px solid black;
	}
	#leftInfo{
		width: 703px;
		margin:10px;
		border: 1px solid black;
		float: left;
	}
	#rightInfo{
		width: 400px;
		height: 500px;
		margin:10px;
		border: 1px solid black;
		float: left;
	}
	#matchInfo{
		height: 248px;
		border: 1px solid black;
	}
	#mybetNotYet{
		margin-top:10px;
		height: 200px;
		border: 1px solid black;
	}
	.oneBet{
		margin-top:5px;
		height: 51px;
		border: 1px solid black;
	}
	.home{
		width: 210px;
		height: 50px;
		margin-left: 10px;
		border: 1px solid black;
		float: left;
	}
	.draw{
		width: 210px;
		height: 50px;
		margin-left: 10px;
		border: 1px solid black;
		float: left;
	}
	.away{
		width: 210px;
		height: 50px;
		margin-left: 10px;
		border: 1px solid black;
		float: left;
	}
</style>
{{ csrf_field() }}
@extends('use.users.userlayout')
@section('info')
    <div id="center">
    	<div id="leftInfo">
    	@if($matchs)
			@foreach ($matchs as $match)
				<a href="/{{$user->user_name}}/footballNow/{{$match->id}}">{{$match->name}}</a>				
				<div class="oneBet">
					<div class="home">
					<div style="float: left; width: 160px">{{$match->home_team}}</div>
					<div style="float: left;">{{$match->home_winrate}}</div>
					</div>
					<div class="draw">
					<div style="float: left; width: 160px">X</div>
					<div style="float: left;">{{$match->draw_winrate}}</div>	
					</div>
					<div class="away">
					<div style="float: left;width: 160px">{{$match->away_team}}</div>	
					<div style="float: left;">{{$match->away_winrate}}</div>	
					</div>
				</div>   		
    		@endforeach
        @endif
    	</div>
    	<div id ="rightInfo">
    		<div id="matchInfo">
    			Match infomation
    			<div style="margin: 5px; height: 166px; border: 1px solid black; ">
    				@if($matchSelected==null)
    				Select one match
    				@else
    				<div style="margin: 5px"><p>Match          :   {{$matchSelected->name}}</p></div>
    				<div style="margin: 5px"><p>Home team      :   {{$matchSelected->home_team}}</p></div>
    				<div style="margin: 5px"><p>Season         :   {{$matchSelected->season}}</p></div>
    				<div style="margin: 5px"><p>Time start     :   {{$matchSelected->start_time}}</p></div>
    				<div style="margin: 5px"><p>End bet time   :   {{$matchSelected->end_bet_time}}</p></div>
    				@endif
    			</div>
    			@if($matchSelected!=null)
    			<input type="button" onclick="location.href='/{{$user->user_name}}/footballNow/{{$matchSelected->id}}/seemore'"; name="seemore" value="See more" style="margin-left:108px; margin-top :10px;   ">
    			@endif
    		</div>
    	</div>
    </div>



@endsection

