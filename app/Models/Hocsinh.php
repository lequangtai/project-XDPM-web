<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hocsinh extends Model
{
    protected  $table ='lv17_hocsinh';
    protected $guarded =[];
    public function phuhuynh(){
        return $this->belongsTo('App\Models\Phuhuynh','phuhuynh_id');
    }
    public function bangdiem (){
        return $this->hasMany('App\Models\Bangdiem');
    }
    public function tongket (){
        return $this->hasMany('App\Models\Tongket','tongket_hs','id');
    }
    public function lophoc(){
        return $this->belongsTo('App\Models\Lophoc','lophoc_id');
    }
}
