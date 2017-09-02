{{ csrf_field() }}
@extends('admin.admin_management_one_layout')
@section('mathinfo')
<h3>Thông tin</h3>
<div style="margin: 5px"><p>Match          :   {{$matchSelected->name}}</p></div>
<div style="margin: 5px"><p>Home team      :   {{$matchSelected->home_team}}</p></div>
<div style="margin: 5px"><p>Season         :   {{$matchSelected->season}}</p></div>
<div style="margin: 5px"><p>Time start     :   {{$matchSelected->start_time}}</p></div>
<div style="margin: 5px"><p>Time end       :   {{$matchSelected->end_time}}</p></div>
<div style="margin: 5px"><p>End bet time   :   {{$matchSelected->end_bet_time}}</p></div>
<div style="margin: 5px"><p>Home score     :   {{$matchSelected->home_score}}</p></div>
<div style="margin: 5px"><p>Away score     :   {{$matchSelected->away_score}}</p></div>
@endsection