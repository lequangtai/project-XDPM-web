<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MonhocAddRequest;
use App\Http\Requests\MonhocEditRequest;
use App\Http\Controllers\Controller;
use App\Models\Monhoc;
use DateTime;

class MonhocController extends Controller
{
   public function getMonhocAdd(){
        
    	return view('admin.module.monhoc.add');
    }
    public function postMonhocAdd(MonhocAddRequest $request){
    	$monhoc = new Monhoc;
    	$monhoc->tenmonhoc = $request->tenmonhoc;
    	$monhoc->sotiet = $request->sotiet;
    	$monhoc->heso = $request->sltHeso;
    	$monhoc->created_at = new DateTime();
    	$monhoc->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-mon-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-mon-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }

    public function getMonhocList(){
    	$data = Monhoc::select('id', 'tenmonhoc', 'sotiet', 'heso')->get();
    	return view('admin.module.monhoc.list', ['data'=>$data]);
    }

    public function getMonhocDel($id){
        $data = Monhoc::findOrFail($id);
        $data->delete();
        return redirect()->route('danh-sach-mon-hoc')->with('success', 'Xoa thành công');

    }
    public function getMonhocEdit($id){
        $data = Monhoc::findOrFail($id);
         return view('admin.module.monhoc.edit',['data'=>$data]);

    }
     public function postMonhocEdit(MonhocEditRequest $request,$id){
        $monhoc =Monhoc::findOrFail($id);
		$monhoc->tenmonhoc = $request->tenmonhoc;
    	$monhoc->sotiet = $request->sotiet;
    	$monhoc->heso = $request->sltHeso;
    	$monhoc->updated_at = new DateTime();
    	$monhoc->save();
    	if ($request->btnSaveNew) {
            return redirect()->route('getMonhocEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-mon-hoc')->with('success','Bạn đã thêm danh mục thành công');
        } 
}
}
