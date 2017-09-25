<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhomquyen extends Model
{
    protected  $table ='lv17_nhomquyen';
    protected $guarded =[];
    public function users (){
    	return $this->hasMany('App\Models\User','nhomquyen_id','id');
    }
    public function quyen (){
    	return $this->belongsToMany('App\Models\Quyen','lv17_ct-nhomquyen-quyen');
    }
    
}
