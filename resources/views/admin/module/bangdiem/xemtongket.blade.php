@extends('admin.app')
@section('title','Điểm tổng kết')
@section('content')

<section class="content">
@include('admin.block.error')
@include('admin.block.flash')

<form action="" method="POST">
{{ csrf_field() }}

              
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">

                
                  <input type="submit" name="submit" onclick = "return xacnhanxoa ('Bảng tổng kết không thể thay đổi. Bạn có chắc muốn lưu không?')" value="Lưu tổng kết">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
               
              </div>
              
              @foreach($hocky as $hk)
              <input type="hidden" name="id_hocky" value="{!!$hk['id']!!}">
              @endforeach
              @foreach($lophoc as $lop)
              <input type="hidden" name="id_lop" value="{!!$lop['id']!!}">
                  
              </div>
              @endforeach
                <div class="box-body">
                 <div class="bangdiem">
                  <span >BẢNG ĐIỂM LỚP: {{$lop['tenlop']}} HỌC KỲ: {{$hk['tenhocky']}}</span>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                    <tr>
                        <th  class="center">STT</th>
                        <th class="center hoten">Tên học sinh</th>
                        @php
                         $mon = App\Models\Monhoc::select()->get()->toArray();
                         $somon = 0;
                         $sodiem =0;
                         $tongheso =0;
                        @endphp
                        
                        @foreach($monhoc as $item)
                        @foreach($mon as $mh)
                        @if($item->monhoc_id == $mh['id'] )
                        @php
                        $gioi =0;
                        $kha =0; 
                        $trungbinh =0;
                        $yeu =0;
                        $kem =0;
                        $somon +=1;
                        $tongheso += $mh['heso'];
                        
                        @endphp
                        @endif
                       	@endforeach
                        @endforeach
                        @foreach($hocsinh as $mot)
                          @php
                            $bd123 = App\Models\Bangdiem::select()->where('hocsinh_id',$mot['id'])->where('hocky_id', $hk['id'])->get()->toArray();
                             $mon123 = App\Models\Monhoc::select()->get()->toArray();

                          @endphp
                        @endforeach
                          @foreach($bd123 as $b123)
                          @foreach($mon123 as $m123)
                              @if($b123['monhoc_id'] == $m123['id'])
                               <th class="center">{{$m123['tenmonhoc']}}</th>
                              @endif
                           @endforeach
                          @endforeach
                        <th  class="center">Điểm trung bình</th>
                        <th  class="center">Xếp loại</th>
                        <th  class="center">Đánh giá hạnh kiểm</th>
                        <th  class="center">Số ngày nghỉ</th>
                        <th  class="center">Ghi chú</th>
                      </tr>
                    </thead>
                    <tbody>
          
                   @foreach ($hocsinh as $hs)
                    <tr>
                       <td>{{ $loop->iteration }}</td>
                      
                        <td><input type="hidden" class="odiem" name="id_hocsinh[]" value="{!!$hs['id']!!}" ></>{!!$hs['hoten']!!}</td>
                        @php
                        $bangdiem = App\Models\Bangdiem::select()->where('hocsinh_id',$hs['id'])->where('hocky_id', $hk['id'])->get()->toArray();
                        $min = App\Models\Bangdiem::select()->where('hocsinh_id',$hs['id'])->where('hocky_id', $hk['id'])->min('diemTBHK');

                       	$mon = App\Models\Monhoc::select()->get()->toArray();
                        $sodiem = count($bangdiem);
                        $tongdiem =0;
                        @endphp
                        @foreach($bangdiem as $bd)
                        @php
                        $monhoc = App\Models\Monhoc::select()->where('id',$bd['monhoc_id'])->get()->toArray();
                        @endphp
                        @foreach($monhoc as $item)

                        	@if($item['id'] == $bd['monhoc_id'])
                        	@php
                        		$tongdiem += $bd['diemTBHK']*$item['heso'];
                        	@endphp
                        	@endif
                        @endforeach


						<td><input type="hidden" class="odiem" name="diemTB[]" value="{!!$bd['diemTBHK']!!}" >{!!$bd['diemTBHK']!!}</></td>
						
						@endforeach
						
						@if($somon == $sodiem)
						@php
						$diemTBtong = $tongdiem/$tongheso;
	                    $TBC =  number_format($diemTBtong,1);
            $monhs2 = App\Models\Monhoc::select()->where('heso', 2)->get()->toArray();
						@endphp
            @foreach($monhs2 as $hs2)
                @php
                   $hso2 = App\Models\Bangdiem::select()->where('hocsinh_id',$hs['id'])->where('hocky_id', $hk['id'])->where('monhoc_id', $hs2['id'])->max('diemTBHK');
                @endphp
            @endforeach
						  <td><input type="hidden" class="odiem" name="DTB[]" value="{{$TBC}}" ></>{{$TBC}}</td>
             @if($TBC >=8.0 && $min >= 6.5 && $hso2 >=6.5)
             @php
             $gioi +=1;
             @endphp
             <td><input type="hidden" class="odiem" name="hocluc[]" value="Giỏi" ></>Giỏi</td>
             @elseif($TBC >= 6.5 && $min >= 5.0 && $hso2 >=5.0)
              @php
             $kha +=1;
             @endphp
             <td><input type="hidden" class="odiem" name="hocluc[]" value="Khá" ></>Khá</td>
             @elseif($TBC >= 5.0 && $min >= 3.5 && $hso2 >=3.5)
              @php
             $trungbinh +=1;
             @endphp
             <td><input type="hidden" class="odiem" name="hocluc[]" value="Trung bình" ></>Trung bình</td>
             @elseif($TBC >=3.5 && $min >= 2.0 && $hso2 >=2.0)
              @php
             $yeu +=1;
             @endphp
             <td><input type="hidden" class="odiem" name="hocluc[]" value="Yếu" ></>Yếu</td>
             @else
              @php
             $kem +=1;
             @endphp
             <td><input type="hidden" class="odiem" name="hocluc[]" value="Kém" ></>Kém</td>
            @endif
            
             <td><select class="col-sm-8 select2" name="slthanhkiem[]" style="width: 150px;">
                <option value="">Chưa đánh giá</option>
                @foreach($hanhkiem as $item)
                  <option value="{!! $item['id'] !!}">{!! $item['tenhanhkiem'] !!}</option>
                @endforeach
              </select>
            </td>
            <td><input type="text" class="odiem" name="songaynghi[]" value="" ></td>
             <td><input type="text" class="odiem" name="ghichu[]" value="" ></td>
            @endif
            
            </tr>
           @endforeach 
          

              
          </tbody>
          </table>
          <div style="border: 4px; background-color: #E0FFFF; text-align: center">
           @if(($gioi + $kha + $trungbinh + $yeu + $kem)>0)
            <div class="bangdiem">
                  <span >BÁO CÁO TỶ LỆ LỚP: {{$lop['tenlop']}} HỌC KỲ: {{$hk['tenhocky']}}</span>
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
        
   </form>
   </section>
@endsection