<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bangdiem extends Model
{
    protected  $table ='lv17_bangdiem';
    protected $guarded =[];
    public function hocsinh(){
    	return $this->belongsTo('App\Models\Hocsinh','hsdiem_id');
    }
    public function monhoc(){
    	return $this->belongsTo('App\Models\Monhoc','monhoc_id');
    }
    public function hocky(){
    	return $this->belongsTo('App\Models\Hocky','hocky_id');
    }
}
