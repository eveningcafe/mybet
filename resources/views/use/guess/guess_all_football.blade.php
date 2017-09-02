<!doctype html>
<style type="text/css">
	#center{
		width: 1170px;
		height: 517px;
		margin:40px;
		border: 1px solid black;
		overflow:auto;
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
		height: 278px;
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
<?php
	function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);
	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;
	    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
        if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
        unset($string[$k]);
       }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
?>
{{ csrf_field() }}
@extends('use.guess.guesslayout')
@section('info')
    <div id="center">
    	<div id="leftInfo">
    	@if($matchs)
			@foreach ($matchs as $match)
				<a href="/allfootball/{{$match->id}}" style="float: left; margin-right:20px ">{{$match->name}}</a>
				<p>{{time_elapsed_string($match->start_time)}}</p>				
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
    				<div style="margin: 5px"><p>Won team       :   {{$matchSelected->win_team}}</p></div>
    				<div style="margin: 5px"><p>Score		   :   {{$matchSelected->home_score}} - {{$matchSelected->away_score}}</p></div>
    				@endif
    			</div>
    		</div>
    	</div>
    </div>
@endsection

