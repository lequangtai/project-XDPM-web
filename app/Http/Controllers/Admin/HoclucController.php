<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HoclucAddRequest;
use App\Http\Requests\HoclucEditRequest;
use App\Models\Hocluc;
use DateTime;

class HoclucController extends Controller
{
    public function getHoclucAdd(){
        
    	return view('admin.module.hocluc.add');
    }

    public function postHoclucAdd(HoclucAddRequest $request){
    	$Hocluc = new Hocluc;
    	$Hocluc->tenhocluc = $request->tenhocluc;
    	$Hocluc->diemcan = $request->diemcan;
    	$Hocluc->diemkhongche = $request->diemkhongche;
    	$Hocluc->created_at = new DateTime();
    	$Hocluc->save();
    	if ($request->btnSaveNew) {
            return redirect()->route('getHoclucAdd')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('getHoclucList')->with('success','Bạn đã thêm danh mục thành công');
        } 
    }
    public function getHoclucList(){
    	$data = Hocluc::select('id', 'tenhocluc', 'diemcan', 'diemkhongche', 'created_at')->get();
    	return view('admin.module.hocluc.list', ['data'=>$data]);
    }

    public function getHoclucDel($id){
        $data = Hocluc::findOrFail($id);
        $data->delete();
         return redirect()->route('getHoclucList')->with(['flash_level'=>'result_msg','flash_message' => 'Xóa thành công']);
    }
    public function getHoclucEdit($id){
        $data = Hocluc::findOrFail($id);
         return view('admin.module.hocluc.edit',['data'=>$data]);

    }
     public function postHoclucEdit(HoclucEditRequest $request,$id){
        $Hocluc =Hocluc::findOrFail($id);
		$Hocluc->tenhocluc = $request->tenhocluc;
    	$Hocluc->diemcan = $request->diemcan;
    	$Hocluc->diemkhongche = $request->diemkhongche;
    	$Hocluc->updated_at = new DateTime();
    	$Hocluc->save();
    	if ($request->btnSaveNew) {
            return redirect()->route('getHoclucEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('getHoclucList')->with('success','Bạn đã thêm danh mục thành công');
        } 
}
}
