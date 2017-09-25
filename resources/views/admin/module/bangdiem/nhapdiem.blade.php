@extends('admin.app')
@section('title','Nhập điểm')
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
               @foreach($hocky as $item2)
              <input type="hidden" name="id_hocky" value="{!!$item2['id']!!}">
              @endforeach
              @foreach($lophoc as $item)
              @foreach($monhoc as $item1)
              <input type="hidden" name="id_lop" value="{!!$item['id']!!}">
              <input type="hidden" name="id_mon" value="{!!$item1['id']!!}">
                  <h3 class="box-title">Bảng điểm lớp: {{$item['tenlop']}}   Môn: {{$item1['tenmonhoc']}}  {{$item2['tenhocky']}}</h3>
              </div>
              @endforeach
              @endforeach
                <div class="box-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                   
                    <tr>
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Tên học sinh</th>
                        <th colspan="8">Hệ số 1</th>
                        <th colspan="3">Hệ số 2</th>
                        <th>Hệ số 3</th>
                        <th  rowspan="2">Điểm trung bình</th>
                        
                      </tr>
                      <tr>
                        <th colspan="4">Điểm miệng</th>
                        <th colspan="4">Kiểm tra viết</th>
                        <th colspan="3">Điểm 1 tiết</th>
                        <th>Điểm thi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                    $stt =0;
                    @endphp
                    @foreach($hocsinh as $item1)
                    @foreach($bangdiem as $item)
                    @if($item['hocsinh_id'] == $item1['id'])
                        @php
                        $stt += 1;
                        @endphp
                      <tr>
                        <td>{{$stt}}</td>
                        <input type="hidden" name="id_bangdiem" value="{!!$item['id']!!}">
                        <td><input type="hidden" class="odiem" name="id_hocsinh" value="{!!$item1['id']!!}" ></>{!!$item1['hoten']!!}</td>
                        <td><input  class="odiem" type="text" name="M1" value="{!!old('M1', isset($item["mieng1"]) ?$item["mieng1"] :null)!!}" /></td>
                        <td><input  class="odiem" type="text" name="M2" value="{!!old('M2',isset($item["mieng2"]) ?$item["mieng2"] :null)!!}" /></td>
                        <td><input  class="odiem" type="text" name="M3" value="{!!old('M3',isset($item["mieng3"]) ?$item["mieng3"] :null)!!}"/></td>
                        <td><input  class="odiem" type="text" name="M4" value="{!!old('M4',isset($item["mieng4"]) ?$item["mieng4"] :null)!!}"/></td>
                        <td><input  class="odiem" type="text" name="d15phut1" value="{!!old('d15phut1',isset($item["d15phut1"]) ?$item["d15phut1"] :null)!!}"/></td>
                        <td><input  class="odiem" type="text" name="d15phut2"  value="{!!old('d15phut2',isset($item["d15phut2"]) ?$item["d15phut2"] :null)!!}" /></td>
                        <td><input  class="odiem" type="text" name="d15phut3"  value="{!!old('d15phut3',isset($item["d15phut3"]) ?$item["d15phut3"] :null)!!}"/></td>
                        <td><input  class="odiem" type="text" name="d15phut4"  value="{!!old('d15phut4',isset($item["d15phut4"]) ?$item["d15phut4"] :null)!!}"/></td>
                        <td><input  class="odiem" type="text" name="d1tiet1"  value="{!!old('d1tiet1',isset($item["d1tiet1"]) ?$item["d1tiet1"] :null)!!}"/></td>
                        <td><input  class="odiem" type="text" name="d1tiet2"  value="{!!old('d1tiet2',isset($item["d1tiet2"]) ?$item["d1tiet2"] :null)!!}" /></td>
                        <td><input  class="odiem" type="text" name="d1tiet3"  value="{!!old('d1tiet3',isset($item["d1tiet3"]) ?$item["d1tiet3"] :null)!!}"/></td>
                        <td><input  class="odiem" type="text" name="thi"  value="{!!old('thi',isset($item["diemthiHK"]) ?$item["diemthiHK"] :null)!!}" /></td>
                        <td></td>
                       
                      </tr>
                      @endif
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