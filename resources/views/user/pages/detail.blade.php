
@extends('user.index')
@section('title','Trang Chủ')
@section('content')

<section id="contentbody">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-24 col-xs-12">
      <div class="row">
        <div class="middle_bar">
          <div class="single_post_area">
            <ol class="breadcrumb">
              <li><a href="{{ route('index')}}"><i class="fa fa-home"></i>Home<i class="fa fa-angle-right"></i></a></li>

              <li>{!! $data['loaitin']['tenloai']!!} ></li>
              <li class="active">{!! $data['tieude']!!}</li>
            </ol>
            <h2 class="post_title wow ">{!! $data['tieude']!!}</h2>
             <a href="#" class="post_date"><i class="fa fa-clock-o"></i>{!! $data['created_at']!!}</a>
            <div class="single_post_content">
             {!! $data['noidung']!!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection