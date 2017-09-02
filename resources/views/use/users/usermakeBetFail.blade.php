@extends('use.users.user_match_detail')
@section('info')
<div id="center">
    <h3 style=" margin: 20px 200px; ">Match : {{$matchSelected->name}}</h3>
    	<div id="match_info">
    	<h2>You don't have enough money!</h2>
    	<a href="{{URL::previous()}}">Back</a>
    	</div>
    	</div>	
@endsection