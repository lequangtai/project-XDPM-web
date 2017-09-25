@extends('admin.app')
@section('title','Thêm Gíao Viên')
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
        <a href="{{ route('getHoclucList') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
      </div>
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm hạnh kiểm</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Tên học lực</label>
            <div class="col-sm-8">
              <input type="text" name="tenhocluc" class="form-control" value="{!!old('tenhocluc')!!}" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Điểm cận</label>
            <div class="col-sm-8">
              <input type="text" name="diemcan" class="form-control" value="{!!old('diemcan')!!}" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Điểm khống chế</label>
            <div class="col-sm-8">
              <input type="text" name="diemkhongche" class="form-control" value="{!!old('diemkhongche')!!}" />
            </div>
          </div>
        </div>
                
      </div>      
    </div>
  </div>
</form>
</section>
@endsection  
  