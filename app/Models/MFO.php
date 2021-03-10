<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MFO extends Model
{
    use HasFactory;
    protected $table = 'ipcr_mfos';

    protected $fillable = [
        'mfo', 'functiontype_id','department_id'
    ];

    public function ipcrs() {
        return $this->hasMany(EmployeeIpcrf::class,'mfo_id','id');
    }

    public function functiontype() {
        return $this->hasOne(IPCRFunctionType::class,'id','functiontype_id');
    }
}
