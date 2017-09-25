<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hanhkiem extends Model
{
    protected  $table ='lv17_hanhkiem';
    protected $guarded =[];
    public function tongket (){
    	return $this->hasMany('App\Models\Tongket','tongket_id','id');
    }
}
