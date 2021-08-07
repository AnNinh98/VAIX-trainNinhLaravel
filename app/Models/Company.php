<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';
    public function project(){
        return $this->hasMany('App\Models\Project','company_id','id');
    }
}
