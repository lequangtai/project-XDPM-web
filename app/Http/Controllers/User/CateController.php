<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    public function getCateAdd(){
    	return view('admin.module.category.add');
    }
}
