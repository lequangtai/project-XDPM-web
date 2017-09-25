<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hocky extends Model
{
    protected  $table ='lv17_hocky';
    protected $guarded =[];
    public function bangdiem (){
    	return $this->hasMany('App\Models\Bangdiem','hocky_id','id');
    }
    public function namhoc(){
    	return $this->belongsTo('App\Models\Namhoc','namhoc_id');
    }
    public function tongket (){
    	return $this->hasMany('App\Models\Tongket','hocky_id','id');
    }
}
