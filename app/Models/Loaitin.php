<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    protected  $table ='lv17_loaitin';
    protected $guarded =[];
    public function tintuc (){
    	return $this->hasMany('App\Models\Tintuc','loaitin_id','id');
    }
}
