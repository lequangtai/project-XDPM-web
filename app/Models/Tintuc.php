<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    protected  $table ='lv17_tintuc';
    protected $guarded =[];

    public function loaitin(){
    	return $this->belongsTo('App\Models\Loaitin','loaitin_id');
    }
}
