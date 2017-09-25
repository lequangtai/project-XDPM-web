<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    protected  $table ='lv17_monhoc';
    protected $guarded =[];
    public function user(){	
    	return $this->belongsToMany('App\Models\User','lv17_ctuser-mhoc-lhoc');
    }
    public function lophoc(){	
    	return $this->belongsToMany('App\Models\Lophoc','lv17_ctuser-mhoc-lhoc');
    }
    public function bangdiem (){
    	return $this->hasMany('App\Models\Bangdiem','monhoc_id','id');
    }
}
