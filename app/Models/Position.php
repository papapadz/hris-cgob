<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'position',
        'sg',
        'level',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    public function plantilla() {
        return $this->belongsTo(Plantilla::class,'position_id','id');
    }

    public function position() {
        return $this->belongsTo(Plantilla::class,'position_id','id');
    }

    public function qualification() {
        return $this->hasONe(PositionQualification::class,'position_id','id');
    }
}
