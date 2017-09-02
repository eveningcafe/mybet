<!doctype html>
<style type="text/css">
	#center{
		width: 1150px;
		margin:40px;
		border: 1px solid black;
	}
</style>
{{ csrf_field() }}
@extends('use.guess.guesslayout')
@section('lr')
@endsection
@section('info')
	

    <div id="center">
    	@if($isSuccess=='true')
    	<br><br><h2>Register success!</h2><br><br><br><br><br>
		@elseif($isSuccess=='false')
		<div style="margin: 40px">
    	<h2>Register</h2>
		<form method="post" action="{{'/register'}}" autocomplete="off">

		@if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
					<label for="username">User Name:</label>
					<input type="text" id="username" name="user_name" class="form-control" placeholder="Enter user Name" value="{{ old('firstname') }}">
					<span class="text-danger">{{ $errors->first('firstname') }}</span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email">Email:</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" >
					<span class="text-danger">{{ $errors->first('password') }}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
					<label for="confirm_password">Confirm Password:</label>
					<input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter Confirm Passowrd">
					<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
				</div>
			</div>
		</div>
		<input type="submit" name="submit" value="register" style="width: 70px;height:30px;
					margin-right: 10px;">
		</form>
    </div>
    @endif
	</div>
@endsection

