<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeePayroll extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'emp_id',
        'payrollitem_id',
        'value',
        'startdate',
        'terms',
        'isactive',
    
    ];
    
    
    protected $dates = [
        'startdate',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    public function payrollGeneration() {
        return $this->belongsTo(EmployeePayrollGeneration::class,'id','employeepayroll_id');
    }

    public function payrollItem() {
        return $this->hasOne(PayrollItem::class,'id','payrollitem_id');
    }

}
