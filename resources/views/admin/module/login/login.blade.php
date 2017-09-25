<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="{{ asset('public/lv17_admin/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('public/lv17_admin/css/main.css')}}">
</head>

<body class="login">

      <div class="form-signin">
    <div class="text-center">
        <p style="font-weight: bold;font-size: 20px">
            ĐĂNG NHẬP
        </p>
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="" method="POST">
             {{ csrf_field() }}
                <p class="text-muted text-center">
                    Vui lòng nhập Tên đăng nhập và Mật khẩu
                </p>
                <input type="text" placeholder="Tên đăng nhập" name="txtUser" class="form-control top">
                <input type="password" placeholder="Mật khẩu" name="txtPass" class="form-control middle">
                <div class="form-group">
                   {!! $captcha !!}  
                </div>
                <input type="text" id="captcha" name="captcha" placeholder="Nhập mã xác nhận" class="form-control bottom">
                <div class="checkbox">
		  <label>
		    <input type="checkbox"> Nhớ mật khẩu
		  </label>
		</div>
                <button name="btnLogin" class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
            </form>
        </div>
    </div>
  </div>

    <script src="{{ asset('public/lv17_admin/jquery/jquery.js')}}"></script>
    <script src="{{ asset('public/lv17_admin/bootstrap/js/bootstrap.js')}}"></script>

</body>

</html>
