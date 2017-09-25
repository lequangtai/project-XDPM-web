@extends('user.index')
@section('title','Trang Chủ')
@section('content')

<section id="contentbody">
      <div class="row">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 100px">
          <div class="row">
            <div class="middle_bar">
                <div class="single_leftbar wow fadeInDown">
                <h2><span style="text-align: center;">ĐĂNG NHẬP</span></h2>
                <div class="singleleft_inner">
                  <form action="" method="POST" style="height: 300px">
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
          </div>
        </div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="row">
            <div class="right_bar">
              <div class="single_leftbar wow fadeInDown">
                <h2><span>Tin Mới Nhất</span></h2>
                <div class="singleleft_inner">
                  <ul class="catg3_snav ppost_nav wow fadeInDown">
                    @php 
                     
                       $news=App\Models\Tintuc::select()->limit(10)->get()->toArray();
                    @endphp

                    @foreach($news as $item)
                    <li>
                      <div class="media"><a href="{!! url('ct-tin/'.$item['id'] .'/'.$item['duongdan'].'.html') !!}" class="media-left"><img src="{!! asset('public/uploads/News/'.$item['hinhanh']) !!}" alt=""> </a>
                        <div class="media-body"> <a href="{!! url('ct-tin/'.$item['id'] .'/'.$item['duongdan'].'.html') !!}" class="catg_title"> {!! $item['tieude'] !!}</a></div>
                      </div>
                    </li>
                    @endforeach
                    
                   
                  </ul>
                </div>
              </div>
              <div class="single_leftbar wow fadeInDown">
                <h2><span>YOUTUBE</span></h2>
                <div class="singleleft_inner"> <a href="#"><iframe width="262" height="218" src="https://www.youtube.com/embed/J2_Pqxm-mC8" frameborder="0" allowfullscreen></iframe></a></div>
              </div>
             
             
          </div>
        </div>
      </div>
    </section>
  @endsection