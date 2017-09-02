<!doctype html>
<style type="text/css">
	#lr{
		width: 618px;
		height: 38px;
		margin-left: 618px;
    	margin-top: 48px;
		float: left; 
	}
	#logout{
		float: left;
	}
</style>
@extends('common.layouts.master')
@section('navbar')
		<div class="navbar-collapse collapse" id="menu">
	                <ul class="nav navbar-nav">
	                    <li><a href="{{'/admin/management'}}">Quản lý trận đấu</a></li>
	                    <li><a href="{{'/admin/home'}}">My home</a></li>
	                </ul> 
        </div>		
@endsection
@section('lr')
    <div id = lr>
		<div id="logout">
				<div>
					<input type="button" onclick="location.href='/'" name="Logout" value="Logout" style="width: 90px;height:30px;
					    margin-left: 448px;;margin-top: 3px;">
				</div>			
		</div>
	</div>
@endsection