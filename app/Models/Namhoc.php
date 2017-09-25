<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Namhoc extends Model
{
    protected  $table ='lv17_namhoc';
    protected $guarded =[];
    public function lophoc (){
    	return $this->hasMany('App\Models\Lophoc','namhoc_id','id');
    }
    public function hocky (){
    	return $this->hasMany('App\Models\Hocky','namhoc_id','id');
    }
}
