@extends('user.index')
@section('title','Trang Chủ')
@section('content')
<section id="contentbody">
      <div class="row">
       
        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-12">
          <div class="row">
            <div class="middle_bar">
                <div class="single_category  wow fadeInDown">
                <ol class="breadcrumb">
              <li><a href="{{ route('index')}}"><i class="fa fa-home"></i>Home<i class="fa fa-angle-right"></i></a></li>

              <li>{!! $cate['tenloai'] !!}></li>
              
            </ol>
                  <div class="category_title"> <a href="pages/category-archive.html">{!! $cate['tenloai'] !!}</a></div>                
                  <div class="single_category_inner">
                    <ul class="catg_nav catg_nav2">
                     @foreach($news as $item)
                      <li>
                        <div class="catgimg_container"> <a class="catg1_img" href="{!! url('ct-tin/'.$item['id'] .'/'.$item['duongdan'].'.html') !!}"> <img src="{!! asset('public/uploads/News/'.$item['hinhanh']) !!}" alt=""> </a></div>
                        <a class="catg_title" href="{!! url('ct-tin/'.$item['id'] .'/'.$item['duongdan'].'.html') !!}"> {!! $item['tieude'] !!}</a>
                        <div class="sing_commentbox">
                          <p><i class="fa fa-calendar"></i>{!! $item['created_at'] !!}</p>
                          </div>
                        <p class="post-summary">{!! $item['tomtat'] !!}</p>
                     </li>
                     @endforeach 
                    </ul>
                  </div>
                </div>
                {{$news->links()}}
            </div>
          </div>
        </div>
        </div>
    </section>
@endsection