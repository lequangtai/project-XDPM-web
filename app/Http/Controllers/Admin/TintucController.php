<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TintucAddRequest;
use App\Http\Requests\TintucEditRequest;
use App\Models\Loaitin;
use App\Models\Tintuc;
use Auth, DateTime,File;
class TintucController extends Controller
{
    public function getNewsAdd()
    {
        $cate = Loaitin::select('id', 'tenloai', 'id_cha')->get()->toArray();
        return view('admin.module.tintuc.add',['cate'=>$cate]); 

    }
     public function postNewsAdd(TintucAddRequest $request)
    {
        $news = new Tintuc;
        $file = $request->file('newsImg');
        $news->tieude = $request->txtTitle;
        $news->duongdan = str_slug($request->txtTitle, "-");
        $news->tomtat =$request->txtIntro;
        $news->noidung =$request->txtFull;

        if(strlen($file) > 0){
            $fImageCurrent = $request ->fImageCurrent;
            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/news/';
            $file->move($destinationPath, $filename);
            $news->hinhanh = $filename;

        }
        $news->loaitin_id =$request->sltCate;
        $news->created_at =new DateTime();
        $news->save();
        if ($request->btnSaveNew) {
            return redirect()->route('them-tin-tuc')->with('success','Bạn đã thêm thành công');
        } else {
            return redirect()->route('danh-sach-tin-tuc')->with('success','Bạn đã thêm thành công');
        }
      
    }
    public function getNewsList()
    {
        $news = Tintuc::select('id', 'tieude','tomtat', 'noidung','created_at')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.module.tintuc.list', ['news'=>$news]); 
    }
    public function getNewsDel($id){
        $news = Tintuc::findOrFail($id);
        if(file_exists(public_path().'/uploads/news/'.$news->hinhanh)){
            File::delete(public_path().'/uploads/news/'.$news->hinhanh);
        }
        $news->delete();
         return redirect()->route('danh-sach-tin-tuc')->with('success', 'Xóa thành công');
    }
     public function getNewsEdit($id){
        $news =Tintuc::findOrFail($id);
        $cate =Loaitin::select('id','tenloai','id_cha')->get()->toArray();
        return view('admin.module.tintuc.edit',["data_news"=>$news,'data_cate'=>$cate]);
    }
     public function postNewsEdit(TintucEditRequest $request,$id){
        $news =Tintuc::findOrFail($id);
        $file = $request->file('newsImg');
        $news->tieude = $request->txtTitle;
        $news->duongdan = str_slug($request->txtTitle, "-");
        $news->tomtat =$request->txtIntro;
        $news->noidung =$request->txtFull;

        if(strlen($file) > 0){
            $fImageCurrent = $request ->fImageCurrent;
            if(file_exists(public_path().'/uploads/news/'. $fImageCurrent))
            {
            File::delete(public_path().'/uploads/news/'. $fImageCurrent);
             }
            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/news/';
            $file->move($destinationPath, $filename);
            $news->hinhanh = $filename;

        }
        $news->loaitin_id =$request->sltCate;
        $news->updated_at =new DateTime();
         if ($request->btnSaveNew) {
            return redirect()->route('them-tin-tuc')->with('success','Bạn đã sửa thành công');
        } else {
            return redirect()->route('danh-sach-tin-tuc')->with('success','Bạn đã sửa thành công');
        }
    }

}
