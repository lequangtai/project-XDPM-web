@extends('admin.app')
@section('title','Phân công giảng dạy')
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
            <a href="{{ route('danh-sach-nguoi-dung') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
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
            @foreach($giaovien as $item1)
            <input type="hidden" name="idgiaovien" value="{!! $item1['id'] !!}">
            @endforeach
              <label class="col-sm-3" >Môn Học</label>
              <select class="col-sm-8 select2" name="sltMonhoc">
                <option></option>
                @foreach($monhoc as $item2)
                  <option value="{!! $item2['id'] !!}">{!! $item2['tenmonhoc'] !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group ">
              <label class="col-sm-3" >Lớp học</label>
              <select class="col-sm-8 select2" name="sltLop">
                <option></option>
                @foreach($lophoc as $item3)
                  <option value="{!! $item3['id'] !!}">{!! $item3['tenlop'] !!}</option>
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
	