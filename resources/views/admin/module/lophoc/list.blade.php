@extends('admin.app')
@section('title','Thông tin lớp học')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <a href="{{ route('them-lop-hoc')}}">
                <button class="btn-info" ><i class="fa  fa-plus-square"></i></button></a>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
                  <h3 class="box-title">Danh sách lớp học</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                      <tr>
                        <th>STT</th>
                        <th>Tên lớp học</th>
                        <th>Giáo viên chủ nhiệm</th>
                        <th>Năm học</th>
                        <th>Khối lớp</th>
                        <th>Danh sách học sinh</th>
                        <th>Quản lý</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($lophoc as $item)
                   @foreach($khoilop as $khoi)
                   @foreach($giaovien as $gv)
                   @foreach($namhoc as $nh)
                   @if($item['users_id'] == $gv['id'] &&  $item['namhoc_id'] == $nh['id'] && $item['khoilop_id'] == $khoi['id'])
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!!$item["tenlop"]!!}</td>
                       
                        <td>{!!$gv["hoten"]!!}</td>
                       
                       
                        <td>{!!$nh["tennamhoc"]!!}</td>
                        
                        <td>{!! $khoi['tenkhoi']!!}</td>
                       
                        <td><a href="{!!route('danh-sach', ['id'=>$item["id"]])!!}">Danh sách học sinh</a></td>
                        <td>
                <a href="{!!route('getLophocEdit', ['id'=>$item["id"]])!!}"><i class="fa  fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="{!!route('getLophocDel', ['id'=>$item["id"]])!!}"onclick = "return xacnhanxoa ('Bạn có muốn xóa không?')"><i class="fa  fa-trash-o"></i></a>
                </td>
                      </tr>
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