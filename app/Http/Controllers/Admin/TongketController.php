<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Bangdiem;
use App\Models\Lophoc;
use App\Models\Monhoc;
use App\Models\Hocsinh;
use App\Models\Hocky;
use App\Models\User;
use App\Models\Hocluc;
use App\Models\Hanhkiem;
use App\Models\Tongket;
use DateTime;
use DB;
class TongketController extends Controller
{
    
    public function getChonLop(){
        $idgv   = Auth::user()->id;
        $lophoc = Lophoc::select('id', 'tenlop')->where('users_id', $idgv)->get();
        $hocky  = Hocky::with('namhoc')->get()->toArray();
        
       return view('admin.module.tongket.chonlop', ['lophoc' =>$lophoc, 'hocky' =>$hocky]);
    }

     public function postchonlop(Request $request){ 
        $lophoc = $request->sltLophoc;
        $hocky  = $request->sltHocky; 
        $hanhkiem = Hanhkiem::select()->get()->toArray();
         $hocsinh = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
        foreach ($hocsinh as $item) {
            $tk   = Tongket::select()->where('hocky_id', $hocky)->where('hocsinh_id', $item['id'])->get()->toArray();
        } 
//kiểm tra tồn tại bảng điểm ngay đây mí đúng

        if(!empty($tk)){
            return redirect()->route('xemtongket', ['lophoc'=>$lophoc, 'hocky'=>$hocky])->withInput(['hocsinh'=> $hocsinh, 'hanhkiem'=>$hanhkiem])->with('success','Bảng tổng kết đã tồn tại !');
        }

        else{
            return redirect()->route('nhaptongket', ['lophoc'=>$lophoc, 'hocky'=>$hocky])->withInput(['lophoc'=> $request->sltLophoc ,'hocky' =>$request->sltHocky,'hanhkiem'=>$hanhkiem ]);
        } 
    }

    public function gettongket($lophoc, $hocky){
    	
        $hocsinh = Hocsinh::with('lophoc','bangdiem')->where('lophoc_id', $lophoc)->get()->toArray();
        $chitiet = DB::table('lv17_ctuser-mhoc-lhoc')->where('lophoc_id', $lophoc)->get()->toArray();
        // foreach ($chitiet as $item) {
        //     $monhoc = Monhoc::select()->where('id', $item->monhoc_id)->get()->toArray();
        //     echo "<pre>";
        // print_r($monhoc);
        // echo "</pre>";
        // }
        $lophoc = Lophoc::select()->where('id', $lophoc)->get()->toArray();
        $hanhkiem = Hanhkiem::select()->get()->toArray();
        $hocky = Hocky::select()->where('id', $hocky)->get()->toArray();
        
       return view('admin.module.tongket.taotongket', ['hocsinh' =>$hocsinh, 'hanhkiem' =>$hanhkiem,'lophoc' =>$lophoc,'hocky' =>$hocky, 'chitiet'=>$chitiet]);
    }
//tongket/1/1
    public function postTongket(Request $request, $lophoc, $hocky){
        $hocsinh = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
        foreach ($hocsinh as $item) {
            $tk   = Tongket::select()->where('hocky_id', $hocky)->where('hocsinh_id', $item['id'])->where('hocky_id', $hocky)->get()->toArray();
        } 
               
       if(count($tk) ==0){
            foreach($request->id_hocsinh as $key => $value) {
                $tongket = new Tongket;
                $tongket->diemTB = $request->DTB[$key];
                $tongket->trangthai = null;
                $tongket->ghichu = $request->ghi_chu[$key];
                $tongket->hocsinh_id = $request->id_hocsinh[$key];
                $tongket->hanhkiem_id = $request->slthanhkiem[$key];
                $tongket->hocluc = $request->HL[$key];
                $tongket->songaynghi = $request->SNN[$key];
                $tongket->hocky_id = $request->id_hocky; 
                $tongket->updated_at = new DateTime();
                $tongket->save();
                       
            }

        }
       
        return redirect()->route('xemtongket',['lophoc'=>$lophoc, 'hocky'=>$hocky]);
    }


    public function getChonLopCn(){
        $idgv   = Auth::user()->id;
        $lophoc = Lophoc::select('id', 'tenlop')->where('users_id', $idgv)->get();
        $hocky  = Hocky::with('namhoc')->get()->toArray();
        
       return view('admin.module.tongket.chonlop', ['lophoc' =>$lophoc, 'hocky' =>$hocky]);
    }

     public function postchonlopCn(Request $request){ 
        $lophoc = $request->sltLophoc;
        $hocky  = $request->sltHocky; 
        if ($request->btnContinue){
          
        }   return redirect()->route('tongket', ['lophoc'=>$lophoc, 'hocky'=>$hocky])->withInput(['lophoc'=> $request->sltLophoc ,'hocky' =>$request->sltHocky ]);
    }

    public function xemtongket($lophoc, $hocky){
        
        $hocky = Hocky::select()->where('id', $hocky)->get()->toArray();
        $hocsinh = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
        $hanhkiem = Hanhkiem::select()->get()->toArray();
        $lophoc = Lophoc::select()->where('id', $lophoc)->get()->toArray();
        return view('admin.module.tongket.tongket', ['lophoc' =>$lophoc, 'hocky' =>$hocky, 'hocsinh'=>$hocsinh, 'hanhkiem'=>$hanhkiem]);
    }

    public function suatongket($lophoc, $hocky){
        $hocky = Hocky::select()->where('id', $hocky)->get()->toArray();
        $hocsinh = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
        $hanhkiem = Hanhkiem::select()->get()->toArray();
        $lophoc = Lophoc::select()->where('id', $lophoc)->get()->toArray();
        return view('admin.module.tongket.suatongket', ['lophoc' =>$lophoc, 'hocky' =>$hocky, 'hocsinh'=>$hocsinh, 'hanhkiem'=>$hanhkiem]);
    }

    public function postsuatongket(Request $request, $lophoc, $hocky){

            foreach($request->id_hocsinh as $key => $value) {
                $arr          = [
                'id'          => $request->id_tongket[$key],
                'diemTB'      => $request->DTB[$key],
                'trangthai'   => $request->slttrangthai[$key],
                'ghichu'      => $request->ghi_chu[$key],
                'hocsinh_id'  => $request->id_hocsinh[$key],
                'hanhkiem_id' => $request->slthanhkiem[$key],
                'hocluc'      => $request->HL[$key],
                'songaynghi'  => $request->SNN[$key],
                'hocky_id'    => $request->id_hocky,
                'updated_at'  => new DateTime,
                ];
        // echo "<pre>";
        // print_r($arr);
        // echo "</pre>";              
            DB::table('lv17_tongket')->where('id',$request->id_tongket[$key])->update($arr);
             }          
             return redirect()->route('xemtongket', ['lophoc'=>$lophoc, 'hocky'=>$hocky])->with('success','Đã cập nhật!');
        
    }
}
