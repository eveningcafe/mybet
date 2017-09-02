<!doctype html>
<style type="text/css">

</style>
{{ csrf_field() }}
@extends('admin.admin_management_one')
@section('mathinfo')

	@if($isSuccess==true)
    	<br><br><h2>Chỉnh sửa thành công!</h2><br><br><br><br><br>
	@elseif($isSuccess==false)
		@if($canEdit==false)
		<br><br><h2>Không thể cập nhật do trận đấu đã public</h2><br><br><br><br><br>
		@else
		<div style="margin: 5px">
    	<h4>sửa thông tin</h4>
		<form method="post" action="/admin/management/{{$matchSelected->id}}/edit" autocomplete="off">
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
		<h5>Thông tin trận</h5>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">Tên trận</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="A vs B" value="{{$matchSelected->name}}">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('season') ? 'has-error' : '' }}">
					<label for="season">Giải đấu:</label>
					<input type="text" id="season" name="season" class="form-control" placeholder="" value="{{ $matchSelected->season }}">
					<span class="text-danger">{{ $errors->first('season') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('home_team') ? 'has-error' : '' }}">
					<label for="home_team">Đội nhà:</label>
					<input type="text" id="home_team" name="home_team" class="form-control" placeholder="A" value="{{ $matchSelected->home_team}}">
					<span class="text-danger">{{ $errors->first('home_team') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('away_team') ? 'has-error' : '' }}">
					<label for="away_team">Đội khách:</label>
					<input type="text" id="away_team" name="away_team" class="form-control" placeholder="B" value="{{ $matchSelected->away_team }}">
					<span class="text-danger">{{ $errors->first('away_team') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
					<label for="start_time">Bắt đầu:</label>
					<input type="text" id="start_time" name="start_time" class="form-control" placeholder="VD:2015-05-05 10:45:00" value="{{ $matchSelected->start_time }}">
					<span class="text-danger">{{ $errors->first('start_time') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
					<label for="end_time">Kết thúc</label>
					<input type="text" id="end_time" name="end_time" class="form-control" placeholder="VD:2015-05-05 11:45:00" value="{{ $matchSelected->end_time }}">
					<span class="text-danger">{{ $errors->first('end_time') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<h3>Thông tin kèo</h3>
		<h4>Tỉ lệ bet:</h4>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('home_winrate') ? 'has-error' : '' }}">
					<label for="home_winrate">Đội nhà thắng:</label>
					<input type="text" id="home_winrate" name="home_winrate" class="form-control" placeholder="" value="{{ $matchSelected->home_winrate }}">
					<span class="text-danger">{{ $errors->first('away_winrate') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('away_winrate') ? 'has-error' : '' }}">
					<label for="away_winrate">Đội khách thắng:</label>
					<input type="text" id="away_winrate" name="away_winrate" class="form-control" placeholder="" value="{{ $matchSelected->away_winrate}}">
					<span class="text-danger">{{ $errors->first('away_winrate') }}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('draw_winrate') ? 'has-error' : '' }}">
					<label for="draw_winrate">Hai đội hòa:</label>
					<input type="text" id="draw_winrate" name="draw_winrate" class="form-control" placeholder="" value="{{ $matchSelected->draw_winrate}}">
					<span class="text-danger">{{ $errors->first('draw_winrate') }}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('end_bet_time') ? 'has-error' : '' }}">
					<label for="start_time">Kết thúc bet: </label>
					<input type="text" id="end_bet_time" name="end_bet_time" class="form-control" placeholder="VD:2015-05-05 10:45:00" value="{{ $matchSelected->end_bet_time }}">
					<span class="text-danger">{{ $errors->first('end_bet_time') }}</span>
				</div>
			</div>
		</div>
		

		<input type="submit" name="submit" value="Sửa" style="width: 90px;height:30px;
					margin: 20px;">
		</form>
    </div>
    @endif
    @endif
	</div>
@endsection
