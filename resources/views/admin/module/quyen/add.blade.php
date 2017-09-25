@extends('admin.app')
@section('title','Thêm quyền')
@section('content')
<section class="content">
<form action="" method="POST">
{{ csrf_field() }}
  <div class="row">
    <div class="box-body"></div>
    <div class="col-xs-3"></div>
    <div class="col-md-6">
      <div class="box box-danger">
        <button type="submit" name="btnSaveNew" value="btnSaveNew" class="btn btn-primary margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Save & New</button> 
        <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn btn-success margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-save"></i></b>Save & Close</button>
        <a href="{{ route('danh-sach-quyen') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
      </div>
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm Chức vụ</h3>
        </div>
        <div class="box-body">
        <div class="form-group ">
              <label class="col-sm-4" >Danh mục cha</label>
              <select class="col-sm-8 select2" name="sltCate">
                <option value="0">Danh mục cha</option>
                 <?php menuMulti2($quyen,0, $str ="-|", old('sltCate')); ?>
              </select>
            </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Tên quyền </label>
            <div class="col-sm-9">
              <input type="text" name="tenquyen" class="form-control" value="{!!old('tenquyen')!!}" />
            </div>
          </div>
        </div>
                
      </div>      
    </div>
  </div>
</form>
</section>
@endsection  
  