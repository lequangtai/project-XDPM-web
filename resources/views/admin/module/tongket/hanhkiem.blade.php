@extends('admin.app')
@section('title','Tổng kết')
@section('content')

<section class="content">

@include('admin.block.error')
<form action="" method="POST">
{{ csrf_field() }}
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <input type="submit" name="submit" value="Lưu">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
            
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                   
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Hạnh kiểm</th>
                        <th>Ghi chú</th>
                        <th>Số ngày nghỉ</th>
                    </tr>
                      
                    </thead>
                    <tbody>
                     @php
                    $stt =0;
                    @endphp
                   @foreach($hocsinh as $item)
                  
                    
                        @php
                        $stt += 1;
                        @endphp
                      <tr>
                        <td>{{$stt}}</td>
                        
                        <td><input type="hidden" class="odiem" name="id_hocsinh[]" value="{!!$item['id']!!}" ></>{!!$item['hoten']!!}</td>
                        <td>              
                        <select class="col-sm-8 select2" name="slthanhkiem[]" style="width: 200px;">
                          <option>Chọn hạnh kiểm</option>
                          @foreach($hanhkiem as $item)
                            <option value="{!! $item['id'] !!}">{!! $item['tenhanhkiem'] !!}</option>
                          @endforeach
                        </select>
                        </td>
                        <td><input type="text" name="ghi_chu[]" value="" /></td>
                        <td><input type="text" name="songaynghi[]" value="" /></td> 
                       
                        <td></td>
                       
                      </tr>
                      
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