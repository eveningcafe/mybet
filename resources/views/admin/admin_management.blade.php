<!doctype html>
<style type="text/css">
	#center{
		width: 1150px;
		height: 517px;
		margin:40px;
		border: 1px solid black;
		overflow:auto;
	}
	#rightInfo{
		width: 819px;
		margin:10px;
		border: 1px solid black;
		float: left;
	}
	#leftInfo{
		width: 264px;
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
	.buttonPD{
		width: 75px;
		height:50px;
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
@extends('admin.adminlayout')
@section('info')
    <div id="center">
    	<div id="leftInfo">
    		<input type="button" onclick="location.href='/admin/addMatch'"; name="themtran" value="Thêm trận đấu" 
					style="width: 136px;height:45px;
					margin: 17px;float: left;">
    	</div>		
    	<div id="rightInfo">
    	@if($matchs)
			@foreach ($matchs as $match)
				<a href="/admin/management/{{$match->id}}" style="float: left; margin-right:20px ">{{$match->name}}</a>
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
					<div class = "buttonPD">
					@if($match->state!=null)
						@if($match->state=='private') 
						<input type="button" onclick="location.href='/admin/public/{{$match->id}}'"; name="public" value="public" 
						style="width: 70px;height:45px;
						margin: 3px;float: left;">
						@endif
					@endif
					</div>
					<div class = "buttonPD">
					<input type="button" onclick="location.href='/admin/delete/{{$match->id}}'"; name="delete" value="delete" 
					style="width: 70px;height:45px;
					margin: 3px;float: left;">
					</div>
				</div>   		
    		@endforeach
        @endif
    	</div>
    </div>
@endsection

