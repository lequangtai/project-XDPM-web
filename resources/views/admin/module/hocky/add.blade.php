@extends('admin.app')
@section('title','Thêm Gíao Viên')
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
            <a href="{{ route('danh-sach-hoc-ky') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm giáo viên</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group ">
              <label class="col-sm-3" >Học kỳ</label>
              <select class="col-sm-8 select2" name="sltHocky">
                <option value="0"></option>
                <option value="HK I">Học kỳ 1</option>
                <option value="HK II">Học kỳ 2</option>
                <option value="Cả năm">Cả năm</option>
              </select>
            </div>
            <div class="form-group ">
              <label class="col-sm-3" >Năm học</label>
              <select class="col-sm-8 select2" name="sltNamhoc">
                <option></option>
                @foreach($namhoc as $item)
                  <option value="{!! $item['id'] !!}">{!! $item['tennamhoc'] !!}</option>
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
  