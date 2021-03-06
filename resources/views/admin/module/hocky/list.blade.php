@extends('admin.app')
@section('title','Thông tin giáo viên')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <a href="{{ route('them-hoc-ky')}}">
                <button class="btn-info" ><i class="fa  fa-plus-square"></i></button></a>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
                  <h3 class="box-title">Danh sách học kỳ</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                      <tr>
                        <th>STT</th>
                        <th>Tên học kỳ </th>
                        <th>Năm học</th>
                        <th>Thời điểm cập nhật</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($data as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!!$item["tenhocky"]!!}</td>
                        <td>{!!$item["namhoc"]["tennamhoc"]!!}</td>
                        <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans() !!}</td>
                        <td>
                <a href="{!!route('getHockyEdit', ['id'=>$item["id"]])!!}"><i class="fa  fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="{!!route('getHockyDel', ['id'=>$item["id"]])!!}"onclick = "return xacnhanxoa ('Bạn có muốn xóa không?')"><i class="fa  fa-trash-o"></i></a>
                </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection