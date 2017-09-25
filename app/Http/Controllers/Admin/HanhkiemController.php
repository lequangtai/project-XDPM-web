<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\HanhkiemAddRequest;
use App\Http\Requests\HanhkiemEditRequest;
use App\Http\Controllers\Controller;
use App\Models\Hanhkiem;
use DateTime;
class HanhkiemController extends Controller
{
    public function getHanhkiemAdd(){
        
    	return view('admin.module.hanhkiem.add');
    }
    public function postHanhkiemAdd(HanhkiemAddRequest $request){
    	$hanhkiem = new Hanhkiem;
    	$hanhkiem->tenhanhkiem = $request->tenhanhkiem;
    	$hanhkiem->created_at = new DateTime();
    	$hanhkiem->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-hanh-kiem')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-hanh-kiem')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }

    public function getHanhKiemList(){
    	$data = Hanhkiem::select('id', 'tenhanhkiem', 'created_at')->get();
    	return view('admin.module.hanhkiem.list', ['data'=>$data]);
    }

    public function getHanhkiemDel($id){
        $data = Hanhkiem::findOrFail($id);      
        $data->delete();
        return redirect()->route('danh-sach-hanh-kiem')->with('success', 'Xóa thành công');

    }
    public function getHanhkiemEdit($id){
        $data = Hanhkiem::findOrFail($id)->toArray();
         return view('admin.module.hanhkiem.edit',['data'=>$data]);

    }
     public function postHanhkiemEdit(HanhkiemEditRequest $request,$id){
        $hanhkiem =Hanhkiem::find($id);
		$hanhkiem->tenhanhkiem = $request->tenhanhkiem;
    	$hanhkiem->updated_at = new DateTime();
    	$hanhkiem->save();
    	if ($request->btnSaveNew) {
            return redirect()->route('getHanhkiemEdit',['id' => $id])->with('success','Bạn đã sửa thành công');
        } else {
            return redirect()->route('danh-sach-hanh-kiem')->with('success','Bạn đã sửa danh mục thành công');
        } 
}
}
