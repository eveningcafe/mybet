<!doctype html>
<style type="text/css">
	#lr{
		width: 618px;
		height: 38px;
		margin-left: 618px;
    	margin-top: 48px;
		float: left; 
	}
	#login{
		float: left;
	}
</style>
@extends('common.layouts.master')
@section('navbar')
		<div class="navbar-collapse collapse" id="menu">
	                <ul class="nav navbar-nav">
	                    <li><a href="/footballNow">Football Now</a></li>
	                    <li><a href="/allfootball">All football</a></li>
	                </ul> 
        </div>		
@endsection
@section('lr')
    <div id = lr>
		<div id="login">
				<form method="post" action="{{ route('login') }}">
				 {{ csrf_field() }}
	 			<input type="text" name="username" placeholder="enter user name" style="width: 187px;height:30px;
					margin-right: 10px;">
	 			<input type="password" name="password" placeholder="enter password" style="width: 187px;height:30px;
					margin-right: 10px;">
	 			<input type="submit" name="submit" value="Login" style="width: 70px;height:30px;
					margin-right: 10px;">
				</div>
				<div>
				
				<input type="button" onclick="location.href='/register'"; name="register" value="Register" 
					style="width: 70px;height:30px;
					margin-right: 10px;">
			</div>			
	</div>
@endsection