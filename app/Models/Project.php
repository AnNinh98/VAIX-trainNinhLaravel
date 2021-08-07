<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table="project";
    public function items(){
        return $this->hasMany('App\Models\Item','project_id','id');
    }
    public function company(){
        return $this->belongsTo('App\Models\Company','company_id','id');
    }
}
