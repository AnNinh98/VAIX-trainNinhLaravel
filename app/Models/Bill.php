<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table="bills";
    public function items(){
        return $this->belongsTo('App\Models\Item','item_id','id');
    }
}
