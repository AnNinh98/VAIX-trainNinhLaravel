<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table="items";
    public function bills(){
        return $this->hasMany('App\Models\Bill','item_id','id');
    }
    public function project(){
        return $this->belongsTo('App\Models\Project','project_id','id');
    }
}
