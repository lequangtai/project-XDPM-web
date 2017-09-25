@extends('admin.app')
@section('title','Tổng kết')
@section('content')

<section class="content">

@include('admin.block.error')
<form action="" method="POST">
{{ csrf_field() }}

@foreach($lophoc as $item)
              @foreach($hocky as $item1)
             
              <input type="hidden" name="id_lop" value="{!!$item['id']!!}">
              <input type="hidden" name="id_hocky" value="{!!$item1['id']!!}">
                  
              
              @endforeach
              @endforeach
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <a href="{!!route('suatongket', ['lophoc'=>$item['id'], 'hocky'=>$item1['id']])!!}" class="btn btn-success">Chỉnh sửa</a>
                
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
              @foreach($lophoc as $item)
              @foreach($hocky as $item1)
             
              <input type="hidden" name="id_lop" value="{!!$item['id']!!}">
              <input type="hidden" name="id_hocky" value="{!!$item1['id']!!}">
                  <h3 class="box-title">Tổng kết lớp: {{$item['tenlop']}}   Học kỳ:  {{$item1['tenhocky']}}   </h3>
              </div>
              
              @endforeach
              @endforeach
             
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                   
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Điểm trung bình</th>
                        <th>Học lực</th>
                        <th>Hạnh kiểm</th>
                        <th>Số ngày nghỉ</th>
                       
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                  
                   @foreach($hocsinh as $item)
                    
                                 @php
                                  
                                  $hs = $item['id'];
                                  $tongket = App\Models\Tongket::with('hanhkiem')->where('hocsinh_id', $item['id'])->where('hocky_id', $item1['id'])->get()->toArray();

                                @endphp
                       
                        @foreach($tongket as $bd)

          
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <input type="hidden" name="id_tongket[]" class="form-control" value="{{$bd['id']}}">
                        <td><input type="hidden" class="odiem" name="id_hocsinh[]" value="{!!$item['id']!!}" ></>{!!$item['hoten']!!}</td>
                        <td><input type="hidden" name="DTB[]" value="{!! $bd['diemTB']!!}" />{!!  $bd['diemTB']!!}</td>
                        
                         <td><input type="hidden" name="HL[]" value="{!! $bd['hocluc']!!}" />{!! $bd['hocluc']!!}</td>
                        @foreach($hanhkiem as $hk)
                        @if($hk['id'] == $bd['hanhkiem_id'])
                        <td><input type="hidden" name="HK[]" value="{!! $bd['id']!!}" />{!! $hk['tenhanhkiem']!!}</td>
                        @endif
                        @endforeach
                        <td><input type="hidden" name="SNN[]" value="{!! $bd['songaynghi']!!}"/>{!! $bd['songaynghi']!!}</td>
                        
                        
                       <td><input type="hidden" name="ghi_chu[]" value="{!! $bd['ghichu']!!}" />{!! $bd['ghichu']!!}</td>
                       <td><input type="hidden" name="trang_thai[]" value="{!! $bd['trangthai']!!}" />{!! $bd['trangthai']!!}</td>
                      </tr>
                      @endforeach
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
   </form>
@endsection