<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KhoilopAddRequest;
use App\Http\Requests\KhoilopEditRequest;
use App\Models\Khoilop;
use DateTime;
class KhoilopController extends Controller
{
    public function getKhoiAdd(){
    	return view('admin.module.khoilop.add');
    }
    public function postKhoiAdd(KhoilopAddRequest $request){
    	$khoi = new Khoilop;
    	$khoi->tenkhoi = $request->txtKhoi;
    	$khoi->created_at = new DateTime();
    	$khoi->save();
    	if ($request->btnSaveNew) {
            return redirect()->route('them-khoi-lop')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-khoi-lop')->with('success','Bạn đã thêm danh mục thành công');
        }
    }
    public function getKhoiList(){
        $khoi = Khoilop::select('id', 'tenkhoi')->get();
    	return view('admin.module.khoilop.list',['khoi'=> $khoi]);
    }

    public function getKhoiEdit($id){
		$khoilop = Khoilop::findOrFail($id)->toArray();
		return view('admin.module.khoilop.edit', ['khoilop'=> $khoilop]);
    }
    public function postKhoiEdit(KhoilopEditRequest $request, $id){
		$khoi = Khoilop::find($id);
		$khoi->tenkhoi = $request->txtKhoi;
		$khoi->updated_at = new DateTime();
		$khoi->save();
		return redirect()->route('danh-sach-khoi-lop')->with('success', 'Sửa thành công');  
    }
    public function getKhoiDel($id){
        $khoi = Khoilop::findOrFail($id);
        $khoi->delete();
        return redirect()->route('danh-sach-khoi-lop')->with('success', 'Xóa thành công');
    }
}
