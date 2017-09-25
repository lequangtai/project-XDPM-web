@extends('admin.app')
@section('title','Cập nhật thông tin lớp học')
@section('content')
<section class="content">
<form action="" method="POST">
{{ csrf_field() }}
  <div class="row">
    <div class="box-body"></div>
    <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <div class="box box-danger">
            <button type="submit" name="btnSaveNew" value="btnSaveNew" class="btn btn-primary margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Save & New</button> 
            <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn btn-success margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-save"></i></b>Save & Close</button>
            <a href="{{ route('danh-sach-lop-hoc') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Sửa lớp học</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group ">
              <label class="col-sm-3" >Năm Học</label>
              <select class="col-sm-8 select2" name="sltNamhoc">
                <option></option>
                @foreach($namhoc as $item)
                  <option value="{!! $item['id'] !!}">{!! $item['tennamhoc'] !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group ">
              <label class="col-sm-3" >Khối lớp</label>
              <select class="col-sm-8 select2" name="sltKhoilop">
                <option></option>
                @foreach($khoilop as $item)
                  <option value="{!! $item['id'] !!}">{!! $item['tenkhoi'] !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group ">
              <label class="col-sm-3" >GVCN</label>
              <select class="col-sm-8 select2" name="sltGiaovien">
                <option></option>
                @foreach($giaovien as $item)
                  <option value="{!! $item['id'] !!}">{!! $item['hoten'] !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Tên lớp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="tenlophoc" placeholder="Nhập tên lớp">
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </form>
</section>
@endsection  
  