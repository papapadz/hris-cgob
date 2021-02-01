<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    public function town() {
        return $this->belongsTo(Town::class,'town_id','id')->with('province');
    }

    public function employees() {
        return $this->belongsTo(Employee::class,'address_id','id');
    }

    public function schools() {
        return $this->belongsTo(School::class,'address_id','id');
    }
}
