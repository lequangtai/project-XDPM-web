<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoilop extends Model
{
    protected  $table ='lv17_khoilop';
    protected $guarded =[];
    public function lophoc (){
    	return $this->hasMany('App\Models\Lophoc','khoilop_id','id');
    }
}
