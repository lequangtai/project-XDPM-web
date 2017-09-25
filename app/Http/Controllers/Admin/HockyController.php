<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\HockyAddRequest;
use App\Http\Requests\HockyEditRequest;

use App\Http\Controllers\Controller;
use App\Models\Hocky;
use App\Models\Namhoc;
use DateTime;
class HockyController extends Controller
{
    public function getHockyAdd(){
        $namhoc = Namhoc::select()->get();
    	return view('admin.module.hocky.add',['namhoc'=>$namhoc]);
    }
    
    public function postHockyAdd(HockyAddRequest $request){
    	$hocky = new Hocky;
    	$hocky->tenhocky = $request->sltHocky;
    	$hocky->namhoc_id = $request->sltNamhoc;
    	$hocky->created_at = new DateTime();
    	$hocky->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-hoc-ky')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-hoc-ky')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }

    public function getHockyList(){
        $data=Hocky::with('namhoc')->get()->toArray();
    	return view('admin.module.hocky.list', ['data'=>$data]);
    }

    public function getHockyDel($id){
        $data = Hocky::findOrFail($id); 
        $data->delete();
        return redirect()->route('danh-sach-hoc-ky')->with('success', 'Thêm thành công');
    }

    public function getHockyEdit($id){
        $data = Hocky::findOrFail($id);
        $namhoc = Namhoc::select()->get();
        return view('admin.module.hocky.edit',['data'=>$data,'namhoc'=>$namhoc]);
    }

     public function postHockyEdit(HockyEditRequest $request,$id){
        $hocky =Hocky::findOrFail($id);
		$hocky->tenhocky = $request->sltHocky;
    	$hocky->namhoc_id = $request->sltNamhoc;
    	$hocky->updated_at = new DateTime();
    	$hocky->save();
    	if ($request->btnSaveNew) {
            return redirect()->route('getHockyEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-hoc-ky')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }
}
