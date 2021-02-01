<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmploymentType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'employmenttype',
        'description',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    public function appointment() {
        return $this->belongsTo(Appointment::class,'employmenttype_id','id');
    }

}
