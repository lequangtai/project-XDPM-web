<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected  $table ='lv17_quyen';
    protected $guarded =[];

    public function nhomquyen(){	
    	return $this->belongsToMany('App\Models\Nhomquyen','lv17_ct-nhomquyen-quyen');
    }
}
