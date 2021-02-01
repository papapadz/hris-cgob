<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantRatingType extends Model
{
    protected $fillable = [
        'ratingtype',
        'description',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
}
