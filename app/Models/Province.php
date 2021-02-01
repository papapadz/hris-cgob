<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function region() {
        return $this->belongsTo(Region::class,'id','region_id');
    }

    public function towns() {
        return $this->hasMany(Town::class,'province_id','id');
    }

}
