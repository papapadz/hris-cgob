<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantRating extends Model
{
    protected $fillable = [
        'application_id',
        'ratingtype_id',
        'score',
        'rating_by',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
}
