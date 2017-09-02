<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>welcome to mybet</title>
  <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
  <style type="text/css">
    #wrapper {
        width: 980px;
        margin: 0px auto;
        border: 1px solid black;
    }

    #header {
        border: 1px solid red;
        padding: 20px;
        margin: 10px;
    }

    #content {
        border: 5px solid green;
    }


  </style>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <a href="http://www.google.com.vn"><input type="button" name="google" value="ABC"></a>
        </div>
        <div id="content">
            <div class="navbar-collapse collapse" id="menu">
                <ul class="nav navbar-nav">
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">Tin tức</a></li>
                    <li><a href="">Thương hiệu</a></li>
                    <li><a href="">Liên hệ</a></li>               
                </ul>       
            </div>
            <form method="post" action="login">
                <label for="username">username</label>
                <input type="text" name="username">
                <label for="password">password</label>
                <input type="password" name="password">
                <input type="submit" name="submit" value="Login">
            </form>
        </div>
        <div id="footer">
            footer
        </div>
    </div>
</body>