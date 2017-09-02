<!doctype html>
<style type="text/css">
	#center{
		width: 1150px;
		height: 517px;
		margin:40px;
		border: 1px solid black; 
	}
	#match_info{
		width: 714px;
        height: 420px;
        margin: 10px auto;
        padding: 30px;
        border: 1px solid black;
        overflow:auto; 
	}

</style>
{{ csrf_field() }}
@extends('use.users.userlayout')

@section('info')
    <div id="center">
    <h3 style=" margin: 20px 200px; ">Match : {{$matchSelected->name}}</h3>
    	<div id="match_info">
    	<div id="info">
    		<div class="row">
                <div class="col-md-6">
                <p>Home team: </p>
                </div>
                <div class="col-md-6">
                <p>{{$matchSelected->home_team}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <p>Away team: </p>
                </div>
                <div class="col-md-6">
                <p>{{$matchSelected->away_team}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <p>Season: </p>
                </div>
                <div class="col-md-6">
                <p>{{$matchSelected->season}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <p>Time start: </p>
                </div>
                <div class="col-md-6">
                <p>{{$matchSelected->start_time}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <p>End bet time: </p>
                </div>
                <div class="col-md-6">
                <p>{{$matchSelected->end_bet_time}}</p>
                </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th>home rate</th>
                    <th>draw rate</th>
                    <th>away rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$matchSelected->home_winrate}}</td>
                    <td>{{$matchSelected->draw_winrate}}</td>
                    <td>{{$matchSelected->away_winrate}}</td>
                  </tr>   
                </tbody>
              </table>
              <form method="post" action="/{{$user->user_name}}/footballNow/{{$matchSelected->id}}/seemore" autocomplete="off">
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
                        <p>Your bet result: </p>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('chosebet') ? 'has-error' : '' }}">
                        <label class="radio-inline"><input type="radio" name="chosebet", value="home">Home</label>
                        <label class="radio-inline"><input type="radio" name="chosebet", value="draw" >Draw</label>
                        <label class="radio-inline"><input type="radio" name="chosebet", value="away">Away</label>
                        <span class="text-danger">{{ $errors->first('chosebet') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <div class="col-md-6">
                        <p>Your bet money: </p>
                    </div>
                    <div class="col-md-6">
                    <input type="text" id="money" name="money" class="form-control" placeholder="" value="{{ old('money') }}">
                    <span class="text-danger">{{ $errors->first('money') }}</span>
                    </div>
                </div>
                </div>
                <input type="submit" name="submit" value="Bet!" style="width: 90px;height:30px; ">
              </form>
    	</div>
    </div>
@endsection

