<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_id', 'value', 'vl', 'sl'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function employeeLeave() {
        return $this->hasOne(EmployeeLeave::class,'id','leave_id');
    }
}
