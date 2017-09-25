<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuyenAddRequest;
use App\Http\Requests\QuyenEditRequest;
use App\Models\Quyen;
use App\Models\Hocsinh;
use App\Models\Giaovien;
use DateTime,DB;

class QuyenController extends Controller
{
    public function getQuyenAdd(){
        $quyen = Quyen::select('id', 'tenquyen', 'id_cha')->get();
    	return view('admin.module.quyen.add',['quyen'=>$quyen]);
    }
     public function postQuyenAdd(QuyenAddRequest $request)
    {
        $quyen = new Quyen;
        $quyen->tenquyen = $request->tenquyen;
        $quyen->duongdan = str_slug($request->tenquyen);
        $quyen->id_cha = $request->sltCate;
        $quyen->created_at =new DateTime();
        $quyen->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-quyen')->with('success','Bạn đã thêm thành công');
        } else {
            return redirect()->route('danh-sach-quyen')->with('success','Bạn đã thêm thành công');
        }  

    }

    public function getQuyenList(){
    	$quyen = Quyen::select()->get();
    	return view('admin.module.quyen.list', ['quyen'=>$quyen]);
    }
    public function getQuyenDel($id){
        $quyen = Quyen::findOrFail($id);
        $quyen->delete();
         return redirect()->route('danh-sach-quyen')->with(['flash_level'=>'result_msg','flash_message' => 'Xóa thành công']);
    }

    public function getQuyenEdit($id){
        $data = Quyen::findOrFail($id);
        $quyen = Quyen::select('id', 'tenquyen', 'id_cha')->get();
         return view('admin.module.quyen.edit',['quyen'=>$quyen,'data'=>$data]);

    }
    public function postQuyenEdit(QuyenEditRequest $request,$id){
        $quyen =Quyen::findOrFail($id);
		$quyen->tenquyen = $request->tenquyen;
        $quyen->duongdan = str_slug($request->tenquyen);
        $quyen->id_cha = $request->sltCate;
        $quyen->updated_at =new DateTime();
        $quyen->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-quyen')->with('success','Bạn đã thêm thành công');
        } else {
            return redirect()->route('danh-sach-quyen')->with('success','Bạn đã thêm thành công');
        }  
    }
}
