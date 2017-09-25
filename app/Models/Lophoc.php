<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lophoc extends Model
{
    protected  $table ='lv17_lophoc';
    protected $guarded =[];
    public function khoilop(){
    	return $this->belongsTo('App\Models\Khoilop','khoilop_id');
    }
    public function monhoc(){	
    	return $this->belongsToMany('App\Models\Monhoc','lv17_ctgvien-mhoc-lhoc','lophoc_id','monhoc_id');
    }
    public function namhoc(){
    	return $this->belongsTo('App\Models\Namhoc','namhoc_id');
    }

    public function hocsinh (){
        return $this->hasMany('App\Models\Hocsinh');
    }
    
    public function giaovien(){
        return $this->belongsTo('App\Models\User','users_id');
    }
}
