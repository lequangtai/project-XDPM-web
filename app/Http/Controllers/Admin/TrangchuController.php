<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quyen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
class TrangchuController extends Controller
{
    public function getshow(){
    	$stas_user   = DB::table('lv17_users')->count();
		$stas_hsinh  = DB::table('lv17_hocsinh')->count();
		$stas_lophoc = DB::table('lv17_lophoc')->count();
		$stas_tintuc = DB::table('lv17_tintuc')->count();
		
    	return view('admin.module.dashboard.main',['stas_user'=>$stas_user,'stas_hsinh'=>$stas_hsinh,'stas_lophoc'=>$stas_lophoc,'stas_tintuc'=>$stas_tintuc]);
    }
}
