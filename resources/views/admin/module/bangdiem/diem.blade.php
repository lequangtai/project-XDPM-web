@extends('admin.app')
@section('title','Nhập điểm')
@section('content')

<section class="content">
@include('admin.block.error')
@include('admin.block.flash')

<form action="" method="POST" name="bangdiem" onsubmit="return validateForm()">
{{ csrf_field() }}

 			@php
              $hocky = App\Models\Hocky::select()->where('id', $hocky)->get()->toArray();
              $monhoc = App\Models\Monhoc::select()->where('id', $monhoc)->get()->toArray();
              $lophoc = App\Models\Lophoc::select()->where('id', $lophoc)->get()->toArray();
              @endphp
              
               @foreach($hocky as $item2)
              <input type="hidden" name="id_hocky" value="{!!$item2['id']!!}">
              @endforeach
              @foreach($lophoc as $item)
              @foreach($monhoc as $item1)
             
              <input type="hidden" name="id_lop" value="{!!$item['id']!!}">
              <input type="hidden" name="id_mon" value="{!!$item1['id']!!}">
                  
             
              
              @endforeach
              @endforeach
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">

                
                <a href="{!!route('DeleteAll', ['monhoc'=>$item1['id'], 'lophoc'=>$item['id'], 'hocky'=>$item2['id']])!!}" class="btn btn-danger margin btn-labeled" >Xóa tất cả</a>
                <a href="{!!route('import',  ['monhoc'=>$item1['id'], 'lophoc'=>$item['id'], 'hocky'=>$item2['id']] )!!}" class="btn btn-success">Tải lên</a>
                <div class="btn-group">
                	<button type="button" class="btn btn-info">Tải về</button>
                	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                		<span class="caret"></span>
                		<span class="sr-only">Dropdown</span>
                	</button>
                	<ul class="dropdown-menu" role="menu" id="export-menu">
                		<li id="export-to-excel"><a href="{!!route('getExport', ['monhoc'=>$item1['id'], 'lophoc'=>$item['id'], 'hocky'=>$item2['id']])!!}">Excel</a></li>
                		<li id="divider"></li>
                		<li id="export-to-word"><a href="#">word</a></li>
                	</ul>
                	
                </div>
                <input type="submit" name="submit" value="Lưu">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
               

              </div>

              @php
              $hocky = App\Models\Hocky::select()->where('id', $hocky)->get()->toArray();
              $monhoc = App\Models\Monhoc::select()->where('id', $monhoc)->get()->toArray();
              $lophoc = App\Models\Lophoc::select()->where('id', $lophoc)->get()->toArray();
              @endphp
              
               @foreach($hocky as $item2)
              <input type="hidden" name="id_hocky" value="{!!$item2['id']!!}">
              @endforeach
              @foreach($lophoc as $item)
              @foreach($monhoc as $item1)
             
              <input type="hidden" name="id_lop" value="{!!$item['id']!!}">
              <input type="hidden" name="id_mon" value="{!!$item1['id']!!}">
              
                  
              </div>
              
              @endforeach
              @endforeach
                <div class="box-body">
                <div class="bangdiem">
                  <span >BẢNG ĐIỂM LỚP: {{$item['tenlop']}}   MÔN: {{$item1['tenmonhoc']}}  HỌC KỲ: {{$item2['tenhocky']}}</span>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                   
                   
                    <tr>
                        <th rowspan="2" class="center">STT</th>
                        <th rowspan="2" class="center hoten">Tên học sinh</th>
                        <th colspan="8" class="center">Hệ số 1</th>
                        <th colspan="3" class="center">Hệ số 2</th>
                        <th rowspan="1" class="center">Hệ số 3</th>
                        <th  rowspan="2" class="center">Điểm trung bình</th>
                        <th  rowspan="2" class="center">Xếp loại</th>
                        
                      </tr>
                      <tr>
                        <th colspan="4" class="center">Điểm miệng</th>
                        <th colspan="4" class="center">Kiểm tra viết</th>
                        <th colspan="3" class="center">Điểm 1 tiết</th>
                        <th rowspan="1" class="center">Điểm thi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                        $gioi =0;
                        $kha =0; 
                        $trungbinh =0;
                        $yeu =0;
                        $kem =0;
                        @endphp
                    @foreach($bangdiem as $item)
                    @foreach($hocsinh as $item1)
                    @if($item['hocsinh_id'] == $item1['id'])
                    
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <input type="hidden" name="id_bangdiem[]" class="form-control" value="{{$item['id']}}">
                        <input type="hidden" class="odiem" name="id_hocsinh[]" value="{!!$item1['id']!!}" >
                        <td><input type="hidden" class="odiem" name="tenhocsinh[]" value="{!!$item['tenhocsinh']!!}" ></>{!!$item['tenhocsinh']!!}</td>
                        <td><input  class="odiem" type="text" name="M1[]" id="M1" value="{!!$item['mieng1']!!}" /></td>
                        <td><input  class="odiem" type="text" name="M2[]" id="M2" value="{!!$item['mieng2']!!}" /></td>
                        <td><input  class="odiem" type="text" name="M3[]" id="M3" value="{!!$item['mieng3']!!}" /></td>
                        <td><input  class="odiem" type="text" name="M4[]" id="M4" value="{!!$item['mieng4']!!}" /></td>
                        <td><input  class="odiem" type="text" name="d15phut1[]" value="{!!$item['d15phut1']!!}" /></td>
                        <td><input  class="odiem" type="text" name="d15phut2[]" value="{!!$item['d15phut2']!!}" /></td>
                        <td><input  class="odiem" type="text" name="d15phut3[]" value="{!!$item['d15phut3']!!}" /></td>
                        <td><input  class="odiem" type="text" name="d15phut4[]" value="{!!$item['d15phut4']!!}" /></td>
                        <td><input  class="odiem" type="text" name="d1tiet1[]" value="{!!$item['d1tiet1']!!}" /></td>
                        <td><input  class="odiem" type="text" name="d1tiet2[]" value="{!!$item['d1tiet2']!!}" /></td>
                        <td><input  class="odiem" type="text" name="d1tiet3[]" value="{!!$item['d1tiet3']!!}" /></td>
                        <td><input  class="odiem" type="text" name="thi[]" value="{!!$item['diemthiHK']!!}" /></td>
                        <td>{!!number_format($item['diemTBHK'],1)!!}</td>
                        
                        @if($item['diemTBHK'] >= 8.0)
                        <td>Giỏi</td>
                        @php
                        $gioi +=1;
                        @endphp
                        @elseif($item['diemTBHK'] >= 6.5)
                        <td>Khá</td>
                        @php
                        $kha +=1;
                        @endphp
                        @elseif($item['diemTBHK'] >= 5.0)
                         <td>Trung bình</td>
                         @php
                        $trungbinh +=1;
                        @endphp
                        @elseif($item['diemTBHK'] >= 3.5)
                         <td>Yếu</td>
                         @php
                        $yeu +=1;
                        @endphp
                        @else
                         <td>Kém</td>
                         @php
                        $kem +=1;
                        @endphp
                         @endif
                      </tr>
                      @endif
                    @endforeach
                    @endforeach
                    <tr class="thead"></tr>
                    </tbody>
                    
                  </table>
                  <div style="border: 4px; background-color: #E0FFFF; text-align: center">
           @if(($gioi + $kha + $trungbinh + $yeu + $kem)>0)
            <div class="bangdiem">
                  <span >BÁO CÁO TỶ LỆ XẾP LOẠI: </span>
            </div>

            <table style="border: 5px;">
              
               <tbody>
                 <tr>
                   <td class="thongke">Học sinh giỏi: </td>
                   <td class="thongke">{{$gioi}} học sinh</td>
                   <td class="thongke">Tỷ lệ: {{number_format($gioi *100/($gioi + $kha + $trungbinh + $yeu + $kem),2)}}%</td>
                 </tr>

                 <tr>
                  <td class="thongke">Học sinh khá: </td>
                  <td class="thongke">{{$kha}} học sinh</td>
                  <td class="thongke">Tỷ lệ: {{number_format($kha *100/($gioi + $kha + $trungbinh + $yeu + $kem),2)}}%</td>
                 </tr>
                 <tr>
                  <td class="thongke">Học sinh TB: </td>
                  <td class="thongke">{{$trungbinh}} học sinh</td>
                  <td class="thongke">Tỷ lệ: {{number_format($trungbinh *100/($gioi + $kha + $trungbinh + $yeu + $kem),2)}}%</td>  
                 </tr>
                 <tr>
                 <td class="thongke">Học sinh yếu: </td>
                 <td class="thongke">{{$yeu}} học sinh</td>
                 <td class="thongke">Tỷ lệ: {{number_format($yeu *100/($gioi + $kha + $trungbinh + $yeu + $kem),2)}}%</td>
                 </tr>
                 <tr>
                   <td class="thongke">Học sinh kém: </td>
                   <td class="thongke">{{$kem}} học sinh</td>
                   <td class="thongke">Tỷ lệ: {{number_format($kem *100/($gioi + $kha + $trungbinh + $yeu + $kem),2)}}%</td>
                 </tr>
               </tbody>
             </table>
             @endif
           </div>


                </div>
              </div>
            </div>
          </div>
        </section>
   </form>
@endsection