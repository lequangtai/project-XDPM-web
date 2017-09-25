<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phuhuynh extends Model
{
    protected  $table ='lv17_phuhuynh';
    protected $guarded =[];
    public function hocsinh (){
    	return $this->hasMany('App\Models\Hocsinh','hocsinh_id','id');
    }
}
