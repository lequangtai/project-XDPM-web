<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhancongdayAddRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Nhomquyen;
use App\Models\User;
use App\Models\Lophoc;
use App\Models\Monhoc;
use App\Models\Quyen;
use DateTime;
use DB,File;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    public function getUserAdd()
    {
        $data = Nhomquyen::select()->get()->toArray();
        $quyen= Quyen::select()->get()->toArray();
    	return view('admin.module.user.add',['data'=>$data,'quyen'=>$quyen]); 
    }
    public function postUserAdd(Request $request)
    {
        $user           = new User;
        $abc            = $request->tenquyen;
        $file           = $request->file('newsImg');
        $user->hoten    = $request->txtTen;
        $user->username = $request->tendn;
        $user->gioitinh = $request->rdoGioitinh;
        $user->diachi   = $request->txtDiachi;
        $user->email    = $request->txtEmail;
        $user->sdt      = $request->txtSDT;
        if(strlen($file) > 0){
            $fImageCurrent   = $request ->fImageCurrent;
            $filename        = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/news/';
            $file->move($destinationPath, $filename);
            $user->hinhanh   = $filename;
        }
        $user->trangthai    =$request->rdoTrangthai;
        $user->password     =bcrypt($request->txtPass);
        $user->nhomquyen_id =$request->sltCV;
        $user->created_at   =new DateTime();
        $user->save();
            
        if ($request->btnSaveNew) {
            return redirect()->route('them-nguoi-dung')->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-nguoi-dung')->with('success','Bạn đã thêm danh mục thành công');
        }

        
    }
    public function getUserList()
    {
        $giaovien=User::select()->get()->toArray();       
        return view('admin.module.user.list',['giaovien'=>$giaovien]); 
     
    }
    public function getUserDel($id){
        $user = User::findOrFail($id);
        $user->delete();
         return redirect()->route('danh-sach-nguoi-dung')->with('success', 'Xóa thành công');
    }
     public function getUserEdit($id){
        $giaovien =User::findOrFail($id);
        $data =Nhomquyen::select('id','tennhomquyen')->get()->toArray();
        return view('admin.module.user.edit',['giaovien'=>$giaovien,'data'=>$data]);
    }
     public function postUserEdit(Request $request,$id){
        $user             =User::findOrFail($id);
        $abc            = $request->tenquyen;
        $file           = $request->file('newsImg');
        $user->hoten    = $request->txtTen;
        $user->username = $request->tendn;
        $user->gioitinh = $request->rdoGioitinh;
        $user->diachi   = $request->txtDiachi;
        $user->email    = $request->txtEmail;
        $user->sdt      = $request->txtSDT;
        if(strlen($file) > 0){
            $fImageCurrent   = $request ->fImageCurrent;
            $filename        = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/news/';
            $file->move($destinationPath, $filename);
            $user->hinhanh   = $filename;
        }
        $user->trangthai    =$request->rdoTrangthai;
        $user->password     =bcrypt($request->txtPass);
        $user->nhomquyen_id =$request->sltCV;
        $user->updated_at =new DateTime();
        $user->save();
        if ($request->btnSaveNew) {
            return redirect()->route('getUserEdit',['id' => $id])->with('success','Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->route('danh-sach-nguoi-dung')->with('success','Bạn đã thêm danh mục thành công');
        }
        
    }
    public function getdanhsachphanconggd(){
         $giaovien=User::select()->get()->toArray();       
        return view('admin.module.user.dsphanconggd',['giaovien'=>$giaovien]); 
    }
    public function getphanconggiangday($id){
        $giaovien =User::findOrFail($id);
        $lophoc   =Lophoc::select('id','tenlop')->get()->toArray();
        $monhoc   = Monhoc::select('id', 'tenmonhoc')->get()->toArray();
        return view('admin.module.user.phanconggiangday',['giaovien'=>$giaovien, 'lophoc'=>$lophoc,'monhoc'=>$monhoc] );
    }
    public function postphanconggiangday(PhancongdayAddRequest $request, $id){
        $giaovien = User::findOrFail($id);
        $idgv     = $giaovien['id'];
        $idlop    = $request ->sltLop;
        $idmonhoc = $request ->sltMonhoc;
        DB::table('lv17_ctuser-mhoc-lhoc')->insert
              (
                  [
                      'users_id'    => $idgv,
                      'monhoc_id'   => $idmonhoc,
                      'lophoc_id'   =>$idlop,
                      'created_at'  =>new DateTime(),
                  ]
              );
         if ($request->btnSaveNew) {
            return redirect()->route('getphanconggiangday',['idgv' => $id])->with('success','Thành công');
        } else {
            return redirect()->route('danh-sach-nguoi-dung')->with('success','Phân công thành công');
        }
    }
    public function lichday(){
        $id=Auth::user()->id;
        if($id!=1){
            $lichday = DB::table('lv17_ctuser-mhoc-lhoc')->where('users_id',$id)->get()->toArray(); 
            $user    =User::select('id','hoten')->get()->toArray();
            $monhoc  =Monhoc::select('id','tenmonhoc')->get()->toArray();
            $lophoc  =Lophoc::select('id','tenlop')->get()->toArray();
            return view('admin.module.user.lichday', ['lichday' => $lichday,'user'=>$user
                ,'monhoc'=>$monhoc,'lophoc'=>$lophoc]);
        }else{
            $lichday = DB::table('lv17_ctuser-mhoc-lhoc')->get()->toArray(); 
            $user    =User::select('id','hoten')->get()->toArray();
            $monhoc  =Monhoc::select('id','tenmonhoc')->get()->toArray();
            $lophoc  =Lophoc::select('id','tenlop')->get()->toArray();
            return view('admin.module.user.lichday', ['lichday' => $lichday,'user'=>$user
                ,'monhoc'=>$monhoc,'lophoc'=>$lophoc]);
        }
        
    }


}
