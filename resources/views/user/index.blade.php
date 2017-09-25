<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/lv17_user/css/mycss.css')}}">

<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <div class="box_wrapper">
    <header id="header"><img src="{{ asset('public/lv17_user/images/banner.png')}}" width="1200px" height="300px">
    </header>
    @php 
        $cate=App\Models\Loaitin::select('id','tenloai','id_cha')->get()->toArray();
    @endphp
        <nav class="navbar navbar-default" role="navigation">   
        <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>  
    <div id="navbar" class="navbar-collapse collapse"> 
      <ul class="nav navbar-nav custom_nav" id="drnav">
      <li ><a href="{!! route('index')!!}">Trang chủ</a></li>
      @foreach($cate as $item)
        <li ><a href="{!! url('loai-tin/'.$item['id'] .'/'.str_slug($item['tenloai']))!!}">{!! $item['tenloai'] !!}</a></li>
      @endforeach
      <li ><a href="{!! route('index')!!}">Đăng nhập</a>
      <ul >
        <li><a href="{!! route('getHSDN') !!}">Học sinh</a></li>
        <li><a href="{!! route('getPHDN') !!}">Phụ huynh</a></li>
      </ul>
      </li>
      </ul>
    </div>
     </nav> 
    <div class="thumbnail_slider_area">
    
      <div class="owl-carousel">
      @php 
        $news=App\Models\Tintuc::select()->get()->toArray();
      @endphp
      @foreach($news as $item)
        <div class="signle_iteam"> <img src="{!! asset('public/uploads/News/'.$item['hinhanh']) !!}" alt="">
          <div class="sing_commentbox slider_comntbox">
            <p><i class="fa fa-calendar"></i>{!! $item['created_at'] !!}</p>
           </div>
          <a class="slider_tittle" href="{!! url('ct-tin/'.$item['id'] .'/'.$item['duongdan'].'.html') !!}">{!! $item['tieude'] !!}</a></div>
          @endforeach
      </div>

    </div>
@yield('content')
    <footer id="footer">
     
      <div class="footer_bottom">
      WEB TIN TỨC VIẾT BẰNG LARAVEL
      
      </div>
    </footer>
  </div>
</div>
<script src="{{ asset('public/lv17_user/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/lv17_user/js/wow.min.js')}}"></script>
<script src="{{ asset('public/lv17_user/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/lv17_user/js/slick.min.js')}}"></script>
<script src="{{ asset('public/lv17_user/js/jquery.li-scroller.1.0.js')}}"></script>
<script src="{{ asset('public/lv17_user/js/myscript.js')}}"></script>
<script src="{{ asset('public/lv17_user/js/custom.js')}}"></script>
</body>
</html>