@extends('admin.app')
@section('title','Thông tin loại tin')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <div class="box-tools pull-right">
                <button  data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <a href="">
                <button class="btn-info" ><i class="fa  fa-plus-square"></i></button></a>
                <a href="{{ url('admin')}}">
                <button class="btn-danger" ><i class="fa fa-remove"></i></button></a>
              </div>
                  <h3 class="box-title">Danh sách loại tin</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead">
                      <tr>
                        <th>Loại tin</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php listCate($data); ?>
                     
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection