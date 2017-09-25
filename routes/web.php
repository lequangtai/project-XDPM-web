<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*--------------------TRANG NGƯỜI DÙNG NÈ------------------------*/
Route::group(['prefix'=>'/','namespace' => 'User'], function () {
    Route::get('/', ['uses'=>'MainController@getIndex'])->name('index');
    Route::get('loai-tin/{id}/{alias}','MainController@getCate')->where('id', '[0-9]+');
    Route::get('ct-tin/{id}/{alias}','MainController@getDetail')->where('id', '[0-9]+');
    Route::get('hsdangnhap','MainController@getHSDN')->name('getHSDN');
    Route::post('hsdangnhap','MainController@postHSDN')->name('postHSDN');
    Route::get('phdangnhap','MainController@getPHDN')->name('getPHDN');
    Route::post('phdangnhap','MainController@postPHDN')->name('postPHDN');
    Route::get('phxemdiem/{id}','MainController@getPHXD')->name('getPHXD');
    Route::get('myform/ajax/{id}','MainController@BangdiemAjax')->name('myform.ajax');
});


/*------------------LOGIN NÈ--------------------------*/
Route::get('login', 'LoginController@getLogin')->name('getLogin');
Route::post('login', 'LoginController@postLogin')->name('postLogin');
Route::get('logout', 'LoginController@getLogout')->name('getLogout');

/*------------------ADMIN NÈ--------------------------*/
Route::group(['middleware'=>'adminlogin'], function()
{
	Route::group(['prefix'=>'admin', 'namespace' =>'Admin'], function(){
		
		Route::get('/', 'TrangchuController@getshow')->name('getshow');
		// Route::get('/', function(){
		// 	// $stas_user   = DB::table('lv17_users')->count();
		// 	// $stas_hsinh  = DB::table('lv17_hocsinh')->count();
		// 	// $stas_lophoc = DB::table('lv17_lophoc')->count();
		// 	// $stas_tintuc = DB::table('lv17_tintuc')->count();
		// 	// return view('admin.module.dashboard.main',['stas_user'=>$stas_user,'stas_hsinh'=>$stas_hsinh,'stas_lophoc'=>$stas_lophoc,'stas_tintuc'=>$stas_tintuc]);
		// });

		Route::group(['prefix'=>'loaitin'], function(){
			Route::get('add','LoaitinController@getCateAdd')->name('them-loai-tin');
			Route::post('add','LoaitinController@postCateAdd')->name('postCateAdd');
			Route::get('list','LoaitinController@getCateList')->name('danh-sach-loai-tin');
			Route::get('delete/{id}', 'LoaitinController@getCateDel')->name('getCateDel');
			Route::get('edit/{id}','LoaitinController@getCateEdit')->name('getCateEdit');
			Route::post('edit/{id}','LoaitinController@postCateEdit')->name('postCateEdit');
		});

		Route::group(['prefix'=>'tintuc'], function(){
			Route::get('add','TintucController@getNewsAdd')->name('them-tin-tuc');
			Route::post('add','TintucController@postNewsAdd')->name('getNewsAdd');
			Route::get('list','TintucController@getNewsList')->name('danh-sach-tin-tuc');
			Route::get('delete/{id}','TintucController@getNewsDel')->name('getNewsDel');
			Route::get('edit/{id}','TintucController@getNewsEdit')->name('getNewsEdit');
			Route::post('edit/{id}','TintucController@postNewsEdit')->name('postNewsEdit');
		});
		
		Route::group(['prefix'=>'khoilop'], function(){
			Route::get('add','KhoilopController@getKhoiAdd')->name('them-khoi-lop');
			Route::post('add','KhoilopController@postKhoiAdd')->name('postKhoiAdd');
			Route::get('list','KhoilopController@getKhoiList')->name('danh-sach-khoi-lop');
			Route::get('delete/{id}','KhoilopController@getKhoiDel')->name('getKhoiDel');
			Route::get('edit/{id}','KhoilopController@getKhoiEdit')->name('getKhoiEdit');
			Route::post('edit/{id}','KhoilopController@postKhoiEdit')->name('postKhoiEdit');
		});

		Route::group(['prefix'=>'nhomquyen'], function(){
			Route::get('add','NhomquyenController@getNhomquyenAdd')->name('them-nhom-quyen');
			Route::post('add','NhomquyenController@postNhomquyenAdd')->name('postNhomquyenAdd');
			Route::get('list','NhomquyenController@getNhomquyenList')->name('danh-sach-nhom-quyen');
			Route::get('delete/{id}','NhomquyenController@getNhomquyenDel')->name('getNhomquyenDel');
			Route::get('edit/{id}','NhomquyenController@getNhomquyenEdit')->name('getNhomquyenEdit');
			Route::post('edit/{id}','NhomquyenController@postNhomquyenEdit')->name('postNhomquyenEdit');
		});

		Route::group(['prefix'=>'quyen'], function(){
			Route::get('add','QuyenController@getQuyenAdd')->name('them-quyen');
			Route::post('add','QuyenController@postQuyenAdd')->name('postQuyenAdd');
			Route::get('list','QuyenController@getQuyenList')->name('danh-sach-quyen');
			Route::get('delete/{id}','QuyenController@getQuyenDel')->name('getQuyenDel');
			Route::get('edit/{id}','QuyenController@getQuyenEdit')->name('getQuyenEdit');
			Route::post('edit/{id}','QuyenController@postQuyenEdit')->name('postQuyenEdit');
			Route::get('phanquyen','QuyenController@getPhanquyenAdd')->name('getPhanquyenAdd');
		});

		Route::group(['prefix'=>'user'], function(){
			Route::get('add','UserController@getUserAdd')->name('them-nguoi-dung');
			Route::post('add','UserController@postUserAdd')->name('postUserAdd');
			Route::get('list','UserController@getUserList')->name('danh-sach-nguoi-dung');
			Route::get('delete/{id}','UserController@getUserDel')->name('getUserDel');
			Route::get('edit/{id}','UserController@getUserEdit')->name('getUserEdit');
			Route::post('edit/{id}','UserController@postUserEdit')->name('postUserEdit');
			Route::get('dsphancongday','UserController@getdanhsachphanconggd')->name('danh-sach-phan-cong');
			Route::get('phanconggiangday/{id}', 'UserController@getphanconggiangday')->name('phan-cong-giang-day');
			Route::post('phanconggiangday/{id}', 'UserController@postphanconggiangday')->name('getphanconggiangday');
			Route::get('lichday', 'UserController@lichday')->name('lich-giang-day');
		});

		Route::group(['prefix'=>'namhoc'], function () {
			Route::get('add', 'NamhocController@getNamhocAdd')->name('them-nam-hoc');
			Route::post('add','NamhocController@postNamhocAdd')->name('getNamhocAdd');
			Route::get('list', 'NamhocController@getNamhocList')->name('danh-sach-nam-hoc');
			Route::get('delete/{id}', 'NamhocController@getNamhocDel')->name('getNamhocDel');
			Route::get('edit/{id}', 'NamhocController@getNamhocEdit')->name('getNamhocEdit');
			Route::post('edit/{id}', 'NamhocController@postNamhocEdit')->name('getNamhocEdit');
		});

		Route::group(['prefix'=>'hocky'], function(){
			Route::get('add', 'HockyController@getHockyAdd')->name('them-hoc-ky');
			Route::post('add', 'HockyController@postHockyAdd')->name('getHockyAdd');
			Route::get('list', 'HockyController@getHockyList')->name('danh-sach-hoc-ky');
			Route::get('delete/{id}', 'HockyController@getHockyDel')->name('getHockyDel');
			Route::get('edit/{id}', 'HockyController@getHockyEdit')->name('getHockyEdit');
			Route::post('edit/{id}', 'HockyController@postHockyEdit')->name('getHockyEdit');		
		});

		Route::group(['prefix'=>'monhoc'], function(){
			Route::get('add', 'MonhocController@getMonhocAdd')->name('them-mon-hoc');
			Route::post('add', 'MonhocController@postMonhocAdd')->name('getMonhocAdd');
			Route::get('list', 'MonhocController@getMonhocList')->name('danh-sach-mon-hoc');
			Route::get('delete/{id}', 'MonhocController@getMonhocDel')->name('getMonhocDel');
			Route::get('edit/{id}', 'MonhocController@getMonhocEdit')->name('getMonhocEdit');
			Route::post('edit/{id}', 'MonhocController@postMonhocEdit')->name('getMonhocEdit');		
		});

		Route::group(['prefix'=>'hanhkiem'], function(){
			Route::get('add', 'HanhkiemController@getHanhkiemAdd')->name('them-hanh-kiem');
			Route::post('add', 'HanhkiemController@postHanhkiemAdd')->name('getHanhkiemAdd');
			Route::get('list', 'HanhkiemController@getHanhkiemList')->name('danh-sach-hanh-kiem');
			Route::get('delete/{id}', 'HanhkiemController@getHanhkiemDel')->name('getHanhkiemDel');
			Route::get('edit/{id}', 'HanhkiemController@getHanhkiemEdit')->name('getHanhkiemEdit');
			Route::post('edit/{id}', 'HanhkiemController@postHanhkiemEdit')->name('getHanhkiemEdit');		
		});

		Route::group(['prefix'=>'lophoc'], function(){
			Route::get('add', 'LophocController@getLophocAdd')->name('them-lop-hoc');
			Route::post('add', 'LophocController@postLophocAdd')->name('getLophocAdd');
			Route::get('list', 'LophocController@getLophocList')->name('danh-sach-lop-hoc');
			Route::get('delete/{id}', 'LophocController@getLophocDel')->name('getLophocDel');
			Route::get('edit/{id}', 'LophocController@getLophocEdit')->name('getLophocEdit');
			Route::post('edit/{id}', 'LophocController@postLophocEdit')->name('getLophocEdit');
			Route::get('danhsachhocsinh/{id}', 'LophocController@danhsachhocsinh')->name('danh-sach');

		});

		Route::group(['prefix'=>'hocluc'], function(){
			Route::get('add', 'HoclucController@getHoclucAdd')->name('them-hoc-luc');
			Route::post('add', 'HoclucController@postHoclucAdd')->name('getHoclucAdd');
			Route::get('list', 'HoclucController@getHoclucList')->name('danh-sach-hoc-luc');
			Route::get('delete/{id}', 'HoclucController@getHoclucDel')->name('getHoclucDel');
			Route::get('edit/{id}', 'HoclucController@getHoclucEdit')->name('getHoclucEdit');
			Route::post('edit/{id}', 'HoclucController@postHoclucEdit')->name('getHoclucEdit');		
		});

		Route::group(['prefix'=>'hocsinh'], function(){
			Route::get('add', 'HocsinhController@getHocsinhAdd')->name('them-hoc-sinh');
			Route::post('add', 'HocsinhController@postHocsinhAdd')->name('getHocsinhAdd');
			Route::get('list', 'HocsinhController@getHocsinhList')->name('danh-sach-hoc-sinh');
			Route::get('delete/{id}', 'HocsinhController@getHocsinhDel')->name('getHocsinhDel');
			Route::get('edit/{id}', 'HocsinhController@getHocsinhEdit')->name('getHocsinhEdit');
			Route::post('edit/{id}', 'HocsinhController@postHocsinhEdit')->name('getHocsinhEdit');		
		});

		Route::group(['prefix'=>'phuhuynh'], function(){
			Route::get('add', 'PhuhuynhController@getPhuhuynhAdd')->name('them-phu-huynh');
			Route::post('add', 'PhuhuynhController@postPhuhuynhAdd')->name('getPhuhuynhAdd');
			Route::get('list', 'PhuhuynhController@getPhuhuynhList')->name('danh-sach-phu-huynh');
			Route::get('delete/{id}', 'PhuhuynhController@getPhuhuynhDel')->name('getPhuhuynhDel');
			Route::get('edit/{id}', 'PhuhuynhController@getPhuhuynhEdit')->name('getPhuhuynhEdit');
			Route::post('edit/{id}', 'PhuhuynhController@postPhuhuynhEdit')->name('getPhuhuynhEdit');		
		});

		

		Route::group(['prefix'=>'bangdiem'], function(){
			//Khởi tạo bảng điểm mới
			Route::get('getTaoBangdiem', 'BangdiemController@getTaoBangdiem')->name('tao-bang-diem');
			Route::post('getTaoBangdiem', 'BangdiemController@postTaoBangdiem')->name('tao-bang-diem');
			Route::get('myform/ajax/{id}','BangdiemController@LophocAjax')->name('myform.ajax');
			//Xem điểm xong rồi nhập
			Route::get('getxemdiem', 'BangdiemController@getxemdiem')->name('xem-diem');
			Route::post('getxemdiem', 'BangdiemController@postxemdiem')->name('xem-diem');
			Route::get('nhapdiem/{monhoc}/{lophoc}/{hocky}', 'BangdiemController@xemdiem')->name('nhap-diem');
			Route::post('nhapdiem/{monhoc}/{lophoc}/{hocky}','BangdiemController@postdiem' )->name('nhap-diem');
			Route::get('DeleteAll/{monhoc}/{lophoc}/{hocky}','BangdiemController@DeleteAll')->name('DeleteAll');
			Route::get('diem-tong-ket', 'BangdiemController@gettongkettheomon')->name('tong-ket');
			Route::post('diem-tong-ket', 'BangdiemController@postgettongkettheomon')->name('diemtongket');
			Route::get('xem-tong-ket/{lophoc}/{hocky}', 'BangdiemController@xemtongket')->name('xemdiemtongket');

			Route::post('xem-tong-ket/{lophoc}/{hocky}','BangdiemController@posttongket')->name('xemdiemtongket');
		});

		Route::group(['prefix'=>'tongket'], function(){

			Route::get('chonlop', 'TongketController@getChonLop')->name('getChonLop');
			Route::post('chonlop', 'TongketController@postchonlop')->name('getChonLop');
			Route::get('tongket/{lophoc}/{hocky}', 'TongketController@gettongket')->name('nhaptongket');
			Route::post('tongket/{lophoc}/{hocky}', 'TongketController@postTongket')->name('nhaptongket');
			Route::get('chonlopTK', 'TongketController@getChonLopCn')->name('getChonLopTK');
			Route::post('chonlopTK', 'TongketController@postchonlopCn')->name('getChonLopTK');
			Route::get('xemtongket/{lophoc}/{hocky}', 'TongketController@xemtongket')->name('xemtongket');
			Route::get('suatongket/{lophoc}/{hocky}', 'TongketController@suatongket')->name('suatongket');
			Route::post('suatongket/{lophoc}/{hocky}', 'TongketController@postsuatongket')->name('suatongket');
		});

		Route::get('Import/{monhoc}/{lophoc}/{hocky}', 'ExcelController@getImport')->name('import');
		Route::post('Import/{monhoc}/{lophoc}/{hocky}', 'ExcelController@postImport')->name('import');
		Route::get('getExport/{monhoc}/{lophoc}/{hocky}', 'ExcelController@getExport')->name('getExport');
		Route::get('DSHS/{lophoc}', 'ExcelController@DSHS')->name('DSHS');
	});
});





