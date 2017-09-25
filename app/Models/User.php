<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'lv17_users';
    protected $guarded =[];
    
    public function nhomquyen(){
        return $this->belongsTo('App\Models\Nhomquyen','nhomquyen_id');
    }
    public function monhoc(){   
        return $this->belongsToMany('App\Models\Monhoc','lv17_ctuser-mhoc-lhoc','users_id','monhoc_id');
    }
    public function lophoc(){   
        return $this->hasOne('App\Models\Lophoc');
    }
}
