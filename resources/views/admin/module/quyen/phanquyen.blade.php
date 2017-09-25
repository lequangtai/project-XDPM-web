@extends('admin.app')
@section('title','Phân quyền')
@section('content')
<section class="content">
<form action="" method="POST">
{{ csrf_field() }}
  <div class="row">
    <div class="box-body"></div>
    <div class="col-xs-2"></div>
      <div class="col-xs-7">
        <div class="box box-danger">
            <button type="submit" name="btnSaveNew" value="btnSaveNew" class="btn btn-primary margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-plus-square"></i></b>Save & New</button> 
            <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn btn-success margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-save"></i></b>Save & Close</button>
            <a href="{{ route('danh-sach-lop-hoc') }}" class="btn btn-danger margin btn-labeled" style="position: relative;padding-left: 50px"><b><i class="fa fa-close"></i></b>Close</a>
             
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Phân quyền</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group ">
              <label class="col-sm-3" >Giáo viên</label>
              <select class="col-sm-8 select2" name="giaovien">
                <option></option>
                 @foreach($giaovien as $item)
                  <option value="{!! $item['id'] !!}">{!! $item['username'] !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group" style="padding-left: 50px">
            @foreach($quyen as $item1)
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="tenquyen[]" value="{!! $item1['id'] !!}" />
                  {!! $item1['tenquyen'] !!}
                </label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
  </div>
  </form>
</section>
@endsection  
  