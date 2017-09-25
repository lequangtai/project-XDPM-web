@extends('user.index')
@section('title','Trang Chủ')
@section('content')

<section id="contentbody">
      <div class="row">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="row">
            <div class="middle_bar">
                  @php 
                      $cate=App\Models\Loaitin::select('id','tenloai')->orderBy('id')->get()->toArray();
                  @endphp
              @foreach($cate as $item1=>$value)
                <div class="single_category  wow fadeInDown">
                  <div class="category_title"> <a href="pages/category-archive.html">{!!$value['tenloai'] !!}</a></div>
                  @php 
                      $id=$value["id"];
                      $news=App\Models\Tintuc::select()->where('loaitin_id',$id)->paginate(2);
                  @endphp
                 
                  <div class="single_category_inner">
                    <ul class="catg_nav catg_nav2">
                     @foreach($news as $item)
                      <li>
                        <div class="catgimg_container"> <a class="catg1_img" href="#"> <img src="{!! asset('public/uploads/News/'.$item['hinhanh']) !!}" alt=""> </a></div>
                        <a class="catg_title" href="{!! url('ct-tin/'.$item['id'] .'/'.$item['duongdan'].'.html') !!}"> {!! $item['tieude'] !!}</a>
                        <div class="sing_commentbox">
                          <p><i class="fa fa-calendar"></i>{!! $item['created_at'] !!}</p>
                          </div>
                        <p class="post-summary">{!! $item['tomtat'] !!}</p>
                     </li>
                     @endforeach
                    
                    </ul>
                  </div>
                  {{ $news->links() }}
                </div>
              @endforeach
              
            </div>
          </div>
        </div>
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