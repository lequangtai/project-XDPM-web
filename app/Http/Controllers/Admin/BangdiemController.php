<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\collection;
use App\Http\Requests\NhapdiemRequest;
use App\Http\Requests\DiemUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Bangdiem;
use App\Models\Lophoc;
use App\Models\Monhoc;
use App\Models\Hocsinh;
use App\Models\Hanhkiem;
use App\Models\Hocky;
use App\Models\User;
use DateTime;
use DB;

class BangdiemController extends Controller
{
    public function getTaoBangdiem(){
        $idgv   = Auth::user()->id;
        $lophoc = Lophoc::select('id', 'tenlop')->get();
        $monhoc = Monhoc::select('id', 'tenmonhoc')->get();
        $hocky =Hocky::with('namhoc')->get()->toArray();
        $post   = new User;
        $data   = User::with(array('monhoc'=> function($query){
                        $query->distinct();
                    }))->where('id',$idgv)->get()->toArray();
       return view('admin.module.bangdiem.chonmonhoc', ['data'=>$data,'lophoc' =>$lophoc, 'monhoc' => $monhoc, 'hocky' =>$hocky]);
    }
    
    public function postTaoBangdiem(Request $request){
        $lophoc  = $request->sltLophoc;
        $hocsinh = Lophoc::with(array('hocsinh'=>function($query){
                        $query->select();
                    }))->where('id', $lophoc)->get()->toArray();
        // print_r($hocsinh);
        $monhoc  = $request->sltMonhoc;
        $hocky   = $request->sltHocky; 
        if ($request->btnContinue){
           foreach ($hocsinh as $item) {
            $hs = $item['hocsinh'];
            foreach ($hs as $item1) {
               $idhs = $item1['id']; //học sinh thuộc lớp
               //nếu hs đã có điểm
               $bd   = DB::table('lv17_bangdiem')->where('hocsinh_id', $idhs)->where('monhoc_id', $monhoc)->where('hocky_id', $hocky)->get()->toArray();
               
             if(count($bd) ==0){
                    DB::table('lv17_bangdiem')->insert(
                            [
                                'hocsinh_id' => $item1['id'], 
                                'tenhocsinh' => $item1['hoten'],
                                'monhoc_id'  => $monhoc,
                                'mieng1'     => null , 
                                'mieng2'     => null,
                                'mieng3'     => null,
                                'mieng4'     => null,
                                'd15phut1'   => null,
                                'd15phut2'   => null,
                                'd15phut3'   => null,
                                'd15phut4'   => null,
                                'd1tiet1'    => null,
                                'd1tiet2'    => null,
                                'd1tiet3'    => null,
                                'diemthiHK'  => null,
                                'diemTBHK'   => null,
                                'hocky_id'   => $hocky,
                                'created_at' => new DateTime()
                            ]
                        );
             }

               else{
                     return redirect()->route('nhap-diem', ['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocky'=>$hocky])->with('success','Bảng điểm đã tồn tại !');
               } 
            }

            $user   = Auth::user()->username;
            DB::table('lv17_history')->insert(
                 [
                                'user' => $user, 
                                'taobangdiem'     => new DateTime(),
                                'suabangdiem'     => null,
                                'xoabangdiem'     => null,
                                'created_at' => new DateTime()
                            ]
                        );
            

            return redirect()->route('nhap-diem',['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocky'=>$hocky])->with('success','Bạn đã thêm bảng điểm thành công !');
           } 
        }       
    }

   

    public function LophocAjax($id)
    {
        $monhoc = Monhoc::with(array('lophoc'=> function($query){
            $query->distinct();
        }))->where('id',$id)->get()->toArray();
       return json_encode($monhoc);
    }

    

    public function nhapdiem($monhoc, $lophoc){
    	$lophoc   = Lophoc::select()->where('id', $lophoc)->get()->toArray();
        // $monhoc   = Monhoc::select()->where('id', $monhoc)->get()->toArray();
        $hocky    = Hocky::select()->get()->toArray();
        $hocsinh  = Hocsinh::select()->where('lophoc_id', $lophoc)->where('hocky_id', $hocky)->get()->toArray();
        $bangdiem = Bangdiem::select()->where('monhoc_id', $monhoc)->get()->toArray();
        return view('admin.module.bangdiem.nhapdiem', ['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocsinh'=>$hocsinh, 'hocky'=>$hocky, 'bangdiem'=>$bangdiem]);
    }

    


//Nhập điểm

    public function getxemdiem(){
        $idgv   = Auth::user()->id;
        $lophoc = Lophoc::select('id', 'tenlop')->get();
        $monhoc = Monhoc::select('id', 'tenmonhoc')->get();
        $hocky =Hocky::with('namhoc')->get()->toArray();
        $post   = new User;
        $data   = $post->with(array('monhoc'=> function($query){
                        $query->distinct();
                    }))->where('id',$idgv)->get()->toArray();
        return view('admin.module.bangdiem.xemdiem', ['data'=>$data,'lophoc' =>$lophoc, 'monhoc' => $monhoc, 'hocky' =>$hocky]);
      
    } 

    public function postxemdiem(NhapdiemRequest $request){ 
        $lophoc = $request->sltLophoc;
        $monhoc = $request->sltMonhoc;
        $hocky  = $request->sltHocky; 
        if ($request->btnContinue){
            return redirect()->route('nhap-diem', ['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocky'=>$hocky])->withInput(['monhoc' =>$request->sltMonhoc, 'lophoc'=> $request->sltLophoc ,'hocky' =>$request->sltHocky ]);
        } 
    }
   

    public function xemdiem($monhoc, $lophoc, $hocky){
        $hocsinh  = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
        $bangdiem = Bangdiem::select()->where('hocky_id', $hocky)->where('monhoc_id', $monhoc)->get()->toArray();
        return view('admin.module.bangdiem.diem', ['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocsinh'=>$hocsinh, 'hocky'=>$hocky, 'bangdiem'=>$bangdiem]);
    }

    public function postdiem(Request $request,$monhoc, $lophoc, $hocky)
        {
            foreach($request->id_hocsinh as $key => $value) {
              
                $hs11 = collect([
                    ['diem' => $request->M1[$key]],
                    ['diem' => $request->M2[$key]],
                    ['diem' => $request->M3[$key]],
                    ['diem' => $request->M4[$key]],
                    ['diem' => $request->d15phut1[$key]],
                    ['diem' => $request->d15phut2[$key]],
                    ['diem' => $request->d15phut3[$key]],
                    ['diem' => $request->d15phut4[$key]],
                ])->whereNotIn('diem',[-0.1, 10.01])->sum('diem');

                $hs12 = collect([
                    ['diem' => $request->M1[$key]],
                    ['diem' => $request->M2[$key]],
                    ['diem' => $request->M3[$key]],
                    ['diem' => $request->M4[$key]],
                    ['diem' => $request->d15phut1[$key]],
                    ['diem' => $request->d15phut2[$key]],
                    ['diem' => $request->d15phut3[$key]],
                    ['diem' => $request->d15phut4[$key]],
                ])->where('diem',null)->count();

                $hs21 = collect([
                    ['diem2' => $request->d1tiet1[$key]],
                    ['diem2' => $request->d1tiet2[$key]],
                    ['diem2' => $request->d1tiet3[$key]],
                ])->whereNotIn('diem2',[-0.1, 10.01])->sum('diem2');

                $hs22 = collect([
                    ['diem2' => $request->d1tiet1[$key]],
                    ['diem2' => $request->d1tiet2[$key]],
                    ['diem2' => $request->d1tiet3[$key]],
                ])->where('diem2',null)->count();

                $hs31 = collect([
                    ['diem3' => $request->thi[$key]],
                ])->whereNotIn('diem3',[-0.1, 10.01])->sum('diem3');

                $hs32 = collect([
                     ['diem3' => $request->thi[$key]],
                ])->where('diem3',null)->count();

                $tu  = ($hs11 + $hs21*2 + $hs31*3);
                $mau = (17 - ($hs12 + $hs22*2 + $hs32*3));
                if($mau == 0){
                        $tbhk = null;
                    }else if($mau){
                        $tbhk = $tu/$mau;
                }
               
                $arr = [
                'id'         => $request->id_bangdiem[$key],
                'hocsinh_id' => $request->id_hocsinh[$key],
                'tenhocsinh' => $request->tenhocsinh[$key],
                'monhoc_id'  => $request->id_mon,
                'mieng1'     => $request->M1[$key],
                'mieng2'     => $request->M2[$key],
                'mieng3'     => $request->M3[$key],
                'mieng4'     => $request->M4[$key],
                'd15phut1'   => $request->d15phut1[$key],
                'd15phut2'   => $request->d15phut2[$key],
                'd15phut3'   => $request->d15phut3[$key],
                'd15phut4'   => $request->d15phut4[$key],
                'd1tiet1'    => $request->d1tiet1[$key],
                'd1tiet2'    => $request->d1tiet2[$key],
                'd1tiet3'    => $request->d1tiet3[$key],
                'diemthiHK'  =>$request->thi[$key],
                'diemTBHK'   =>number_format($tbhk,1),
                'hocky_id'   =>$request->id_hocky,
                'updated_at' => new DateTime,
                ];
                                 
            DB::table('lv17_bangdiem')->where('id',$request->id_bangdiem[$key])->update($arr);
            }

            $user   = Auth::user()->username;
            DB::table('lv17_history')->insert(
                 [
                                'user' => $user, 
                                'taobangdiem'     =>  null,
                                'suabangdiem'     => new DateTime(),
                                'xoabangdiem'     => null,
                                'created_at' => new DateTime()
                            ]
                        );
           return redirect()->route('nhap-diem', ['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocky'=>$hocky]);
        }

        public function DeleteAll($monhoc, $lophoc, $hocky){
            $hocsinh  = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
            foreach ($hocsinh as $hs) {
                $bangdiem = Bangdiem::select()->where('hocsinh_id', $hs['id'])->where('monhoc_id', $monhoc)->where('hocky_id', $hocky)->delete();
            }
            $user   = Auth::user()->username;
            DB::table('lv17_history')->insert(
                 [
                                'user' => $user, 
                                'taobangdiem'     =>  null,
                                'suabangdiem'     => null,
                                'xoabangdiem'     => new DateTime(),
                                'created_at' => new DateTime()
                            ]
                        );
            return redirect()->route('nhap-diem', ['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocky'=>$hocky]);
            
        }

    public function gettongkettheomon(){
        $user   = Auth::user()->id;
        $gv     =  DB::table('lv17_ctuser-mhoc-lhoc')->select()->where('users_id', $user)->get()->toArray();
        foreach ($gv as $item) {
             $lophoc = Lophoc::select()->where('users_id', $user)->orwhere('id', $item->lophoc_id)->get()->toArray();

        }
        $hocky  = Hocky::with('namhoc')->get()->toArray();
       
        
        return view('admin.module.bangdiem.xemdiemtheomon', ['hocky'=>$hocky,  'lophoc'=>$lophoc]);
    }
    public function postgettongkettheomon(Request $request){
        $lophoc = $request->sltLophoc;
        
        $hocky  = $request->sltHocky; 
        if ($request->btnContinue){
            return redirect()->route('xemdiemtongket', ['lophoc'=>$lophoc, 'hocky'=>$hocky])->withInput(['monhoc' =>$request->sltMonhoc, 'lophoc'=> $request->sltLophoc ,'hocky' =>$request->sltHocky ]);
        } 

    }

    public function xemtongket($lophoc, $hocky){
        $monhoc = DB::table('lv17_ctuser-mhoc-lhoc')->where('lophoc_id', $lophoc)->get()->toArray();
        $hocsinh = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
        
        
        $hocky = Hocky::select()->where('id', $hocky)->get()->toArray();
        $lophoc = Lophoc::select()->where('id', $lophoc)->get()->toArray();
        $hanhkiem =Hanhkiem::select()->get()->toArray();
        foreach ($monhoc as $item) {
            $mh[]=Monhoc::select()->where('id',$item->monhoc_id)->where('heso',2)->get()->toArray();
        }


      return view('admin.module.bangdiem.xemtongket',['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocsinh'=>$hocsinh, 'hocky'=>$hocky, 'mh'=>$mh, 'hanhkiem'=>$hanhkiem]);
    }

    public function posttongket(Request $request, $lophoc, $hocky)
        {
            foreach($request->id_hocsinh as $key => $value) {
              
               DB::table('lv17_tongket')->insert(
                            [
                                'diemTB' => $request->DTB[$key], 
                                'trangthai' => null,
                                'ghichu'  => $request->ghichu[$key],
                                'hocsinh_id'     => $request->id_hocsinh[$key], 
                                'hanhkiem_id'     => $request->slthanhkiem[$key],
                                'hocluc'     => $request->hocluc[$key],
                                'songaynghi'     => $request->songaynghi[$key],
                                'hocky_id'   => $request->id_hocky,
                                'created_at' => new DateTime()
                            ]
                        );
            }

            
           return redirect()->route('xemdiemtongket', ['lophoc'=>$lophoc, 'hocky'=>$hocky]);
        }
}
