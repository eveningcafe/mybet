<!doctype html>
<style type="text/css">
	#center{
		width: 1150px;
		height: 517px;
		margin:40px;
		border: 1px solid black;
		overflow:auto; 
	}
	#user_info{
		width: 1130px;
		height: 300px;
		margin:10px;
		padding: 10px;
		border: 1px solid black;
	}
	#history{
		width: 1130px;
		margin:10px;
		padding: 10px;
		border: 1px solid black;
	}
</style>
{{ csrf_field() }}
@extends('use.users.userlayout')

@section('info')
    <div id="center">
    	<div id="user_info">
    		<h4>Thông tin chung</h4>
    		<div style="margin: 10px;">
    			<div style="width: 200px;float: left;">
    				<p>User name: </p>
    			</div>
    			<div>
    				<p>{{$user->user_name}}</p>
    			</div>
    		</div>
    		<div style="margin: 10px;">
    			<div style="width: 200px;float: left;">
    				<p>Email: </p>
    			</div>
    			<div>
    				<p>{{$user->email}}</p>
    			</div>
    		</div>
    		<div style="margin: 10px;">
    			<div style="width: 200px;float: left;">
    				<p>Your account money :</p>
    			</div>
    			<div>
    				<p>{{$user->acc_money}}</p>
    			</div>
    		</div>
    		<div style="margin: 10px;">
    			<div style="width: 200px;float: left;">

    				<p>Ngày tạo: </p>
    			</div>
    			<div >
    			@if ($user->created_at==null) <p>null</p>
    			@endif
    				<p>{{$user->created_at}}</p>
    			</div>
    		</div>
    		<div style="margin: 10px;">
    			<div style="width: 200px;float: left;">
    				<p>Ngày cập nhật </p>
    			</div>
    			<div >
    			@if ($user->updated_at==null) <p>null</p>
    			@endif
    				<p>{{$user->updated_at}}</p>
    			</div>
    		</div>
    	</div>
    	<div id="history">
    		<h4>Lịch sử</h4>
    		<table class="table">
			    <thead>
			      <tr>
			        <th>Match</th>
			        <th>Season</th>
                    <th>Your bet</th>
                    <th>Bet money</th>
			        <th>Win team</th>
			        <th>Time you bet</th>
			        <th>Your money</th>
                    <th>Is Payed</th>
                    <th></th>
			      </tr>
			    </thead>
			    <tbody>

			    @foreach ($history_table as $row)
			      <tr>
			        <td>{{$row['match']}}</td>
			        <td>{{$row['season']}}</td>
			        <td>{{$row['bet_result']}}</td>
                    <td>{{$row['bet_money']}}</td>
                    <td>{{$row['win_team']}}</td>
			        <td>{{$row['time_your_bet']}}</td>
			        <td>{{$row['your_money']}}</td>
                    <td>{{$row['is_Payed']}}</td>
                    @if($row['win_team']==null)
                    <td><a href="/{{$user->user_name}}/delete/{{$row['match']}}">delete</a></td> 
                    @else <td></td>
                    @endif				
			      </tr>
			    @endforeach   
			    </tbody>
			  </table>
    	</div>
    </div>
@endsection

