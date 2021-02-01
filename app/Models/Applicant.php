<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'applicant_id',
        'plantilla_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    /* ************************ ACCESSOR ************************* */

    public function employee() {
        return $this->hasOne(Employee::class,'emp_id','emp_id');
    }

    public function ratings() {
        return $this->hasMany(ApplicantRating::class,'id','application_id');
    }

    public function plantilla() {
        return $this->hasOne(Plantilla::class,'id','plantilla_id');
    }
}
