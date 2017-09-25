<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use LaravelCaptcha\Facades\Captcha;
use Illuminate\Support\Facades\Auth;
use App\Models\Tintuc;
use App\Models\Loaitin;
use App\Models\Hocsinh;
use App\Models\Phuhuynh;
use App\Models\Hocky;
use App\Models\Lophoc;
use DB;

class MainController extends Controller
{
    public function getIndex () {
        return view('user.pages.index');
	}
    public function getCate($id){
        $cate= Loaitin::select('tenloai')->where('id',$id)->first()->toArray();
        $news = Tintuc::where('loaitin_id',$id)->paginate(2);
    	return view('user.pages.cate',['cate'=>$cate,'news'=>$news]);
    }
    public function getDetail($id){
        $data=Tintuc::with('loaitin')->where('id',$id)->first()->toArray();
    	return view('user.pages.detail',['data'=>$data]);
    }
    public function getHSDN(){
        return view('user.pages.xemdiem.HSDN', ['captcha' => Captcha::html()]);
    }
    public function postHSDN(Request $request){
        $tenkh  =$request->txtUser;
        $matkhau=md5($request->txtPass);
      $user=Hocsinh::where('mahocsinh','=',$tenkh)->where('mkdangnhap','like',$matkhau)->first()->toArray();
      $data   = Hocky::select()->get()->toArray();
      $lophoc = Lophoc::select()->get()->toArray();

      if(($user['mahocsinh']==$tenkh) && ($user['mkdangnhap']==$matkhau)){
        
        return view('user.pages.xemdiem.xemTTKH',['data'=>$data,'user'=>$user,'lophoc'=>$lophoc]);
      }else {
        return redirect()->route('getHSDN')->with(['flash_level' => 'result_msg', 'flash_message'=>'Thông tin đăng nhập sai hoặc tài khoản không tồn tại!']);
      }  
    }

    public function getPHDN(){
        return view('user.pages.xemdiem.PHDN', ['captcha' => Captcha::html()]);
    }
    public function postPHDN(Request $request){
        $tenph  =$request->txtUser;
        $matkhau=md5($request->txtPass);
      $user=Phuhuynh::where('tenPH','=',$tenph)->where('mkdangnhap','like',$matkhau)->first()->toArray();
      echo "<pre>";
      print_r($user);
      echo "</pre>";
      
        $lophoc = Lophoc::select()->get()->toArray();
      if(($user['tenPH']==$tenph) && ($user['mkdangnhap']==$matkhau)){
        $hocsinh = Hocsinh::where('phuhuynh_id',$user['id'])->get()->toArray();
         echo "<pre>";
      print_r($hocsinh);
      echo "</pre>";
        return view('user.pages.xemdiem.dshs',['hocsinh'=>$hocsinh,'lophoc'=>$lophoc]);
      }else {
        return redirect()->route('getHSDN')->with(['flash_level' => 'result_msg', 'flash_message'=>'Thông tin đăng nhập sai hoặc tài khoản không tồn tại!']);
      }  
    }
    public function getPHXD($id){
      $user=Hocsinh::where('id','=',$id)->first()->toArray();
      print_r($user);
      $data   = Hocky::select()->get()->toArray();
      $lophoc = Lophoc::select()->get()->toArray();
        return view('user.pages.xemdiem.xemTTKH',['data'=>$data,'user'=>$user,'lophoc'=>$lophoc]);
      } 
    public function BangdiemAjax($id)
    {
        $monhoc = Hocky::with(array('bangdiem.monhoc'=> function($query){
            $query->distinct();
        }))->where('id',$id)->get()->toArray();
       return json_encode($monhoc);
    }

}
