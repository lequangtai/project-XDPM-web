@extends('admin.app')
@section('title','Thêm Môn học')
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
            <a href="{{ route('danh-sach-mon-hoc') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
        </div>
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm Môn Học</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Tên môn</label>
            <div class="col-sm-9">
              <input type="text" name="tenmonhoc" class="form-control" value="{!!old('tenmonhoc')!!}" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Số tiết</label>
            <div class="col-sm-9">
              <input type="text" name="sotiet" value="{!!old('sotiet')!!}" class="form-control" >
            </div>
          </div>
          <div class="form-group ">
              <label class="col-sm-3" >Hệ số</label>
              <select class="col-sm-8 select2" name="sltHeso">
                <option value="0">Chọn hệ số</option>
                <option value="0">Môn thể dục</option>
                <option value="1">Hệ số 1</option>
                <option value="2">Hệ số 2</option>              
              </select>
            </div>
        </div>
                
      </div> 
      </div>
  </div>
  </form>
</section>
@endsection  
  