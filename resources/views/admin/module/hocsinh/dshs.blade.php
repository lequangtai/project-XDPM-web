@extends('admin.app')
@section('title','Thông tin học sinh')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                 @foreach($lophoc as $lop)
                 @endforeach
                 <a href="{!!route('DSHS', ['lophoc'=>$lop['id']])!!}"><button type="button" class="btn btn-info">Tải về</button></a>
                  
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <a href="{{ route('them-hoc-sinh')}}">
                <button class="btn-info" ><i class="fa  fa-plus-square"></i></button></a>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
                  <h3 class="box-title">Danh sách học sinh</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                      <tr>
                        <th>STT</th>
                        <th>Tên học sinh </th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Tên lớp</th>
                        <th>Quản lý</th>
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
                <a href="{!!route('getHocsinhEdit', ['id'=>$item["id"]])!!}"><i class="fa  fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="{!!route('getHocsinhDel', ['id'=>$item["id"]])!!}"onclick = "return xacnhanxoa ('Bạn có muốn xóa không?')"><i class="fa  fa-trash-o"></i></a>
                </td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach
                    </tbody>
                  </table>

                  <div style="border: 4px; background-color: #E0FFFF; text-align: center">
              <table style="border: 5px;">

               @php
               $nam = App\Models\Hocsinh::select()->where('gioitinh',0)->count('id');
              $nu = App\Models\Hocsinh::select()->where('gioitinh',1)->count('id');
              $sum = App\Models\Hocsinh::select()->count('id');
               @endphp
               <tbody>
               <tr>
                   <td class="thongke">Tổng số hs: </td>
                   <td class="thongke">{{$sum}} Học sinh</td>
                   
                 </tr>
                <tr>
                   <td class="thongke">Học sinh Nam: </td>
                   <td class="thongke">{{$nam}} HS</td>
                   <td class="thongke">Tỷ lệ: {{number_format(($nam *100/$sum),2)}}%</td>
                 </tr>
                 <tr>
                   <td class="thongke">Học sinh Nữ: </td>
                   <td class="thongke">{{$nu}} HS</td>
                   <td class="thongke">Tỷ lệ: {{number_format(($nu *100/$sum),2)}}%</td>
                 </tr>
                
               </tbody>
             </table>
              </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection