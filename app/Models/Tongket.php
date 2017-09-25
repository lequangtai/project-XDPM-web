<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tongket extends Model
{
    protected  $table ='lv17_tongket';
    protected $guarded =[];
    public function hanhkiem(){
    	return $this->belongsTo('App\Models\Hanhkiem','tongket_id');
    }
    public function hocsinh(){
    	return $this->belongsTo('App\Models\Hocsinh','tongket_hs');
    }
     public function hocky(){
    	return $this->belongsTo('App\Models\Hocky','hocky_id');
    }
}
