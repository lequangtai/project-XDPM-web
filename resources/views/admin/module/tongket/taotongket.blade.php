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
              @foreach($lophoc as $item)
              @foreach($hocky as $itemhk)
             
              <input type="hidden" name="id_lop" value="{!!$item['id']!!}">
              <input type="hidden" name="id_hocky" value="{!!$itemhk['id']!!}">
                  <h3 class="box-title">Tổng kết lớp: {{$item['tenlop']}}   Học kỳ:  {{$itemhk['tenhocky']}}   </h3>
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
                      </tr>
                      
                    </thead>
                    <tbody>
                    
                   @foreach($hocsinh as $item)
                    
                    @php
                    $tongdiem =0;
                    $tongheso =0;
                    $diemtbhk =0;
                      $hs = $item['id'];
                     
                      $dtb = App\Models\Bangdiem::select()->where('hocsinh_id', $item['id'])->where('hocky_id', $itemhk['id'])->min('diemTBHK');


                    @endphp



                    @foreach($chitiet as $chitiet1)
                          @php
                            $monhoc = App\Models\Monhoc::select()->where('id', $chitiet1->monhoc_id)->get()->toArray();
                            
                          @endphp
                      @foreach($monhoc as $mh)
                          @php
                            $diem = App\Models\Bangdiem::select()->where('hocsinh_id', $item['id'])->where('hocky_id', $itemhk['id'])->where('monhoc_id', $mh['id'])->get();

                          @endphp
                        @foreach($diem as $abc)
                            @php
                            $tongdiem += $abc['diemTBHK'] * $mh['heso'];
                            $tongheso += $mh['heso'];
                            @endphp
                        @endforeach
                      @endforeach

                      @php
                          $diemtbhk = $tongdiem / $tongheso;
                          $TBC =  number_format($diemtbhk,1);  
                      @endphp


                      @php
                      $monhochs2 = App\Models\Monhoc::select()->where('id', $chitiet1->monhoc_id)->where('heso', 2)->get()->toArray();
                      @endphp

                      @foreach($monhochs2 as $hs2)
                        @php
                         $dhs2 = App\Models\Bangdiem::select()->where('hocsinh_id', $item['id'])->where('hocky_id', $itemhk['id'])->where('monhoc_id', $hs2['id'])->max('diemTBHK');
                        @endphp
                      @endforeach
                    @endforeach

                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        
                        <td><input type="hidden" class="odiem" name="id_hocsinh[]" value="{!!$item['id']!!}" ></>{!!$item['hoten']!!}</td>
                        <td><input type="hidden" name="DTB[]" value="{!! $TBC!!}" />{!! $TBC!!}</td>

                        @if($dtb >= 6.5 && $TBC >=8.0 && $dhs2 >= 8.0)
                         <td><input type="hidden" name="HL[]" value="Giỏi" />Giỏi</td>
                        @elseif($dtb >= 5.0 && $TBC >= 6.5 && $dhs2 >= 6.5)
                         <td><input type="hidden" name="HL[]" value="Khá" />Khá</td>
                        @elseif($dtb >= 4.0 && $TBC >= 5.0 && $dhs2 >= 5.0)
                         <td><input type="hidden" name="HL[]" value="Trung bình" />Trung bình</td>
                        @elseif($dtb >= 3.5 && $TBC >= 4.0 && $dhs2 >= 4.0)
                        <td><input type="hidden" name="HL[]" value="Yếu" />Yếu</td>
                        @else
                         <td><input type="hidden" name="HL[]" value="Kém" />Kém</td>
                         @endif
                        <td><select class="col-sm-8 select2" name="slthanhkiem[]" style="width: 200px;">
                          <option>Chưa đánh giá</option>
                          @foreach($hanhkiem as $item)
                            <option value="{!! $item['id'] !!}">{!! $item['tenhanhkiem'] !!}</option>
                          @endforeach
                        </select></td>
                        <td><input type="text" name="SNN[]" value=""/></td>
                        
                        
                       <td><input type="text" name="ghi_chu[]" value="" /></td>
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