<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    protected $table = 'plantilla';

    protected $fillable = [
        'position_id',
        'plantilla',
        'creationdate',
    ];
    
    
    protected $dates = [
        'creationdate',
        'created_at',
        'updated_at',
    
    ];
    
    public function position() {
        return $this->hasOne(Position::class,'id','position_id');
    }

    public function appointment() {
        return $this->belongsTo(Appointment::class,'plantilla_id','id');
    }
}
