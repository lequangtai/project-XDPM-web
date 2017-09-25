@extends('admin.app')
@section('title','Tổng kết')
@section('content')
<section class="content">
<form action="" method="POST">
{{ csrf_field() }}
  <div class="row">
    <div class="box-body"></div>
    <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <div class="box box-danger">
            <button type="submit" name="btnContinue" value="btnSaveNew" class="btn btn-primary margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Tiếp tục</button> 
            <a href="{{ route('getLophocList') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Chọn Lớp </h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div> 
          <div class="box-body">
            
            <div class="form-group ">
              <label class="col-sm-4" >Chọn lớp</label>
              <select class="col-sm-8 select2 sltLophoc" name="sltLophoc" id="sltLophoc">
                <option></option>
               	@foreach($lophoc as $item)
               		
                  <option value="{{$item['id'] }}">{{ $item['tenlop'] }}</option>
                 
                @endforeach
              </select>
            </div>
            <div class="form-group ">
              <label class="col-sm-4" >Chọn học kỳ</label>
              <select class="col-sm-8 select2 " name="sltHocky" id="sltHocky">
                <option></option>
                @foreach($hocky as $item)
                
                  <option value="{{$item['id'] }}">{{ $item['tenhocky'] }} - {{ $item['namhoc']['tennamhoc'] }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
  </div>
  </form>
</section>
@endsection  
