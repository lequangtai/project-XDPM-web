@extends('user.index')
@section('title','Chi tiết thông tin khách hàng')
@section('content')
<div class="row" >
    <div class="col-lg-12 col-md-12 col-sm-24 col-xs-12">
	    <div class="category_title"><a href="">Thông tin học sinh</a>
	    </div>
	    <table  align="center" border="0" cellspacing="0" cellpadding="3">
	    <tbody >
			<tr>
				<th colspan="2">THÔNG TIN SINH VIÊN</th>
			</tr>
			<tr>
				<td>MSSV</td>
				<td>: {{ $user['mahocsinh']}}</td>
			</tr>
			<tr>
				<td>Họ tên</td>
				<td>: {{ $user['hoten']}} </td>
			</tr>
			<tr>
				<td>Lớp</td>
				@foreach($lophoc as $lop)
				@if($user['lophoc_id'] == $lop['id'])
				<td>: {!! $lop["tenlop"]!!} </td>
				@endif
				@endforeach
			</tr>
			<tr>
				<td>Chọn học kỳ:</td>
				<td>&nbsp;&nbsp;<select class="sltMonhoc" name="sltMonhoc" id="sltMonhoc">
	                <option></option>
	               	@foreach($data as $item)
	                  <option value="{{$item['id'] }}">{{ $item['tenhocky'] }}</option>
	                @endforeach
	              </select>
              	</td>
			</tr>
			</tbody>
		</table>
		
			
          <table align="center" border="3px" width="700px" >
          	<tbody >
          		<tr style="height: 40px;background-color: #60aad6">
          			<td>STT</td>
          			<td>Môn học</td>
          			<td>Miệng</td>
          			<td>KT 15 phút</td>
          			<td>KT 1 tiết</td>
          			<td>Thi HK</td>
          			<td>TBMH</td>
          		</tr>
          		<tbody id="bangdiem_hctc">
          		</tbody>
          	</tbody>
          </table>
          </div>
	</div>
</div>
@endsection
	