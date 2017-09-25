<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NhomquyenAddRequest;
use App\Http\Requests\NhomquyenEditRequest;
use App\Models\Nhomquyen;
use App\Models\Quyen;
use DateTime,DB;
class NhomquyenController extends Controller
{
    public function getNhomquyenAdd(){
        $quyen=Quyen::select()->get()->toArray();
    	return view('admin.module.nhomquyen.add',['quyen'=>$quyen]);
    }
    public function postNhomquyenAdd(Request $request){
    	$nhomquyen               = new Nhomquyen;
        $abc                     = $request->tenquyen;
    	$nhomquyen->tennhomquyen = $request->tennhomquyen;
    	$nhomquyen->created_at   = new DateTime();
        $nhomquyen->save();
        $nhomquyen->quyen()->attach($abc);    	
    	if ($request->btnSaveNew) {
            return redirect()->route('them-nhom-quyen')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-nhom-quyen')->with('success','Bạn đã thêm danh mục thành công');
        }
    }
    public function getNhomquyenList(){
        $nhomquyen = Nhomquyen::select('id', 'tennhomquyen')->get();
    	return view('admin.module.nhomquyen.list',['nhomquyen'=> $nhomquyen]);
    }

    public function getNhomquyenEdit($id){
		$nhomquyen = Nhomquyen::findOrFail($id)->toArray();
        $quyen=Quyen::select()->get()->toArray();
		return view('admin.module.nhomquyen.edit', ['data1'=> $nhomquyen,'quyen'=>$quyen]);
    }
    public function postNhomquyenEdit(Request $request, $id){
        $nhomquyen               = Nhomquyen::find($id);
        $abc                     = $request->tenquyen;
        $nhomquyen->tennhomquyen = $request->tennhomquyen;
        $nhomquyen->created_at   = new DateTime();
        $nhomquyen->save();
        $nhomquyen->quyen()->sync($abc);
		if ($request->btnSaveNew) {
            return redirect()->route('getNhomquyenEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-nhom-quyen')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }
    public function getNhomquyenDel($id){
        $khoi = Nhomquyen::findOrFail($id);
        $khoi->delete();
        return redirect()->route('danh-sach-nhom-quyen')->with('success', 'Xóa thành công');
    }
}
