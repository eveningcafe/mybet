<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>welcome to mybet</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <style type="text/css">
  /*css cua layout*/
    #wrapper {
  		width: 1260px;
  		margin: 0px auto;
  		border: 1px solid black;
		}

	#header {
	    border: 1px solid black;
	    width: 1260px;
      	height: 88px;
	}


	#content {
	    border: 1px solid black; 
	}
	#footer{
		width: 1260px;
      	height: 138px;
		border: 1px solid black;
		color: #636b6f;
	}
	/*css cua header, lr tuy section*/
	#logo{
		width: 21px;
		height:81px;
		margin-top: 15px;
		float: left;
	}
	
	/*css cua footer*/
    #leftfoot{
	width: 376px;
	height: 138px;
	margin-right: 25px;
	border: 1px solid black;
	color: #636b6f;
	float: left;
}
	#centerfoot{
	width: 429px;
	height: 138px;
	margin-right: 25px;
	border: 1px solid black;
	color: #636b6f;
	float: left;
}
	#rightfoot{
	width: 368px;
    height: 138px;
	border: 1px solid black;
	color: #636b6f;
	float: left;
	}
	#paragraph{
		float: left;
	}
	/*css cua content*/
  </style>
</head>
<body>
	<div id="wrapper">
	 	<div id="header">
		    <div id="logo">
				<img src="{{asset('mybetlogo.PNG')}}">
			</div>
			@yield('lr')
			
	 	</div>

	 	<div id="content">
	 		@yield('navbar')
	 		@yield('info')			 		
	 	</div>

	 	<div id="footer">
			<div id='leftfoot'>
				<div id='paragraph'>
					<h3>Vân hành bởi:</h3>
					<p>Công ty Alt Plush <br>
					Địa chỉ: Tầng 31 tòa nhà keangnam <br>
					đường Phạm Hùng, Hà nội</p>
				</div>
				<div>
					<img src="{{asset('altpluslogo.jpg')}}" style="width: 128px;height:85px;">
				</div>
			</div>
		<div id='centerfoot'>
			<h3>Ban biên tập:</h3>
			<p>Ngô Quang Hòa <br>
			Sinh viên trường đại học Bách Khoa Hà Nội <br>
			Email: <a href="url">ngohoa211@gmail.com</a></p>
		</div>
		<div id="rightfoot">
			<p>Mọi thắc mắc ý kiến, liên hệ đặt quảng cáo xin gửi cho: <br>
			 Tran Vu Quan (クアン)<br>
			  Altplus Vietnam</p>
		</div>
	 	</div>
 	</div>
</body>