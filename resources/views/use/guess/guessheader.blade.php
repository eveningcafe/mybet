<link rel="stylesheet" href="{{ asset('css/use/guess/guessheader.css') }}">
<div class='parent'>
	<div class='girdtop'>
		<div>
			<div class="logo">
				<img src="mybetlogo.PNG">
			</div>
		</div>
		<div>
			<div class="guessLG">
				<div>
					<form method="post" action="login"></form>
					<input type="text" name="user_name" placeholder="enter user name" style="width: 187px;height:30px;
					margin-right: 10px;">
					<input type="password" name="password" placeholder="enter password" style="width: 187px;height:30px;
					margin-right: 10px;">
					<input type="submit" name="login" value="Login" style="width: 70px;height:30px;
					margin-right: 10px;">
					<input type="button" name="register" value="Register" style="width: 70px;height:30px;
					margin-right: 10px;">
				</div>
			</div>
		</div>
	</div>
	<div class='girdbottom'>
		<div class="footballnow" id="footballnow">
			<label for="footballnow">Football now</label>
		</div>
		<div class="allmatch" id="allmatch">
			<label for="allmatch">All match</label>
		</div>
	</div>
</div>

