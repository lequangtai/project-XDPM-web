@extends('user.index')
@section('title','Thông tin học sinh')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách học sinh</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                      <tr>
                        <th>STT</th>
                        <th>Tên lớp</th>
                        <th>Tên học sinh </th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                   
                   @foreach($lophoc as $lop)
                   @foreach($hocsinh as $item)
                   @if($item['lophoc_id'] == $lop['id'])

                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!!$item["hoten"]!!}</td>
                        <td>{!!$item["ngaysinh"]!!}</td>
                        @if($item["gioitinh"] ==0)
                        <td>Nam</td>
                        @else
                        <td>Nữ</td>
                        @endif
                        <td>{!!$item["diachi"]!!}</td>
                        <td>{!! $lop["tenlop"]!!}</td>
                       <td>
                <a href="{!!route('getPHXD', ['id'=>$item["id"]])!!}">Xem điểm</a>
                </td>
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
        </section><!-- /.content -->
@endsection