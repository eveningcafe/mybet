<!doctype html>
<style type="text/css">
	#center{
		width: 1150px;
		height: auto;
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
		height: 252px;
		margin:10px;
		border: 1px solid black;
		float: left;
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
	#tile{
		width: 819px;
		border: 1px solid black;
	}
	#mathinfo{
		width: 819px;
		margin-top: 10px;
		border: 1px solid black;
		padding: 20px
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
    		<input type="button" onclick="location.href='/admin/management/{{$matchSelected->id}}/edit'"; name="edit" value="Sửa Thông Tin" 
					style="width: 136px;height:45px;
					margin: 17px;float: left;">
			<input type="button" onclick="location.href='/admin/management/{{$matchSelected->id}}/seeBetUser'"; name="seeBetUser" value="Xem User đã bet" 
					style="width: 136px;height:45px;
					margin: 17px;float: left;">
			<input type="button" onclick="location.href='/admin/management/{{$matchSelected->id}}/upresult'"; name="upresult" value="Cập nhật kết quả" 
					style="width: 136px;height:45px;
					margin: 17px;float: left;">
    	</div>		
    	<div id="rightInfo">
    		<div id="tile">
				<a href="/admin/management/{{$matchSelected->id}}" style="float: left; margin-right:20px ">{{$matchSelected->name}}</a>
				<p>{{time_elapsed_string($matchSelected->start_time)}}</p>				
				<div class="oneBet">
					<div class="home">
					<div style="float: left; width: 160px">{{$matchSelected->home_team}}</div>
					<div style="float: left;">{{$matchSelected->home_winrate}}</div>
					</div>
					<div class="draw">
					<div style="float: left; width: 160px">X</div>
					<div style="float: left;">{{$matchSelected->draw_winrate}}</div>	
					</div>
					<div class="away">
					<div style="float: left;width: 160px">{{$matchSelected->away_team}}</div>	
					<div style="float: left;">{{$matchSelected->away_winrate}}</div>	
					</div>
				</div> 
			</div>
			 <div id="mathinfo">
			 @yield('mathinfo')
			 	</div> 		
    	</div>
    </div>
@endsection

