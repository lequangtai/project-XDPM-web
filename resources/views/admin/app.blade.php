<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset('public/lv17_admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/lv17_admin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/lv17_admin/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/lv17_admin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/lv17_admin/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/lv17_admin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/lv17_admin/css/css.css')}}">
    <script type="text/javascript" src ="{!!asset('public\lv17_admin\dist\js\ckeditor/ckeditor.js')!!}"></script>

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
            @php 
                $abc = Auth::user()->id;
                $cate=App\Models\User::with(array('nhomquyen'=> function($query){
                      $query->select();
                      }))->where('id',$abc)->get()->toArray();
                $quyentc = App\Models\Quyen::with(array('nhomquyen'=> function($query){
                    $id=Auth::user()->id;
                        $query->select()->where('nhomquyen_id',$id)->get()->toArray();
                      }))->select()->where('id_cha',0)->get()->toArray();
            @endphp
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <span class="logo-lg"><b>Admin</b>Quản lý điểm</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          </a>
            @foreach($cate as $item)
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Xin chào <b style="color: red">{{ $item['username'] }}</b></span>
                </a>
              </li>
              <li class="dropdown notifications-menu">
                <a href="{!! url('logout') !!}"><i class="fa  fa-power-off"></i> 
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
          @if($item['hinhanh'] == null)
              <div class="pull-left image">
              <img src="{{ asset('public/uploads/icon_admin.png')}}" class="img-circle" alt="User Image" width="50px" height="50px" />
            </div>
            @else
            <div class="pull-left image">
              <img src="{!! asset('public/uploads/news/'.$item["hinhanh"]) !!}" class="img-circle" alt="User Image" width="50px" height="50px" />
            </div>
            @endif
            <div class="pull-left info">
              <p>{{ $item["hoten"] }}</p>
            </div>
          
         
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="active treeview">
              <a href="{!!url("admin")!!}">
                <i class="fa fa-dashboard"></i> <span>Trang chủ</span> </i>
              </a>
            </li>
            @if($item['nhomquyen_id']==1)
            <li class="treeview">
              <a href="">
                <i class="fa fa-users"></i>
                <span> Quản lý quyền</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!! route('danh-sach-quyen')!!}"><i class="fa fa-star-half-o"></i> Danh sách quyền</a></li>
                <li><a href="{!! route('them-quyen')!!}"><i class="fa fa-star-half-o"></i> Thêm quyền</a></li>
              </ul>
            </li>
           
            <li class="treeview" >
              <a href="#">
                <i class="fa fa-list-ol"></i>
                <span> Quản lý điểm</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li ><a  href="{!! route('tao-bang-diem')!!}"><i class="fa fa-star-half-o"></i> Tạo bảng điểm</a></li>
                <li><a  href="{!! route('xem-diem')!!}"><i class="fa fa-star-half-o"></i> Nhập điểm</a></li>
                <li><a  href="{!! route('xem-diem')!!}"><i class="fa fa-star-half-o"></i>Xem điểm</a></li>
                <li><a  href="{!! route('tong-ket')!!}"><i class="fa fa-star-half-o"></i>Tổng kết</a></li>
              </ul>
            </li>
       
            <li class="treeview">
              <a href="">
                <i class="fa fa-user-md"></i>
                <span> Quản lý nhóm quyền</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li><a href="{!! route('danh-sach-nhom-quyen')!!}"><i class="fa fa-circle-o"></i> Danh sách nhóm quyền</a></li>
                <li><a href="{!! route('them-nhom-quyen')!!}"><i class="fa fa-circle-o"></i> Thêm nhóm quyền</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-user"></i> <span>Quản lý người dùng </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!! route('danh-sach-nguoi-dung')!!}"><i class="fa fa-star-half-o"></i> Danh sách người dùng</a></li>
                <li><a href="{!! route('them-nguoi-dung')!!}"><i class="fa fa-star-half-o"></i> Thêm người dùng</a></li>
                <li><a href="{!! route('danh-sach-phan-cong')!!}"><i class="fa fa-star-half-o"></i> Phân công giảng dạy</a></li> 
                <li><a href="{!! route('lich-giang-day')!!}"><i class="fa fa-star-half-o"></i> Lịch giảng dạy</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-user"></i>
                <span> Quản lý học sinh</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!! route('danh-sach-hoc-sinh')!!}"><i class="fa fa-star-half-o"></i> Danh sách học sinh</a></li>
                <li><a href="{!! route('them-hoc-sinh')!!}"><i class="fa fa-star-half-o"></i> Thêm học sinh</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-university"></i>
                <span> Quản lý lớp học</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!! route('danh-sach-lop-hoc')!!}"><i class="fa fa-star-half-o"></i> Danh sách lớp học</a></li>
                <li><a href="{!! route('them-lop-hoc')!!}"><i class="fa fa-star-half-o"></i> Thêm lớp học</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-th-large"></i>
                <span> Quản lý khối lớp</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!! route('danh-sach-khoi-lop')!!}"><i class="fa fa-star-half-o"></i> Danh sách khối lớp</a></li>
                <li><a href="{!! route('them-khoi-lop')!!}"><i class="fa fa-star-half-o"></i> Thêm khối lớp</a></li>
              </ul>
            </li>
            <li class="treeview">
            <a>
                <i class="fa fa-th"></i>
                <span> Quản lý loại tin</span>
                <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{!! route('danh-sach-loai-tin')!!}"><i class="fa fa-star-half-o"></i> Danh sách loại tin</a></li>
                <li><a href="{!! route('them-loai-tin')!!}"><i class="fa fa-star-half-o"></i> Thêm loại tin</a></li>
              </ul>
            </li>
            <li class="treeview">
            <a>
                <i class="fa fa-file-text"></i>
                <span > Quản lý tin tức</span>
                <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a  href="{!! route('danh-sach-tin-tuc')!!}"><i class="fa fa-star-half-o"></i> Danh sách tin tức</a></li>
                <li><a  href="{!! route('them-tin-tuc')!!}"><i class="fa fa-star-half-o"></i> Thêm tin tức</a></li>
              </ul>
            </li>
            <li class="treeview">
            <a>
                <i class="fa fa-user-secret"></i>
                <span > Quản lý phụ huynh</span>
                <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a  href="{!! route('danh-sach-phu-huynh')!!}"><i class="fa fa-star-half-o"></i> Danh sách phụ huynh</a></li>
                <li><a  href="{!! route('them-phu-huynh')!!}"><i class="fa fa-star-half-o"></i> Thêm phụ huynh</a></li>               
              </ul>
            </li>
            <li class="treeview">
            <a>
                <i class="fa fa-book"></i>
                <span> Quản lý môn học</span>
                <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{!! route('danh-sach-mon-hoc')!!}"><i class="fa fa-star-half-o"></i> Danh sách môn học</a></li>
                <li><a href="{!! route('them-mon-hoc')!!}"><i class="fa fa-star-half-o"></i> Thêm môn học</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-medkit"></i> <span>Khởi tạo</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href=""><i class="fa fa-star-half-o"></i> Năm học<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{!! route('them-nam-hoc')!!}"><i class="fa fa-circle-o"></i>Thêm năm học</a></li>
                  </ul>
                </li>
                <li>
                  <a href=""><i class="fa fa-star-half-o"></i> Học kỳ <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{!! route('danh-sach-hoc-ky')!!}"><i class="fa fa-circle-o"></i> Danh sách học kỳ</a></li>
                    <li><a href="{!! route('them-hoc-ky')!!}"><i class="fa fa-circle-o"></i> Thêm học kỳ</a></li>
                  </ul>
                </li>
                <li>
                  <a href=""><i class="fa fa-star-half-o"></i> Hạnh kiểm <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{!! route('danh-sach-hanh-kiem')!!}"><i class="fa fa-circle-o"></i> Danh sách hạnh kiểm</a></li>
                    <li><a href="{!! route('them-hanh-kiem')!!}"><i class="fa fa-circle-o"></i> Thêm hạnh kiểm</a></li>
                  </ul>
                </li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-th-list"></i>
                <span>Tổng kết</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!! route('getChonLop')!!}"><i class="fa fa-star-half-o"></i>Xem bảng tổng kết</a></li>
                <li><a href="{!! route('getChonLop')!!}"><i class="fa fa-star-half-o"></i>Lập bảng tổng kết</a></li>
                <li><a href="{!! route('getChonLop')!!}"><i class="fa fa-star-half-o"></i>Tổng kết theo môn</a></li>
                <li><a href="{!! route('getChonLop')!!}"><i class="fa fa-star-half-o"></i>Tổng kết theo lớp</a></li>
              </ul>
            </li>
            @else
           @foreach($quyentc as $item1)
            <li class="treeview">
                <i class="fa fa-files-o"></i>
                <span>{{$item1['tenquyen']}}</span>
                <i class="fa fa-angle-left pull-right"></i>
              @php
               $quyentc2 = App\Models\Quyen::with(array('nhomquyen'=> function($query){
                  $abc1=Auth::user()->id;
                  $query->select()->where('nhomquyen_id',$abc1)->get()->toArray();
                }))->select()->where('id_cha',$item1['id'])->get()->toArray();
              
               
              @endphp
            
              <ul class="treeview-menu">
              @foreach($quyentc2 as $item2)

                <li ><a  href="{!! route($item2['duongdan'])!!}"><i class="fa fa-star-half-o"></i> {{ $item2['tenquyen'] }}</a></li>
                 @endforeach
              </ul>
            </li>


            @endforeach
  @endif
         
             
      
        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><i class="fa fa-dashboard"></i>
            Quản lý điểm trường THPT Đông Thạnh
          </h1>
        </section>
            
             @yield('content')
       </div><!-- /.content-wrapper -->
      <footer class="main-footer">
       
        <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Quản lý điểm</a>.</strong>
      </footer>

     
    </div><!-- ./wrapper -->
 @endforeach

    <script src="{{ asset('public/lv17_admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('public/lv17_admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/lv17_admin/dist/js/app.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/lv17_admin/plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/lv17_admin/plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/lv17_admin/plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/lv17_admin/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/lv17_admin/function/function.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/lv17_admin/jquery/myscript.js')}}"></script>
    <script type="text/javascript">
      $(function () {
        $(".select2").select2();
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
      $(document).ready(function(){
    $("#selecctall").change(function(){
      $(".checkbox1").prop('checked', $(this).prop("checked"));
      });
});
    </script>
 
   </body>
</html>