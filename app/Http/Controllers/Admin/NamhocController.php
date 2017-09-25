<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NamhocAddRequest;
use App\Http\Requests\NamhocEditRequest;
use App\Http\Controllers\Controller;
use App\Models\Namhoc;
use DateTime;
class NamhocController extends Controller
{
    public function getNamhocAdd(){
        
    	return view('admin.module.namhoc.add');
    }
    public function postNamhocAdd(NamhocAddRequest $request){
    	$namhoc = new Namhoc;
    	$namhoc->khoahoc = $request->khoahoc;
    	$namhoc->tennamhoc = $request->tennamhoc;
    	$namhoc->created_at = new DateTime();
    	$namhoc->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-nam-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-nam-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }

    public function getNamhocList(){
    	$data = Namhoc::select('id', 'tennamhoc', 'khoahoc')->get();
    	return view('admin.module.namhoc.list', ['data'=>$data]);
    }

    public function getNamhocDel($id){
        $data = Namhoc::findOrFail($id);
        $data->delete();
         return redirect()->route('danh-sach-nam-hoc')->with('success', 'Xóa thành công');
    }
    public function getNamhocEdit($id){
        $data = Namhoc::findOrFail($id);
         return view('admin.module.namhoc.edit',['data'=>$data]);
    }
     public function postNamhocEdit(NamhocEditRequest $request,$id){
        $namhoc =Namhoc::findOrFail($id);
		$namhoc->khoahoc = $request->khoahoc;
    	$namhoc->tennamhoc = $request->tennamhoc;
    	$namhoc->updated_at = new DateTime();
    	$namhoc->save();
       if ($request->btnSaveNew) {
            return redirect()->route('getNamhocEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-nam-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }
}
