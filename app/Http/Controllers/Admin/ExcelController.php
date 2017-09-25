<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bangdiem;
use App\Models\Hocsinh;
use DB;
use Excel;
use Illuminate\Support\Facades\Input;
class ExcelController extends Controller
{
    public function getImport($monhoc, $lophoc, $hocky){
    	return view('admin.module.bangdiem.importExcel');
    }

    public function postImport($monhoc, $lophoc, $hocky){
    	Excel::load(Input::file('bangdiem'), function($reader){
    		$reader->each(function($sheet){
    			Bangdiem::firstOrCreate($sheet->toArray());
    		});

    	});
    	 return redirect()->route('nhap-diem', ['lophoc'=>$lophoc, 'monhoc'=>$monhoc, 'hocky'=>$hocky]);
    }

    public function getExport($monhoc, $lophoc, $hocky){

        $hocsinh  = Hocsinh::select()->where('lophoc_id', $lophoc)->get()->toArray();
        foreach ($hocsinh as $item) {
            $bangdiem[] = Bangdiem::select()->where('hocky_id', $hocky)->where('hocsinh_id', $item['id'])->where('monhoc_id', $monhoc)->get();
        }

        foreach ($bangdiem as $item1) {
            foreach ($item1 as $item) {
                $data[] = array(
                
                'id bảng điểm'    => $item->id,
                'id học sinh'     => $item->hocsinh_id,
                'họ tên'    => $item->tenhocsinh,
                'mã môn học'      => $item->monhoc_id,
                'điểm miệng 1'    => $item->mieng1,
                'điểm miệng 2'    => $item->mieng2,
                'điểm miệng 3'    => $item->mieng3,
                'điểm miệng 4'    => $item->mieng4,
                'điểm 15 phút 1'   => $item->d15phut1,
                'điểm 15 phút 2'   => $item->d15phut2,
                'điểm 15 phút 3'   => $item->d15phut3,
                'điểm 15 phút 4'   => $item->d15phut4,
                'điểm 1 tiết 1'    => $item->d1tiet1,
                'điểm 1 tiết 2'    => $item->d1tiet2,
                'điểm 1 tiết 3'    => $item->d1tiet3,
                'điểm thi'       => $item->diemthiHK,
                'điểm trung bình' => $item->diemTBHK,
                'id học kỳ'       => $item->hocky_id,
                'ngày tạo'       => $item->created_at,
                'ngày cập nhật'   => $item->updated_at,

                );
            }
            
        }

        // echo "<pre>";
        //    print_r($data);
        //    echo "<pre>";
       
    	
    	Excel::create('Bangdiem', function($excel) use($data) {
    		$excel->sheet('Sheet 1', function($sheet) use($data){
    			$sheet->fromArray($data);
    		});
    	})->export('xlsx');
    }

    public function DSHS($lophoc){

        $hocsinh  = Hocsinh::select()->where('lophoc_id', $lophoc)->get();
        
        foreach ($hocsinh as $hs) {
           
                $data[] = array(
                
                'id_hocsinh'    => $hs->id,
                'mã học sinh'    => $hs->mahocsinh,
                'họ tên học sinh'    => $hs->hoten,
                'ngày sinh'      => $hs->ngaysinh,
                'giới tinh'    => $hs->gioitinh,
                'địa chỉ'    => $hs->diachi,
                'dân tộc'    => $hs->dantoc,
                'tôn giáo'    => $hs->tongiao,
                'trạng thái'   => $hs->trangthai,
                'id lớp học'   => $hs->lophoc_id,
                'ngày thêm'   => $hs->created_at,

                );
            }
            
     

        // echo "<pre>";
        //    print_r($data);
        //    echo "<pre>";
       
        
        Excel::create('Danhsachhocsinh', function($excel) use($data) {
            $excel->sheet('Sheet 1', function($sheet) use($data){
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

   
}
