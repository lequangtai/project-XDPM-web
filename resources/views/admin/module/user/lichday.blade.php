@extends('admin.app')
@section('title','Lịch giảng dạy')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
                  <h3 class="box-title">Lịch giảng dạy của giáo viên</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                      <tr>
                        <th>STT</th>
                        <th>Tên giáo viên</th>
                        <th>Môn học học</th>
                        <th>Lớp học</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                    
                    @foreach($user as $item1)
                    @foreach($monhoc as $item2)
                    @foreach($lophoc as $item3)
                    @foreach($lichday as $item)
                    @if($item->users_id == $item1['id'])
                    @if($item->monhoc_id == $item2['id'])
                    @if($item->lophoc_id == $item3['id'])
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!!$item1['hoten']!!}</td>
                        <td>{!!$item2['tenmonhoc']!!}</td>
                        <td>{!!$item3['tenlop']!!}</td>
                      </tr>
                    @endif
                    @endif
                    @endif
                      @endforeach
                      @endforeach
                      @endforeach
                      @endforeach
                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection