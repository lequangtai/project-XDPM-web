@extends('admin.app')
@section('title','Thêm Phụ huynh')
@section('content')
<section class="content">
<form action="" method="POST">
{{ csrf_field() }}
  <div class="row">
    <div class="box-body"></div>
      <div class="col-xs-12">
        <div class="box box-danger">
          
            <button type="submit" name="btnSaveNew" value="btnSaveNew" class="btn btn-primary margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Save & New</button> 
            <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn btn-success margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-save"></i></b>Save & Close</button>
            <a href="{{ route('danh-sach-phu-huynh') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
            <a href="{{ route('getHocsinhAdd') }}" class="btn btn-warning margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Thêm học sinh</a>
          
        </div>
      </div>
      <div class="col-xs-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm Phụ Huynh</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Tên Phụ huynh</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{!!old('tenphuhuynh')!!}" name="tenphuhuynh" placeholder="Nhập tên phụ huynh">
              </div>
        	  </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Số điện thoại</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{!!old('sodienthoai')!!}" name="sodienthoai" placeholder="Số điện thoại">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Địa chỉ</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{!!old('diachi')!!}" name="diachi" placeholder="Nhập địa chỉ">
              </div>
            </div>
            
             <div class="form-group">
              <label class="col-sm-2 control-label">Mật khẩu</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" value="{!!old('txtPass')!!}" name="txtPass" placeholder="Mật khẩu">
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Nhập lại mật khẩu</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" value="{!!old('txtRepass')!!}" name="txtRepass" placeholder="Nhập lại mật khẩu">
              </div>
            </div>
            
          </div>
        </div>
      </div>
  </div>
  </form>
</section>
@endsection  
	