{{ csrf_field() }}
@extends('admin.admin_management_one_layout')
@section('mathinfo')

		@if($canUpdate==false)
		<br><br><h2>Không thể cập nhật tỉ số do trận chưa kết thúc</h2><br><br><br><br><br>
		
		@elseif($isSuccess=='true')
    	<br><br><h2>Cập nhật thành công!</h2><br><h4>Thu về được {{$moneyMake}} $</h4><br><br><br><br>

		@elseif($isSuccess=='false')
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
		
		<form method="post" action="/admin/management/{{$matchSelected->id}}/upresult" autocomplete="off">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h4>Tỉ số:</h4>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('home_score') ? 'has-error' : '' }}">
					<label for="home_score">Đội nhà :</label>
					<input type="text" id="home_score" name="home_score" class="form-control" placeholder="" value="{{ old('home_score') }}">
					<span class="text-danger">{{ $errors->first('home_score') }}</span>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('away_score') ? 'has-error' : '' }}">
					<label for="away_score">Đội khách:</label>
					<input type="text" id="away_score" name="away_score" class="form-control" placeholder="" value="{{ old('away_score') }}">
					<span class="text-danger">{{ $errors->first('away_score') }}</span>
				</div>
			</div>
		</div>
		<input type="submit" name="submit" value="Cập nhật" style="width: 90px;height:30px;
					margin: 20px;">
		</form>
		}
		@endif
@endsection