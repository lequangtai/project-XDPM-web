<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lophoc;
use App\Models\User;
use App\Models\Namhoc;
use App\Models\Hocsinh;
use App\Models\Khoilop;
use DateTime;
class LophocController extends Controller
{
    public function getLophocAdd(){
        $namhoc = Namhoc::select()->get()->toArray();
        $khoilop = Khoilop::select()->get()->toArray();
        $giaovien = User::select()->get()->toArray();
    	return view('admin.module.lophoc.add',['namhoc'=>$namhoc,'khoilop'=>$khoilop,'giaovien'=>$giaovien]);
    }
    public function postLophocAdd(Request $request){
    	$lophoc = new Lophoc;
    	$lophoc->tenlop = $request->tenlophoc;
    	$lophoc->users_id = $request->sltGiaovien;
    	$lophoc->namhoc_id = $request->sltNamhoc;
    	$lophoc->khoilop_id = $request->sltKhoilop;
    	$lophoc->created_at = new DateTime();
    	$lophoc->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-lop-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-lop-hoc')->with('success','Bạn đã thêm danh mục thành công');
        }
    }
    public function getLophocList(){
    	$khoilop = Khoilop::select()->get()->toArray();
        $lophoc = Lophoc::select()->get()->toArray();
        $giaovien = User::select()->get()->toArray();
        $namhoc = Namhoc::select()->get()->toArray();
        return view('admin.module.lophoc.list',['khoilop'=>$khoilop, 'lophoc'=>$lophoc, 'giaovien'=>$giaovien, 'namhoc'=>$namhoc]);
    }
    public function getLophocDel($id){
        $data = Lophoc::findOrFail($id); 
        $data->delete();
        return redirect()->route('danh-sach-lop-hoc')->with('success', 'Thêm thành công');
    }
    public function getLophocEdit($id){
        $data = Lophoc::findOrFail($id);
        $namhoc = Namhoc::select()->get()->toArray();
        $khoilop = Khoilop::select()->get()->toArray();
        $giaovien = User::select()->get()->toArray();
         return view('admin.module.lophoc.edit',['data'=>$data,'namhoc'=>$namhoc,'khoilop'=>$khoilop,'giaovien'=>$giaovien]);
    }

     public function postLophocEdit(Request $request,$id){
        $lophoc =Lophoc::findOrFail($id);
		$lophoc->tenlop = $request->tenlophoc;
    	$lophoc->users_id = $request->sltGiaovien;
    	$lophoc->namhoc_id = $request->sltNamhoc;
    	$lophoc->khoilop_id = $request->sltKhoilop;
    	$lophoc->updated_at = new DateTime();
    	$lophoc->save();
    	if ($request->btnSaveNew) {
            return redirect()->route('getLophocEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-lop-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }
     public function danhsachhocsinh($id){
        $lophoc = Lophoc::select()->where('id', $id)->get()->toArray();
        $hocsinh = Hocsinh::select()->where('lophoc_id', $id)->get()->toArray();
        
        // echo "<pre>";
        // print_r($nu);
        // echo "</pre>";
        return view('admin.module.hocsinh.list',['hocsinh'=> $hocsinh, 'lophoc'=>$lophoc]);
     }

     
     
}
