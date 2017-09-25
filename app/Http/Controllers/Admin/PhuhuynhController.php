<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhuhuynhAddRequest;
use App\Models\Phuhuynh;
use App\Models\Hocsinh;
use DateTime;

class PhuhuynhController extends Controller
{
    public function getPhuhuynhAdd(){
        $hocsinh = Hocsinh::select()->get();
    	return view('admin.module.phuhuynh.add',['hocsinh'=>$hocsinh]);
    }
     public function postPhuhuynhAdd(PhuhuynhAddRequest $request)
    {
        $phuhuynh = new Phuhuynh;
        $phuhuynh->tenPH = $request->tenphuhuynh;
        $phuhuynh->sdt = $request->sodienthoai;
        $phuhuynh->diachi = $request->diachi;
        $phuhuynh->mkdangnhap = md5($request->txtPasss);
        $phuhuynh->created_at =new DateTime();
        $phuhuynh->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-phu-huynh')->with('success','Bạn đã thêm thành công');
        } else {
            return redirect()->route('danh-sach-phu-huynh')->with('success','Bạn đã thêm thành công');
        }  

    }

    public function getPhuhuynhList(){
    	$hocsinh = hocsinh::select('id', 'hoten')->get();
    	$phuhuynh = phuhuynh::select()->get();
    	return view('admin.module.phuhuynh.list', ['hocsinh'=>$hocsinh, 'phuhuynh'=>$phuhuynh]);
    }
    public function getPhuhuynhDel($id){
        $data = phuhuynh::findOrFail($id);
        $data->delete();
         return redirect()->route('danh-sach-phu-huynh')->with(['flash_level'=>'result_msg','flash_message' => 'Xóa thành công']);
    }

    public function getPhuhuynhEdit($id){
        $data = Phuhuynh::findOrFail($id);
        $hocsinh = Hocsinh::select()->get();
         return view('admin.module.phuhuynh.edit',['data'=>$data, 'hocsinh'=>$hocsinh]);

    }
     public function postPhuhuynhEdit(Request $request,$id){
        $phuhuynh =phuhuynh::findOrFail($id);
		$phuhuynh->tenPH = $request->tenphuhuynh;
        $phuhuynh->sdt = $request->sodienthoai;
        $phuhuynh->diachi = $request->diachi;
        $phuhuynh->mkdangnhap = MD5($request->txtPass);
        $phuhuynh->updated_at =new DateTime();
        $phuhuynh->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-phu-huynh')->with('success','Bạn đã thêm thành công');
        } else {
            return redirect()->route('danh-sach-phu-huynh')->with('success','Bạn đã thêm thành công');
        }  
}
}
