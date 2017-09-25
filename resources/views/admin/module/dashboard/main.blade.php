@extends('admin.app')
@section('title','Trang Chính')
@section('content')
  <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row" >
          <a href="{!! route('them-hoc-sinh')!!}">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-edit"></i></h1>
                  <p><h4>Nhập điểm</h4></p>
                </div>
              </div>
            </div></a>
            <a href="{!! route('them-nguoi-dung')!!}">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-pie-chart"></i></h1>
                  <p><h4>Tạo tổng kết</h4></p>
                </div>
              </div>
            </div></a>
          
            <a href="{!! route('them-loai-tin')!!}">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-institution"></i></h1>
                  <p><h4>Quản lý lớp học</h4></p>
                </div>
              </div>
            </div></a>
            <a href="{!! route('them-nam-hoc')!!}">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-list-alt"></i></h1>
                  <p><h4>Tạo báo cáo</h4></p>
                </div>
              </div>
            </div></a>
            <a href="{!! route('them-tin-tuc')!!}">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-newspaper-o"></i></h1>
                  <p><h4>Quản lý tin tức</h4></p>
                </div>
              </div>
            </div></a>
            <a href="">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-navicon"></i></h1>
                  <p><h4>Lịch giảng dạy</h4></p>
                </div>
              </div>
            </div></a>
            <a href="">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-user"></i></h1>
                  <p><h4>Quản lý tài khoản</h4></p>
                </div>
              </div>
            </div></a>
            <a href="">
            <div class="col-lg-3 col-xs-4">
              <div class="small-box">
                <div class="inner">
                  <h1><i class="fa fa-users"></i></h1>
                  <p><h4>Quản lý học sinh</h4></p>
                </div>
              </div>
            </div></a>
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row" >
          <h2>Thống kê</h2>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-android-contact"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Giáo viên</span>
                  <span class="info-box-number">{!! $stas_user !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa ion-android-contacts"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Học sinh</span>
                  <span class="info-box-number">{!! $stas_hsinh !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-social-buffer"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lớp học</span>
                  <span class="info-box-number">{!! $stas_lophoc !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-paper"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tin tức</span>
                  <span class="info-box-number">{!! $stas_tintuc !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -
           <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                 
              </div>
                  <h3 class="box-title">Lịch sử user</h3>
                </div><!-- /.box-header -->
                @php
                   $lichsu = App\Models\Lichsu::select()->latest()->limit(20)->get()->toArray();
                   $user = App\Models\User::select()->get()->toArray();
                @endphp

                <div class="box-body">
                <div class="tieude">
                  <span >LỊCH SỬ QUẢN LÝ ĐIỂM</span>
                </div>
                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                       
                        <th>Thời gian thêm bảng điểm</th>
                        <th>Thời gian cập nhật bảng điểm</th>
                        <th>Thời gian xóa bảng điểm</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($user as $us)
                    @foreach($lichsu as $item)
                   
                      @if($item['user'] == $us['username'])
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$us['hoten']}}</td>
                        <td>{{$item['taobangdiem']}}</td>
                        <td>{{$item['suabangdiem']}}</td>
                        <td>{{$item['xoabangdiem']}}</td>
                      </tr>
                      @endif
                    @endforeach
                    @endforeach

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

           
           

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
        </section><!-- /.content -->

 
@endsection