<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public function province() {
        return $this->belongsTo(Province::class,'province_id','id');
    }

    public function barangays() {
        return $this->hasMany(Barangay::class,'town_id','id');
    }
}
