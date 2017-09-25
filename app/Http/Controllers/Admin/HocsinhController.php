<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hocsinh;
use App\Models\Lophoc;
use App\Models\Phuhuynh;
use DateTime;
class HocsinhController extends Controller
{
    public function getHocsinhAdd(){
         $lophoc = Lophoc::select()->get();
         $phuhuynh = Phuhuynh::select()->get();
    	return view('admin.module.hocsinh.add',['lophoc'=>$lophoc,'phuhuynh'=>$phuhuynh]);
    }
    public function getHocsinhList(){
        $hocsinh = Hocsinh::select()->get()->toArray();
        $lophoc = Lophoc::select()->get()->toArray();
    	return view('admin.module.hocsinh.dshs',['hocsinh'=> $hocsinh, 'lophoc'=>$lophoc]);
    }
    public function postHocsinhAdd(Request $request)
    {
        $hocsinh             = new Hocsinh;
        $hocsinh->mahocsinh  ='abc';
        $hocsinh->hoten      = $request->tenhocsinh;
        $hocsinh->ngaysinh   = $request->ngaysinh;
        $hocsinh->gioitinh   = $request->rdoGioitinh;
        $hocsinh->diachi     = $request->diachi;
        $hocsinh->dantoc     =$request->dantoc;
        $hocsinh->tongiao    =$request->tongiao;
        $hocsinh->trangthai  =$request->rdoTrangthai;
        $hocsinh->mkdangnhap =md5('lv17'.$request->txtPass);
        $hocsinh->lophoc_id  =$request->sltLophoc;
        $hocsinh->phuhuynh_id=$request->sltPhuhuynh;
        $hocsinh->created_at =new DateTime();
        $hocsinh->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-hoc-sinh')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-hoc-sinh')->with('success','Bạn đã thêm danh mục thành công');
        }  	
    }
    public function getHocsinhEdit($id){
        $lophoc = Lophoc::select()->get();
    	$hocsinh = Hocsinh::findOrFail($id);
        return view('admin.module.hocsinh.edit',['hocsinh'=>$hocsinh,'lophoc'=>$lophoc]);
    }
    public function getHocsinhDel($id){
        $hocsinh = Hocsinh::findOrFail($id);
        $hocsinh->delete();
        return redirect()->route('danh-sach-hoc-sinh')->with('success', 'Thêm thành công');
    }
    public function postHocsinhEdit(Request $request,$id)
    {
        $hocsinh =Hocsinh::findOrFail($id);
        $hocsinh->mahocsinh = 'abc';
        $hocsinh->hoten = $request->tenhocsinh;
        $hocsinh->ngaysinh = $request->ngaysinh;
        $hocsinh->gioitinh = $request->rdoGioitinh;
        $hocsinh->diachi = $request->diachi;
        $hocsinh->dantoc =$request->dantoc;
        $hocsinh->tongiao =$request->tongiao;
        $hocsinh->trangthai =$request->rdoTrangthai;
        $hocsinh->mkdangnhap =md5($request->txtPass);
        $hocsinh->lophoc_id =$request->sltLophoc;
        $hocsinh->updated_at =new DateTime();
        $hocsinh->save();
        if ($request->btnSaveNew) {
            return redirect()->route('getHocsinhEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-hoc-sinh')->with('success','Bạn đã thêm danh mục thành công');
        } 	
    }
}
