@extends('admin.app')
@section('title','Thông tin phụ huynh')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <a href="{{ route('them-phu-huynh')}}">
                <button class="btn-info" ><i class="fa  fa-plus-square"></i></button></a>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
                  <h3 class="box-title">Danh sách phụ huynh</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                      <tr>
                        <th>STT</th>
                        <th>Tên </th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Tên học sinh</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($phuhuynh as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!!$item["tenPH"]!!}</td>
                        <td>{!!$item["sdt"]!!}</td>
                        <td>{!!$item["diachi"]!!}</td>
                        <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans() !!}</td>
                        <td>
                <a href="{!!route('getPhuhuynhEdit', ['id'=>$item["id"]])!!}"><i class="fa  fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="{!!route('getPhuhuynhDel', ['id'=>$item["id"]])!!}"onclick = "return xacnhanxoa ('Bạn có muốn xóa không?')"><i class="fa  fa-trash-o"></i></a>
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