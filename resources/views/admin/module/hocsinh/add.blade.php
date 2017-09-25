@extends('admin.app')
@section('title','Thêm Học sinh')
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
            <a href="{{ route('danh-sach-hoc-sinh') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
            <a href="{{ route('them-lop-hoc') }}" class="btn btn-warning margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Thêm lớp học</a>
            <a href="{{ route('them-phu-huynh') }}" class="btn btn-warning margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Thêm phụ huynh</a>
          
        </div>
      </div>
      <div class="col-xs-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm học sinh</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group ">
              <label class="col-sm-2">Lớp học</label>
              <select class="col-sm-6 select2" name="sltLophoc">
                <option></option>
                @foreach($lophoc as $item)
                  <option value="{!! $item['id'] !!}">{!! $item['tenlop'] !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group ">
              <label class="col-sm-2">Phụ huynh</label>
              <select class="col-sm-6 select2" name="sltPhuhuynh">
                <option></option>
                @foreach($phuhuynh as $item1)
                  <option value="{!! $item1['id'] !!}">{!! $item1['tenPH'] !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Họ tên học sinh</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{!!old('tenhocsinh')!!}" name="tenhocsinh" placeholder="Nhập tên">
              </div>
        	  </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Ngày sinh</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" value="{!!old('ngaysinh')!!}" name="ngaysinh">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Địa chỉ</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{!!old('diachi')!!}" name="diachi" placeholder="Nhập địa chỉ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tôn giáo</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{!!old('tongiao')!!}" name="tongiao" placeholder="Nhập tôn giáo">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Dân tộc</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{!!old('dantoc')!!}" name="dantoc" placeholder="Nhập dân tộc">
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
              <label for="inputEmail3" class="col-sm-2 control-label">Trạng thái</label>
              <div class="col-sm-9">
                <label>
                  <input type="radio" name="rdoTrangthai" value="0" class="minimal" checked
                    @if(old('rdoTrangthai')==0)
                      checked 
                    @endif /> Đang học
                </label>
                <label>
                  <input type="radio" name="rdoTrangthai" value="1" class="minimal"
                    @if(old('rdoTrangthai')==1)
                      checked 
                    @endif /> Đã ra trường
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="txtPass" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nhập lại Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="txtRepass" id="inputPassword3" placeholder="Nhập lại Password">
              </div>
            </div> 
          </div>
        </div>
      </div>
  </div>
  </form>
</section>
@endsection  
	