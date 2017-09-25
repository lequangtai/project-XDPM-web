@extends('admin.app')
@section('title','Thêm User')
@section('content')
<section class="content">
<form action="" method="POST" enctype="multipart/form-data"> 
{{ csrf_field() }}
  <div class="row">
    <div class="box-body"></div>
      <div class="col-xs-12">
        <div class="box box-danger">
            <button type="submit" name="btnSaveNew" value="btnSaveNew" class="btn btn-primary margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Save & New</button> 
            <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn btn-success margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-save"></i></b>Save & Close</button>
            <a href="{{ route('danh-sach-thanh-vien') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
          
        </div>
      </div>
      <div class="col-xs-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm giáo viên</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Họ tên</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txtTen" placeholder="Nhập tên">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tendn" placeholder="Nhập tên">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
              <div class="col-sm-10">
                <label>
                  <input type="radio" name="rdoGioitinh" value="0" class="minimal" checked
                    @if(old('rdoGioitinh')==0)
                      checked 
                    @endif /> Nam
                </label>
                <label>
                  <input type="radio" name="rdoGioitinh" value="1" class="minimal"
                    @if(old('rdoGioitinh')==1)
                      checked 
                    @endif /> Nữ
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txtDiachi" placeholder="Nhập địa chỉ">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="txtEmail" placeholder="Nhập email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">SĐT</label>                      
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txtSDT" id="inputPassword3" placeholder="SĐT">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-sm-2" >Nhóm quyền</label>
              <select class="col-sm-6 select2" name="sltCV">
                <option></option>
                @php menuMulti1($data) @endphp
              </select>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Trạng thái</label>
              <div class="col-sm-10">
                <label>
                  <input type="radio" name="rdoTrangthai" value="0" class="minimal" checked
                    @if(old('rdoTrangthai')==0)
                      checked 
                    @endif /> Đang dạy
                </label>
                <label>
                  <input type="radio" name="rdoTrangthai" value="1" class="minimal"
                    @if(old('rdoTrangthai')==1)
                      checked 
                    @endif /> Đã ngỉ dạy
                </label>
              </div>
            </div>
            <div class="form-group ">
                <label class="col-sm-2" >Hình ảnh</label>
                <span class="form_item">
                  <input type="file" name="newsImg" class="textbox" />
                </span><br />
           </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="txtPass" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nhập lại Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="txtRepass" id="inputPassword3" placeholder="Password">
              </div>
            </div> 
          </div>
        </div>
      </div>
  </div>
  </form>
</section>
@endsection  
  